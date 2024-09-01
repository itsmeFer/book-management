@extends('layouts.app')

@section('title', 'Welcome to MyApp')

@section('content')
<div class="jumbotron text-center bg-primary text-white">
    <h1 class="display-4">Welcome to MyApp</h1>
    <p class="lead">Your one-stop solution for managing your books and more!</p>
    <a class="btn btn-light btn-lg mt-3" href="{{ route('books.index') }}" role="button">View Books</a>
</div>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <img src="https://via.placeholder.com/150" class="card-img-top" alt="Book Image">
                <div class="card-body">
                    <h5 class="card-title">Manage Your Books</h5>
                    <p class="card-text">Easily add, edit, and delete books from your collection.</p>
                    <a href="{{ route('books.index') }}" class="btn btn-primary">Get Started</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="https://via.placeholder.com/150" class="card-img-top" alt="Statistics Image">
                <div class="card-body">
                    <h5 class="card-title">Track Your Statistics</h5>
                    <p class="card-text">View detailed statistics on your book collection and more.</p>
                    <a href="#" class="btn btn-primary">Learn More</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="https://via.placeholder.com/150" class="card-img-top" alt="Support Image">
                <div class="card-body">
                    <h5 class="card-title">Get Support</h5>
                    <p class="card-text">Need help? Contact our support team for assistance.</p>
                    <a href="#" class="btn btn-primary">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
