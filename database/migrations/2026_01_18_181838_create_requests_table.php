<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->enum('request_type', ['permohonan', 'keberatan']);
            $table->string('identity_proof');
            $table->string('institution');
            $table->string('proof_institution');
            $table->text('data_request');
            $table->string('phone_number', 20);
            $table->text('complaint')->nullable();
            $table->enum('status', ['pending', 'diproses', 'disetujui', 'ditolak'])->default('pending');
            $table->text('rejection_reason')->nullable();
            $table->foreignId('parent_request_id')
                ->nullable()
                ->constrained('requests')
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};
