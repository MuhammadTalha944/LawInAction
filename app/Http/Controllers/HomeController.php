<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Polls;
use App\Campaign;
use App\News;
use App\Complaint;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    { 
        
        $complaint = Complaint::count();
        $news = News::count();
        $campaign = Campaign::count();
        $polls = Polls::count();
        return view('home', compact('complaint', 'news', 'campaign', 'polls'));

    }
}
