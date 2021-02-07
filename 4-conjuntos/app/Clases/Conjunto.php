<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Conjunto
 *
 * @author Maria
 */

namespace App\Clases;

class Conjunto {

    private static $idS = 1;
    private $id;
    private $nombre;
    private $elementos;

    function __construct() {
        $this->id = $this->idSuma();
        $this->nombre = 'Conjunto ' . $this->id;
        $this->elementos = array();
    }

    function idSuma() {
        $idS = self::$idS++;
        return $idS;
    }

    function addElemento($elemento) {
        $this->elementos[] = $elemento;
    }

    function deleteElemento($i) {
        unset($this->elementos[$i]);
        //Reordenar posiciones -> no haya huecos vacios
        $this->elementos = array_values($this->elementos);
    }

    function getElemento($i) {
        return $this->elementos[$i];
    }

    function size() {
        return count($this->elementos);
    }

    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    public function __toString() {
        $cad = "";
        foreach ($this->elementos as $i => $elemento) {
            $cad += $elemento . ', ';
        }
        return $cad;
    }

}
