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
        Schema::create('section_blogs', function (Blueprint $table) {
            $table->id();
            $table->json('title');
            $table->json('text');
            $table->string('image');
            $table->unsignedBigInteger('section_id')->nullable();
            $table->tinyInteger('is_active')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('section_blogs');
    }
};
