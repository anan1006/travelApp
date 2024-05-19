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
        Schema::create('meeting_points', function (Blueprint $table) {
            $table->uuid('meeting_point_id')->primary();
            $table->string('meeting_point_name');
            $table->foreignUuid('tour_id')->constrained('tours')->references('tour_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meeting_points');
    }
};
