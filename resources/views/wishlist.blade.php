@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Daftar Buku Favorit</h2>
        <div class="row">
            @forelse ($favorites as $book)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->title }}</h5>
                            <p class="card-text">{{ Str::limit($book->description, 100) }}</p>
                            <a href="{{ route('books.show', $book->id) }}" class="btn btn-primary">Detail</a>
                        </div>
                    </div>
                </div>
            @empty
                <p>Belum ada buku yang difavoritkan.</p>
            @endforelse
        </div>
    </div>
@endsection
