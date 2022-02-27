<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticate;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    public function store($id)
    {

        request()->validate([
            'body'=>'required|min:5|max:255',
        ]);

        if(auth()->user())
        {
            Comment::create([
                'user_id'=>auth()->user()->id,
                'post_id'=>$id,
                'body'=>request('body'),
            ]);
        }
        else
        {
            Comment::create([
                'post_id'=>$id,
                'nickname'=>request('nickname'),
                'body'=>request('body'),
            ]);
        }

        $post=Post::where('id',$id)->first();
        $notification=$post->get_notification;
        if($notification == "1")
        {
            return redirect()->route('sendnotification.user',$post->id);
        }
        else
        {
            return back();
        }
    }

    public function index()
    {
         $comments=Comment::all();
         return view('admin.comments.index',['comments'=>$comments]);
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        Session::flash('message','Komentar je uspješno obrisan.');
        return back();
    }
}
