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
    Schema::create('meja', function (Blueprint $table) {
        $table->id('id_meja');
        $table->string('nomor_meja')->unique();
        $table->string('qr_code')->nullable();
        $table->integer('kapasitas');
        $table->enum('status', ['available', 'occupied'])->default('available');
        $table->timestamps();
    });
}
};
