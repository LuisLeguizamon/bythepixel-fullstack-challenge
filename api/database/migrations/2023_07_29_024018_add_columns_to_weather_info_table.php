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
        Schema::table('weather_info', function (Blueprint $table) {
            $table->string('description')->nullable();
            $table->string('feels_like_in_kelvin')->nullable();
            $table->string('humidity')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('weather_info', function (Blueprint $table) {
            $table->dropColumn('description');
            $table->dropColumn('feels_like_in_kelvin');
            $table->dropColumn('humidity');
        });
    }
};
