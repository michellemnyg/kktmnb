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
        Schema::create('demografi_umurs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('demografi_id')->constrained('demografis')->onDelete('cascade');
            $table->string('umur'); // Menyimpan '0', '1', ..., '79', '80+'
            $table->integer('laki')->default(0);
            $table->integer('perempuan')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demografi_umurs');
    }
};
