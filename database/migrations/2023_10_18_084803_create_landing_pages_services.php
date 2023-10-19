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
        Schema::create('landing_pages_services', function (Blueprint $table) {
            $table->id();
            $table->string('layout_id');
            $table->string('landing_pages_id');
            $table->string('service_name');
            $table->string('service_description');
            $table->string('icon');
            $table->string('slug');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('landing_pages_services');
    }
};
