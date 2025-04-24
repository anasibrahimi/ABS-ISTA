<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/app/core/Router.php';

$router = new Router();

// Middleware to protect routes
if (!AuthController::isAuthenticated()) {
    $router->get('/ABS-ISTA/login', [AuthController::class, 'redirectToLogin']); 
    $router->post('/ABS-ISTA/check', [AuthController::class, 'login']); 
}else{
    
    $router->get('/ABS-ISTA/dashboard', [DashboardController::class, 'index']);
    $router->get('/ABS-ISTA/absence/addView', [AbsenceController::class, 'addView']);
    $router->get('/ABS-ISTA/absence/filiereView', [AbsenceController::class, 'filiereView']);
    $router->get('/ABS-ISTA/absence/stagiaireView', [AbsenceController::class, 'stagiaireView']);
    $router->post('/ABS-ISTA/absence/create', [AbsenceController::class, 'createAbsences']);

    $router->get('/ABS-ISTA/logout', [AuthController::class, 'logout']);

}


// Dispatch the request
$router->dispatch();
