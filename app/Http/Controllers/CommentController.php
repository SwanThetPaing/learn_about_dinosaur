<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use App\Mail\SubscriberMail;
// use App\Http\Controllers\SubscriberMail;
// use resources\views\Mail\SubscriberMail;
// use Resources\views\Mail\SubscriberMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    public function store(Blog $blog)
    {
        request()->validate([
            'body'=>'required | min: 10'
        ]);

        //comment store
        $blog->comments()->create([
            'body'=>request('body'),
            'user_id'=>auth()->id()
        ]);

        $subscribers= $blog->subscribers->filter((fn ($subscriber) => $subscriber->id != auth()->id()));

        $subscribers->each(function($subscriber) use ($blog)
        {
            Mail::to($subscriber->email)->send(new SubscriberMail($blog));
        });

        return redirect('/blogs/'.$blog->slug);
        
    }

    public function destory(Comment $comment)
    {
        $comment->delete();

        return back();
    }

}
