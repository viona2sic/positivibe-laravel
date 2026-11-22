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
        Schema::create('equipment', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category', 50)->default('general'); // guitar, bass, drum, keyboard, microphone, amplifier, accessories
            $table->text('description')->nullable();
            $table->decimal('rental_price', 12, 2)->default(0);
            $table->integer('stock')->default(1);
            $table->string('condition', 30)->default('good'); // good, fair, maintenance
            $table->string('image')->nullable();
            $table->boolean('is_available')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipment');
    }
};
