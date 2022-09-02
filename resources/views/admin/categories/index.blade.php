@extends('layouts.admin')
@section('content')
    <h2>Список категорий</h2>
    <div style="display: flex; justify-content: right;">
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Добавить категорию</a>
    </div><br>
    <div class="table-responsive">
        @include('inc.message')
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Наименование</th>
                <th scope="col">Автор</th>
                <th scope="col">Дата добавления</th>
                <th scope="col">Управление</th>
            </tr>
            </thead>
            <tbody>
            @forelse($newsCategory as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->title }}</td>
                    <td>{{ $category->author }}</td>
                    <td>{{ $category->created_at }}</td>
                    <td>
                        <div style="display: flex;">
                            <a class="btn btn-link" href="{{ route('admin.categories.edit', ['category' => $category]) }}">Ред.</a>
                            <form action="{{ route('admin.categories.destroy', ['category' => $category]) }}" method="post">
                                <input class="btn btn-link" type="submit" value="Уд." >
                                @method('delete')
                                @csrf
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Категорий не найдено</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        {{ $newsCategory->links() }}
    </div>
@endsection

@push('js')
    <script>
        //alert("Hello World");
    </script>
@endpush
