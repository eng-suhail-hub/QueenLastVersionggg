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
        Schema::create('university_posts', function (Blueprint $table) {
            $table->id();
            $table->string('public_id')->unique();
            $table->string('title');
            $table->text('content');
            $table->foreignId('university_id')->constrained('universities')->onDelete('cascade');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('university_posts');
    }
};
