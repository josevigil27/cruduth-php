<?php

namespace Model;

class Usuario extends ActiveRecord
{
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'telefono', 'correo', 'usuario', 'password', 'creado'];

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->correo = $args['correo'] ?? '';
        $this->usuario = $args['usuario'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->password2 = $args['password2'] ?? '';
        $this->creado = date('Y/m/d');
    }

    // Validar el Login de Usuarios
    public function validarLogin() {
        if(!$this->usuario) {
            self::$alertas['danger'][] = 'El Usuario es Obligatorio';
        }
        if(!$this->password) {
            self::$alertas['danger'][] = 'El Password no puede ir vacio';
        }
        return self::$alertas;

    }

    // Validación para cuentas nuevas
    public function validar_cuenta() {
        if(!$this->nombre) {
            self::$alertas['danger'][] = 'El Nombre es Obligatorio';
        }
        if(!$this->apellido) {
            self::$alertas['danger'][] = 'El Apellido es Obligatorio';
        }
        if(!$this->telefono) {
            self::$alertas['danger'][] = 'El telefono es Obligatorio';
        }
        if(!$this->correo) {
            self::$alertas['danger'][] = 'El Email es Obligatorio';
        }
        if(!filter_var($this->correo, FILTER_VALIDATE_EMAIL)) {
            self::$alertas['danger'][] = 'Email no válido';
        }
        if(!$this->usuario) {
            self::$alertas['danger'][] = 'El Usuario es Obligatorio';
        }
        if(!$this->password) {
            self::$alertas['danger'][] = 'El Password no puede ir vacio';
        }
        if(strlen($this->password) < 6) {
            self::$alertas['danger'][] = 'El password debe contener al menos 6 caracteres';
        }
        if($this->password !== $this->password2) {
            self::$alertas['danger'][] = 'Los password son diferentes';
        }
        return self::$alertas;
    }

    // Hashea el password
    public function hashPassword() : void {
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }
}