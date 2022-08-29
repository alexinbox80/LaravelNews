@extends('layouts.admin')
@section('content')
    <h2>Список заказов</h2>
    <div style="display: flex; justify-content: right;">
        {{--        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Добавить заказ</a>--}}
    </div><br>
    <div class="table-responsive">
        @include('inc.message')
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Автор</th>
                <th scope="col">Телефон</th>
                <th scope="col">Элект почта</th>
                <th scope="col">Ссылка</th>
                <th scope="col">Описание</th>
                <th scope="col">Дата добавления</th>
                <th scope="col">Управление</th>
            </tr>
            </thead>
            <tbody>
            @forelse($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->url }}</td>
                    <td>{{ $order->description }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td>
                        <div style="display: flex;">
                            <a class="btn btn-link" href="{{ route('admin.order.edit', ['order' => $order]) }}">Ред.</a>
                            <form action="{{ route('admin.order.destroy', ['order' => $order]) }}" method="post">
                                <input class="btn btn-link" type="submit" value="Уд." >
                                @method('delete')
                                @csrf
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8">Записей не найдено</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        {{ $orders->links() }}
    </div>
@endsection

@push('js')
    <script>
        //alert("Hello World");
    </script>
@endpush
