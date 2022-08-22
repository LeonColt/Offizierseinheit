<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 20/12/2015
 * Time: 11:47
 */
class ist_passwort_korrigieren extends Bergmann
{
    private $id, $benutzername, $pass;
    public function erhalten_daten()
    {
        // TODO: Implement erhalten_daten() method.
        if(password_verify($this->pass, $this->ergebnis[0][0]))
        {
            return true;
        }
        return false;
    }

    protected function daten_leere()
    {
        // TODO: Implement daten_leere() method.
        return true;
    }

    protected function daten_uberprufen()
    {
        // TODO: Implement daten_uberprufen() method.
        if(!$this->ist_null($_SESSION[id_benutzername],
            filter_input(INPUT_POST, andern_passwort_aktuelle_passwort)))
        {
            $this->id = $_SESSION[id_benutzername];
            $this->benutzername = $_SESSION[benutzername];
            $this->pass = filter_input(INPUT_POST, andern_passwort_aktuelle_passwort);
            return true;
        }
        return false;
    }

    protected function vorbereiten_abfrage_und_parameter()
    {
        // TODO: Implement vorbereiten_abfrage_und_parameter() method.
        $this->abfrage = 'SELECT pass FROM sg_user WHERE id = ? AND username = ?';
        $this->parameter = array($this->id, $this->benutzername);
    }
    protected function ist_token_korrigieren()
    {
        return true;
    }
}