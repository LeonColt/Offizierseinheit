<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 02/12/2015
 * Time: 14:41
 */
class einfugen_wahle_model_koperasi extends Bergmann
{

    protected function daten_leere() {
    }

    protected function daten_uberprufen() {
        return true;
    }

    protected function vorbereiten_abfrage_und_parameter() {
        $this->abfrage = "SELECT * FROM tbllistmodelkoperasi";
    }

    public function erhalten_daten() {
        return $this->ergebnis;
    }

    protected function ist_token_korrigieren()
    {
        return true;
    }
}