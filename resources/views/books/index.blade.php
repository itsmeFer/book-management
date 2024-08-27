@extends('layouts.app')

@section('title', 'Books List')

@section('content')
    <h1>Books List</h1>
    
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
