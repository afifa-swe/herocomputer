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
        Schema::create('dev_applications', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('telegram');
            $table->string('stack')->nullable();
            $table->string('experience')->nullable();
            $table->string('portfolio_link')->nullable();
            $table->text('about')->nullable();
            $table->boolean('read')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dev_applications');
    }
};
