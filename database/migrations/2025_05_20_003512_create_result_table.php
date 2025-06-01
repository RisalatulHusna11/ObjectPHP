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
    Schema::create('result', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id')->nullable(); // relasi ke tabel users
        $table->string('nama');
        $table->string('email');
        $table->integer('kuis_1')->nullable();
        $table->integer('kuis_2')->nullable();
        $table->integer('kuis_3')->nullable();
        $table->integer('kuis_4')->nullable();
        $table->integer('kuis_5')->nullable();
        $table->integer('evaluasi')->nullable();
        $table->float('rata_rata')->nullable();
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
        Schema::dropIfExists('result');
    }
};
