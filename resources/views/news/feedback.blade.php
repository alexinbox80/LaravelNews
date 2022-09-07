@extends('layouts.main')
@section('title') Обратная связь @parent @endsection
@section('content')

    @include('inc.message')

    <form method="post" action="{{ route('feedback.store') }}">
        @csrf
        <div class="form-group">
            <label for="userName">Имя пользователя</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label for="userFeedback">Отзыв по работе проекта</label>
            <textarea class="form-control" name="description" id="description">{{ old('description') }}</textarea>
        </div><br>
        <button class="btn btn-success" type="submit">Сохранить</button>
    </form>
@endsection
