<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('produk', function (Blueprint $table) {
        $table->id('id_produk');
        $table->foreignId('id_kategori')->constrained('kategori', 'id_kategori')->onDelete('cascade');
        $table->string('nama_produk');
        $table->decimal('harga', 12, 2);
        $table->integer('stok')->default(0);
        $table->text('deskripsi')->nullable();
        $table->string('foto')->nullable();
        $table->enum('status', ['available', 'unavailable'])->default('available');
        $table->timestamps();
    });
}
};
