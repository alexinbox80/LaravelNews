@extends('layouts.main')
@section('title') Форма заказа на получение выгрузки данных из какого-либо источника @parent @endsection
@section('content')

    @if($errors->any())
        @foreach($errors->all() as $error)
            @include('inc.message', ['message' => $error])
        @endforeach
    @endif

    <form method="post" action="{{ route('order.store') }}">
        @csrf
        <div class="form-group">
            <label for="userName">Имя пользователя</label>
            <input type="text" class="form-control" name="userName" id="userName" value="{{ old('userName') }}">
        </div>
        <div class="form-group">
            <label for="userPhone">Номер телефона</label>
            <input type="text" class="form-control" name="userPhone" id="userPhone" value="{{ old('userPhone') }}">
        </div>
        <div class="form-group">
            <label for="userEmail">Электронная почта</label>
            <input type="text" class="form-control" name="userEmail" id="userEmail" value="{{ old('userEmail') }}">
        </div>
        <div class="form-group">
            <label for="userUrl">Ссылка на ресурс</label>
            <input type="text" class="form-control" name="userUrl" id="userUrl" value="{{ old('userUrl') }}">
        </div>
        <div class="form-group">
            <label for="userDescription">Информации о том, что необходимо</label>
            <textarea class="form-control" name="userDescription" id="userDescription">{{ old('userDescription') }}</textarea>
        </div><br>
        <button class="btn btn-success" type="submit">Сохранить</button>
    </form>
@endsection
