<?php

namespace App\Http\Controllers;

use App\Blogs;
use App\BlogsFiles;
use Illuminate\Http\Request;
use Auth;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = blogs::with('blog_files')->get();
        return view('blogs.index', compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $blogs = new Blogs();
            $blogs->blog_content = $request->blog_content;
            $blogs->main_heading = $request->main_heading;
            $blogs->sub_heading = $request->sub_heading;
            $blogs->user_id = Auth::user()->id;
        $blogs->save();

        //photo
        for($p = 0; $p< count($request->photo); $p++){

            $fileName = microtime().'_blogs_photo.'.$request->photo[$p]->getClientOriginalExtension();
            $fileName = str_replace(' ', '', $fileName);
            $filePath = $request->photo[$p]->storeAs('blogs/photo/', $fileName, 'public');

            $photos = new BlogsFiles();
            $photos->photo = $fileName;
            $photos->photo_caption = $request->photo_caption[$p];
            $photos->blog_id = $blogs->id;
            $photos->save();            
        }

        //video
        for($v = 0; $v< count($request->video); $v++){

            $fileName = microtime().'_blogs_video.'.$request->video[$v]->getClientOriginalExtension();
            $fileName = str_replace(' ', '', $fileName);
            $filePath = $request->video[$v]->storeAs('blogs/video/', $fileName, 'public');

            $photos = new BlogsFiles();
            $photos->video = $fileName;
            $photos->video_caption = $request->video_caption[$v];
            $photos->blog_id = $blogs->id;
            $photos->save();            
        }

        return redirect()->route('blogs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blogs  $blogs
     * @return \Illuminate\Http\Response
     */
    public function show(Blogs $blogs, $id)
    {
        $blog = $blogs::with('blog_files')->find($id);
        return view('blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blogs  $blogs
     * @return \Illuminate\Http\Response
     */
    public function edit(Blogs $blogs, $id)
    {
        $blog = $blogs::with('blog_files')->find($id);
        return view('blogs.edit', compact('blog'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blogs  $blogs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blogs $blogs, $id)
    {
        $blogs = $blogs->find($id);
            $blogs->blog_content = $request->blog_content;
            $blogs->main_heading = $request->main_heading;
            $blogs->sub_heading = $request->sub_heading;
        $blogs->update();
        return redirect()->route('blogs.index')->with('success','Blog Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blogs  $blogs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blogs $blogs, $id)
    {
        dd($id);
        BlogsFiles::where('blog_id')->delete();
        $blogs->find($id)->delete();
        return redirect()->route('blogs.index')->with('success','Blog Deleted Successfully');

    }
}
