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
        Schema::create('services', function (Blueprint $table) {
            $table->id();


            $table->text('text_1_icon') ->nullable();
            $table->string('text_1') ->nullable();
            $table->text('text_1_content')->nullable();

            $table->text('text_2_icon') ->nullable();
            $table->string('text_2') ->nullable();
            $table->text('text_2_content') ->nullable();

            $table->string('text_3_icon') ->nullable();
            $table->text('text_3') ->nullable();
            $table->text('text_3_content') ->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
