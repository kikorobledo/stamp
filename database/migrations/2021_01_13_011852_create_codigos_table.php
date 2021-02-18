<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCodigosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('codigos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->foreignId('cupon_id')->constrained()->onDelete('cascade');
            $table->datetime('reservado_el')->nullable();
            $table->foreignId('reservado_por')->nullable()->constrained()->onDelete('cascade')->references('id')->on('users');
            $table->datetime('canjeado_el')->nullable();
            $table->foreignId('canjeado_por')->nullable()->constrained()->onDelete('cascade')->references('id')->on('users');
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
        Schema::dropIfExists('codigos');
    }
}
