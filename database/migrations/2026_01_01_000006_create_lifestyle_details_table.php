<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('lifestyle_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained()->cascadeOnDelete();
            $table->string('smoking')->nullable();
            $table->string('drinking')->nullable();
            $table->string('food_preference')->nullable();
            $table->string('exercise')->nullable();
            $table->string('music')->nullable();
            $table->string('sports')->nullable();
            $table->string('hobbies')->nullable();
            $table->text('lifestyle_description')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('lifestyle_details');
    }
};
