<?php

class Stagiaire
{
    private $stagiaire_id;
    private $first_name;
    private $last_name;
    private $email;
    private $phone;
    private $groupe_id;

    public static function findAll()
    {
        $db = Database::getInstance()->getConnection();
        $query = $db->query("SELECT * FROM stagiaire s join filiere f on s.filiere_id = f.filiere_id");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findByFiliereId($filiere_id)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT * FROM stagiaire WHERE filiere_id = :filiere_id");
        $stmt->bindParam(':filiere_id', $filiere_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findByFiliereName($filiere_name)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("
            SELECT stagiaire.* 
            FROM stagiaire 
            INNER JOIN filiere ON stagiaire.filiere_id = filiere.filiere_id 
            WHERE filiere.filiere_name = :filiere_name
        ");
        $stmt->bindParam(':filiere_name', $filiere_name, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findById($stagiaire_id)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT * FROM stagiaire WHERE stagiaire_id = :stagiaire_id");
        $stmt->bindParam(':stagiaire_id', $stagiaire_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function bulkInsert($rows) {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("INSERT INTO stagiaire ( first_name, last_name, email, phone , filiere_id) VALUES (?, ?, ?, ?, ?)");
        foreach ($rows as $row) {
            $stmt->execute([ $row['first_name'], $row['last_name'], $row['email'], $row['phone'], $row['filiere_id']]);
        }
    }

    public function getStagiaireId()
    {
        return $this->stagiaire_id;
    }

    public function setStagiaireId($stagiaire_id)
    {
        $this->stagiaire_id = $stagiaire_id;
    }

    public function getFirstName()
    {
        return $this->first_name;
    }

    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
    }

    public function getLastName()
    {
        return $this->last_name;
    }

    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
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
