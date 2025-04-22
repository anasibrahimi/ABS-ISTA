<?php

class Secteur
{
    private $secteur_id;
    private $secteur_name;

    public function getSecteurId()
    {
        return $this->secteur_id;
    }

    public function setSecteurId($secteur_id)
    {
        $this->secteur_id = $secteur_id;
    }

    public function getSecteurName()
    {
        return $this->secteur_name;
    }

    public function setSecteurName($secteur_name)
    {
        $this->secteur_name = $secteur_name;
    }
}
