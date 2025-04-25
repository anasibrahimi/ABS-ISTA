<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/app/core/Router.php';

$router = new Router();

// Middleware to protect routes
if (!AuthController::isAuthenticated()) {
    $router->get('/', [AuthController::class, 'redirectToLogin']); 
    $router->get('/login', [AuthController::class, 'redirectToLogin']); 
    $router->post('/check', [AuthController::class, 'login']); 
}else{
    
    $router->get('/dashboard', [DashboardController::class, 'index']);
    $router->get('/absence/addView', [AbsenceController::class, 'addView']);
    $router->get('/absence/filiereView', [AbsenceController::class, 'filiereView']);
    $router->get('/absence/stagiaireView', [AbsenceController::class, 'stagiaireView']);
    $router->post('/absence/create', [AbsenceController::class, 'createAbsences']);

    $router->get('/seance', [SeanceController::class, 'seanceView']);

    $router->get('/users', [AuthController::class, 'usersView']);
    $router->get('/addUser', [AuthController::class, 'addUserView']);
    $router->post('/createUser', [AuthController::class, 'createUser']);
    $router->post('/deleteUser', [AuthController::class, 'deleteUser']);

    $router->get('/logout', [AuthController::class, 'logout']);

}


// Dispatch the request
$router->dispatch();
