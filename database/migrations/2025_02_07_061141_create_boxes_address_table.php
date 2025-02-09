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
        Schema::create('boxes_address', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_id')->constrained('owners')->onDelete('cascade');
            $table->foreignId('box_id')->nullable()->constrained('boxes')->onDelete('cascade');
            $table->string('address_line1');
            $table->string('address_line2')->nullable();
            $table->string('city', 100);
            $table->string('state', 100)->nullable();
            $table->string('postal_code', 10);
            $table->string('country', 100);
            $table->boolean('is_primary')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boxes_address');
    }
};
