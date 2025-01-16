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
        Schema::create('doctor_profile', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('city');
            $table->string('phone');
            $table->integer('age');
            $table->string('speciality');
            $table->text('bio');
            $table->string('gender');
            $table->string('Experience')->nullable();
            $table->string('profile_img');
            $table->string('Facebook')->nullable();
            $table->string('Instagram')->nullable();
            $table->string('Twitter')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_profile');
    }
};
