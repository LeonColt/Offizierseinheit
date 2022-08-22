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
    //exit("Methode nicht zulässig");
}
require_once standart_system_pfad.'server_skript/base/globale_variable.php';
require_once standart_system_pfad.'server_skript/base/Bergmann.php';
class wahle_allen_kabupaten_kota_json extends Bergmann {
    protected function daten_leere() {
        
    }

    protected function daten_uberprufen() {
        if(filter_input(INPUT_GET, parameter_provinz_bestellung_diagramme_wahle_allen_insgesamt_koperasi_von_datum_bentuk_provinz_kabupaten) !== NULL)
        {
            return true;
        }
        return false;
    }

    protected function vorbereiten_abfrage_und_parameter() {
        $this->abfrage = 'SELECT * FROM tblkabupaten WHERE idPropinsi = ?';
        $this->parameter = array(filter_input(INPUT_GET, parameter_provinz_bestellung_diagramme_wahle_allen_insgesamt_koperasi_von_datum_bentuk_provinz_kabupaten));
    }

    public function erhalten_daten() {
        $kabupatan = array();
        $kabupatan[json_kabupaten] = array();
        foreach ($this->ergebnis as $temp)
        {
            $kab = array();
            $kab[json_id_kabupaten] = $temp["IdKabupaten"];
            $kab[json_name_kabupaten] = $temp["Kabupaten"];
            array_push($kabupatan[json_kabupaten], $kab);
        }
        echo json_encode($kabupatan);
    }
    protected function ist_token_korrigieren() {
        return true;
    }

//put your code here
}
