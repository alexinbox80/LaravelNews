@extends('layouts.main')
@section('title') Форма заказа на получение выгрузки данных из какого-либо источника @parent @endsection
@section('content')

    @include('inc.message')

    <form method="post" action="{{ route('order.store') }}">
        @csrf
        <div class="form-group">
            <label for="userName">Имя пользователя</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label for="userPhone">Номер телефона</label>
            <input type="text" class="form-control" name="phone" id="phone" value="{{ old('phone') }}">
        </div>
        <div class="form-group">
            <label for="userEmail">Электронная почта</label>
            <input type="text" class="form-control" name="email" id="email" value="{{ old('email') }}">
        </div>
        <div class="form-group">
            <label for="userUrl">Ссылка на ресурс</label>
            <input type="text" class="form-control" name="url" id="url" value="{{ old('url') }}">
        </div>
        <div class="form-group">
            <label for="userDescription">Информации о том, что необходимо</label>
            <textarea class="form-control" name="description" id="description">{{ old('description') }}</textarea>
        </div><br>
        <button class="btn btn-success" type="submit">Сохранить</button>
    </form>
@endsection
