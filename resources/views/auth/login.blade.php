@extends('layouts.app')
@section('content')
<div class="ui segment">
    <h1 class="ui header">{{ __('Login') }}</h1>

    <form class="ui form {{ $errors->isEmpty() ? '' : 'error' }}" method="POST" action="{{ route('login') }}">
        @csrf

        <div class="field {{ $errors->has('email') ? 'error' : '' }}">
            <label>{{ __('Email') }}</label>
            <input type="email" name="email" value="{{ old('email') }}">
        </div>

        <div class="field {{ $errors->has('password') ? 'error' : '' }}">
            <label>{{ __('Password') }}</label>
            <input type="password" name="password">
        </div>

        @if (! $errors->isEmpty())
        <div class="ui error message">
            <div class="header">{{ __('Something went wrong!') }}</div>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <button class="ui button" type="submit">{{ __('Login') }}</button>
    </form>
</div>
@endsection
