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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reservation_id')->constrained('reservations')->cascadeOnDelete();
            $table->string('payment_code')->unique();
            $table->decimal('amount', 12, 2);
            $table->string('payment_method', 50)->default('transfer_bank'); // transfer_bank, qris, cash, payment_gateway
            $table->string('payment_channel', 50)->nullable(); // BCA, Mandiri, Gopay, dll
            $table->string('payment_status', 30)->default('pending'); // pending, paid, failed, refunded, expired
            $table->string('payment_proof')->nullable();
            $table->dateTime('paid_at')->nullable();
            $table->dateTime('verified_at')->nullable();
            $table->foreignId('verified_by')->nullable()->constrained('users_admin')->nullOnDelete();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
