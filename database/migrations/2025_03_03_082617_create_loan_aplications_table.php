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
        Schema::create('loan_aplications', function (Blueprint $table) {
            $table->id();
            $table->date('aprove_date')->nullable();
            $table->string('binding_letter');
            $table->string('binding_letter_image');
            $table->string('status')->default("New Application");
            $table->integer('nominal_loan_application');
            $table->unsignedBigInteger('aprove_by')->index()->nullable();
            $table->foreign('aprove_by')->references('id')->on('users')->cascadeOnDelete();
            $table->unsignedBigInteger('member_id')->index();
            $table->foreign('member_id')->references('id')->on('members')->cascadeOnDelete();
            $table->unsignedBigInteger('detail_resort_id')->index();
            $table->foreign('detail_resort_id')->references('id')->on('detail_resorts')->cascadeOnDelete();
            $table->unsignedBigInteger('pdl_id')->index();
            $table->foreign('pdl_id')->references('id')->on('pdls')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_aplications');
    }
};
