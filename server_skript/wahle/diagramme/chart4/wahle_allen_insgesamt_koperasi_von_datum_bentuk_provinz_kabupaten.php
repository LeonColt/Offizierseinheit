<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of wahle_allen_insgesamt_koperasi_von_datum_bentuk_provinz_kabupaten
 *
 * @author LC
 */
require_once standart_system_pfad.'server_skript/wahle/diagramme/Base_diagramme_1_und_4.php';
class wahle_allen_insgesamt_koperasi_von_datum_bentuk_provinz_kabupaten extends Base_diagramme_1_und_4 {

    protected function daten_leere() {
        
    }

    protected function daten_uberprufen() {
        if(!$this->ist_null(filter_input(INPUT_GET, diagramme_jahr), filter_input(INPUT_GET, diagramme_monat),
                filter_input(INPUT_GET, diagramme_parameter_propinsi),
            filter_input(INPUT_GET, diagramme_parameter_kabupaten), filter_input(INPUT_GET, diagramme_parameter_bentuk)))
        {
            return true;
        }
        return false;
    }

    protected function vorbereiten_abfrage_und_parameter() {
        $this->abfrage = 'SELECT 
tbllistmodelkoperasi.IdModelKoperasi as id,
tbllistmodelkoperasi.ModelKoperasi as model,
tbllistmodelkoperasi.ShortName,
case when (SELECT SUM(jumlah_koperasi) FROM '.daten_bank_name.'.rekap WHERE tanggal = ? AND id_propinsi = ? AND id_kabupaten_kota = ? AND id_bentuk = ? AND id_model = id) > 0 THEN
(SELECT SUM(jumlah_koperasi) FROM '.daten_bank_name.'.rekap WHERE tanggal = ? AND id_propinsi = ? AND id_kabupaten_kota = ? AND id_bentuk = ? AND id_model = id)
ELSE 0 END AS jumlah_koperasi_satgas,
CASE WHEN (SELECT COUNT(IdKoperasi) FROM tblkoperasi WHERE CreatedDate < ? AND IdPropinsi = ? AND IdKabupaten = ? AND IdBentukKoperasi = ? AND IdModelKoperasi = id) > 0 THEN
(SELECT COUNT(IdKoperasi) FROM tblkoperasi WHERE CreatedDate < ? AND IdPropinsi = ? AND IdKabupaten = ? AND IdBentukKoperasi = ? AND IdModelKoperasi = id)
ELSE 0 END AS jumlah_koperasi_data_individual
FROM tbllistmodelkoperasi';
        $temp = array(filter_input(INPUT_GET, diagramme_jahr), filter_input(INPUT_GET, diagramme_monat), "00");
        $datum = implode('-', $temp);
        $provinz = filter_input(INPUT_GET, diagramme_parameter_propinsi);
        $kabupaten = filter_input(INPUT_GET, diagramme_parameter_kabupaten);
        $bentuk = filter_input(INPUT_GET, diagramme_parameter_bentuk);
        $this->parameter = array($datum, $provinz, $kabupaten, $bentuk, $datum, $provinz, $kabupaten, $bentuk,
            $datum, $provinz, $kabupaten, $bentuk, $datum, $provinz, $bentuk, $provinz);
    }

//put your code here
    protected function satz_diagramme_typ()
    {
        // TODO: Implement satz_diagramme_typ() method.
        $this->diagramme_typ = diagramme4;
    }
}
