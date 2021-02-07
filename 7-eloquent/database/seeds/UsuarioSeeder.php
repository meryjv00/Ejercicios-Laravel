<?php

use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $fak = \Faker\Factory::create('es_ES');
        for ($i = 1; $i <= 10; $i++) {
            $us = new \App\Models\Usuario;
            if ($i == 1) {
                $us->dni = '1A';
            } else if ($i == 2) {
                $us->dni = '2B';
            } else {
                $us->dni = $fak->dni;
            }
            $us->nombre = $fak->firstName;
            $us->tfno = $fak->phoneNumber;
            $us->save();
        }
    }

}
