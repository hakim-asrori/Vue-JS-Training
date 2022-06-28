<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name')->nullable();
            $table->string('nim')->nullable()->unique();
            $table->string('whatsapp')->nullable();
            $table->uuid('id_class')->nullable();
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('image')->default('default.jpg');
            $table->uuid('id_role')->default(3);
            $table->uuid('id_category')->default(1);
            $table->integer('skor')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
