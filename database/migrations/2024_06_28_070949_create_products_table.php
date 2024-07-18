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
            $table->id('productCode');
            $table->foreignId('laboratoryId')->constrained('laboratories')->onDelete('cascade');
            $table->foreignId('presentationId')->constrained('presentations')->onDelete('cascade');
            $table->foreignId('typeId')->constrained('types')->onDelete('cascade');
            $table->string('code', 20);
            $table->string('description', 200);
            $table->decimal('price', 10, 2);
            $table->integer('stock');
            $table->string('expiration', 20);
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
