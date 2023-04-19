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
            $table->string('title', 2048);
            $table->string('ns', 255)->comment('商品编码');
            $table->string('thumbnail', 2048);
            $table->integer('stock');
            $table->decimal('purchase_price')->nullable();
            $table->decimal('retail_price');
            $table->foreignIdFor(\App\Models\Category::class, 'category_id');
            $table->foreignIdFor(\App\Models\PhoneModel::class, 'model_id')->nullable();
            $table->foreignIdFor(\App\Models\Supplier::class, 'supplier_id')->nullable();
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
