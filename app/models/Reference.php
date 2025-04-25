<?php
class Reference
{
    private $ref_id;
    private $module_id;
    private $filiere_id;
    private $enseignant_id;

    public static function create($data)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("INSERT INTO reference (module_id, filiere_id, enseignant_id, annee_id) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$data['module_id'], $data['filiere_id'], $data['enseignant_id'], $data['annee_id']]);
    }

    public static function read($id)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT * FROM reference WHERE ref_id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function update($id, $data)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("UPDATE reference SET module_id = ?, filiere_id = ?, enseignant_id = ?, annee_id = ? WHERE ref_id = ?");
        return $stmt->execute([$data['module_id'], $data['filiere_id'], $data['enseignant_id'], $data['annee_id'], $id]);
    }

    public static function delete($id)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("DELETE FROM reference WHERE ref_id = ?");
        return $stmt->execute([$id]);
    }

    // public function findAll()
    // {
    //     $db = Database::getInstance()->getConnection();
    //     $query = $db->query("SELECT * FROM reference r 
    //     join module m on r.module_id = m.module_id 
    //     join enseignant e on r.enseignant_id = e.enseignant_id");
    //     return $query->fetchAll(PDO::FETCH_ASSOC);
    // }

    public function findByFiliereName($filiereName)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("
            SELECT *
            FROM reference r
            JOIN module m ON r.module_id = m.module_id
            JOIN filiere f ON m.filiere_id = f.filiere_id
            join enseignant e on r.enseignant_id = e.enseignant_id
            WHERE f.filiere_name = :filiere_name
        ");
        $stmt->bindParam(':filiere_name', $filiereName, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function add()
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("INSERT INTO reference (module_id, filiere_id, enseignant_id) VALUES (?, ?, ?)");
        return $stmt->execute([$this->module_id, $this->filiere_id, $this->enseignant_id]);
    }

    public function getRefId()
    {
        return $this->ref_id;
    }

    public function setRefId($ref_id)
    {
        $this->ref_id = $ref_id;
    }

    public function getModuleId()
    {
        return $this->module_id;
    }

    public function setModuleId($module_id)
    {
        $this->module_id = $module_id;
    }

    public function getFiliereId()
    {
        return $this->filiere_id;
    }

    public function setFiliereId($filiere_id)
    {
        $this->filiere_id = $filiere_id;
    }

    public function getEnseignantId()
    {
        return $this->enseignant_id;
    }

    public function setEnseignantId($enseignant_id)
    {
        $this->enseignant_id = $enseignant_id;
    }

   
}
