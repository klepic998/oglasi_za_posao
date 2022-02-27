<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = auth()->user()->posts;
        return view('user.myposts',['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('user/createpost',['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'category_id'=>'required',
            'title'=>'required|min:8|max:255',
            'post_image'=>'file',
            'body'=>'required',
            'location'=>'required',
            'address'=>'required',
            'get_notification'=>'required'
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
            'get_notification'=>request('get_notification'),
        ]);

        Session::flash('post-created-message','Oglas je uspješno kreiran.');
        return redirect()->route('user.posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user=auth()->user();
        return view('user.profile', ['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories=Category::all();
        return view('user.editpost',['post'=>$post,'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        return redirect()->route('user.posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        Session::flash('message','Oglas je uspješno obrisan.');
        return back();
    }

    public function destroyuser(User $user)
    {
        $user->delete();
        Session::flash('message','Profil je uspješno obrisan.');
        return redirect('/');
    }
    public function editProfile(User $user)
    {
        return view('user.editprofile',['user'=>$user]);
    }
    public function updateProfile(User $user)
    {
        request()->validate([

            'name'=>'required',
            'email'=>'required',
            'avatar'=>'file',
        ]);

        if(request('avatar'))
        {
            request('avatar')->move('storage/images', request('avatar')->getClientOriginalName());
            $user->avatar = request('avatar')->getClientOriginalName();
        }
        $user->email = request('email');
        $user->name = request('name');


        $user->update();
        Session::flash('post-updated-message','Oglas je uspješno ažuriran.');
        return back();
    }
}
