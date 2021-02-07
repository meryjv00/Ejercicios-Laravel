<?php

use Illuminate\Database\Seeder;

class ArticuloSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $art = new \App\Models\Articulo;
        $art->numeroSerie = '11';
        $art->descripcion = 'mesa';
        $art->save();

        $art = new \App\Models\Articulo;
        $art->numeroSerie = '22';
        $art->descripcion = 'silla';
        $art->save();
    }

}
