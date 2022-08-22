<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 29/11/2015
 * Time: 11:41
 */
require_once 'server_skript/wahle/diagramme/Base_diagramme_1_und_4.php';
class diagramme_wahle_allen_koperasi_von_datum_propinsi_kabupaten_per_model extends Base_diagramme_1_und_4
{


    protected function daten_leere()
    {
        // TODO: Implement daten_leere() method.
    }

    protected function vorbereiten_abfrage_und_parameter()
    {
        $this->abfrage = 'SELECT
tbllistmodelkoperasi.IdModelKoperasi as id,
tbllistmodelkoperasi.ModelKoperasi as model,
tbllistmodelkoperasi.ShortName,
IFNULL((SELECT SUM(jumlah_koperasi) FROM '.daten_bank_name.'.rekap WHERE tanggal = ? AND id_propinsi = ? AND id_kabupaten_kota = ? AND id_model = id),0) AS total_satgas,
IFNULL((SELECT COUNT(IdKoperasi) FROM tblkoperasi WHERE CreatedDate < ? AND IdPropinsi = ? AND IdKabupaten = ? AND IdModelKoperasi = id),0) AS total_data_individual
FROM tbllistmodelkoperasi';
        $temp = array(filter_input(INPUT_GET, diagramme_jahr), filter_input(INPUT_GET, diagramme_monat), '00');
        $temp = implode('-', $temp);
        $this->parameter = array($temp, filter_input(INPUT_GET, diagramme_parameter_propinsi), filter_input(INPUT_GET, diagramme_parameter_kabupaten),
            $temp, filter_input(INPUT_GET, diagramme_parameter_propinsi), filter_input(INPUT_GET, diagramme_parameter_kabupaten));
    }

    protected function satz_diagramme_typ()
    {
        // TODO: Implement satz_diagramme_typ() method.
        $this->diagramme_typ = diagramme1;
    }
}