@extends('layouts.app')

@section('title', 'Books List')

@section('content')
    <h1>Books List</h1>

    <!-- Form Pencarian -->
    <form action="{{ route('books.index') }}" method="GET">
        <input type="text" name="search" placeholder="Search books..." value="{{ request('search') }}">
        <button type="submit">Search</button>
    </form>

    @if($books->isEmpty())
        <p>No books available.</p>
    @else
        <ul>
            @foreach($books as $book)
                <li>{{ $book->title }} by {{ $book->author }}</li>
            @endforeach
        </ul>
    @endif
@endsection
