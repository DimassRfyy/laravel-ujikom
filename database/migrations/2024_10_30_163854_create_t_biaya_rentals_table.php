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
        Schema::create('t_biaya_rentals', function (Blueprint $table) {
            $table->id();
            $table->string('nama_penyewa');
            $table->foreignId('mobil_id')->constrained()->cascadeOnDelete();
            $table->foreignId('program_id')->nullable()->constrained()->cascadeOnDelete();
            $table->unsignedBigInteger('total_biaya');
            $table->integer('lama_sewa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_biaya_rentals');
    }
};
