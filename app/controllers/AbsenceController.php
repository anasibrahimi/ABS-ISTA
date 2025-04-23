<?php

class AbsenceController {
    // Method to render the view for adding an absence
    public function addView() {
        $filiereName = $_GET['filiereName'] ?? null; // Get filiereName from the query string
        $stagiaire = new Stagiaire();
        $stagiaires = $stagiaire->findByFiliereName($filiereName); // Fetch stagiaires based on filiereName
        $reference = new Reference();
        $references = $reference->findByFiliereName($filiereName); // Fetch all references
        require_once __DIR__ . '/../views/absence/add.php';
        exit();
    }
    
    // Method to redirect to the filiere selection view
    public function filiereView() {
        $filiere = new Filiere();
        $filieres = $filiere->findAll(); // Fetch all filieres
        require_once __DIR__ . '/../views/absence/filiere.html';
        exit();
    }

    // Method to redirect to the stagiaire view
    public function stagiaireView() {
        $filiereName = $_GET['filiereName'] ?? null; // Get filiereName from the query string
        $stagiaire = new Stagiaire();
        $stagiaires = $stagiaire->findByFiliereName($filiereName); // Fetch stagiaires based on filiereName
        require_once __DIR__ . '/../views/absence/stagiaire.php';
        exit();
    }

    // the creation of multiple absences 
    //for a single session (Seance).
    public function createAbsences($postData) {
        $absencesData = $postData['absences'] ?? [];
        $seanceDate = $postData['seanceDate'] ?? null;
        $seanceTime = $postData['seanceTime'] ?? null;
        $ref = $postData['ref'] ?? null;

        // Create a new Seance
        $seance = new Seance();
        $seance->setSeanceDate($seanceDate);
        $seance->setSeanceTime($seanceTime);
        $seance->setRefId($ref);
        $seanceId = $seance->add(); // Save the seance and get its ID

        foreach ($absencesData as $absenceData) {
            // Process only if the checkbox (status) is marked
            if (isset($absenceData['status']) && $absenceData['status'] === '1') {
                // Create a new Absence
                $absence = new Absences();
                $absence->setStagiaireId($absenceData['stagiaireId']);
                $absence->setSeanceId($seanceId); // Reference the created seance
                $absence->setUserId(1); // Assuming a default user ID for now
                $absence->setStatus('Absent');
                $absence->setRecordedAt(date('Y-m-d H:i:s'));
                $absence->add();
            }
        }

        header('Location: /ABS-ISTA/absence/filiereView');
        exit();
    }
}
