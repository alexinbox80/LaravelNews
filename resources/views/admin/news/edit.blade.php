@extends('layouts.admin')
@section('content')
    <div class="offset-2 col-8">
        <h2>Редактировать новость</h2>

        @if($errors->any())
            @foreach($errors->all() as $error)
                @include('inc.message', ['message' => $error])
            @endforeach
        @endif

        <form method="post" action="{{ route('admin.news.store') }}">
            @csrf
            <div class="form-group">
                <label for="title">Заголовок</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ $news[0]->title }}">
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea class="form-control" name="description" id="description">{{ $news[0]->description }}</textarea>
            </div><br>
            <button class="btn btn-success" type="submit">Сохранить</button>
        </form>
    </div>
@endsection
