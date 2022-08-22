<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of wahle_insgesamt_koperasi_von_bentuk
 *
 * @author LC
 */
class wahle_insgesamt_koperasi_von_bentuk extends Bergmann {
    protected function daten_leere() {
        
    }

    protected function daten_uberprufen() {
        
    }

    protected function vorbereiten_abfrage_und_parameter() {
        $this->abfrage = "SELECT 
tbllistbentukkoperasi.IdBentukKoperasi,
tbllistbentukkoperasi.BentukKoperasi,
(SELECT COUNT(IdKoperasi) FROM tblkoperasi WHERE tblkoperasi.IdBentukKoperasi = tbllistbentukkoperasi.IdBentukKoperasi) as jumlah
FROM tbllistbentukkoperasi;";
    }

    public function erhalten_daten() {
        
    }
    protected function ist_token_korrigieren() {
        return true;
    }

//put your code here
}
