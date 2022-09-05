@extends('layouts.app')
@section('content')
    <div class="offset-2">
        <h2>Добро пожаловать, {{ Auth::user()->name }}</h2>
        <br>
        @if((int)Auth::user()->is_admin === \App\Models\User::IS_ADMIN)
            <a href="{{ route('admin.index') }}">Кабинет</a>
        @endif
    </div>
@endsection
