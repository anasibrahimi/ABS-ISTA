<?php

class Seance
{
    private $seance_id;
    private $seance_date;
    private $seance_time;
    private $ref_id;

    
    public function add()
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("INSERT INTO seance (seance_date, seance_time, ref_id) VALUES (?, ?, ?)");
        if ($stmt->execute([$this->seance_date, $this->seance_time, $this->ref_id])) {
            return $db->lastInsertId(); // Return the ID of the inserted record
        }
        return false; // Return false if the insertion fails
    }

    public static function create($data)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("INSERT INTO seance (seance_date, seance_time, ref_id) VALUES (?, ?, ?)");
        return $stmt->execute([$data['seance_date'], $data['seance_time'], $data['ref_id']]);
    }

    public static function read($id)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT * FROM seance WHERE seance_id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function update($id, $data)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("UPDATE seance SET seance_date = ?, seance_time = ?, ref_id = ? WHERE seance_id = ?");
        return $stmt->execute([$data['seance_date'], $data['seance_time'], $data['ref_id'], $id]);
    }

    public static function delete($id)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("DELETE FROM seance WHERE seance_id = ?");
        return $stmt->execute([$id]);
    }

    public static function findAll()
    {
        $db = Database::getInstance()->getConnection();
        $query = $db->query("SELECT * FROM seances");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSeanceId()
    {
        return $this->seance_id;
    }

    public function setSeanceId($seance_id)
    {
        $this->seance_id = $seance_id;
    }

    public function getSeanceDate()
    {
        return $this->seance_date;
    }

    public function setSeanceDate($seance_date)
    {
        $this->seance_date = $seance_date;
    }

    public function getSeanceTime()
    {
        return $this->seance_time;
    }

    public function setSeanceTime($seance_time)
    {
        $this->seance_time = $seance_time;
    }

    public function getRefId()
    {
        return $this->ref_id;
    }

    public function setRefId($ref_id)
    {
        $this->ref_id = $ref_id;
    }

   
}
