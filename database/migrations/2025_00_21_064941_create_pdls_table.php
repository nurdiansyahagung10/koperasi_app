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
            $table->integer("basic_salary");
            $table->integer("salary_date");
            $table->text("hometown");
            $table->string("phone_number");
            $table->string("sk");
            $table->unsignedBigInteger("branch_id")->index()->nullable(true);
            $table->foreign("branch_id")->references("id")->on("branch_offices")->cascadeOnDelete();
            $table->unsignedBigInteger("head_id")->index()->nullable(true);
            $table->foreign("head_id")->references("id")->on("head_offices")->cascadeOnDelete();
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
