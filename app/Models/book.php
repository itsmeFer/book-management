<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // Tambahkan atribut yang dapat diisi melalui mass assignment
    protected $fillable = [
        'title',
        'author',
        'year',
        'description',
    ];
    public function category()
{
    return $this->belongsTo(Category::class);
}

}
