@extends('layouts.admin')
@section('content')
    <h2>Список пользователей</h2>
    <div style="display: flex; justify-content: right;">
        {{--        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Добавить заказ</a>--}}
    </div><br>
    <div class="table-responsive">
        @include('inc.message')
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Имя</th>
                <th scope="col">Элект почта</th>
                <th scope="col">Администратор</th>
                <th scope="col">Дата добавления</th>
                <th scope="col">Управление</th>
            </tr>
            </thead>
            <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->is_admin === true ? 'Админ': 'Польз' }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>
                        <div style="display: flex;">
                            <a class="btn btn-link" href="{{ route('admin.profiles.edit', ['profile' => $user]) }}">Ред.</a>
                            <form action="{{ route('admin.profiles.destroy', ['profile' => $user]) }}" method="post">
                                <input class="btn btn-link" type="submit" value="Уд." >
                                @method('delete')
                                @csrf
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Записей не найдено</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        {{ $users->links() }}
    </div>
@endsection

@push('js')
    <script>
        //alert("Hello World");
    </script>
@endpush
