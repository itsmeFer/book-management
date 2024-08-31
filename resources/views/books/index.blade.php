@extends('layouts.app')

@section('title', 'Books List')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Books List</h1>

    <!-- Form Pencarian -->
    <form action="{{ route('books.index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search books..." value="{{ request('search') }}">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </div>
    </form>

    @if($books->isEmpty())
        <div class="alert alert-warning">No books available.</div>
    @else
        <div class="row">
            @foreach($books as $book)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->title }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $book->author }}</h6>
                            <p class="card-text">Published in: {{ $book->year }}</p>
                            @if($book->description)
                                <p class="card-text">{{ Str::limit($book->description, 100) }}</p>
                            @endif
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('books.show', $book->id) }}" class="btn btn-outline-primary">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
