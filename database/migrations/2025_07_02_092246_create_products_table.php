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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('product_code')->unique();
            $table->string('type');
            $table->unsignedInteger('number');
            $table->unsignedBigInteger('price');
            $table->string('size');
            $table->string('like_numbers')->nullable();
            $table->string('color')->nullable();
            $table->string('picture')->nullable();
            $table->text('description')->nullable();
            $table->enum('status', ['موجود','ناموجود','به زودی'])->default('موجود');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
