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
        Schema::create('boxes_ownership_history', function (Blueprint $table) {
            $table->id();
            $table->foreignId('box_id')->constrained('boxes')->onDelete('cascade');
            $table->foreignId('previous_owner_id')->nullable()->constrained('owners')->onDelete('set null');
            $table->foreignId('new_owner_id')->constrained('owners')->onDelete('cascade');
            $table->date('change_date');
            $table->text('reason')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boxes_ownership_history');
    }
};
