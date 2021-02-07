<?php

use Illuminate\Database\Seeder;

class AsignacionArticulosSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $p = new \App\Models\AsignacionArticulos;
        $p->id = '1';
        $p->numeroSerie = '11';
        $p->save();

        $p = new \App\Models\AsignacionArticulos;
        $p->id = '1';
        $p->numeroSerie = '22';
        $p->save();

        $p = new \App\Models\AsignacionArticulos;
        $p->id = '2';
        $p->numeroSerie = '22';
        $p->save();
    }

}
