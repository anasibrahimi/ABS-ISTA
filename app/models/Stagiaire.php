<?php

class Stagiaire
{
    private $stagiaire_id;
    private $first_name;
    private $last_name;
    private $email;
    private $phone;
    private $filiere_id;

    public static function findAll()
    {
        $db = Database::getInstance()->getConnection();
        $query = $db->query("SELECT * FROM stagiaire");
        return $query->fetchAll(PDO::FETCH_ASSOC);
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
