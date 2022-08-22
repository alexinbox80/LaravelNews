@extends('layouts.main')
@section('title') Новость - {{ $news[$id]->title }} ID {{ $id }} @parent @endsection
@section('content')
    <div style="border: 1px solid green;">
        <h2> {{ $news[$id]->title }}</h2>
        <p>{{ $news[$id]->author }} - {{ $news[$id]->created_at }}</p>
        <p>{!! $news[$id]->description !!}</p>
    </div>
@endsection
