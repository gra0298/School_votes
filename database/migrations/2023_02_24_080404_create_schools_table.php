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
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->foreign('id_country')->references('id_country')->on('countries')->onDelete('restrict')->onUpdate('restrict');
            $table->string('school_name')->default('SCHOOL NAME');
            $table->string('rector_name')->default('RECTOR NAME');
            $table->string('neighborhood');
            $table->string('address');
            $table->string('web');
            $table->string('email');
            $table->string('logo');
            $table->string('year')->default('2018');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schools');
    }
};


