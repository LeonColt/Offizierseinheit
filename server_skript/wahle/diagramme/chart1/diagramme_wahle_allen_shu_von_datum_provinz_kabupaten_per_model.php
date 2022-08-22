<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 02/12/2015
 * Time: 17:21
 */
class diagramme_wahle_allen_shu_von_datum_provinz_kabupaten_per_model extends Base_diagramme_1_und_4
{

    protected function satz_diagramme_typ()
    {
        // TODO: Implement satz_diagramme_typ() method.
        $this->diagramme_typ = diagramme1;
    }

    protected function daten_leere()
    {
        // TODO: Implement daten_leere() method.
    }

    protected function vorbereiten_abfrage_und_parameter()
    {
        // TODO: Implement vorbereiten_abfrage_und_parameter() method.
        $this->abfrage = 'SELECT
tbllistmodelkoperasi.IdModelKoperasi as id,
tbllistmodelkoperasi.ModelKoperasi as model,
tbllistmodelkoperasi.ShortName,
IFNULL((SELECT SUM(shu) FROM '.daten_bank_name.'.rekap WHERE tanggal = ? AND id_propinsi = ? AND id_kabupaten_kota = ? AND id_model = id),0) AS total_satgas,
IFNULL((SELECT SUM(tblindikatorusahadetail.SisaHasilUsaha) FROM tblkoperasi JOIN tblindikatorusahadetail ON tblkoperasi.IdKoperasi = tblindikatorusahadetail.IdKoperasi AND tblindikatorusahadetail.Tahun = ? WHERE IdPropinsi = ? and IdKabupaten = ? AND IdModelKoperasi = id),0) AS total_data_individual
FROM tbllistmodelkoperasi';
        $temp = array(filter_input(INPUT_GET, diagramme_jahr), filter_input(INPUT_GET, diagramme_monat), '00');
        $temp = implode('-', $temp);
        $this->parameter = array($temp, filter_input(INPUT_GET, diagramme_parameter_propinsi), filter_input(INPUT_GET, diagramme_parameter_kabupaten),
            filter_input(INPUT_GET, diagramme_jahr), filter_input(INPUT_GET, diagramme_parameter_propinsi), filter_input(INPUT_GET, diagramme_parameter_kabupaten));
    }
}