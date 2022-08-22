<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 29/12/2015
 * Time: 19:46
 */
class vergleichen_sehat_von_jahr_monat_provinz_kabupaten_bentuk_model extends Base_vergleichen_einfugen
{
    protected function vorbereiten_abfrage_und_parameter()
    {
        // TODO: Implement vorbereiten_abfrage_und_parameter() method.
        $this->abfrage = 'SELECT COUNT(tblindikatorpemeringkatan.IdKoperasi) FROM tblkoperasi JOIN tblindikatorpemeringkatan ON tblkoperasi.IdKoperasi = tblindikatorpemeringkatan.IdKoperasi AND Tahun = ? WHERE IdPropinsi = ? and IdKabupaten = ? AND IdModelKoperasi = ? AND IdBentukKoperasi = ? AND IdKesehatanKoperasi = 1';
        $this->parameter = array(filter_input(INPUT_GET, einfugen_jahr), filter_input(INPUT_GET, einfugen_provinz), filter_input(INPUT_GET, einfugen_kabupaten), filter_input(INPUT_GET, einfugen_aktive_model), filter_input(INPUT_GET, einfugen_bentuk));
    }
}