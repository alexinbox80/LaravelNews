@extends('layouts.admin')
@section('content')
    <h2>Список новостей</h2>
    <div style="display: flex; justify-content: right;">
        <a href="{{ route('admin.news.create') }}" class="btn btn-primary">Добавить новость</a>
    </div><br>
    <div class="table-responsive">
        @include('inc.message', ['message' => 'Это сообщение об ошибке в новостях'])
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Наименование</th>
                <th scope="col">Автор</th>
                <th scope="col">Статус</th>
                <th scope="col">Дата добавления</th>
                <th scope="col">Управление</th>
            </tr>
            </thead>
            <tbody>
            @forelse($newsList as $key => $news)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $news->title }}</td>
                    <td>{{ $news->author }}</td>
                    <td>DRAFT</td>
                    <td>{{ $news->created_at }}</td>
                    <td><a href="{{ route('admin.news.edit', ['news' => $news->id]) }}">Ред.</a> &nbsp; <a href="" style="color: red;">Уд.</a></td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Записей не найдено</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
