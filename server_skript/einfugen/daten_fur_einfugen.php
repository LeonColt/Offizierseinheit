<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ksp_daten
 *
 * @author LC
 */
class daten_fur_einfugen {
    //put your code here
    private $datum, $propinsi, $kabupaten_kota, $bentuk, $model,
            $koperasi, $koperasi_aktif, $anggota_pria, $anggota_wanita,
            $calon_anggota_wanita, $calon_anggota_pria, $modal_sendiri,
            $modal_pinjaman, $modal_penyertaan, $aset, $simpanan_diterima, 
            $pinjaman_diberikan,
            $volume_usaha, $shu, $yang_memiliki_ijin_usaha, $jumlah_yang_telah_rat,
            $sehat, $cukup_sehat, $kurang_sehat, $tidak_sehat, $sangat_tidak_sehat,
            $tidak_dapat_dinilai, $karyawan_wanita, $karyawan_pria,
            $manager_wanita, $manager_pria;
    function __construct($datum, $propinsi, $kabupaten_kota, $bentuk, $model,
            $koperasi, $koperasi_aktif, $anggota_pria, $anggota_wanita,
            $calon_anggota_wanita, $calon_anggota_pria, $modal_sendiri,
            $modal_pinjaman, $modal_penyertaan, $aset, $simpanan_diterima, $pinjaman_diberikan,
            $volume_usaha, $shu, $yang_memiliki_ijin_usaha, $jumlah_yang_telah_rat,
            $sehat, $cukup_sehat, $kurang_sehat, $tidak_sehat, $sangat_tidak_sehat,
            $tidak_dapat_dinilai, $karyawan_wanita, $karyawan_pria,
            $manager_wanita, $manager_pria) {
        $this->datum = $datum;        
        $this->propinsi = $propinsi;
        $this->kabupaten_kota = $kabupaten_kota;
        $this->bentuk = $bentuk; 
        $this->model = $model; 
        $this->koperasi = $koperasi;
        $this->koperasi_aktif = $koperasi_aktif; $this->anggota_pria = $anggota_pria;
        $this->anggota_wanita = $anggota_wanita; 
        $this->calon_anggota_wanita = $calon_anggota_wanita; 
        $this->calon_anggota_pria = $calon_anggota_pria; $this->modal_sendiri = $modal_sendiri;
        $this->modal_pinjaman = $modal_pinjaman; $this->modal_penyertaan = $modal_penyertaan;
        $this->aset = $aset; $this->simpanan_diterima = $simpanan_diterima;
        $this->pinjaman_diberikan = $pinjaman_diberikan;
        $this->volume_usaha = $volume_usaha;        $this->shu = $shu;
        $this->yang_memiliki_ijin_usaha = $yang_memiliki_ijin_usaha;
        $this->jumlah_yang_telah_rat = $jumlah_yang_telah_rat;
        $this->sehat = $sehat;        $this->cukup_sehat = $cukup_sehat;
        $this->kurang_sehat = $kurang_sehat;        $this->tidak_sehat = $tidak_sehat;
        $this->sangat_tidak_sehat = $sangat_tidak_sehat;
        $this->tidak_dapat_dinilai = $tidak_dapat_dinilai;
        $this->karyawan_wanita = $karyawan_wanita;
        $this->karyawan_pria = $karyawan_pria;
        $this->manager_wanita = $manager_wanita;
        $this->manager_pria = $manager_pria;
        
    }
    public final function erhalten_datum()
    {
        return $this->datum;
    }
    public final function satz_datum($datum)
    {
        $this->datum = $datum;
    }
    public final function erhalten_propinsi()
    {
        return $this->propinsi;
    }
    public final function satz_propinsi($propinsi)
    {
        $this->propinsi = $propinsi;
    }
    public final function erhalten_kabupaten_kota()
    {
        return $this->kabupaten_kota;
    }
    public final function satz_kabupaten_kota($kabupaten_kota)
    {
        $this->kabupaten_kota = $kabupaten_kota;
    }
    public final function erhalten_bentuk()
    {
        return $this->bentuk;
    }
    public final function satz_bentuk($bentuk)
    {
        $this->bentuk = $bentuk;
    }
    public final function erhalten_model()
    {
        return $this->model;
    }
    public final function satz_model($model)
    {
        $this->model = $model;
    }
    public final function erhalten_koperasi()
    {
        return $this->koperasi;
    }
    public final function satz_koperasi($koperasi)
    {
        $this->koperasi = $koperasi;
    }
    public final function erhalten_koperasi_aktif()
    {
        return $this->koperasi_aktif;
    }
    public final function satz_koperasi_aktif($koperasi_aktif)
    {
        $this->koperasi_aktif = $koperasi_aktif;
    }
    public final function erhalten_anggota_pria()
    {
        return $this->anggota_pria;
    }
    public final function satz_anggota_pria($anggota_pria)
    {
        $this->anggota_pria = $anggota_pria;
    }
    public final function erhalten_anggota_wanita()
    {
        return $this->anggota_wanita;
    }
    public final function satz_anggota_wanita($anggota_wanita)
    {
        $this->anggota_wanita = $anggota_wanita;
    }
    public final function erhalten_calon_anggota_wanita()
    {
        return $this->calon_anggota_wanita;
    }
    public final function satz_calon_anggota_wanita($calon_anggota_wanita)
    {
        $this->calon_anggota_wanita = $calon_anggota_wanita;
    }
    public final function erhalten_calon_anggota_pria()
    {
        return $this->calon_anggota_pria;
    }
    public final function satz_calon_anggota_pria($calon_anggota_pria)
    {
        $this->calon_anggota_pria = $calon_anggota_pria;
    }
    public final function erhalten_modal_sendiri()
    {
        return $this->modal_sendiri;
    }
    public final function satz_modal_sendiri($modal_sendiri)
    {
        $this->modal_sendiri = $modal_sendiri;
    }
    public final function erhalten_modal_pinjaman()
    {
        return $this->modal_pinjaman;
    }
    public final function satz_modal_pinjaman($modal_pinjaman)
    {
        $this->modal_pinjaman = $modal_pinjaman;
    }
    public final function erhalten_modal_penyertaan()
    {
        return $this->modal_penyertaan;
    }
    public final function satz_modal_penyertaan($modal_penyertaan)
    {
        $this->modal_penyertaan = $modal_penyertaan;
    }
    public final function erhalten_aset()
    {
        return $this->aset;
    }
    public final function satz_aset($aset)
    {
        $this->aset = $aset;
    }
    public final function erhalten_simpanan_diterima()
    {
        return $this->simpanan_diterima;
    }
    public final function satz_simpanan_diterima($simpanan_diterima)
    {
        $this->simpanan_diterima = $simpanan_diterima;
    }
    public final function erhalten_pinjaman_diberikan()
    {
        return $this->pinjaman_diberikan;
    }
    public final function satz_pinjaman_diberikan($pinjaman_diberikan)
    {
        $this->pinjaman_diberikan = $pinjaman_diberikan;
    }
    public final function erhalten_volume_usaha()
    {
        return $this->volume_usaha;
    }
    public final function satz_volume_usaha($volume_usaha)
    {
        $this->volume_usaha = $volume_usaha;
    }
    public final function erhalten_shu()
    {
        return $this->shu;
    }
    public final function satz_shu($shu)
    {
        $this->shu = $shu;
    }
    public final function erhalten_yang_memiliki_ijin_usaha()
    {
        return $this->yang_memiliki_ijin_usaha;
    }
    public final function satz_yang_memiliki_ijin_usaha($yang_memiliki_ijin_usaha)
    {
        $this->yang_memiliki_ijin_usaha = $yang_memiliki_ijin_usaha;
    }
    public final function erhalten_jumlah_yang_telah_rat()
    {
        return $this->jumlah_yang_telah_rat;
    }
    public final function satz_jumlah_yang_telah_rat($jumlah_yang_telah_rat)
    {
        $this->jumlah_yang_telah_rat = $jumlah_yang_telah_rat;
    }
    public final function erhalten_sehat()
    {
        return $this->sehat;
    }
    public final function satz_sehat($sehat)
    {
        $this->sehat = $sehat;
    }
    public final function erhalten_cukup_sehat()
    {
        return $this->cukup_sehat;
    }
    public final function satz_cukup_sehat($cukup_sehat)
    {
        $this->cukup_sehat = $cukup_sehat;
    }
    public final function erhalten_kurang_sehat()
    {
        return $this->kurang_sehat;
    }
    public final function satz_kurang_sehat($kurang_sehat)
    {
        $this->kurang_sehat = $kurang_sehat;
    }
    public final function erhalten_tidak_sehat()
    {
        return $this->tidak_sehat;
    }
    public final function satz_tidak_sehat($tidak_sehat)
    {
        $this->tidak_sehat = $tidak_sehat;
    }
    public final function erhalten_sangat_tidak_sehat()
    {
        return $this->sangat_tidak_sehat;
    }
    public final function satz_sangat_tidak_sehat($sangat_tidak_sehat)
    {
        $this->sangat_tidak_sehat = $sangat_tidak_sehat;
    }
    public final function erhalten_tidak_dapat_dinilai()
    {
        return $this->tidak_dapat_dinilai;
    }
    public final function satz_tidak_dapat_dinilai($tidak_dapat_dinilai)
    {
        $this->tidak_dapat_dinilai = $tidak_dapat_dinilai;
    }
    public final function erhalten_karyawan_wanita()
    {
        return $this->karyawan_wanita;
    }
    public final function satz_karyawan_wanita($karyawan_wanita)
    {
        $this->karyawan_wanita = $karyawan_wanita;
    }
    public final function erhalten_karyawan_pria()
    {
        return $this->karyawan_pria;
    }
    public final function satz_karyawan_pria($karyawan_pria)
    {
        $this->karyawan_pria = $karyawan_pria;
    }
    public final function erhalten_manager_wanita()
    {
        return $this->manager_wanita;
    }
    public final function satz_manager_wanita($manager_wanita)
    {
        $this->manager_wanita = $manager_wanita;
    }
    public final function erhalten_manager_pria()
    {
        return $this->manager_pria;
    }
    public final function satz_manager_pria($manager_pria)
    {
        $this->manager_pria = $manager_pria;
    }
    public final function ist_eine_leere_und_negative()
    {
        if(!isset($this->datum, $this->kabupaten_kota, $this->bentuk, $this->model,
            $this->koperasi, $this->koperasi_aktif, $this->anggota_pria, $this->anggota_wanita,
            $this->calon_anggota_wanita, $this->calon_anggota_pria, $this->modal_sendiri,
            $this->modal_pinjaman, $this->modal_penyertaan, $this->aset, $this->simpanan_diterima, 
            $this->volume_usaha, $this->shu, $this->yang_memiliki_ijin_usaha, $this->jumlah_yang_telah_rat,
            $this->sehat, $this->cukup_sehat, $this->kurang_sehat, $this->tidak_sehat, $this->sangat_tidak_sehat,
            $this->tidak_dapat_dinilai, $this->karyawan_wanita, $this->karyawan_pria,
            $this->manager_wanita, $this->manager_pria)
                
                || $this->kabupaten_kota < 0 
                || $this->bentuk < 0 
                || $this->model < 0 
                || $this->koperasi < 0 
                || $this->koperasi_aktif < 0 
                || $this->anggota_pria < 0 
                || $this->anggota_wanita < 0 
                || $this->calon_anggota_wanita < 0 
                || $this->calon_anggota_pria < 0 
                || $this->modal_sendiri < 0 
                || $this->modal_pinjaman < 0 
                || $this->modal_penyertaan < 0 
                || $this->aset < 0 
                || $this->simpanan_diterima < 0 
                || $this->volume_usaha < 0 
                || $this->shu < 0 
                || $this->yang_memiliki_ijin_usaha < 0 
                || $this->jumlah_yang_telah_rat < 0 
                || $this->sehat < 0 
                || $this->cukup_sehat < 0 
                || $this->kurang_sehat < 0 
                || $this->tidak_sehat < 0 
                || $this->sangat_tidak_sehat < 0 
                || $this->tidak_dapat_dinilai < 0 
                || $this->karyawan_wanita < 0 
                || $this->karyawan_pria < 0 
                || $this->manager_wanita < 0 
                || $this->manager_pria  < 0
                )
        {
            return true;
        }
        return false;
    }
    private final function komma_entfernen(&$str)
    {
        $temp = "";
    	for($i = 0; $i<strlen($str); $i++)
    	{
    		if($str[$i] !== ',')
    		{
    			$temp = $temp.$str[$i];
    		}
    	}
    	return $temp;
    }
    public final function an_array()
    {
        $temp = array();
        array_push($temp, $this->datum);
        array_push($temp, $this->propinsi);
        array_push($temp, $this->kabupaten_kota);
        array_push($temp, $this->model);
        array_push($temp, $this->bentuk);
        array_push($temp, $this->komma_entfernen($this->koperasi));
        array_push($temp, $this->komma_entfernen($this->koperasi_aktif));
        array_push($temp, $this->komma_entfernen($this->anggota_wanita));
        array_push($temp, $this->komma_entfernen($this->anggota_pria));
        array_push($temp, $this->komma_entfernen($this->calon_anggota_wanita));
        array_push($temp, $this->komma_entfernen($this->calon_anggota_pria));
        array_push($temp, $this->komma_entfernen($this->modal_sendiri));
        array_push($temp, $this->komma_entfernen($this->modal_pinjaman));
        array_push($temp, $this->komma_entfernen($this->modal_penyertaan));
        array_push($temp, $this->komma_entfernen($this->aset));
        array_push($temp, $this->komma_entfernen($this->simpanan_diterima));
        array_push($temp, $this->komma_entfernen($this->pinjaman_diberikan));
        array_push($temp, $this->komma_entfernen($this->volume_usaha));
        array_push($temp, $this->komma_entfernen($this->shu));
        array_push($temp, $this->komma_entfernen($this->yang_memiliki_ijin_usaha));
        array_push($temp, $this->komma_entfernen($this->jumlah_yang_telah_rat));
        array_push($temp, $this->komma_entfernen($this->sehat));
        array_push($temp, $this->komma_entfernen($this->cukup_sehat));
        array_push($temp, $this->komma_entfernen($this->kurang_sehat));
        array_push($temp, $this->komma_entfernen($this->tidak_sehat));
        array_push($temp, $this->komma_entfernen($this->sangat_tidak_sehat));
        array_push($temp, $this->komma_entfernen($this->tidak_dapat_dinilai));
        array_push($temp, $this->komma_entfernen($this->karyawan_wanita));
        array_push($temp, $this->komma_entfernen($this->karyawan_pria));
        array_push($temp, $this->komma_entfernen($this->manager_wanita));
        array_push($temp, $this->komma_entfernen($this->manager_pria));
        return $temp;
    }
    public final function an_array_fur_uberprufen()
    {
        $temp = array();
        array_push($temp, $this->datum);
        array_push($temp, $this->propinsi);
        array_push($temp, $this->kabupaten_kota);
        array_push($temp, $this->model);
        array_push($temp, $this->bentuk);
        return $temp;
    }
    public final function an_array_fur_update()
    {
        $temp = array();
        array_push($temp, $this->komma_entfernen($this->koperasi));
        array_push($temp, $this->komma_entfernen($this->koperasi_aktif));
        array_push($temp, $this->komma_entfernen($this->anggota_wanita));
        array_push($temp, $this->komma_entfernen($this->anggota_pria));
        array_push($temp, $this->komma_entfernen($this->calon_anggota_wanita));
        array_push($temp, $this->komma_entfernen($this->calon_anggota_pria));
        array_push($temp, $this->komma_entfernen($this->modal_sendiri));
        array_push($temp, $this->komma_entfernen($this->modal_pinjaman));
        array_push($temp, $this->komma_entfernen($this->modal_penyertaan));
        array_push($temp, $this->komma_entfernen($this->aset));
        array_push($temp, $this->komma_entfernen($this->simpanan_diterima));
        array_push($temp, $this->komma_entfernen($this->pinjaman_diberikan));
        array_push($temp, $this->komma_entfernen($this->volume_usaha));
        array_push($temp, $this->komma_entfernen($this->shu));
        array_push($temp, $this->komma_entfernen($this->yang_memiliki_ijin_usaha));
        array_push($temp, $this->komma_entfernen($this->jumlah_yang_telah_rat));
        array_push($temp, $this->komma_entfernen($this->sehat));
        array_push($temp, $this->komma_entfernen($this->cukup_sehat));
        array_push($temp, $this->komma_entfernen($this->kurang_sehat));
        array_push($temp, $this->komma_entfernen($this->tidak_sehat));
        array_push($temp, $this->komma_entfernen($this->sangat_tidak_sehat));
        array_push($temp, $this->komma_entfernen($this->tidak_dapat_dinilai));
        array_push($temp, $this->komma_entfernen($this->karyawan_wanita));
        array_push($temp, $this->komma_entfernen($this->karyawan_pria));
        array_push($temp, $this->komma_entfernen($this->manager_wanita));
        array_push($temp, $this->komma_entfernen($this->manager_pria));
        array_push($temp, $this->datum);
        array_push($temp, $this->propinsi);
        array_push($temp, $this->kabupaten_kota);
        array_push($temp, $this->model);
        array_push($temp, $this->bentuk);
        return $temp;
    }
}
