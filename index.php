<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/app/core/Router.php';

$router = new Router();

// Middleware to protect routes
if (!AuthController::isAuthenticated()) {
    $router->get('/', [AuthController::class, 'redirectToLogin']); 
    $router->get('/login', [AuthController::class, 'redirectToLogin']); 
    $router->post('/check', [AuthController::class, 'login']); 
}
 elseif (!empty($_SESSION['blocked']) && $_SESSION['blocked'] == 1) {
    $router->get('/', [AuthController::class, 'redirectToLogin']); 
    $router->get('/login', [AuthController::class, 'redirectToLogin']); 
    $router->post('/check', [AuthController::class, 'login']); 
    $router->get('/', [AuthController::class, 'redirectToLogin']);
    $router->get('/blocked', [AuthController::class, 'redirectToLogin']);
}
 else {
    $router->get('/', [DashboardController::class, 'index']);
    $router->get('/dashboard', [DashboardController::class, 'index']);
    $router->get('/absence/addView', [AbsenceController::class, 'addView']);
    $router->get('/absence/filiereView', [AbsenceController::class, 'filiereView']);
    $router->get('/absence/stagiaireView', [AbsenceController::class, 'stagiaireView']);
    $router->get('/absence/stagiare/details', [AbsenceController::class, 'detailsView']);
    $router->post('/absence/create', [AbsenceController::class, 'createAbsences']);

    // gestion seances
    $router->get('/seance', [SeanceController::class, 'seanceView']);

    //gestion filieres
    $router->get('/filiere', [FiliereController::class, 'filiereView']);
    $router->get('/filiere/listFiliere', [FiliereController::class, 'listFilieres']);
    $router->get('/downloadModelCanva', [FiliereController::class, 'downloadModelCanva']);
    $router->post('/importModelCanva', [FiliereController::class, 'importModelCanva']);

    // gestion comptes
    $router->get('/users', [AuthController::class, 'usersView']);
    $router->get('/addUser', [AuthController::class, 'addUserView']);
    $router->post('/createUser', [AuthController::class, 'createUser']);
    $router->post('/blockAccount', [AuthController::class, 'blockAccount']);
    $router->post('/toggleAccountStatus', [AuthController::class, 'toggleAccountStatus']);

    $router->get('/logout', [AuthController::class, 'logout']);

}
// Dispatch the request
$router->dispatch();
