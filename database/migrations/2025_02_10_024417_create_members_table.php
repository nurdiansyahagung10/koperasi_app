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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('member_name');
            $table->date('birthday_date');
            $table->string('ktp', 16);
            $table->string('kk', 16);
            $table->enum('status', [1, 2, 3])->default(1);
            $table->string("province");
            $table->string("city_or_regency");
            $table->string("district");
            $table->string("village");
            $table->string("rt_and_rw");
            $table->text("street_or_building_name");
            $table->string("phone_number", 13);
            $table->string('member_image');
            $table->string('member_ktp_image');
            $table->string('member_hold_ktp_image');
            $table->string('business');
            $table->string('business_image');
            $table->text('business_location');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->unsignedBigInteger('detail_resort_id');
            $table->foreign('detail_resort_id')->references('id')->on('detail_resorts')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
