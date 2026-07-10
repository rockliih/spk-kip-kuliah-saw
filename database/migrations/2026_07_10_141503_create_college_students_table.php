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
        Schema::create('college_students', function (Blueprint $table) {
            $table->id();
            $table->string('id_number', length:8)->unique();
            $table->string('name', length:100);
            $table->integer('c1');
            $table->integer('c2');
            $table->integer('c3');
            $table->integer('c4');
            $table->integer('c5');
            $table->integer('c6');
            $table->integer('c7');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('college_students');
    }
};
