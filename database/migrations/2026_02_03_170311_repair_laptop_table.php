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
        Schema::table('laptops', function (Blueprint $table) {
            $table->renameColumn('brand','title');
            $table->dropColumn(['description','price','specifications']);
            $table->string('subTitle');
            $table->text('content');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('laptops', function (Blueprint $table) {
            // rename
            $table->renameColumn('title','brand');
            // create
            $table->text('description')->nullable();
            $table->decimal('price', 15, 2);
            $table->json('specifications')->nullable();
            // delete
            $table->dropColumn(['subTitle','content']);

        });
    }
};
