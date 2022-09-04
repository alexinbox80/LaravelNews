@extends('layouts.admin')
@section('content')
    <h2>Список новостей</h2>
    <div style="display: flex; justify-content: right;">
        <a href="{{ route('admin.news.create') }}" class="btn btn-primary">Добавить новость</a>
    </div><br>
    <div class="table-responsive">
        @include('inc.message')
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Наименование</th>
                <th scope="col">Категория</th>
                <th scope="col">Автор</th>
                <th scope="col">Статус</th>
                <th scope="col">Дата добавления</th>
                <th scope="col">Управление</th>
            </tr>
            </thead>
            <tbody>
            @forelse($newsList as $news)
                <tr>
                    <td>{{ $news->id }}</td>
                    <td>{{ $news->title }}</td>
                    <td>{{ $news->category->title }}</td>
                    <td>{{ $news->author }}</td>
                    <td>{{ $news->status }}</td>
                    <td>{{ $news->created_at }}</td>
                    <td>
                        <div style="display: flex;">
                            <a class="btn btn-link" href="{{ route('admin.news.edit', ['news' => $news]) }}">Ред.</a>
                            <form action="{{ route('admin.news.destroy', ['news' => $news]) }}" method="post">
                                <input class="btn btn-link" type="submit" value="Уд." >
                                @method('delete')
                                @csrf
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Новостей не найдено</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        {{ $newsList->links() }}
    </div>
@endsection
