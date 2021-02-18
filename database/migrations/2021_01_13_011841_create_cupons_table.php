<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cupons', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('slug');
            $table->decimal('precio',15,2)->nullable();
            $table->enum('estado', ['activo','expirado','eliminado','revision']);
            $table->foreignId('establecimiento_id')->constrained()->onDelete('cascade');
            $table->date('fecha_de_vencimiento');
            $table->text('descripcion');
            $table->integer('codigos_solicitados')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cupons');
    }
}
