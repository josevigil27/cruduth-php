<?php

namespace Controllers;

use MVC\Router;
use Model\Usuario;

class PersonasController
{
    public static function index(Router $router) {
        if(!is_auth()) {
            header('Location: /');
        }

        $usuarios = Usuario::all_where('admin', 1);
        $resultado = $_GET['resultado'] ?? null;

        $router->render('admin/usuarios/index', [
            'titulo' => 'Usuarios Registrados',
            'resultado' => $resultado,
            'usuarios' => $usuarios
        ]);
    }

    public static function crear(Router $router)
    {
        if(!is_admin()) {
            header('Location: /');
        }

        $alertas = [];
        $usuario = new Usuario;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario->sincronizar($_POST);
            $alertas = $usuario->validar_cuenta();

            if(empty($alertas)) {
                $existeUsuario = Usuario::where('usuario', $usuario->usuario);

                if($existeUsuario) {
                    Usuario::setAlerta('error', 'El Usuario ya esta registrado');
                    $alertas = Usuario::getAlertas();
                } else {
                    // Hashear el password
                    $usuario->hashPassword();

                    // Eliminar password2
                    unset($usuario->password2);

                    // Crear un nuevo usuario
                    $resultado =  $usuario->guardar();

                    if($resultado) {
                        header('Location: /admin/usuarios?resultado=1');
                    }
                }
            }
        }

        $router->render('admin/usuarios/crear', [
            'titulo' => 'Crear Usuarios',
            'alertas' => $alertas,
            'usuario' => $usuario
        ]);
    }

    public static function editar(Router $router) {
        if(!is_admin()) {
            header('Location: /');
        }

        $alertas = [];

        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if(!$id) {
            header('Location: /admin/usuarios');
        }

        // Obtener vendedor a Editar
        $usuario = Usuario::find($id);

        if(!$usuario) {
            header('Location: /admin/usuarios');
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario->sincronizar($_POST);
            $alertas = $usuario->validar_cuenta();

            if(empty($alertas)) {
                // Hashear el password
                $usuario->hashPassword();

                // Eliminar password2
                unset($usuario->password2);

                // Crear un nuevo usuario
                $resultado = $usuario->guardar();

                if($resultado) {
                    header('Location: /admin/usuarios?resultado=2');
                }
            }
        }

        $router->render('admin/usuarios/editar', [
            'titulo' => 'Editar Usuario',
            'alertas' => $alertas,
            'usuario' => $usuario
        ]);
    }

    public static function eliminar()
    {
        if(!is_admin()) {
            header('Location: /');
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $usuario = Usuario::find($id);

            if(!isset($usuario)) {
                header('Location: /admin/usuarios');
                return;
            }

            $resultado = $usuario->eliminar();

            if($resultado) {
                header('Location: /admin/usuarios?resultado=3');
            }
        }
    }
}