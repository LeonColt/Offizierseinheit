<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 05/12/2015
 * Time: 18:56
 */
class ausgabe_satgas_pro_provinz_mit_model extends Bergmann
{

    public function erhalten_daten()
    {
        // TODO: Implement erhalten_daten() method.
        return $this->ergebnis;
    }

    protected function daten_leere()
    {
        // TODO: Implement daten_leere() method.
    }

    protected function daten_uberprufen()
    {
        // TODO: Implement daten_uberprufen() method.
        if(!$this->ist_null(filter_input(INPUT_GET, ausgabe_jahr), filter_input(INPUT_GET, ausgabe_monat), filter_input(INPUT_GET, ausgabe_parameter_model)))
        {
            return true;
        }
        return false;
    }

    protected function vorbereiten_abfrage_und_parameter()
    {
        // TODO: Implement vorbereiten_abfrage_und_parameter() method.
        $this->abfrage = 'SELECT
IdPropinsi,
Propinsi,
IdBentukKoperasi,
BentukKoperasi,
jumlah_koperasi,
jumlah_koperasi_aktif,
anggota_pria,
anggota_wanita,
jumlah_anggota,
modal_sendiri,
modal_pinjaman,
modal_penyertaan,
aset,
simpanan_diterima,
pinjaman_diberikan,
volume_usaha,
shu,
yang_memiliki_ijin_usaha,
jumlah_yang_telah_rat,
sehat,
cukup_sehat,
kurang_sehat,
tidak_sehat,
sangat_tidak_sehat,
jumlah_kesehatan,
(CAST(jumlah_koperasi AS SIGNED)-CAST(jumlah_kesehatan AS SIGNED)) as belum_dinilai
FROM

(SELECT
'.kspo_daten_bank_name.'.tblpropinsi.IdPropinsi,
'.kspo_daten_bank_name.'.tblpropinsi.Propinsi,
'.kspo_daten_bank_name.'.tbllistbentukkoperasi.IdBentukKoperasi,
'.kspo_daten_bank_name.'.tbllistbentukkoperasi.BentukKoperasi,
jumlah_koperasi,
jumlah_koperasi_aktif,
anggota_wanita,
anggota_pria,
anggota_wanita + anggota_pria as jumlah_anggota,
modal_sendiri,
modal_pinjaman,
modal_penyertaan,
aset,
simpanan_diterima,
pinjaman_diberikan,
volume_usaha,
shu,
yang_memiliki_ijin_usaha,
jumlah_yang_telah_rat,
sehat,
cukup_sehat,
kurang_sehat,
tidak_sehat,
sangat_tidak_sehat,
sehat + cukup_sehat + kurang_sehat + tidak_sehat + sangat_tidak_sehat AS jumlah_kesehatan
FROM rekap
RIGHT JOIN '.kspo_daten_bank_name.'.tbllistbentukkoperasi
ON id_bentuk = '.kspo_daten_bank_name.'.tbllistbentukkoperasi.IdBentukKoperasi
RIGHT JOIN '.kspo_daten_bank_name.'.tblpropinsi
ON id_propinsi = '.kspo_daten_bank_name.'.tblpropinsi.IdPropinsi
WHERE tanggal = ? AND id_model = ?
ORDER BY '.kspo_daten_bank_name.'.tblpropinsi.IdPropinsi,
'.kspo_daten_bank_name.'.tbllistbentukkoperasi.IdBentukKoperasi) AS ausgabe_provinz';
        $temp = array(filter_input(INPUT_GET, ausgabe_jahr), filter_input(INPUT_GET, ausgabe_monat), '00');
        $this->parameter = array(implode('-', $temp), filter_input(INPUT_GET, ausgabe_parameter_model));
    }
    public function ist_token_korrigieren() {
        return true;
    }
}