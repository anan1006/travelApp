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
        Schema::create('tours', function (Blueprint $table) {
            $table->uuid('tour_id')->primary();
            $table->string('title');
            $table->text('description');
            $table->integer('max_participant');
            $table->decimal('price',10,2);
            $table->foreignUuid('tour_guide_id')->constrained('tour_guides')->references('tour_guide_id');
            $table->text('banner_path');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('duration');
            $table->string('location');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tours');
    }
};
