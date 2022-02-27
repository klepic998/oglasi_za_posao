<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminsController extends Controller
{
    //
    public function index()
    {
        return view('admin.index');
    }
    public function showposts()
    {
        $posts = Post::all();

        return view('admin.posts.index',['posts'=>$posts]);
    }
    public function show()
    {
        $users=User::all();
        return view('admin.users.index',['users'=>$users]);
    }

    public function showterms()
    {
        return view('admin.links.termsandc');
    }

    public function showpp()
    {
        return view('admin.links.privacypolicy');
    }
    public function destroy(User $user)
    {

        $user->delete();
        Session::flash('message','Korisnik je uspješno obrisan.');
        return back();

    }
    public function chooseuser()
    {
        $users=User::all();
        return view('admin.users.chooseuser',['users'=>$users]);
    }
    public function showusersposts()
    {
        $choosen_user=request()->get('user');

        $user=User::where('id',$choosen_user)->first();
        $posts=Post::all()->where('user_id',$choosen_user);
        return view('admin.users.usersposts',['posts'=>$posts,'user'=>$user]);
    }
    public function postdetails(Post $post)
    {

        return view('admin.users.choosenpost',['post'=>$post]);
    }

}
