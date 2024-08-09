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
        Schema::create('reim_statuses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reim_id')->constrained()->onDelete('cascade');
            $table->string('status');
            $table->string('nama_penilai')->nullable()->default('');
            $table->string('jabatan_penilai')->nullable()->default('');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reim_statuses');
    }
};
