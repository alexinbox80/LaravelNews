@extends('layouts.main')
@section('title') Новость - {{ $news[0]->title }} ID {{ $id }} @parent @endsection
@section('content')
    <div style="border: 1px solid green;">
        <h2> {{ $news[0]->title }}</h2>
        <p>{{ $news[0]->author }} - {{ $news[0]->created_at }}</p>
        <p>{!! $news[0]->description !!}</p>
    </div>
@endsection
