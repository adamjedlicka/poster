@extends('layouts.app')
@section('content')

<div class="ui segment">
    <h1 class="ui header">
        {{ $topic->name }}
    </h1>
</div>

<div class="ui segment">
@include('posts._index')
</div>

@endsection
