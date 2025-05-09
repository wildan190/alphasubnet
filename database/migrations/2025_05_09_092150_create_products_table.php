<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('size'); // Contoh: "MB" atau "GB"
            $table->integer('duration'); // Bisa dalam hari atau bulan, sesuaikan kebutuhan
            $table->decimal('price', 10, 2); // Harga dengan format desimal
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
}
