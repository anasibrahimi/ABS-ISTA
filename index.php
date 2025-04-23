<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/app/core/Router.php';

$router = new Router();

// Define routes
$router->get('/ABS-ISTA/absence/addView', [AbsenceController::class, 'addView']);
$router->get('/ABS-ISTA/absence/filiers', [AbsenceController::class, 'filiereView']);
$router->post('/ABS-ISTA/absences/create', [AbsenceController::class, 'createAbsences']);

// Dispatch the request
$router->dispatch();
