<?php 

require_once __DIR__ . '/includes/app.php';

use Controllers\AuthController;
use Controllers\DashboardController;
use Controllers\PersonasController;
use MVC\Router;

$router = new Router();

// Login
$router->get('/', [AuthController::class, 'login']);
$router->post('/', [AuthController::class, 'login']);
$router->post('/logout', [AuthController::class, 'logout']);

// Crear Cuenta
$router->get('/registro', [AuthController::class, 'registro']);
$router->post('/registro', [AuthController::class, 'registro']);

// Area de administracion
$router->get('/admin/', [DashboardController::class, 'index']);
$router->get('/admin/crear', [DashboardController::class, 'crear']);
$router->post('/admin/crear', [DashboardController::class, 'crear']);
$router->get('/admin/editar', [DashboardController::class, 'editar']);
$router->post('/admin/editar', [DashboardController::class, 'editar']);
$router->post('/admin/eliminar', [DashboardController::class, 'eliminar']);

// Usuarios
$router->get('/admin/usuarios', [PersonasController::class, 'index']);
$router->get('/admin/usuarios/crear', [PersonasController::class, 'crear']);
$router->post('/admin/usuarios/crear', [PersonasController::class, 'crear']);
$router->post('/admin/usuarios/eliminar', [PersonasController::class, 'eliminar']);

$router->comprobarRutas();