<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 12/01/2016
 * Time: 18:19
 */
class datei
{
    private $id, $datum, $name, $benutzer_id, $benutzername, $pfad;

    public function __construct($id = null, $datum = null, $name = null, $benutzer_id = null, $benutzername = null, $pfad = null)
    {
        if(isset($id)) $this->id = $id;
        if(isset($id)) $this->datum = $datum;
        if(isset($id)) $this->name = $name;
        if(isset($id)) $this->benutzer_id = $benutzer_id;
        if(isset($id)) $this->benutzername = $benutzername;
        if(isset($id)) $this->pfad = $pfad;
    }
    public function satz_id($id)
    {
        $this->id = $id;
    }
    public function satz_datum($datum)
    {
        $this->datum = $datum;
    }
    public function satz_name($name)
    {
        $this->name = $name;
    }
    public function satz_benutzer_id($benutzer_id)
    {
        $this->benutzer_id = $benutzer_id;
    }
    public function satz_benutzername($benutzername)
    {
        $this->benutzername = $benutzername;
    }
    public function satz_pfad($pfad)
    {
        $this->pfad = $pfad;
    }
    public function erhalten_id()
    {
        return $this->id;
    }
    public function erhalten_datum()
    {
        return $this->datum;
    }
    public function erhalten_name()
    {
        return $this->name;
    }
    public function erhalten_benutzer_id()
    {
        return $this->benutzer_id;
    }
    public function erhalten_benutzername()
    {
        return $this->benutzername;
    }
    public function erhalten_pfad()
    {
        return $this->pfad;
    }
}