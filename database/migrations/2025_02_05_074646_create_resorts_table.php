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
        Schema::create('resorts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("resort_number");
            $table->unsignedBigInteger("pdl_id")->index()->nullable();
            $table->foreign("pdl_id")->references("id")->on("pdls")->cascadeOnDelete();
            $table->unsignedBigInteger("branch_id")->index();
            $table->foreign("branch_id")->references("id")->on("branch_offices")->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resorts');
    }
};
