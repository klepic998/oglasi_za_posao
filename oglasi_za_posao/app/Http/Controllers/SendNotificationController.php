<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Notifications\PostCommentedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class SendNotificationController extends Controller
{
    //
    public function sendnotification($id)
    {
        $post=Post::where('id',$id)->first();
        $user=User::where('id',$post->user_id)->first();
        $details=
            [
                'name'=>$user->name,
                'id'=>$id
            ];

        Notification::send($user,new PostCommentedNotification($details));
        return redirect()->route('post',$id);


    }
    public function showpost($id)
    {
        $post=Post::where('id',$id)->first();
        return view('layouts/blog-post', ['post'=>$post]);
    }
}
