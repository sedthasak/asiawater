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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();

            $table->integer('brand_id');
            $table->integer('model_id');
            $table->longText('vehicle_code');
            $table->enum('gear', ['auto', 'manual'])->nullable();
            $table->longText('color')->nullable();
            $table->double('price')->nullable();
            $table->longText('province')->nullable();
            $table->integer('gashas')->nullable();
            $table->longText('gasname')->nullable();
            $table->integer('evtype')->nullable();
            $table->integer('customer_id');
            $table->longText('mileage')->nullable();
            $table->longText('mappicture')->nullable();
            $table->longText('location')->nullable();
            $table->double('clickcount')->nullable();
            $table->double('viewcount')->nullable();
            $table->double('seecount')->nullable();
            $table->longText('adddate')->nullable();
            $table->longText('approvedate')->nullable();
            $table->longText('expiredate')->nullable();
            $table->integer('stock')->nullable();
            $table->string('type');
            $table->integer('promotion_id')->nullable();
            $table->longText('status');
            $table->longText('licenseplate')->nullable();
            $table->longText('payment')->nullable();
            $table->longText('detail')->nullable();
            $table->integer('reserve')->nullable();
            $table->longText('category')->nullable();
            $table->longText('tag')->nullable();
            $table->longText('meta_title')->nullable();
            $table->longText('meta_description')->nullable();
            $table->longText('meta_keyword')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
