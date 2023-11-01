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
        Schema::create('kursi', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama')->nullable();
            $table->uuid('penumpang_id')->nullable();
            $table->uuid('keberangkatan_id')->nullable();

            $table->foreign('penumpang_id')
                ->references('id')
                ->on('penumpang')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('keberangkatan_id')
                ->references('id')
                ->on('keberangkatan')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kursi');
    }
};
