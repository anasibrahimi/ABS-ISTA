<?php

class Module
{
    private $module_id;
    private $module_name;
    private $filiere_id;
    private $enseignant_id;

    public static function findAll()
    {
        $db = Database::getInstance()->getConnection();
        $query = $db->query("SELECT * FROM module m join filiere f on m.filiere_id = f.filiere_id
        join enseignant e on m.enseignant_id = e.enseignant_id");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findByFiliereName($filiereName)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("
            SELECT *
            FROM module m JOIN filiere f ON m.filiere_id = f.filiere_id
            JOIN enseignant e on m.enseignant_id = e.enseignant_id
            WHERE f.filiere_name = :filiere_name
        ");
        $stmt->bindParam(':filiere_name', $filiereName, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function bulkInsert($rows) {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("INSERT INTO module (module_name,filiere_id, enseignant_id) VALUES (?, ?, ?)");
        foreach ($rows as $row) {
            $stmt->execute([$row['module_name'], $row['filiere_id'], $row['enseignant_id']]);
        }
    }

    public function getModuleId()
    {
        return $this->module_id;
    }

    public function setModuleId($module_id)
    {
        $this->module_id = $module_id;
    }

    public function getModuleName()
    {
        return $this->module_name;
    }

    public function setModuleName($module_name)
    {
        $this->module_name = $module_name;
    }

    public function getFiliereId()
    {
        return $this->filiere_id;
    }

    public function setFiliereId($filiere_id)
    {
        $this->filiere_id = $filiere_id;
    }
}
