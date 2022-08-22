<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of wahle_zahlen_koperasi_von_model
 *
 * @author LC
 */
require_once '../base/Bergmann.php';
class wahle_zahlen_koperasi_von_model extends Bergmann {
    protected function daten_leere() {
        echo json_encode(0);
    }

    protected function daten_uberprufen() {
        if(isset($_GET['model']))
        {
            return true;
        }
        return false;
    }

    protected function vorbereiten_abfrage_und_parameter() {
        $this->abfrage = "SELECT COUNT(IdKoperasi) as jumlah FROM tblkoperasi WHERE IdModelKoperasi = ?";
        $this->parameter = array($_GET['model']);
    }

    public function erhalten_daten() {
        $jumlah = array();
        $jumlah["jumlah"] = $this->ergebnis[0]["jumlah"];
        echo json_encode($jumlah);
    }
    protected function ist_token_korrigieren() {
        return true;
    }

//put your code here
}