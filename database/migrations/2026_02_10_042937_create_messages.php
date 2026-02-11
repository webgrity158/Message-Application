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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('from_user_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('to_user_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('inbox_id')->constrained('inboxes')->cascadeOnUpdate()->cascadeOnDelete();
            $table->text('message');
            $table->enum('is_read', ['0', '1'])->default('0');
            $table->enum('is_pinned', ['0', '1'])->default('0');
            $table->enum('is_archived', ['0', '1'])->default('0');
            $table->enum('is_refference_message', ['0', '1'])->default('0');
            $table->enum('has_attachments', ['0', '1'])->default('0');
            $table->string('attachment_path')->nullable();
            $table->foreignId('refferenced_message_id')->nullable()->constrained('messages')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
