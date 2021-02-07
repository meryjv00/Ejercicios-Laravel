<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
//            $table->foreignId('dni')
//                    ->constrained('usuarios')
//                    ->onUpdate('cascade')
//                    ->onDelete('cascade');
            $table->string('dni');
            $table->foreign('dni')
                    ->references('dni')->on('usuarios')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->integer('nArticulos');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('pedidos', function (Blueprint $table) {
            $table->dropForeign('dni');
        });
    }

}
