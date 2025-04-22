<?php

class Module
{
    private $module_id;
    private $module_name;
    private $filiere_id;

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
