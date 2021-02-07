<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignacionArticulosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('asignacion_articulos', function (Blueprint $table) {
            $table->foreignId('id')
                    ->constrained('pedidos')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
          
            $table->string('numeroSerie');
            $table->foreign('numeroSerie')
                    ->references('numeroSerie')->on('articulos')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('asignacion_articulos', function (Blueprint $table) {
            $table->dropForeign(['id', 'numeroSerie']);
        });
    }

}
