<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 31/12/2015
 * Time: 11:08
 */
class vergleichen_pinjaman_diberikan_von_jahr_monat_provinz_kabupaten_bentuk_model extends Base_vergleichen_einfugen
{
    protected function vorbereiten_abfrage_und_parameter()
    {
        // TODO: Implement vorbereiten_abfrage_und_parameter() method.
        $this->abfrage = 'SELECT IFNULL( SUM(tblindikatorpinjaman.PinjamanLancar) + SUM(tblindikatorpinjaman.PinjamanKurangLancar) + SUM(tblindikatorpinjaman.PinjamanDiragukan) + SUM(tblindikatorpinjaman.PinjamanMacet), 0) FROM tblkoperasi JOIN tblindikatorpinjaman ON tblkoperasi.IdKoperasi = tblindikatorpinjaman.IdKoperasi AND tblindikatorpinjaman.Tahun = ? WHERE IdPropinsi = ? and IdKabupaten = ? AND IdModelKoperasi = ? AND IdBentukKoperasi = ?';
        $this->parameter = array(filter_input(INPUT_GET, einfugen_jahr), filter_input(INPUT_GET, einfugen_provinz), filter_input(INPUT_GET, einfugen_kabupaten), filter_input(INPUT_GET, einfugen_aktive_model), filter_input(INPUT_GET, einfugen_bentuk));
    }
}