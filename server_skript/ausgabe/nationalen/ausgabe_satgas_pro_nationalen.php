<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ausgabe_pro_nasional
 *
 * @author LC
 */
require_once 'server_skript/base/Bergmann.php';
class ausgabe_satgas_pro_nationalen extends Bergmann {
    protected function daten_leere() {
        
    }

    protected function daten_uberprufen() {
        if(!$this->ist_null(filter_input(INPUT_GET, ausgabe_jahr), filter_input(INPUT_GET, ausgabe_monat)))
        {
            return true;
        }
        return true;
    }

    protected function vorbereiten_abfrage_und_parameter() {
        $this->abfrage = 'SELECT 
IdBentukKoperasi,
BentukKoperasi,
IdModelKoperasi,
ModelKoperasi,
jumlah_koperasi,
jumlah_koperasi_aktif,
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

(SELECT DISTINCT
'.kspo_daten_bank_name.'.tbllistbentukkoperasi.IdBentukKoperasi,
'.kspo_daten_bank_name.'.tbllistbentukkoperasi.BentukKoperasi,
'.kspo_daten_bank_name.'.tbllistmodelkoperasi.IdModelKoperasi,
'.kspo_daten_bank_name.'.tbllistmodelkoperasi.ModelKoperasi,
jumlah_koperasi,
jumlah_koperasi_aktif,
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
RIGHT JOIN '.kspo_daten_bank_name.'.tbllistmodelkoperasi 
ON id_model = '.kspo_daten_bank_name.'.tbllistmodelkoperasi.IdModelKoperasi
RIGHT JOIN '.kspo_daten_bank_name.'.tbllistbentukkoperasi 
ON id_bentuk = '.kspo_daten_bank_name.'.tbllistbentukkoperasi.IdBentukKoperasi
WHERE tanggal = ?
ORDER BY '.kspo_daten_bank_name.'.tbllistbentukkoperasi.IdBentukKoperasi,
'.kspo_daten_bank_name.'.tbllistmodelkoperasi.IdModelKoperasi) AS ausgabe_nasional';
        $temp = array(filter_input(INPUT_GET, ausgabe_jahr), filter_input(INPUT_GET, ausgabe_monat), "00");
        $this->parameter = array(implode("-", $temp));
    }

    public function erhalten_daten() {
        return $this->ergebnis;
    }
    
    public function ist_token_korrigieren() {
        return true; 
    }

//put your code here
}
