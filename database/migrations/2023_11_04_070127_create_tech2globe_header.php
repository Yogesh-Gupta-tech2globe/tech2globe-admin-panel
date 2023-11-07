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
        Schema::create('tech2globe_header', function (Blueprint $table) {
            $table->id();
            $table->string('socialLink1Icon');
            $table->string('socialLink1Text');
            $table->string('socialLink2Icon');
            $table->string('socialLink2Text');
            $table->string('innerPage1Text');
            $table->string('innerPage1Link');
            $table->string('innerPage2Text');
            $table->string('innerPage2Link');
            $table->string('innerPage3Text');
            $table->string('innerPage3Link');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tech2globe_header');
    }
};
