<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Auth;
use App\NewsFiles;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Auth::user()->roles[0]->name);
         if (Auth::user()->hasRole('Super Admin')) {
                $news = News::all();            
         }
         elseif (Auth::user()->hasRole('News Editor')) {
                $news = News::where('status','!=','0')->get();            
         }
         elseif (Auth::user()->hasRole('Proofreader')) {
                $news = News::where('status','3')->orWhere('proofread_by',Auth::user()->id)->get();            
         }
         elseif (Auth::user()->hasRole('News Translator')) {
                $news = News::where('status','2')->orWhere('translated_by',Auth::user()->id)->get();            
         }
         else{
                $news = News::where('user_id', Auth::user()->id)->get();            
         }

        return view('news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            // dd($request->all());
        $news = new News();
            $news->news_content = $request->news_content;
            $news->main_heading = $request->main_heading;
            $news->sub_heading = $request->sub_heading;
            $news->main_highlight = $request->main_highlight;
            $news->secondary_highlight = $request->secondary_highlight;
            $news->user_id = Auth::user()->id;
        $news->save();

        //photo
        for($p = 0; $p< count($request->photo); $p++){

            $fileName = time().'_news_photo.'.$request->photo[$p]->getClientOriginalExtension();
            $filePath = $request->photo[$p]->storeAs('news/photo/', $fileName, 'public');

            $photos = new NewsFiles();
            $photos->photo = $fileName;
            $photos->photo_caption = $request->photo_caption[$p];
            $photos->new_id = $news->id;
            $photos->save();            
        }

        //video
        for($v = 0; $v< count($request->video); $v++){

            $fileName = time().'_news_video.'.$request->video[$v]->getClientOriginalExtension();
            $filePath = $request->video[$v]->storeAs('news/video/', $fileName, 'public');

            $photos = new NewsFiles();
            $photos->video = $fileName;
            $photos->video_caption = $request->video_caption[$v];
            $photos->new_id = $news->id;
            $photos->save();            
        }

        //document
        for($d = 0; $d< count($request->document); $d++){

            $fileName = time().'_news_document.'.$request->document[$d]->getClientOriginalExtension();
            $filePath = $request->document[$d]->storeAs('news/document/', $fileName, 'public');

            $photos = new NewsFiles();
            $photos->document = $fileName;
            $photos->document_caption = $request->document_caption[$d];
            $photos->new_id = $news->id;
            $photos->save();            
        }

        //link
        for($l = 0; $l< count($request->link); $l++){

            $photos = new NewsFiles();
            $photos->link = $request->link[$l];
            $photos->link_caption = $request->link_caption[$l];
            $photos->new_id = $news->id;
            $photos->save();            
        }

        return redirect()->route('news.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        return view('news.show',compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        // dd($news);
        // $news = News::with('news_files')->find($id);
        return view('news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        // dd($request->news_tags);
                // $news = News::find($id);
                    $news->categories = $request->categories;
                    $news->tags = $request->news_tags;
                    $news->keywords = $request->keywords_tags;
                    $news->news_page_link = $request->page_links;
                    $news->update();

                    // dd(News::find($request->news_id));
                    // $news->user_id = Auth::user()->id;
                    // $news->published_by  = Auth::user()->id;

                // $files = NewsFiles::where('news_id',$news->id)->get();
                // foreach($files as $file){
                //     if($file->photo){
                //         if( file_exists(public_path('storage/news/photo/'.$file->photo) )){
                //             unlink(public_path('storage/news/photo/'.$file->photo));
                //         }
                //     }


                //     if($file->document){
                //         if( file_exists(public_path('storage/news/document/'.$file->document) )){
                //             unlink(public_path('storage/news/document/'.$file->document));
                //         }
                //     }
                    

                //     if($file->video){
                //         if( file_exists(public_path('storage/news/video/'.$file->video) )){
                //             unlink(public_path('storage/news/video/'.$file->video));
                //         }
                //     }                    
                // }

                // NewsFiles::where('news_id',$news->id)->delete();

                // //photo
                //     for($p = 0; $p< count($request->photo); $p++){

                //         $fileName = time().'_news_photo.'.$request->photo[$p]->getClientOriginalExtension();
                //         $filePath = $request->photo[$p]->storeAs('news/photo/', $fileName, 'public');

                //         $photos = new NewsFiles();
                //         $photos->photo = $fileName;
                //         $photos->photo_caption = $request->photo_caption[$p];
                //         $photos->new_id = $news->id;
                //         $photos->save();            
                //     }

                //     //video
                //     for($v = 0; $v< count($request->video); $v++){

                //         $fileName = time().'_news_video.'.$request->video[$v]->getClientOriginalExtension();
                //         $filePath = $request->video[$v]->storeAs('news/video/', $fileName, 'public');

                //         $photos = new NewsFiles();
                //         $photos->video = $fileName;
                //         $photos->video_caption = $request->video_caption[$v];
                //         $photos->new_id = $news->id;
                //         $photos->save();            
                //     }

                //     //document
                //     for($d = 0; $d< count($request->document); $d++){

                //         $fileName = time().'_news_document.'.$request->document[$d]->getClientOriginalExtension();
                //         $filePath = $request->document[$d]->storeAs('news/document/', $fileName, 'public');

                //         $photos = new NewsFiles();
                //         $photos->document = $fileName;
                //         $photos->document_caption = $request->document_caption[$d];
                //         $photos->new_id = $news->id;
                //         $photos->save();            
                //     }

                //     //link
                //     for($l = 0; $l< count($request->link); $l++){

                //         $photos = new NewsFiles();
                //         $photos->link = $request->link[$l];
                //         $photos->link_caption = $request->link_caption[$l];
                //         $photos->new_id = $news->id;
                //         $photos->save();            
                //     }

                return redirect()->route('news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        //
    }

    public function sendToEditor($id)
    {
        $news = News::find($id);
        if($news->status == 0){
            $news->status = 1;
            $news->update();
            return redirect()->route('news.index')->with('success','News is sent to Editor.');
        }

        if($news->status == 1){
            return redirect()->route('news.index')->with('error','News is already sent to Editor.');
        }
    }

    public function sendToProofReader($id)
    {
        $news = News::find($id);
                    if($news->status == 1){
                        $news->status = 3;
                        $news->update();
                        return redirect()->route('news.index')->with('success','News is sent to Proof Reader.');
                    }

                    if($news->status == 3){
                        return redirect()->route('news.index')->with('error','News is already sent to Proof Reader.');
                    }   
    }

    public function sendBackToEditor(Request $request)
    {

        $news = News::find($request->news_id);
            if($request->mode == 'translator'){
                                if($news->status == 2){
                                    $news->status = 1;
                                    $news->translated_by = Auth::user()->id;
                                    $news->translater_remarks = $request->translator_remarks;
                                    $news->update();
                                    return redirect()->route('news.index')->with('success','News is sent back to Editor.');
                                }
            }else{
                                if($news->status == 3){
                                    $news->status = 1;
                                    $news->proofread_by = Auth::user()->id;
                                    $news->proofreader_remarks = $request->proofreader_remarks;
                                    $news->update();
                                    return redirect()->route('news.index')->with('success','News is sent back to Editor.');
                                }
            }
    }

    public function sendToTranslator($id){
                $news = News::find($id);
                    if($news->status == 1){
                        $news->status = 2;
                        $news->update();
                        return redirect()->route('news.index')->with('success','News has been sent to Translator.');
                    }
                    if($news->status == 2){
                        return redirect()->route('news.index')->with('error','News has already been sent to Translator.');
                    }   
    }

    public function publish_news($id){
        $news = News::find($id);
        $news->published_by = Auth::user()->id;
        $news->published = 1;
        $news->update();
            return redirect()->route('news.index')->with('success','News published Successfully');
    }

    public function unpublish_news($id){
        $news = News::find($id);
        $news->unpublished_by = Auth::user()->id;
        $news->published = 0;
        $news->update();
            return redirect()->route('news.index')->with('error','News  Un-published Successfully');
    }
}
