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
        Schema::create('branch_offices', function (Blueprint $table) {
            $table->id();
            $table->string('branch_name');
            $table->string("city_or_regency");
            $table->string("district");
            $table->string("village");
            $table->string("rt_or_rw");
            $table->text("street_or_building_name");
            $table->string("phone_number",13);
            $table->integer('admin_provisi');
            $table->integer('service_charge');
            $table->integer('admin_charge');
            $table->integer('comision_charge');
            $table->unsignedBigInteger('head_id')->index();
            $table->foreign("head_id")->references("id")->on("head_offices")->cascadeOnDelete();

            $table->integer('deposite');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branch_offices');
    }
};
