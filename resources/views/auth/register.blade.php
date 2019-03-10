@extends('layouts.app')
@section('content')
<div class="ui segment">
    <h1 class="ui header">{{ __('Register') }}</h1>

    <form class="ui form {{ $errors->isEmpty() ? '' : 'error' }}" method="POST" action="{{ route('register') }}">
        @csrf

        <div class="field {{ $errors->has('first_name') ? 'error' : '' }}">
            <label>{{ __('First name') }}</label>
            <input type="text" name="first_name" value="{{ old('first_name') }}" autofocus>
        </div>

        <div class="field {{ $errors->has('last_name') ? 'error' : '' }}">
            <label>{{ __('Last name') }}</label>
            <input type="text" name="last_name" value="{{ old('last_name') }}">
        </div>

        <div class="field {{ $errors->has('email') ? 'error' : '' }}">
            <label>{{ __('Email') }}</label>
            <input type="email" name="email" value="{{ old('email') }}">
        </div>

        <div class="field {{ $errors->has('handle') ? 'error' : '' }}">
            <label>{{ __('Handle') }}</label>
            <input type="text" name="handle" value="{{ old('handle') }}">
        </div>

        <div class="field {{ $errors->has('password') ? 'error' : '' }}">
            <label>{{ __('Password') }}</label>
            <input type="password" name="password">
        </div>

        <div class="field {{ $errors->has('password') ? 'error' : '' }}">
            <label>{{ __('Password confirmation') }}</label>
            <input type="password" name="password_confirmation">
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

        <button class="ui button" type="submit">{{ __('Register') }}</button>
    </form>
</div>
@endsection
