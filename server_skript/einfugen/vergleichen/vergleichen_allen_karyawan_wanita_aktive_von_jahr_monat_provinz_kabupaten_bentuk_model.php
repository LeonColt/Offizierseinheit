<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 02/01/2016
 * Time: 11:42
 */
class vergleichen_allen_karyawan_wanita_aktive_von_jahr_monat_provinz_kabupaten_bentuk_model extends Base_vergleichen_einfugen
{
    protected function vorbereiten_abfrage_und_parameter()
    {
        // TODO: Implement vorbereiten_abfrage_und_parameter() method.
        $this->abfrage = 'SELECT IFNULL(SUM(tblindikatorkelembagaan.KaryawanP), 0) FROM tblkoperasi JOIN tblindikatorkelembagaan ON tblkoperasi.IdKoperasi = tblindikatorkelembagaan.IdKoperasi AND tblindikatorkelembagaan.Tahun = ? WHERE IdPropinsi = ? and IdKabupaten = ? AND IdModelKoperasi = ? AND IdBentukKoperasi = ?';
        $this->parameter = array(filter_input(INPUT_GET, einfugen_jahr), filter_input(INPUT_GET, einfugen_provinz), filter_input(INPUT_GET, einfugen_kabupaten), filter_input(INPUT_GET, einfugen_aktive_model), filter_input(INPUT_GET, einfugen_bentuk));
    }
}