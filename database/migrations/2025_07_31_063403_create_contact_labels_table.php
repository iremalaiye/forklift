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
        Schema::create('contact_labels', function (Blueprint $table) {
            $table->id();
            $table->string('form_title')->nullable();
            $table->string('name_label')->nullable();
            $table->string('surname_label')->nullable();
            $table->string('email_label')->nullable();
            $table->string('subject_label')->nullable();
            $table->string('message_label')->nullable();
            $table->string('submit_button_label')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_labels');
    }
};
