@extends('layouts.app')
@section('content')

<div class="ui segment">
    <form action="{{ route('users.update', $user) }}" method="POST" class="ui form {{ $errors->isEmpty() ? '' : 'error' }}" enctype="multipart/form-data">
        @csrf @method('PATCH')

        <h2 class="header">Personal information</h2>

        <div class="two fields">

            <div class="field {{ $errors->has('first_name') ? 'error' : '' }}">
                <label>First name</label>
                <input type="text" name="first_name" placeholder="First Name" value="{{ old('first_name', $user->first_name) }}">
            </div>

            <div class="field {{ $errors->has('last_name') ? 'error' : '' }}">
                <label>Last name</label>
                <input type="text" name="last_name" placeholder="First Name" value="{{ old('last_name', $user->last_name) }}">
            </div>
        </div>

        <div class="field {{ $errors->has('email') ? 'error' : '' }}">
            <label>Email</label>
            <input type="email" name="email" placeholder="First Name" value="{{ old('email', $user->email) }}">
        </div>

        <div class="field {{ $errors->has('description') ? 'error' : '' }}">
            <label>Description</label>
            <textarea name="description">{{ old('description', $user->description) }}</textarea>
        </div>

        <div class="field {{ $errors->has('avatar') ? 'error' : '' }}">
            <label>Avatar</label>
            <input type="file" name="avatar">
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
    </form>

    <div class="ui right very close rail">
        <div class="ui vertical menu">
            <a href="{{ route('users.update', $user) }}" class="item" onclick="event.preventDefault(); $('.form').submit();">Save changes</a>
            <a href="{{ route('users.show', $user) }}" class="item">Cancel changes</a>
        </div>
    </div>
</div>
@endsection
