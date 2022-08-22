<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of wahle_insgesamt_koperasi_von_model
 *
 * @author LC
 */
include '../../base/Bergmann.php';
include '../../base/globale_variable.php';
class wahle_insgesamt_koperasi_von_model extends Bergmann {
    protected function daten_leere() {
    }

    protected function daten_uberprufen() {
    	return true;
    }

    protected function vorbereiten_abfrage_und_parameter() {
        $this->abfrage = "SELECT tbllistmodelkoperasi.IdModelKoperasi, tbllistmodelkoperasi.ModelKoperasi,
        		(SELECT COUNT(IdKoperasi) FROM tblkoperasi WHERE tblkoperasi.IdModelKoperasi = tbllistmodelkoperasi.IdModelKoperasi) 
        		as jumlah FROM tbllistmodelkoperasi";
    }

    public function erhalten_daten() {
    	$json = array();
    	foreach ($this->ergebnis as $temp)
    	{
    		$temp1 = array();
    		$temp1["IdModel"] = $temp[0];
    		$temp1["Model"] = $temp[1];
    		$temp1["jumlah"] = $temp[2];
    		array_push($json, $temp1);
    	}
    	echo json_encode($json);
    }
    protected function ist_token_korrigieren() {
        return true;
    }

//put your code here
}
$ausfuhren = new wahle_insgesamt_koperasi_von_model(kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort, "../../xml/id/");
$ausfuhren->ausfuhren();