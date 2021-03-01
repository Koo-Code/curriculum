@extends('layouts.admin')
@section('title','タイムライン')

@section('content')

<div class="bg-white border w-50" style="margin:0 auto;">
    <div class="p-4 border-bottom">ホーム</div>
    <form action="/timeline" method="post">
    {{ csrf_field() }}
        <div class="form-group">
            <div class="p-4">
                <input class="form-control @if(count($errors) > 0) is-invalid @endif" type="text" name="body"  placeholder="いまどうしてる？">
                <div class="text-right">
                    <button type="submit" class="mt-4 btn btn-primary">つぶやく</button>
                </div>
            </div>
            
            @if (count($errors) > 0)
                @foreach($errors->all() as $e)
                    <div class="text-center p-1 alert-danger"><strong>エラー！  </strong>{{ $e }}</div>
                @endforeach
            @endif
        </div>
    </form>
</div>

<div class="bg-white border w-50" style="margin: 25px auto;">

    <div class="tweet-wrapper">
        @foreach($tweets as $tweet)
        <div class="border-bottom p-4">

            <div class="pb-3">
                <div style="float:right;">{{ $tweet->created_at }}</div>    
                <div style="font-weight:bold;">{{ $tweet->user->name }}</div>
            </div>
            <div>{{ $tweet->body}}</div>
            @if($name == $tweet->user->name)
            <div style="text-align:right;">
                <a href="/timeline/delete/{{ $tweet->id }}">
                    <button type=button class="btn btn-danger">削除</button>
                </a>
            </div>
            @endif
        </div>
        @endforeach
    </div>
</div>

@endsection