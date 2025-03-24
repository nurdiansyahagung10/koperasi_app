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
        Schema::create('loan_applications', function (Blueprint $table) {
            $table->id();
            $table->string('binding_letter');
            $table->date('action_date')->nullable();
            $table->string('binding_letter_image');
            $table->enum('status', [1,2,3])->default(1);
            $table->integer('nominal_loan_application');
            $table->integer('nominal_admin');
            $table->integer('nominal_provisi');
            $table->integer('nominal_deposite');
            $table->integer('nominal_pure_dropping');
            $table->unsignedBigInteger('action_by')->index()->nullable();
            $table->foreign('action_by')->references('id')->on('users')->cascadeOnDelete();
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
        Schema::dropIfExists('loan_applications');
    }
};
