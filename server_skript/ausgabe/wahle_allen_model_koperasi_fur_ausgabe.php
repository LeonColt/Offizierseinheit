<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of wahle_allen_model_koperasi_fur_ausgabe
 *
 * @author LC
 */
require_once 'server_skript/base/Bergmann.php';
class wahle_allen_model_koperasi_fur_ausgabe extends Bergmann {
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
    
    public function ist_token_korrigieren() {
        return true;
    }

//put your code here
}
