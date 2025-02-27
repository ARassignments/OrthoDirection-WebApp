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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('monthly_price', 8, 2)->nullable();
            $table->decimal('yearly_price', 8, 2)->nullable();
            $table->json('features')->nullable();
            $table->enum('plan_type', ['free', 'paid'])->default('free');
            $table->integer('plan_popular')->default(0);
            $table->integer('status')->default(0);
            $table->string('stripe_product_id')->nullable();
            $table->string('stripe_price_id_monthly')->nullable();
            $table->string('stripe_price_id_yearly')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};
