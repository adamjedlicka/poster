@extends('layouts.app')
@section('content')

<div class="ui segment">
    <div class="ui large list">
        @foreach($topics as $topic)
        <a href="{{ route('topics.show', $topic) }}" class="item">{{ $topic->name }}</a>
        @endforeach
    </div>
</div>

@endsection
