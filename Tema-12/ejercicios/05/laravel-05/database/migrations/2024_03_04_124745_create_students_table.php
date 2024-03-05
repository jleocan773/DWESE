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
            $table->string("name", 35);
            $table->string("lastname", 45);
            $table->date("birth_date");
            $table->char("phone", 13)->nullable(false);
            $table->string("city", 20);
            $table->char("dni", 9)->unique()->nullable(false);
            $table->string("email", 20)->unique();
            $table->unsignedBigInteger('course_id');
            //Restricción borrado en cascada cursos
            $table->foreign('course_id')->references('id')->on('courses')->onDelete("restrict")->onUpdate("cascade");
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
