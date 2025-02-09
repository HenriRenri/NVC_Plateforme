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
        Schema::create('boxes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_id')->constrained('owners')->onDelete('cascade');
            $table->string('name');
            $table->text('description')->nullable();
            $table->foreignId('subscription_type_id')->constrained('subscription_types')->onDelete('cascade');
            $table->enum('status', ['active', 'suspended', 'banned'])->default('active');
            $table->date('subscription_start_date')->nullable();
            $table->date('subscription_end_date')->nullable();
            $table->unsignedInteger('storage_limit')->default(0);
            $table->unsignedInteger('product_limit')->default(0);
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boxes');
    }
};
