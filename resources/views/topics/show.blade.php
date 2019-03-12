@extends('layouts.app')
@section('content')

<div class="ui segment grid">
    <div class="ui right very close rail">
        <div class="ui vertical menu">
            <a href="{{ route('follow.topic', $topic) }}" onclick="event.preventDefault(); $('#follow-form').submit();" class="item">
                @if(Auth::user()->followsTopic($topic))
                Unfollow
                @else
                Follow
                @endif
            </a>
        </div>

        <form id="follow-form" action="{{ route('follow.topic', $topic) }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>

    <div class="ui row">
        <div class="column">
            <h1 class="ui header">
                {{ $topic->name }}
            </h1>

            <div class="ui label">
                Followers
                <div class="detail">{{ $topic->followerCount }}</div>
            </div>
        </div>
    </div>
</div>

<div class="ui segment">
    @include('posts._index')
</div>

@endsection
