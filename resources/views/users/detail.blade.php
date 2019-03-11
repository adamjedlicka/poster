@extends('layouts.app')
@section('content')

<div class="ui segment grid">
    <div class="ui right very close rail">
        @if(Auth::id() === $user->getKey())
        <div class="ui vertical menu">
            @can('update', $user)
            <a href="{{ route('users.edit', $user) }}" class="item">Edit profile</a> @endcan

            <a href="{{ route('logout') }}" onclick="event.preventDefault(); $('#logout-form').submit();" class="item">Logout</a>
        </div>
        @endif

        @if(Auth::id() !== $user->getKey())
        <div class="ui vertical menu">
            <a href="{{ route('follow', $user) }}" onclick="event.preventDefault(); $('#follow-form').submit();" class="item">
                @if(Auth::user()->follows($user))
                Unfollow
                @else
                Follow
                @endif
            </a>
        </div>
        @endif

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

        <form id="follow-form" action="{{ route('follow', $user) }}" method="POST" style="display: none;">
            @csrf
        </form>
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
    <h2 class="ui header">{{ $user->first_name }}'s posts</h2>
    @include('posts/_index')
</div>
@endsection
