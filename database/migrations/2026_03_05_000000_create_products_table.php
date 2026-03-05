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
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->enum('category', ['laptop', 'phone', 'gadget']);
            $table->string('name')->unique();
            $table->string('title');
            $table->string('subTitle');
            $table->text('content');
            $table->string('image')->nullable();
            $table->string('brand')->nullable();
            $table->string('time')->nullable();
            $table->timestamps();
        });

        // Drop old tables
        Schema::dropIfExists('laptops');
        Schema::dropIfExists('phones');
        Schema::dropIfExists('gadgets');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
