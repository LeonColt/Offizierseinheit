<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 31/12/2015
 * Time: 11:29
 */
class vergleichen_tidak_dapat_dinilai_von_jahr_monat_provinz_kabupaten_bentuk_model extends Base_vergleichen_einfugen
{
    protected function vorbereiten_abfrage_und_parameter()
    {
        // TODO: Implement vorbereiten_abfrage_und_parameter() method.
        $this->abfrage = 'SELECT COUNT(tblindikatorpemeringkatan.IdKoperasi) FROM tblkoperasi JOIN tblindikatorpemeringkatan ON tblkoperasi.IdKoperasi = tblindikatorpemeringkatan.IdKoperasi AND Tahun = ? WHERE IdPropinsi = ? AND IdKabupaten = ? AND IdModelKoperasi = ? AND IdBentukKoperasi = ? AND IdKesehatanKoperasi = 7';
        $this->parameter = array(filter_input(INPUT_GET, einfugen_jahr), filter_input(INPUT_GET, einfugen_provinz), filter_input(INPUT_GET, einfugen_kabupaten), filter_input(INPUT_GET, einfugen_aktive_model), filter_input(INPUT_GET, einfugen_bentuk));
    }
}