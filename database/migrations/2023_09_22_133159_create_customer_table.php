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
        Schema::create('customer', function (Blueprint $table) {
            $table->id();

            $table->string('phone')->unique()->index()->nullable();
            $table->longText('messages')->nullable();
            $table->longText('browserFingerprint');
            $table->enum('sp_role', array('default', 'dealer', 'lady'));
            $table->string('username')->unique()->nullable();
            $table->string('email')->nullable();
            $table->longText('remember')->nullable();
            $table->longText('image')->nullable();
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->longText('place')->nullable();
            $table->longText('province')->nullable();
            $table->longText('map')->nullable();
            $table->longText('google_map')->nullable();
            $table->longText('facebook')->nullable();
            $table->longText('line')->nullable();
            $table->timestamp('last_action')->nullable();
            $table->longText('history')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer');
    }
};
