@extends('layouts.app')
@section('content')

<div class="ui segment grid">
    <div class="ui right very close rail">
        @auth
        <div class="ui vertical menu">
            <follow-button url="{{ route('follow.topic', $topic) }}" follows="{{ Auth::user()->followsTopic($topic) }}"></follow-button>
        </div>
        @endauth
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

            <div class="ui label">
                Posts
                <div class="detail">{{ $topic->posts()->count() }}</div>
            </div>
        </div>
    </div>
</div>

<div class="ui segment">
    @include('posts._index')
</div>

@endsection
