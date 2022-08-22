<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 16/12/2015
 * Time: 16:58
 */
require_once standart_system_pfad.'server_skript/base/globale_variable.php';
require_once standart_system_pfad.'server_skript/base/Bergmann.php';
class wahle_allen_benutzer_typ extends Bergmann
{
    public function erhalten_daten()
    {
        // TODO: Implement erhalten_daten() method.
        return $this->ergebnis;
    }

    protected function daten_leere()
    {
        // TODO: Implement daten_leere() method.
    }

    protected function daten_uberprufen()
    {
        // TODO: Implement daten_uberprufen() method.
        return true;
    }

    protected function vorbereiten_abfrage_und_parameter()
    {
        // TODO: Implement vorbereiten_abfrage_und_parameter() method.
        $this->abfrage = 'SELECT * FROM jenis_user';
    }
    protected function ist_token_korrigieren()
    {
        return true;
    }
}