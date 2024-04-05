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
        //bug reports
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable(); // the user who created the bug report
            $table->integer('application_id')->nullable();
            $table->integer('endpoint_id')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
