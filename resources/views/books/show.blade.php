@extends('layouts.app')

@section('title', 'Book Details')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">{{ $book->title }}</h1>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $book->title }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">by {{ $book->author }}</h6>
                    <p class="card-text"><strong>Published in:</strong> {{ $book->year }}</p>
                    <p class="card-text"><strong>Description:</strong></p>
                    <p>{{ $book->description ? $book->description : 'No description available.' }}</p>
                </div>
            </div>
        </div>
    </div>

    <a href="{{ route('books.index') }}" class="btn btn-primary mt-4">Back to Books List</a>
</div>
@endsection
