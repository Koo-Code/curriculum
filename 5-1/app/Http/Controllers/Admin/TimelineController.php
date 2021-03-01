<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Tweet;
use App\User;

class TimelineController extends Controller
{
    public function showTimelinePage()
    {
        $name = Auth::user()->name;
        $tweets = Tweet::latest()->get();
        return view('admin.timeline', compact('tweets','name'));
    }

    public function postTweet(Request $request)
    {
        //Tweetモデルに記載した$ruleを呼び出してvalidationする
        $this->validate($request, Tweet::$rules);

        $tweet = new Tweet();
        $tweet->user_id = Auth::user()->id;
        $tweet->body = $request->body;       
        $tweet->save();
        
        return back(); // リクエスト送ったページに戻る（つまり、/timelineにリダイレクトする）
    }

    public function delete($id)
    {
        Tweet::find($id)->delete();
        return back();
    }
}
