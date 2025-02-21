<?php

namespace Model;

class Persona extends ActiveRecord {
    protected static $tabla = 'personas';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'cedula', 'telefono', 'fecha_nac', 'creado'];

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->cedula = $args['cedula'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->fecha_nac = $args['fecha_nac'] ?? '';
        $this->creado = date('Y/m/d');
    }

    public function validar() {
        if(!$this->nombre) {
            self::$alertas['danger'][] = 'El Nombre es Obligatorio';
        }
        if(!$this->apellido) {
            self::$alertas['danger'][] = 'El Apellido es Obligatorio';
        }
        if(!$this->cedula) {
            self::$alertas['danger'][] = 'La Cedula es Obligatorio';
        }
        if(!$this->telefono) {
            self::$alertas['danger'][] = 'El Email es Obligatorio';
        }
        if(!$this->fecha_nac) {
            self::$alertas['danger'][] = 'La Fecha es Obligatoria';
        }
        return self::$alertas;
    }
}