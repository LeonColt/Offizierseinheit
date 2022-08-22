<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 15/01/2016
 * Time: 21:57
 */
require_once standart_system_pfad.'server_skript/base/Bergmann.php';
class wahle_benutzer_von_id_oder_benutzer_oder_email extends Bergmann
{
    private $id, $benutzername, $email;
    public function erhalten_daten()
    {
        // TODO: Implement erhalten_daten() method.
        return $this->ergebnis;
    }

    protected function daten_leere()
    {
        // TODO: Implement daten_leere() method.
    }

    public function satz_daten($id, $benutzername, $email)
    {
        $this->id = $id;
        $this->benutzername = $benutzername;
        $this->email = $email;
    }

    protected function daten_uberprufen()
    {
        // TODO: Implement daten_uberprufen() method.
        if(!$this->ist_null($this->id, $this->benutzername))
        {
            return true;
        }
        return false;
    }

    protected function vorbereiten_abfrage_und_parameter()
    {
        // TODO: Implement vorbereiten_abfrage_und_parameter() method.
        $this->abfrage = 'SELECT COUNT(*) FROM sg_user LEFT JOIN detail_sg_user ON sg_user.id = detail_sg_user.id
WHERE sg_user.id = ? OR sg_user.username = ? OR detail_sg_user.email = ?';
        $this->parameter = array($this->id, $this->benutzername, $this->email);
    }
    protected function ist_token_korrigieren()
    {
        return true;
        //return parent::ist_token_korrigieren(); // TODO: Change the autogenerated stub
    }
}