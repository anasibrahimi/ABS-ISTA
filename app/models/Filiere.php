<?php

class Filiere
{
    private $filiere_id;
    private $filiere_name;
    private $secteur_id;

    public function getFiliereId()
    {
        return $this->filiere_id;
    }

    public function setFiliereId($filiere_id)
    {
        $this->filiere_id = $filiere_id;
    }

    public function getFiliereName()
    {
        return $this->filiere_name;
    }

    public function setFiliereName($filiere_name)
    {
        $this->filiere_name = $filiere_name;
    }

    public function getSecteurId()
    {
        return $this->secteur_id;
    }

    public function setSecteurId($secteur_id)
    {
        $this->secteur_id = $secteur_id;
    }
}
