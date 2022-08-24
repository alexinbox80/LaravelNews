@extends('layouts.admin')
@section('content')
    <h2>Список категорий</h2>
    <div style="display: flex; justify-content: right;">
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Добавить категорию</a>
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
            @forelse($newsCategory as $key => $category)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $category->title }}</td>
                    <td>{{ $category->author }}</td>
                    <td>DRAFT</td>
                    <td>{{ $category->created_at }}</td>
                    <td><a href="{{ route('admin.categories.edit', ['category' => $category->id]) }}">Ред.</a> &nbsp; <a href="" style="color: red;">Уд.</a></td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Записе не найдено</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection

@push('js')
    <script>
        //alert("Hello World");
    </script>
@endpush
