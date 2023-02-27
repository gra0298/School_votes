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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_inst')->references('id')->on('schools')->onDelete('restrict')->onUpdate('restrict');
            $table->foreignId('id_grade')->references('id')->on('grade')->onDelete('restrict')->onUpdate('restrict');
            $table->string('identity_document');
            $table->string('student_names');
            $table->string('student_lastnames');
            $table->string('photo');
            $table->string('group_name');
            $table->year('year');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
