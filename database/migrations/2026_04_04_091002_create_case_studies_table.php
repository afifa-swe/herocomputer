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
        Schema::create('case_studies', function (Blueprint $table) {
            $table->id();
            $table->json('tag');        // {ru, en, az}
            $table->json('title');      // {ru, en, az}
            $table->json('description');// {ru, en, az}
            $table->string('tech')->nullable();
            $table->string('label');    // display label like "VIEON"
            $table->string('color1')->default('#0d2b0d');
            $table->string('color2')->default('#1a4a1a');
            $table->string('text_color')->default('rgba(242,242,240,.2)');
            $table->string('category')->default('web'); // web, mobile, web3
            $table->integer('sort_order')->default(0);
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('case_studies');
    }
};
