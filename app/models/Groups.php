<?php

class Groups
{
    private $groupe_id;
    private $groupe_name;
    private $filiere_id;

    public static function findAll()
    {
        $db = Database::getInstance()->getConnection();
        $query = $db->query("SELECT * FROM groupes g join filiere f on g.filiere_id = f.filiere_id");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findByFiliereId($filiere_id)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT * FROM groupes WHERE filiere_id = :filiere_id");
        $stmt->bindParam(':filiere_id', $filiere_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findByGroupeName($groupe_name)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT groupe_id FROM groupes WHERE groupe_name = ?");
        $stmt->execute([$groupe_name]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function add()
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("INSERT INTO groupes (groupe_name, filiere_id) VALUES (:groupe_name, :filiere_id)");
        $stmt->bindParam(':groupe_name', $this->groupe_name, PDO::PARAM_STR);
        $stmt->bindParam(':filiere_id', $this->filiere_id, PDO::PARAM_INT);
        $stmt->execute();
        return $db->lastInsertId();
    }

    public function update($groupe_id)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("UPDATE groupes SET groupe_name = :groupe_name, filiere_id = :filiere_id WHERE groupe_id = :groupe_id");
        $stmt->bindParam(':groupe_name', $this->groupe_name, PDO::PARAM_STR);
        $stmt->bindParam(':filiere_id', $this->filiere_id, PDO::PARAM_INT);
        $stmt->bindParam(':groupe_id', $groupe_id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public static function delete($groupe_id)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("DELETE FROM groupes WHERE groupe_id = :groupe_id");
        $stmt->bindParam(':groupe_id', $groupe_id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function getGroupeId()
    {
        return $this->groupe_id;
    }

    public function setGroupeId($groupe_id)
    {
        $this->groupe_id = $groupe_id;
    }

    public function getGroupeeeName()
    {
        return $this->groupe_name;
    }

    public function setGroupName($groupe_name)
    {
        $this->groupe_name = $groupe_name;
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