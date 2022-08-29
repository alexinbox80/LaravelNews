@extends('layouts.admin')
@section('content')
    <h2>Список отзывов</h2>
    <div style="display: flex; justify-content: right;">
        {{--        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Добавить отзыв</a>--}}
    </div><br>
    <div class="table-responsive">
        @include('inc.message')
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Автор</th>
                <th scope="col">Текст отзыва</th>
                <th scope="col">Дата добавления</th>
                <th scope="col">Управление</th>
            </tr>
            </thead>
            <tbody>
            @forelse($feedbacks as $feedback)
                <tr>
                    <td>{{ $feedback->id }}</td>
                    <td>{{ $feedback->name }}</td>
                    <td>{{ $feedback->description }}</td>
                    <td>{{ $feedback->created_at }}</td>
                    <td>
                        <div style="display: flex;">
                            <a class="btn btn-link" href="{{ route('admin.feedback.edit', ['feedback' => $feedback]) }}">Ред.</a>
                            <form action="{{ route('admin.feedback.destroy', ['feedback' => $feedback]) }}" method="post">
                                <input class="btn btn-link" type="submit" value="Уд." >
                                @method('delete')
                                @csrf
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Записей не найдено</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        {{ $feedbacks->links() }}
    </div>
@endsection

@push('js')
    <script>
        //alert("Hello World");
    </script>
@endpush
