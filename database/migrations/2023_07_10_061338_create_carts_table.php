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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
        $table->string('name');
        $table->integer('id_user');
        $table->integer('id_course');
        $table->integer('quantity');
        $table->integer('total_amount');
        $table->date('order_date')->nullable();
        $table->boolean('status')->default(1);
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
