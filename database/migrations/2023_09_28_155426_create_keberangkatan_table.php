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
        Schema::create('keberangkatan', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id');

            $table->string('from');
            $table->string('to');
            $table->uuid('bus_id');
            $table->date('date');
            $table->string('price');
            $table->boolean('ac');
            $table->boolean('kamar_mandi');
            $table->boolean('tv');
            $table->boolean('sleeper');
            $table->boolean('wifi');
            $table->boolean('charging_station');
            $table->boolean('bantal');
            $table->boolean('selimut');
            $table->boolean('bagasi');
            $table->boolean('kursi_L');
            $table->boolean('kursi_xl');
            $table->boolean('kuris_xll');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('bus_id')
                ->references('id')
                ->on('bus')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keberangkatan');
    }
};
