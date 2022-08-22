<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 31/12/2015
 * Time: 10:48
 */
class vergleichen_simpanan_diterima_von_jahr_monat_provinz_kabupaten_bentuk_model extends Base_vergleichen_einfugen
{
    protected function vorbereiten_abfrage_und_parameter()
    {
        // TODO: Implement vorbereiten_abfrage_und_parameter() method.
        $this->abfrage = 'SELECT IFNULL(SUM(tblindikatorsimpanan.SimpananAnggota) + SUM(tblindikatorsimpanan.SimpananBukanAnggota), 0) FROM tblkoperasi JOIN tblindikatorsimpanan ON tblkoperasi.IdKoperasi = tblindikatorsimpanan.IdKoperasi AND tblindikatorsimpanan.Tahun = ? WHERE IdPropinsi = ? and IdKabupaten = ? AND IdModelKoperasi = ? AND IdBentukKoperasi = ?';
        $this->parameter = array(filter_input(INPUT_GET, einfugen_jahr), filter_input(INPUT_GET, einfugen_provinz), filter_input(INPUT_GET, einfugen_kabupaten), filter_input(INPUT_GET, einfugen_aktive_model), filter_input(INPUT_GET, einfugen_bentuk));
    }
}