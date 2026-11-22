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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('booking_code')->unique();
            $table->foreignId('user_pelanggan_id')->constrained('users_pelanggan')->cascadeOnDelete();
            $table->foreignId('studio_id')->constrained('studios')->cascadeOnDelete();
            $table->decimal('total_amount', 12, 2)->default(0);
            $table->string('status', 30)->default('pending'); // pending, confirmed, paid, checked_in, completed, cancelled, expired
            $table->text('notes')->nullable();
            $table->dateTime('expires_at')->nullable();
            $table->dateTime('reminder_sent_at')->nullable();
            $table->dateTime('checked_in_at')->nullable();
            $table->foreignId('checked_in_by')->nullable()->constrained('users_admin')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
