@extends('layouts.app')
@section('content')

<div class="ui segment grid">
    <div class="ui right very close rail">
        @if(Auth::id() === $user->getKey())
            <div class="ui vertical menu">
                @can('update', $user)
                    <a href="{{ route('users.edit', $user) }}" class="item">Edit profile</a>
                @endcan

                <post-button url="{{ route('logout') }}">Logout</post-button>
            </div>
        @endif

        @auth @if(Auth::id() !== $user->getKey())
            <div class="ui vertical menu">
                <follow-button url="{{ route('follow.user', $user) }}" follows="{{ Auth::user()->follows($user) }}"></follow-button>
            </div>
        @endif @endauth
    </div>

    <div class="ui row">
        <div class="two wide column">
            <img class="ui image" src="{{ $user->avatar }}">
        </div>

        <div class="fourteen wide column">
            <h1 class="ui header">
                {{ $user->first_name }} {{ $user->last_name }}
                <div class="sub header">
                    {{ '@' }}{{ $user->handle }}
                </div>
            </h1>

            <div class="ui label">
                Followers
                <div class="detail">{{ $user->followerCount }}</div>
            </div>

            <div class="ui label">
                Posts
                <div class="detail">{{ $user->postCount }}</div>
            </div>
        </div>

    </div>
</div>

<div class="ui segment">
    @include('posts._index', [
        'title' => $user->first_name . '\'s posts',
    ])
</div>
@endsection
