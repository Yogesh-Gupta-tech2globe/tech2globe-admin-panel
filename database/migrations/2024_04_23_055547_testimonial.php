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
        Schema::create('testimonial', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('customer_info');
            $table->string('type');
            $table->string('ratings');
            $table->string('comment');
            $table->string('video_url');
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonial');
    }
};
