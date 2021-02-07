<?php

use Illuminate\Database\Seeder;

class PedidoSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $pe = new \App\Models\Pedido;
        $pe->fecha = '2021-01-15';
        $pe->dni = '1A';
        $pe->nArticulos = 2;
        $pe->save();

        $pe = new \App\Models\Pedido;
        $pe->fecha = '2021-01-15';
        $pe->dni = '2B';
        $pe->nArticulos = 1;
        $pe->save();
    }

}
