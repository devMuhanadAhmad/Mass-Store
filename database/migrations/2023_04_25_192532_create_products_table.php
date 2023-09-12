<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('store_id')->constrained('stores')->cascadeOnDelete();
            $table->foreignId('category_id')->nullable()->constrained('categories')->nullOnDelete();
            $table->string('name');
            $table->string('slug')->unique();
            $table->float('price')->default(0);
            $table->float('compare_price')->default(0);
            $table->float('quantity')->default(0);
            $table->enum('status',['active','inactive'])->default('active');
            $table->enum('type',['silver', 'diamond' ,'gold', 'general'])->default('general');
            $table->text('notes')->nullable();
            $table->float('size');
            $table->string('manufacturer_company')->nullable();
            $table->string('product_material')->nullable();
            $table->float('rating')->default(0);
            $table->boolean('featured')->default(0);
            $table->json('options')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};


