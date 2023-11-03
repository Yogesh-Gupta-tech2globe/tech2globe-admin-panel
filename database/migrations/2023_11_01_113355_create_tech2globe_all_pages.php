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
        Schema::create('tech2globe_all_pages', function (Blueprint $table) {
            $table->id();
            $table->string('category_id');
            $table->string('sub_category_id');
            $table->string('page_name');
            $table->string('page_url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tech2globe_all_pages');
    }
};
