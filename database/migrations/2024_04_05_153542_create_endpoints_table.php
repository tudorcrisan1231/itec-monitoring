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
        Schema::create('endpoints', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable(); //the user who created the endpoint
            $table->integer('application_id')->nullable();
            $table->string('name')->nullable();
            $table->string('url')->nullable();
            $table->string('method')->nullable();
            $table->text('description')->nullable();
            $table->text('request')->nullable();
            $table->text('response')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('endpoints');
    }
};
