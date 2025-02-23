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
        Schema::create('detail_resorts', function (Blueprint $table) {
            $table->id();
            $table->char("day_code");
            $table->unsignedBigInteger("resort_id")->index();
            $table->foreign('resort_id')->references('id')->on('resorts')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_resorts');
    }
};
