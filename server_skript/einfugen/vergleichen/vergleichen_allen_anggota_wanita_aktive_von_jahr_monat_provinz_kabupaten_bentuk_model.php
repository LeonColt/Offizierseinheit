<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 30/12/2015
 * Time: 23:27
 */
class vergleichen_allen_anggota_wanita_aktive_von_jahr_monat_provinz_kabupaten_bentuk_model extends Base_vergleichen_einfugen
{
    protected function vorbereiten_abfrage_und_parameter()
    {
        // TODO: Implement vorbereiten_abfrage_und_parameter() method.
        $this->abfrage = 'SELECT IFNULL(SUM(tblindikatorkelembagaan.AnggotaP), 0) FROM tblkoperasi JOIN tblindikatorkelembagaan ON tblkoperasi.IdKoperasi = tblindikatorkelembagaan.IdKoperasi AND tblindikatorkelembagaan.Tahun = ? WHERE IdPropinsi = ? and IdKabupaten = ? AND IdModelKoperasi = ? AND IdBentukKoperasi = ?';
        $this->parameter = array(filter_input(INPUT_GET, einfugen_jahr), filter_input(INPUT_GET, einfugen_provinz), filter_input(INPUT_GET, einfugen_kabupaten), filter_input(INPUT_GET, einfugen_aktive_model), filter_input(INPUT_GET, einfugen_bentuk));
    }
}