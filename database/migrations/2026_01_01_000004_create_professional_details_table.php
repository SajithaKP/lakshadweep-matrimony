<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('professional_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained()->cascadeOnDelete();
            $table->string('occupation')->nullable();
            $table->string('job_title')->nullable();
            $table->string('company')->nullable();
            $table->string('work_location')->nullable();
            $table->string('income')->nullable();
            $table->string('experience')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('professional_details');
    }
};
