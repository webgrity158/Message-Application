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
            $table->text('message');
            $table->enum('is_read', ['0', '1'])->default('0');
            $table->enum('is_pinned', ['0', '1'])->default('0');
            $table->enum('is_archived', ['0', '1'])->default('0');
            $table->enum('is_refference_message', ['0', '1'])->default('0');
            $table->enum('has_attachments', ['0', '1'])->default('0');
            $table->string('attachment_path')->nullable();
            $table->enum('is_group_messages', ['0', '1'])->default('0');
            $table->foreignId('group_id')->constrained('groups')->cascadeOnUpdate()->cascadeOnDelete()->nullable();
            $table->foreignId('refferenced_message_id')->constrained('messages')->cascadeOnUpdate()->cascadeOnDelete()->nullable();
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
