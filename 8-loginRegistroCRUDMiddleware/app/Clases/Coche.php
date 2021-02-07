<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Clases;

/**
 * Description of Coche
 *
 * @author Maria
 */
class Coche {

    private $matricula;
    private $marca;
    private $modelo;
    private $disponible;
    private $historico;

    function __construct($matricula, $marca, $modelo,$disponible, $historico) {
        $this->matricula = $matricula;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->disponible = $disponible;
        $this->historico = $historico;
    }

    function getMatricula() {
        return $this->matricula;
    }

    function getMarca() {
        return $this->marca;
    }

    function getModelo() {
        return $this->modelo;
    }

    function setMatricula($matricula): void {
        $this->matricula = $matricula;
    }

    function setMarca($marca): void {
        $this->marca = $marca;
    }

    function setModelo($modelo): void {
        $this->modelo = $modelo;
    }
    function getHistorico() {
        return $this->historico;
    }

    function setHistorico($historico): void {
        $this->historico = $historico;
    }

    function getDisponible() {
        return $this->disponible;
    }

    function setDisponible($disponible): void {
        $this->disponible = $disponible;
    }


}
