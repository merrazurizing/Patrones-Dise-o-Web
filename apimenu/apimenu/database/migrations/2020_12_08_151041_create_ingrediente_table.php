<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngredienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingrediente', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('tipo');
            $table->float('cantidad');
            $table->timestamps();
            $table->integer('praparacion_id')->unsigned();

              // Indicamos cual es la clave foránea de esta tabla:
              $table->foreign('praparacion_id')->references('id')->on('preparacion');
  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingrediente');
    }
}
