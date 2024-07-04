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
        Schema::create('jobRequests', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('lname');
            $table->string('email');
            $table->string('website');
            $table->integer('vacancy_id');
            $table->integer('cctcl');
            $table->integer('cctct');
            $table->integer('ectcl');
            $table->integer('ectct');
            $table->date('StartDate');
            $table->string('phone');
            $table->string('organization');
            $table->string('np');
            $table->string('comment');
            $table->string('file');
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobRequests');
    }
};
