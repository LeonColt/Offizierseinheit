<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 31/12/2015
 * Time: 12:02
 */
class vergleichen_yang_memiliki_ijin_usaha_von_jahr_monat_provinz_kabupaten_bentuk_model extends Base_vergleichen_einfugen
{
    protected function vorbereiten_abfrage_und_parameter()
    {
        // TODO: Implement vorbereiten_abfrage_und_parameter() method.
        $this->abfrage = 'SELECT COUNT(IdKoperasi) FROM tblkoperasi WHERE CreatedDate < ? AND IdPropinsi = ? AND IdKabupaten = ? AND IdModelKoperasi = ? AND IdBentukKoperasi = ? AND IzinUsahaSP = 1';
        $temp = array(filter_input(INPUT_GET, einfugen_jahr), filter_input(INPUT_GET, einfugen_monat), '00');
        $temp = implode('-', $temp);
        $this->parameter = array($temp, filter_input(INPUT_GET, einfugen_provinz),
            filter_input(INPUT_GET, einfugen_kabupaten), filter_input(INPUT_GET, einfugen_model),
            filter_input(INPUT_GET, einfugen_bentuk));
    }
}