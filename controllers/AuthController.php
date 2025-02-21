<?php

namespace Controllers;

use MVC\Router;
use Model\Usuario;

class AuthController
{
    public static function login(Router $router)
    {
        $resultado = $_GET['resultado'] ?? null;
        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
    
            $usuario = new Usuario($_POST);
            $alertas = $usuario->validarLogin();
            
            if(empty($alertas)) {
                // Verificar quel el usuario exista
                $usuario = Usuario::where('usuario', $usuario->usuario);
                if(!$usuario) {
                    Usuario::setAlerta('danger', 'El Usuario No Existe');
                } else {
                    // El Usuario existe
                    if( password_verify($_POST['password'], $usuario->password) ) {
                        
                        // Iniciar la sesión
                        session_start();
                        $_SESSION['id'] = $usuario->id;
                        $_SESSION['nombre'] = $usuario->nombre;
                        $_SESSION['apellido'] = $usuario->apellido;
                        $_SESSION['correo'] = $usuario->correo;
                        $_SESSION['usuario'] = $usuario->usuario;

                        header('Location: /admin/index');


                    } else {
                        Usuario::setAlerta('error', 'Password Incorrecto');
                    }
                }
            }
        }

        $alertas = Usuario::getAlertas();
        
        // Render a la vista 
        $router->render('auth/login', [
            'titulo' => 'Iniciar Sesion',
            'resultado' => $resultado,
            'alertas' => $alertas
        ]);
    }

    public static function logout() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();
            $_SESSION = [];
            header('Location: /');
        }
       
    }

    public static function registro(Router $router)
    {
        $alertas = [];
        $usuario = new Usuario;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $usuario->sincronizar($_POST);
            $alertas = $usuario->validar_cuenta();


            if(empty($alertas)) {
                $existeUsuario = Usuario::where('usuario', $usuario->usuario);

                if($existeUsuario) {
                    Usuario::setAlerta('danger', 'El Usuario ya esta registrado');
                    $alertas = Usuario::getAlertas();
                } else {
                    // Hashear el password
                    $usuario->hashPassword();

                    // Eliminar password2
                    unset($usuario->password2);

                    // Crear un nuevo usuario
                    $resultado =  $usuario->guardar();

                    if($resultado) {
                        header('Location: /?resultado=1');
                    }
                }
            }
        }

        // Render a la vista
        $router->render('auth/registro', [
            'titulo' => 'Crea tu cuenta',
            'usuario' => $usuario,
            'alertas' => $alertas
        ]);
    }
}