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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Kolom nama
            $table->string('email'); // Kolom email
            $table->string('number'); // Kolom nomor telepon
            $table->foreignId('country_id')->constrained;; // Kolom negara
            $table->foreignId('request_id')->constrained;; // Kolom request (Individu atau Perusahaan)
            $table->foreignId('service_id')->constrained; // Kolom layanan
            $table->foreignId('status_id')->constrained; // Kolom status
            $table->text('message'); // Kolom pesan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
