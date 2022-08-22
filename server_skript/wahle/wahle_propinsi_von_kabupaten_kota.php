<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of wahle_propinsi_von_kabupaten_kota
 *
 * @author LC
 */
if(!defined("sitzung_name"))
{
    exit("Methode nicht zulässig");
}
require_once standart_system_pfad.'server_skript/base/Bergmann.php';
class wahle_propinsi_von_kabupaten_kota extends Bergmann {
    private $id_kabupaten_kota;
    public function satz_id_kabupaten_kota($id_kabupaten_kota)
    {
        $this->id_kabupaten_kota = $id_kabupaten_kota;
    }
    protected function daten_leere() {
        
    }

    protected function daten_uberprufen() {
        if(isset($this->id_kabupaten_kota) && !empty($this->id_kabupaten_kota))
        {
            return true;
        }
        return false;
    }

    protected function vorbereiten_abfrage_und_parameter() {
        $this->abfrage = "SELECT tblpropinsi.IdPropinsi, tblpropinsi.Propinsi FROM tblkabupaten JOIN tblpropinsi ON tblkabupaten.IdPropinsi = tblpropinsi.IdPropinsi WHERE tblkabupaten.IdKabupaten = ?";
        $this->parameter = array($this->id_kabupaten_kota);
    }

    public function erhalten_daten() {
        return $this->ergebnis;
    }
    protected function ist_token_korrigieren() {
        return true;
    }

//put your code here
}
