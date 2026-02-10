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
        Schema::create('inboxes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('message_id')->constrained('messages')->cascadeOnUpdate()->cascadeOnDelete();
            $table->enum('is_group', ['0', '1'])->default('0');
            $table->foreignId('group_id')->constrained('groups')->cascadeOnUpdate()->cascadeOnDelete()->nullable();
            $table->enum('is_attachment', ['0', '1'])->default('0');
            $table->enum('attachment_type', ['none', 'file', 'image', 'video'])->default('none');
            $table->integer('total_unread_messages')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inboxes');
    }
};
