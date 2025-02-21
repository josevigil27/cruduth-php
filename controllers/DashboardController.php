<?php

namespace Controllers;

use Model\Persona;
use MVC\Router;

class DashboardController {

    public static function index(Router $router) {
        if(!is_auth()) {
            header('Location: /');
        }

        $personas = Persona::all();

        $resultado = $_GET['resultado'] ?? null;

        $router->render('admin/index', [
            'resultado' => $resultado,
            'personas' => $personas,
            'titulo' => 'Panel de Registro'
        ]);
    }

    public static function crear(Router $router) {
        if(!is_auth()) {
            header('Location: /');
        }

        $alertas = [];
        $persona = new Persona;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $persona->sincronizar($_POST);

            // Validar
            $alertas = $persona->validar();

            // Guardar el registro
            if(empty($alertas)) {

                // Guardar en la BD
                $resultado = $persona->guardar();

                if($resultado) {
                    header('Location: /admin/?resultado=1');
                }
            }
        }

        $router->render('admin/crear', [
            'titulo' => 'Registrar Persona',
            'alertas' => $alertas,
            'persona' => $persona
        ]);
    }

    public static function editar(Router $router) {
        if(!is_auth()) {
            header('Location: /');
        }

        $alertas = [];

        // Vaidar el ID
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if(!$id) {
            header('Location: /admin/');
        }

        $persona = Persona::find($id);

        if(!$persona) {
            header('Location: /admin/');
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $persona->sincronizar($_POST);
            $alertas = $persona->validar();

            if(empty($alertas)) {
                $resultado = $persona->guardar();

                if($resultado) {
                    header('Location: /admin/?resultado=2');
                }
            }
        }

        $router->render('admin/editar', [
            'titulo' => 'Editar Persona',
            'alertas' => $alertas,
            'persona' => $persona
        ]);
    }

    public static function eliminar() {

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            if(!is_auth()) {
                header('Location: /');
                return;
            }

            $id = $_POST['id'];
            $persona = Persona::find($id);

            if(!isset($persona) ) {
                header('Location: /admin/');
                return;
            }

            $resultado = $persona->eliminar();

            if($resultado) {
                header('Location: /admin/?resultado=3');
            }
        }
    }

}