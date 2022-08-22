<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 17/12/2015
 * Time: 09:19
 */
require_once standart_system_pfad.'server_skript/base/Bergmann.php';
class erhalten_letzte_benutzer_id extends Bergmann
{
    public function erhalten_daten()
    {
        // TODO: Implement erhalten_daten() method.
        return $this->ergebnis[0][0];
    }

    protected function daten_leere()
    {
        // TODO: Implement daten_leere() method.
        return -1;
    }

    protected function daten_uberprufen()
    {
        // TODO: Implement daten_uberprufen() method.
        return true;
    }

    protected function vorbereiten_abfrage_und_parameter()
    {
        // TODO: Implement vorbereiten_abfrage_und_parameter() method.
        $this->abfrage = 'SELECT id FROM sg_user ORDER BY id DESC LIMIT 1';
    }
    protected function ist_token_korrigieren()
    {
        return true;
    }
}