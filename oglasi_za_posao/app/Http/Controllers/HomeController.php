<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Notification;
use App\Notifications\PostCommentedNotification;


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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    //Sa ovom funkcijom smo omogucili prikaz svih postova
    public function index()
    {
        $categories_nav=Post::distinct()->get('category_id');
        $posts = Post::paginate(5);
        return view('home', ['posts'=>$posts,'categories_nav'=>$categories_nav]);
    }

}
