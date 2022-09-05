@extends('layouts.admin')
@section('content')

    @include('inc.message')

    <form method="post" action="{{ route('admin.profiles.update', ['profile' => $profile]) }}">
        @csrf
        @method('put')

        <div class="form-group">
            <label for="userName">Имя пользователя</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $profile->name }}">
        </div>
        <div class="form-group">
            <label for="userEmail">Электронная почта</label>
            <input type="text" class="form-control" name="email" id="email" value="{{ $profile->email }}">
        </div>
        <div class="form-group">
            <label for="password">Пароль</label>
            <input type="password" class="form-control" name="password" id="password" value="">
        </div>
        <div class="form-group">
            <label for="confirmPassword">Пароль еще раз</label>
            <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" value="">
        </div>
        <div class="form-group">
            <label for="is_admin">Выбрать группу</label>
            <select class="form-control" name="is_admin" id="is_admin">
                <option @if((int)$profile->is_admin === \App\Models\User::IS_ADMIN) selected @endif value="{{ \App\Models\User::IS_ADMIN }}">Админ</option>
                <option @if((int)$profile->is_admin === \App\Models\User::IS_USER) selected @endif value="{{ \App\Models\User::IS_USER }}">Польз</option>
            </select>
        </div>
        <br>
        <button class="btn btn-success" type="submit">Сохранить</button>
    </form>
@endsection
