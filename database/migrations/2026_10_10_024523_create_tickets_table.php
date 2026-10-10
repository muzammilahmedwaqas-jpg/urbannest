<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('ticket_code')->unique();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('event_id')->constrained()->cascadeOnDelete();
            $table->foreignId('ticket_type_id')->constrained()->cascadeOnDelete();
            $table->string('qr_code_path')->nullable();
            $table->timestamps();
            $table->unique(['user_id', 'event_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};