<?php

class AbsenceController {
    // Method to render the view for adding an absence
    public function addView() {
         $stagiare = new Stagiaire() ;
        $stagiaires = $stagiare->findAll(); // Fetch all stagiaires
        $reference = new Reference();
        $references = $reference->findAll(); // Fetch all references
        require_once __DIR__ . '/../views/absence/add.php';
        exit();
    }

   
    // the creation of multiple absences 
    //for a single session (Seance).
    public function createAbsences($absencesData, $seanceDate, $seanceTime, $ref) {
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

        header('Location: /ABS-ISTA/absence/addView');
        exit();
    }
}
