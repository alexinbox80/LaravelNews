@extends('layouts.admin')
@section('content')
    <div class="offset-2 col-8">
        <h2>Редактировать категорию</h2>

        @if($errors->any())
            @foreach($errors->all() as $error)
                @include('inc.message', ['message' => $error])
            @endforeach
        @endif

        <form method="post" action="{{ route('admin.categories.store') }}">
            @csrf
            <div class="form-group">
                <label for="title">Заголовок</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ $category[0]->title }}">
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea class="form-control" name="description" id="description">{{ $category[0]->description }}</textarea>
            </div><br>
            <button class="btn btn-success" type="submit">Сохранить</button>
        </form>
    </div>
@endsection
