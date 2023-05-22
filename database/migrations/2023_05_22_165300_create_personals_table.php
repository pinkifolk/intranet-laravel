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
        Schema::create('personals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('last_name');
            $table->string('job_title');
            $table->integer('extension');
            $table->unsignedBigInteger('department_id');
            $table->timestamp('birthday')->nullable();
            $table->string('email');
            $table->string('email_personal');
            $table->string('img_alt');
            $table->string('title_alt');
            $table->string('route_img');
            $table->timestamps();
            $table->boolean('estado');
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personals');
    }
};
