<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Clases;

/**
 * Description of Persona
 *
 * @author Maria
 */
class Persona {

    private $id;
    private $dni;
    private $email;
    private $nombre;
    private $apellidos;
    private $ciudad;
    private $activo;
    private $rol;

    function __construct($id, $dni, $email, $nombre, $apellidos, $ciudad, $activo, $rol) {
        $this->id = $id;
        $this->dni = $dni;
        $this->email = $email;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->ciudad = $ciudad;
        $this->activo = $activo;
        $this->rol = $rol;
    }

    function getId() {
        return $this->id;
    }

    function getDni() {
        return $this->dni;
    }

    function getEmail() {
        return $this->email;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellidos() {
        return $this->apellidos;
    }

    function getActivo() {
        return $this->activo;
    }

    function getRol() {
        return $this->rol;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setDni($dni): void {
        $this->dni = $dni;
    }

    function setEmail($email): void {
        $this->email = $email;
    }

    function setNombre($nombre): void {
        $this->nombre = $nombre;
    }

    function setApellidos($apellidos): void {
        $this->apellidos = $apellidos;
    }

    function getCiudad() {
        return $this->ciudad;
    }

    function setCiudad($ciudad): void {
        $this->ciudad = $ciudad;
    }

    function setActivo($activo): void {
        $this->activo = $activo;
    }

    function setRol($rol): void {
        $this->rol = $rol;
    }

}
