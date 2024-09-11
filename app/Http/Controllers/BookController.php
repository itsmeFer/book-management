<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    // Memulai query untuk model Book
    $query = Book::query();

    // Cek apakah ada input 'search' dari request
    if ($request->filled('search')) {
        // Jika ada, tambahkan kondisi pencarian berdasarkan judul atau penulis
        $query->where('title', 'like', '%' . $request->search . '%')
              ->orWhere('author', 'like', '%' . $request->search . '%');
    }

    // Dapatkan hasil pencarian atau semua buku jika tidak ada input 'search'
    $books = $query->get();

    // Tampilkan hasil pada view 'books.index'
    return view('books.index', compact('books'));
}

    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validated([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'year' => 'required|integer',
            'description' => 'nullable|string',
        ]);
    
        // Menyimpan data baru ke basis data
        Book::create($validated);
    
        // Mengarahkan kembali ke halaman daftar buku dengan pesan sukses
        return redirect()->route('books.index')->with('success', 'Book created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Cari buku berdasarkan ID
        $book = Book::findOrFail($id);
    
        // Tampilkan view detail buku
        return view('books.show', compact('book'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
