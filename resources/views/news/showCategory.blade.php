@extends('layouts.main')
@section('title') Список новостей ID {{ $id }} @parent @endsection
@section('content')
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @forelse($category as $news)
            <div class="col">
                <div class="card shadow-sm">

                    @if(empty($news->image))
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <title>{{ $news->title }}</title>
                            <rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">{{ $news->title }}</text>
                        </svg>
                    @else
                        <img alt="" src="{{ Storage::disk('public')->url($news->image) }}">
                    @endif

                    <div class="card-body">
                        <h2>{{ $news->title }}</h2>
                        <p class="card-text">{!! $news->description !!}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="{{ route('news.showNews', ['id' => $news->id]) }}" class="btn btn-sm btn-outline-secondary">Смотреть подробнее</a>
                            </div>
                            <small class="text-muted">{{ $news->author }} - {{ $news->created_at }}</small>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <h2>Записей нет</h2>
        @endforelse
    </div>
    <br>
    <br>
    {{ $category->links() }}
@endsection
