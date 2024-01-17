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
        Schema::create('contacts_back', function (Blueprint $table) {
            $table->id();

            $table->integer('customer_id');
            $table->longText('name')->nullable();
            $table->longText('tel')->nullable();
            $table->longText('time')->nullable();
            $table->longText('remark')->nullable();
            $table->integer('cars_id');
            $table->longText('status');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts_back');
    }
};
