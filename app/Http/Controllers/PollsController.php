<?php

namespace App\Http\Controllers;

use App\Polls;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use App\PollReactions;

class PollsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasRole('Super Admin')) {
                $polls = Polls::all();
         }
         elseif (Auth::user()->hasRole('Poll Editor')) {
                $polls = Polls::where('redressal_status','!=','0')->get();
         }
         elseif (Auth::user()->hasRole('Polls Proofreader')) {
                $polls = Polls::where('redressal_status','2')->orWhere('proofread_by',Auth::user()->id)->get();
         }
         elseif (Auth::user()->hasRole('Poll Translator')) {
                $polls = Polls::where('redressal_status','3')->orWhere('translated_by',Auth::user()->id)->get();
         }
         else{
                $polls = Polls::where('user_id', Auth::user()->id)->get();
         }


        return view('polls.index',compact('polls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $poll = Polls::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->limit(1)->get();
        if($poll){
            $hr = $poll[0]->created_at->format('H');
            // dd($poll[0]->created_at->format('H'));
                // $startTime = Carbon::parse($poll[0]->created_at);
                // $endTime = Carbon::parse(date());
                // $totalDuration = $endTime->diffForHumans($startTime);
                if($hr < 72){
                    return redirect()->route('polls.index')->with('error','You cannot add another poll before 72 hours.');
                }
        }
        return view('polls.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $polls = new Polls();
            $polls->question = $request->question;
            $polls->user_id = Auth::user()->id;
            $polls->redressal_status = 0;
            $polls->save();

            return redirect()->route('polls.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Polls  $polls
     * @return \Illuminate\Http\Response
     */
    public function show(Polls $polls, $id)
    {
        $polls = Polls::find($id);
        return view('polls.show', compact('polls'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Polls  $polls
     * @return \Illuminate\Http\Response
     */
    public function edit(Polls $polls, $id)
    {
        $polls = Polls::find($id);
        return view('polls.edit', compact('polls'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Polls  $polls
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Polls $polls, $id)
    {
            $polls = Polls::find($id);
            $polls->question = $request->question;
            $polls->update();
            return redirect()->route('polls.index')->with('error','Poll Question is Updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Polls  $polls
     * @return \Illuminate\Http\Response
     */
    public function destroy(Polls $polls)
    {
        //
    }

    public function send_poll_to_editor($id)
    {
        $polls = Polls::find($id);
        if($polls->redressal_status == 0){
            $polls->redressal_status = 1;
            $polls->update();
            return redirect()->route('polls.index')->with('success','Poll is sent to Editor for Review.');
        }

        if($polls->redressal_status == 1){
            return redirect()->route('polls.index')->with('error','Poll is already sent to Editor for Review.');
        }
    }

    public function send_poll_to_proofreader($id)
    {
        $polls = Polls::find($id);
        if($polls->redressal_status == 1){
            $polls->redressal_status = 2;
            $polls->update();
            return redirect()->route('polls.index')->with('success','Poll is sent to Proofreader for Review.');
        }

        if($polls->redressal_status == 2){
            return redirect()->route('polls.index')->with('error','Poll is already sent to Proofreader for Review.');
        }
    }


    public function send_poll_to_translator($id, $lang)
    {
        $polls = Polls::find($id);
        if($polls->redressal_status == 1){
            $polls->redressal_status = 3;
            $polls->lang_type = $lang;
            $polls->update();
            return redirect()->route('polls.index')->with('success','Poll is sent to Translator for Review.');
        }

        if($polls->redressal_status == 2){
            return redirect()->route('polls.index')->with('error','Poll is already sent to Translator for Review.');
        }
    }

    public function publish_poll($id){
        $chkng = Polls::where('published', 1)->get()->toArray();
        // dd($chkng);
        if(count($chkng) > 0){
                return redirect()->route('polls.index')->with('error','Another Poll is already Published, You can UnPublish it first!');
        }else{
            $polls = Polls::find($id);
            $polls->published_by = Auth::user()->id;
            $polls->published = 1;
            $polls->update();
                return redirect()->route('polls.index')->with('success','Poll published Successfully');
        }
    }

    public function unpublish_poll($id){
        $polls = Polls::find($id);
        $polls->unpublished_by = Auth::user()->id;
        $polls->published = 0;
        $polls->update();
            return redirect()->route('polls.index')->with('error','Poll  Un-published Successfully');
    }

    public function backtoeditor_poll_question(Request $request)
    {
        $polls = Polls::find($request->poll_id);
            if($request->mode == 'translator'){
                                if($polls->redressal_status == 3){
                                    $polls->redressal_status = 1;
                                    $polls->translated_by = Auth::user()->id;
                                    $polls->translated_question = $request->translated_question;
                                    $polls->update();
                                    return redirect()->route('polls.index')->with('success','Polls is sent back to Editor.');
                                }
            }else{
                                if($polls->redressal_status == 2){
                                    $polls->redressal_status = 1;
                                    $polls->proofread_by = Auth::user()->id;
                                    $polls->proofreaded_question = $request->proofreaded_question;
                                    $polls->update();
                                    return redirect()->route('polls.index')->with('success','Polls is sent back to Editor.');
                                }
            }
    }

    public function polls_reactions_list($id){
            $reactions = PollReactions::with('polls')->where('poll_id', $id)->get();
            return view('polls.reactions', compact('reactions'));
    }


}
