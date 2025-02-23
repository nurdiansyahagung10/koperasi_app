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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->string('email')->unique();
            $table->integer("basic_salary");
            $table->integer("salary_date");
            $table->text("hometown");
            $table->string('phone_number', 13);
            $table->string('sk');
            $table->string('password');
            $table->unsignedBigInteger("role_id")->index();
            $table->foreign("role_id")->references("id")->on("roles")->cascadeOnDelete();
            $table->unsignedBigInteger("branch_id")->index()->nullable(true);
            $table->foreign("branch_id")->references("id")->on("branch_offices")->cascadeOnDelete();
            $table->unsignedBigInteger("head_id")->index()->nullable(true);
            $table->foreign("head_id")->references("id")->on("head_offices")->cascadeOnDelete();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
