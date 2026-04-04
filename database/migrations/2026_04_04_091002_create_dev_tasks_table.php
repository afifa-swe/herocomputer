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
        Schema::create('dev_tasks', function (Blueprint $table) {
            $table->id();
            $table->json('title');       // {ru, en, az}
            $table->json('description'); // {ru, en, az}
            $table->string('stack');
            $table->string('format')->default('remote');
            $table->boolean('active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dev_tasks');
    }
};
