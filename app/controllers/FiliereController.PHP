<?php

class FiliereController {

    // Retourner toutes les filières (JSON)
    public function listFilieres() {
        $filieres = new Filiere();
        header('Content-Type: application/json');
        echo json_encode($filieres->findAll());
    }

    public function filiereView() {
        require_once __DIR__ . '/../views/filiere/filiere.php';
        exit();
    }

    
    public function downloadModelCanva() {
        $filePath = __DIR__ . '/../../uploads/filiere-canva.xlsx'; // Adjust the file name and extension as needed
        if (file_exists($filePath)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($filePath) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filePath));
            readfile($filePath);
            exit();
        } else {
            http_response_code(404);
            echo json_encode(["error" => "File not found"]);
        }
    }

    // // Bloquer une filière spécifique
    // public function blockFiliere($id) {
    //     $this->dao->blockFiliere($id);
    //     echo json_encode(["message" => "Filière bloquée avec succès"]);
    // }
}
?>
