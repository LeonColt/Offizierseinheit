<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of wahle_allen_kabupaten_kota
 *
 * @author LC
 */
if(!defined("sitzung_name"))
{
    exit("Methode nicht zulässig");
}
require_once standart_system_pfad.'server_skript/base/Bergmann.php';
class wahle_allen_kabupaten_kota extends Bergmann{
    private $id_provinz;
    public function satz_id_provinz($id_provinz)
    {
        $this->id_provinz = $id_provinz;
    }
    protected function daten_leere() {
        
    }

    protected function daten_uberprufen() {
        if(isset($this->id_provinz) && !empty($this->id_provinz))
        {
            return true;
        }
        return false;
    }

    protected function vorbereiten_abfrage_und_parameter() {
        $this->abfrage = 'SELECT * FROM tblkabupaten WHERE idPropinsi = ?';
        $this->parameter = array($this->id_provinz);
    }

    public function erhalten_daten() {
        return $this->ergebnis;
    }
    protected function ist_token_korrigieren() {
        return true;
    }

//put your code here
}
