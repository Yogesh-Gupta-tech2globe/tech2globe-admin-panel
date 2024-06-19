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
        Schema::create('aplus_plugin_users', function (Blueprint $table) {
            $table->id();
            $table->string('domain');
            $table->string('username');
            $table->string('email');
            $table->string('licence_key');
            $table->string('secret_key');
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aplus_plugin_users');
    }
};
