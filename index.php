<?php

require_once __DIR__ . '/vendor/autoload.php';

// Include the AbsenceController
require_once __DIR__ . '/app/controllers/AbsenceController.php';

// Define a route for accessing addView()
if ($_SERVER['REQUEST_URI'] === '/ABS-ISTA/absence/addView') {
    $controller = new AbsenceController();
    $controller->addView();
    exit();
}
if ($_SERVER['REQUEST_URI'] === '/ABS-ISTA/absences/create' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new AbsenceController();
    $absencesData = $_POST['absences'];
    $seanceDate = $_POST['seanceDate'];
    $seanceTime = $_POST['seanceTime'];
    $ref = $_POST['ref'];
    $controller->createAbsences($absencesData, $seanceDate, $seanceTime, $ref);
    exit();
}

// // Insert a user
// $user = new Users();
// $user->setUsername('Anas');
// $user->setPassword(password_hash('password123', PASSWORD_BCRYPT));
// $user->setRole('admin');
// $user->add();

// // Insert a reference
// $reference = new Reference();
// $reference->setModuleId(1);
// $reference->setFiliereId(2);
// $reference->setEnseignantId(1);
// $reference->setAnneeId(1);
// $reference->add();

// // Insert a seance
// $seance = new Seance();
// $seance->setSeanceDate('2023-10-01');
// $seance->setSeanceTime('10:00:00');
// $seance->setRefId(6);
// $seance->add();

// // Insert an absence
// $absence = new Absences();
// $absence->setStagiaireId(1);
// $absence->setSeanceId(6);
// $absence->setUserId(8);
// $absence->setStatus('Absent');
// $absence->setRecordedAt(date('2025-04-19 11:12:22'));
// $absence->add();
echo "data insertead with success" ;

$ref = new Reference();
echo var_dump($ref->findAll());

;
