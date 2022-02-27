<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use ProtoneMedia\LaravelCrossEloquentSearch\Search;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $categories_nav = Post::distinct()->get('category_id');
        $search = $request->input('search');


         $posts = Search::add(Post::class, ['title','user.name'], 'id')
            ->paginate(5)
            ->search($search);


        return view('searchresults',['posts'=>$posts,'categories_nav'=>$categories_nav]);
    }
    public function index($id)
    {
        $categories_nav = Post::distinct()->get('category_id');
        $posts=Post::where('category_id',$id)->paginate(5);
        return view('home',['posts'=>$posts,'categories_nav'=>$categories_nav]);
    }
}
