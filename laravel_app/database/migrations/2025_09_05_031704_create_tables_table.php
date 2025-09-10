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
        Schema::create('tables', function (Blueprint $table) {
            $table->id();
            $table->integer('number');
            $table->enum('lang', ['日本語', '中文簡体', 'English'])->default('日本語');
            $table->enum('person_count', ['1人', '2人', '3人', '4人', '5人以上'])->default('3人');
            $table->uuid('session_id')->nullable();
            $table->timestamp('session_expires_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tables');
    }
};
