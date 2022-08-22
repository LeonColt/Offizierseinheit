<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of diagramme_wahle_allen_propinsi
 *
 * @author LC
 */
require_once standart_system_pfad.'server_skript/daten_bank_json/Bergmann_json.php';
class diagramme_wahle_allen_koperasi_von_propinsi extends Bergmann_json {
    protected function daten_leere() {
    }

    protected function daten_uberprufen() {
        if(!$this->ist_null(filter_input(INPUT_GET, diagramme_jahr), filter_input(INPUT_GET, diagramme_monat)))
        {
            return true;
        }
        return false;
    }

    protected function vorbereiten_abfrage_und_parameter() {
        $this->abfrage = 'SELECT DISTINCT
'.kspo_daten_bank_name.'.tblpropinsi.IdPropinsi, 
'.kspo_daten_bank_name.'.tblpropinsi.Propinsi, 
CASE 
WHEN
(SELECT SUM(jumlah_koperasi) FROM rekap WHERE id_propinsi = '.kspo_daten_bank_name.'.tblpropinsi.IdPropinsi AND tanggal = ? ) > 0 THEN 
(SELECT SUM(jumlah_koperasi) FROM rekap WHERE id_propinsi = '.kspo_daten_bank_name.'.tblpropinsi.IdPropinsi AND tanggal = ?)
ELSE 0 END AS satgas,
CASE WHEN (SELECT COUNT(*) FROM '.kspo_daten_bank_name.'.tblkoperasi WHERE IdPropinsi = '.kspo_daten_bank_name.'.tblpropinsi.IdPropinsi AND '.kspo_daten_bank_name.'.tblkoperasi.CreatedDate <= ?) > 0 THEN 
(SELECT COUNT(*) FROM '.kspo_daten_bank_name.'.tblkoperasi WHERE IdPropinsi = '.kspo_daten_bank_name.'.tblpropinsi.IdPropinsi AND '.kspo_daten_bank_name.'.tblkoperasi.CreatedDate <= ?)
ELSE 0 END AS data_individual
FROM rekap RIGHT JOIN '.kspo_daten_bank_name.'.tblpropinsi ON id_propinsi = 
'.kspo_daten_bank_name.'.tblpropinsi.IdPropinsi ORDER BY '.kspo_daten_bank_name.'.tblpropinsi.IdPropinsi';
        $temp = array(filter_input(INPUT_GET, diagramme_jahr), filter_input(INPUT_GET, diagramme_monat),"00");
        $this->parameter = array(implode("-", $temp), implode("-", $temp), implode("-", $temp), implode("-", $temp));
    }

    public function erhalten_daten() {
        $temp_json = array();
        foreach ($this->ergebnis as $temp)
        {
            $propinsi = array();
            $propinsi["id_propinsi"] = $temp["IdPropinsi"];
            $propinsi["propinsi"] = $temp["Propinsi"];
            $propinsi["satgas"] = $temp["satgas"];
            $propinsi["data_individual"] = $temp["data_individual"];
            array_push($temp_json, $propinsi);
        }
        $this->json->hinzufugen("propinsi", $temp_json);
    }
    public function ist_token_korrigieren() {
        return true;
    }

//put your code here
}
