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
        Schema::create('landing_pages', function (Blueprint $table) {
            $table->id();
            $table->integer('section1_id');
            $table->string('favicon_icon');
            $table->string('logo');
            $table->string('menu1');
            $table->string('menu1_link');
            $table->string('menu2');
            $table->string('menu2_link');
            $table->string('menu3');
            $table->string('menu3_link');
            $table->string('menu4');
            $table->string('menu4_link');
            $table->integer('section2_id');
            $table->string('title2');
            $table->string('sub_title2');
            $table->string('button1');
            $table->string('button1_link');
            $table->string('button2');
            $table->string('button2_link');
            $table->string('background_image2');
            $table->string('banner_image2');
            $table->integer('section3_id');
            $table->string('title3');
            $table->string('description3');
            $table->string('section4_id');
            $table->string('title4');
            $table->integer('section5_id');
            $table->string('title5');
            $table->string('customers_images5');
            $table->integer('section6_id');
            $table->string('title6');
            $table->string('description6');
            $table->string('author6');
            $table->string('author_post6');
            $table->integer('section7_id');
            $table->string('title7');
            $table->string('background_image7');
            $table->integer('section8_id');
            $table->string('title8');
            $table->string('sub-title8');
            $table->string('background_image8');
            $table->integer('section9_id');
            $table->string('content9');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('landing_pages');
    }
};
