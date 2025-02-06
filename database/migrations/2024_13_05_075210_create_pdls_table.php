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
        Schema::create('pdls', function (Blueprint $table) {
            $table->id();
            $table->string("pdl_name");
            $table->unsignedBigInteger("branch_id")->index();
            $table->foreign("branch_id")->references("id")->on("branch_offices");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pdls');
    }
};
