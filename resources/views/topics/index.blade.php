@extends('layouts.app')
@section('content')

@foreach($topics as $topic)
<a href="{{ route('topics.show', $topic) }}">{{ $topic->name }}</a>
@endforeach

@endsection
