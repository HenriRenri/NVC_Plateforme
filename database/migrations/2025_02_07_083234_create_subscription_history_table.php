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
        Schema::create('subscription_history', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_id')->constrained('owners')->onDelete('cascade');
            $table->foreignId('subscription_id')->constrained('subscription')->onDelete('cascade');
            $table->date('change_date');
            $table->enum('previous_subscription_type', ['basic', 'normal', 'premium']);
            $table->enum('current_subscription_type', ['basic', 'normal', 'premium']);
            $table->decimal('previous_price', 10, 2);
            $table->decimal('current_price', 10, 2);
            $table->string('reason')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscription_history');
    }
};
