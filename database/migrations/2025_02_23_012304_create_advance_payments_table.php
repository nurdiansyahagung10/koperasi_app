<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('advance_payments', function (Blueprint $table) {
            $table->id();
            $table->integer("balance")->default(0);
            $table->string("proof_advance_payment");
            $table->unsignedBigInteger("user_id")->index();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->unsignedBigInteger("pdl_id")->index();
            $table->foreign('pdl_id')->references('id')->on('pdls')->cascadeOnDelete();
            $table->unsignedBigInteger("detail_resort_id")->index();
            $table->foreign('detail_resort_id')->references('id')->on('detail_resorts')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advance_payments');
    }
};
