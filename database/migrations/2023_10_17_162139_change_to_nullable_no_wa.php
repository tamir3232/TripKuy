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
        Schema::table('penumpang', function (Blueprint $table) {
            $table->string('no_wa')->nullable();
            $table->string('email')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('penumpang', function (Blueprint $table) {
            $table->dropColumn('no_wa');
            $table->dropColumn('email');
        });
    }
};
