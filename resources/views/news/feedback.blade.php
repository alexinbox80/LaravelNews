@extends('layouts.main')
@section('title') Обратная связь @parent @endsection
@section('content')

    @if($errors->any())
        @foreach($errors->all() as $error)
            @include('inc.message', ['message' => $error])
        @endforeach
    @endif

    <form method="post" action="{{ route('feedback.store') }}">
        @csrf
        <div class="form-group">
            <label for="userName">Имя пользователя</label>
            <input type="text" class="form-control" name="userName" id="userName" value="{{ old('userName') }}">
        </div>
        <div class="form-group">
            <label for="userFeedback">Отзыв по работе проекта</label>
            <textarea class="form-control" name="userFeedback" id="userFeedback">{{ old('userFeedback') }}</textarea>
        </div><br>
        <button class="btn btn-success" type="submit">Сохранить</button>
    </form>
@endsection
