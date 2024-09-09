<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function store(Book $book)
    {
        auth()->user()->favorites()->attach($book->id);
        return redirect()->back()->with('success', 'Buku ditambahkan ke favorit!');
    }

    public function destroy(Book $book)
    {
        auth()->user()->favorites()->detach($book->id);
        return redirect()->back()->with('success', 'Buku dihapus dari favorit!');
    }
}
