<?php

class Enseignant
{
    private $enseignant_id;
    private $first_name;
    private $last_name;
    private $email;
    private $phone;

    public function getEnseignantId()
    {
        return $this->enseignant_id;
    }

    public function setEnseignantId($enseignant_id)
    {
        $this->enseignant_id = $enseignant_id;
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
}
