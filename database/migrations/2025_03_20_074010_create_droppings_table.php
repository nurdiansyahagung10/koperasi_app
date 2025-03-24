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
        Schema::create('droppings', function (Blueprint $table) {
            $table->id();
            $table->string('member_tosign_spk_image')->nullable();
            $table->string('member_and_spk_image')->nullable();
            $table->string('spk_image')->nullable();
            $table->string('proof_dropping')->nullable();
            $table->unsignedBigInteger('loan_application_id')->index();
            $table->foreign('loan_application_id')->references('id')->on('loan_applications')->cascadeOnDelete();
            $table->enum('status', [1,2,3])->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('droppings');
    }
};
