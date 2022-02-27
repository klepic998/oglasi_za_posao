<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    //
//Sa ovom funkcijom prikazujemo pojedinacni oglas
   public function show(Post $post)
    {

        return view('layouts/blog-post', ['post'=>$post]);
    }

    //funkcija za kreiranje oglasa
    public function create()
    {
        $categories=Category::all();
        return view('admin/posts/create',['categories'=>$categories]);
    }
    //funkcija za smjestanje unesenih podataka pri kreiranju oglasa
    //u nizu inputs cuvamo unesene podatke
    public function store(Request $request)
    {
        request()->validate([
        'category_id'=>'required',
        'title'=>'required|min:5|max:255',
        'post_image'=>'file',
        'body'=>'required',
        'location'=>'required',
        'address'=>'required',
        'get_notification'=>'required',
     ]);
    //ispitujemo da li je neko uploadovao sliku i smjestamo u folder images, ako jeste
     if(request('post_image'))
     {
        request('post_image')->move('storage/images', request('post_image')->getClientOriginalName());

     }

     Post::create([
         'user_id'=>auth()->user()->id,
         'category_id'=>request('category_id'),
         'title'=>request('title'),
         'post_image'=>request('post_image')->getClientOriginalName(),
         'body'=>request('body'),
         'location'=>request('location'),
         'address'=>request('address'),
         'get_notification'=>request('get_notification')
     ]);

        Session::flash('post-created-message','Oglas je uspješno kreiran.');
        return redirect()->route('posts.index');
    }

    public function index()
    {
        $posts = Post::all();
        $comments=Comment::all()->where('post_id',$posts->id);

        return view('admin.posts.index',['posts'=>$posts,'comments'=>$comments]);
    }
    public function edit(Post $post)
    {
        $categories=Category::all();
        return view('admin.posts.edit',['post'=>$post,'categories'=>$categories]);
    }
    public function update(Post $post)
    {

        request()->validate([

            'category_id'=>'required',
            'title'=>'required|min:8|max:255',
            'post_image'=>'file',
            'body'=>'required',
            'location'=>'required',
            'address'=>'required',
        ]);

        if(request('post_image'))
        {
            request('post_image')->move('storage/images', request('post_image')->getClientOriginalName());
            $post->post_image = request('post_image')->getClientOriginalName();
        }
        $post->title = request('title');
        $post->body = request('body');
        $post->location = request('location');
        $post->address = request('address');
        $post->category_id=request('category_id');

        $post->update();
        Session::flash('post-updated-message','Oglas je uspješno ažuriran.');
        return redirect()->route('posts.index');
    }
    public function destroy(Post $post)
    {
        $post->delete();
        Session::flash('message','Oglas je uspješno obrisan.');
        return back();
    }

}
