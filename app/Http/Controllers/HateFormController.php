<?php

namespace App\Http\Controllers;

use App\HateForm;
use Illuminate\Http\Request;
use App\Status;
use App\HateFormComments;

class HateFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hate_form = HateForm::with('status')->where('confidentiality', 'Public')->get();
        return view('hate_form.public_hateform.index',   compact('hate_form'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hate_form.public_hateform.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $hateform_status = Status::where('name','Initiated')->get()->toArray();

        if($hateform_status){
            $status_id = $hateform_status[0]['id'];
        }else{
            $status_id = 1;
        }
        
        $hf = new HateForm();
            $hf->name = $request->name; 
            $hf->phone_number = $request->phone_number; 
            $hf->email = $request->email; 
            $hf->country = $request->country; 
            $hf->hate_content = $request->hate_content; 
            $hf->hate_content_url = json_encode($request->hate_content_url); 
            $hf->offender_details = $request->offender_details; 
            $hf->confidentiality = $request->confidentiality; 

            $hf->hateform_number = get_random_number(10);
            $hf->status_id = $status_id; 
        $hf->save();

        return redirect()->route('hateForm.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HateForm  $hateForm
     * @return \Illuminate\Http\Response
     */
    public function show(HateForm $hateForm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HateForm  $hateForm
     * @return \Illuminate\Http\Response
     */
    public function edit(HateForm $hateForm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HateForm  $hateForm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HateForm $hateForm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HateForm  $hateForm
     * @return \Illuminate\Http\Response
     */
    public function destroy(HateForm $hateForm)
    {
        //
    }
    public function hateForm_details($hateform_number){
       
        $hateform = HateForm::with('status','hate_form_comments')
                                                    ->where('confidentiality', 'Public')
                                                    ->where('hateform_number', $hateform_number)
                                                    ->get()->toArray()[0];

        return view('hate_form.public_hateform.hateform_detail',   compact('hateform'));
    }

    public function  add_comment(Request $request)
    {

        if($request->hf_id){
                $comments = new HateFormComments();
                $comments->email = $request->email;
                $comments->comment = $request->comment;
                $comments->hate_form_id = $request->hf_id;
                $comments->save();
        
            $all_Comments = HateFormComments::where('hate_form_id', $request->hf_id)->get()->toArray();
            return response()->json($all_Comments);
        }  

    }

    public function form_status(Request $request){
        $hate_form = HateForm::with('status')
                                                    ->where('confidentiality', 'Public')
                                                    ->where('hateform_number', $request->number)
                                                    ->get();
        return view('hate_form.public_hateform.form_status',   compact('hate_form'));
    }

}
