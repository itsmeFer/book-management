<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('suggestions', function (Blueprint $table) {
        $table->id();
        $table->string('name'); // Kolom untuk nama pengirim saran
        $table->text('suggestion'); // Kolom untuk saran
        $table->timestamps(); // Untuk created_at dan updated_at
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suggestions');
    }
};
