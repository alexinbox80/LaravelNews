@extends('layouts.admin')
@section('content')

    @include('inc.message')

    <form method="post" action="{{ route('admin.order.update', ['order' => $order]) }}">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="userName">Имя пользователя</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $order->name }}">
        </div>
        <div class="form-group">
            <label for="userPhone">Номер телефона</label>
            <input type="text" class="form-control" name="phone" id="phone" value="{{ $order->phone }}">
        </div>
        <div class="form-group">
            <label for="userEmail">Электронная почта</label>
            <input type="text" class="form-control" name="email" id="email" value="{{ $order->email }}">
        </div>
        <div class="form-group">
            <label for="userUrl">Ссылка на ресурс</label>
            <input type="text" class="form-control" name="url" id="url" value="{{ $order->url }}">
        </div>
        <div class="form-group">
            <label for="userDescription">Информации о том, что необходимо</label>
            <textarea class="form-control" name="description" id="description">{{ $order->description }}</textarea>
        </div><br>
        <button class="btn btn-success" type="submit">Сохранить</button>
    </form>
@endsection
