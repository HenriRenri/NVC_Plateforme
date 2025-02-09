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
        Schema::create('subscription', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_id')->constrained('owners')->onDelete('cascade');
            $table->foreignId('subscription_type_id')->constrained('subscription_types')->onDelete('cascade');
            $table->enum('name', ['basic', 'normal', 'premium']);
            $table->decimal('price', 10, 2);
            $table->integer('max_products');
            $table->integer('storage_limit');
            $table->json('features')->nullable();
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscription');
    }
};
