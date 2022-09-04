@extends('layouts.admin')
@section('content')

    @if($errors->any())
        @foreach($errors->all() as $error)
            @include('inc.message', ['message' => $error])
        @endforeach
    @endif

    <form method="post" action="{{ route('admin.feedback.update', ['feedback' => $feedback]) }}">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="userName">Имя пользователя</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $feedback->name }}">
        </div>
        <div class="form-group">
            <label for="userFeedback">Отзыв по работе проекта</label>
            <textarea class="form-control" name="description" id="description">{{ $feedback->description }}</textarea>
        </div><br>
        <button class="btn btn-success" type="submit">Сохранить</button>
    </form>
@endsection
