<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of kontrolleur
 *
 * @author LC
 */
include_once standart_system_pfad.'server_skript/base/universal_methode.php';
class kontrolleur {
    //put your code here
    private $schlussel;
    public final function __construct($schulussel) {
        $this->schlussel = $schulussel;
    }
    public final function satz_schlussel($schulussel)
    {
        $this->schlussel = $schulussel;
    }
    public final function ausfuhren()
    {
    	if(!isset($this->schlussel))
    	{
    		throw new Exception('schulussel muss ausgefullt werden');
    	}
    	if(false)
    	{
        echo "key : ".$this->schlussel.'<br>';
        echo "bln :".$_POST[einfugen_monat]."<br>";
              echo  "tahun : ".$_POST[einfugen_jahr]."<br>";
            echo    "propinsi : ".$_POST[einfugen_provinz]."<br>";
          echo      "kabupaten : ".$_POST[einfugen_kabupaten]."<br>";
          echo      "bentuk : ".$_POST[einfugen_bentuk]."<br>";
         echo       $this->schlussel.jumlah_koperasi."_jumlah_koperasi : ".$_POST[$this->schlussel.jumlah_koperasi]."<br>";
         echo       "_jumlah_koperasi_aktif ".$_POST[$this->schlussel.jumlah_koperasi_aktif]."<br>";
          echo      "_jumlah_anggota_pria ".$_POST[$this->schlussel.jumlah_anggota_pria]."<br>";
              echo  "_jumlah_anggota_wanita ".$_POST[$this->schlussel.jumlah_anggota_wanita]."<br>";
              echo  "_jumlah_calon_anggota_wanita ".$_POST[$this->schlussel.jumlah_calon_anggota_wanita]."<br>";
              echo  "_jumlah_calon_anggota_pria ".$_POST[$this->schlussel.jumlah_calon_anggota_pria]."<br>";
              echo  "_modal_sendiri ".$_POST[$this->schlussel.modal_sendiri]."<br>";
              echo  "_modal_pinjaman pinjaman : ".$_POST[$this->schlussel.modal_pinjaman]."<br>";
              echo  "_modal_penyertaan : ".$_POST[$this->schlussel.modal_penyertaan]."<br>";
              echo  "_aset : ".$_POST[$this->schlussel.asset]."<br>";
              echo  "_simpanan_diterima ".$_POST[$this->schlussel.simpanan_diterima]."<br>";
              echo  "_pinjaman_diberikan ".$_POST[$this->schlussel.pinjaman_diberikan]."<br>";
              echo  "_volume_usaha ".$_POST[$this->schlussel.volume_usaha]."<br>";
              echo  "_shu ".$_POST[$this->schlussel.shu]."<br>";
              echo  "_yang_memiliki_ijin_usaha ".$_POST[$this->schlussel.yang_memiliki_ijin_usaha]."<br>";
              echo  "_jumlah_yang_telah_rat ".$_POST[$this->schlussel.jumlah_yg_telah_rat]."<br>";
              echo  "_sehat ".$_POST[$this->schlussel.sehat]."<br>";
                echo "_cukup_sehat ".$_POST[$this->schlussel.cukup_sehat]."<br>";
                echo "_kurang_sehat ".$_POST[$this->schlussel.kurang_sehat]."<br>";
                echo "_tidak_sehat ".$_POST[$this->schlussel.tidak_sehat]."<br>";
                echo "_sangat_tidak_sehat ".$_POST[$this->schlussel.sangat_tidak_sehat]."<br>";
                echo "_tidak_dapat_dinilai ".$_POST[$this->schlussel.tidak_dapat_dinilai]."<br>";
                echo "_jumlah_karyawan_wanita ".$_POST[$this->schlussel.jumlah_karyawan_wanita]."<br>";
                echo "_jumlah_karyawan_pria ".$_POST[$this->schlussel.jumlah_karyawan_pria]."<br>";
                echo "_jumlah_manager_pria ".$_POST[$this->schlussel.jumlah_manager_wanita]."<br>";
                echo "manajer wanita : ".$_POST[$this->schlussel.jumlah_manager_pria]."<br>";
                echo 'end<br><br><br>'; }
        if(!ist_leer_ermoglichen_null(
                $_POST[einfugen_monat],
              $_POST[einfugen_jahr],
            $_POST[einfugen_provinz],
          $_POST[einfugen_kabupaten],
          $_POST[einfugen_bentuk],
        $_POST[$this->schlussel.einfugen_model],
         $_POST[$this->schlussel.jumlah_koperasi],
         $_POST[$this->schlussel.jumlah_koperasi_aktif],
          $_POST[$this->schlussel.jumlah_anggota_pria],
              $_POST[$this->schlussel.jumlah_anggota_wanita],
              $_POST[$this->schlussel.jumlah_calon_anggota_wanita],
              $_POST[$this->schlussel.jumlah_calon_anggota_pria],
              $_POST[$this->schlussel.modal_sendiri],
              $_POST[$this->schlussel.modal_pinjaman],
              $_POST[$this->schlussel.modal_penyertaan],
              $_POST[$this->schlussel.asset],
                $_POST[$this->schlussel.simpanan_diterima],
                $_POST[$this->schlussel.pinjaman_diberikan],
                $_POST[$this->schlussel.volume_usaha],
                $_POST[$this->schlussel.shu],
                $_POST[$this->schlussel.yang_memiliki_ijin_usaha],
              $_POST[$this->schlussel.jumlah_yg_telah_rat],
              $_POST[$this->schlussel.sehat],
                $_POST[$this->schlussel.cukup_sehat],
                $_POST[$this->schlussel.kurang_sehat],
                $_POST[$this->schlussel.tidak_sehat],
                $_POST[$this->schlussel.sangat_tidak_sehat],
                $_POST[$this->schlussel.tidak_dapat_dinilai],
                $_POST[$this->schlussel.jumlah_karyawan_wanita],
                $_POST[$this->schlussel.jumlah_karyawan_pria],
                $_POST[$this->schlussel.jumlah_manager_wanita],
                $_POST[$this->schlussel.jumlah_manager_pria]
                ))
        {
        	//echo $this->schlussel.' : true<br>';
            return true;
        }
        //echo $this->schlussel.' : false<br>';
        return false;
    }
    public function an_daten_fur_einfugen()
    {
        return new daten_fur_einfugen(
            $_POST[einfugen_jahr].'-'.$_POST[einfugen_monat].'-00',
            $_POST[einfugen_provinz],
            $_POST[einfugen_kabupaten],
            $_POST[einfugen_bentuk],
            $_POST[$this->schlussel.einfugen_model],
            $_POST[$this->schlussel.jumlah_koperasi],
         $_POST[$this->schlussel.jumlah_koperasi_aktif],
          $_POST[$this->schlussel.jumlah_anggota_pria],
              $_POST[$this->schlussel.jumlah_anggota_wanita],
              $_POST[$this->schlussel.jumlah_calon_anggota_wanita],
              $_POST[$this->schlussel.jumlah_calon_anggota_pria],
              $_POST[$this->schlussel.modal_sendiri],
              $_POST[$this->schlussel.modal_pinjaman],
              $_POST[$this->schlussel.modal_penyertaan],
              $_POST[$this->schlussel.asset],
                $_POST[$this->schlussel.simpanan_diterima],
                $_POST[$this->schlussel.pinjaman_diberikan],
                $_POST[$this->schlussel.volume_usaha],
                $_POST[$this->schlussel.shu],
                $_POST[$this->schlussel.yang_memiliki_ijin_usaha],
              $_POST[$this->schlussel.jumlah_yg_telah_rat],
              $_POST[$this->schlussel.sehat],
                $_POST[$this->schlussel.cukup_sehat],
                $_POST[$this->schlussel.kurang_sehat],
                $_POST[$this->schlussel.tidak_sehat],
                $_POST[$this->schlussel.sangat_tidak_sehat],
                $_POST[$this->schlussel.tidak_dapat_dinilai],
                $_POST[$this->schlussel.jumlah_karyawan_wanita],
                $_POST[$this->schlussel.jumlah_karyawan_pria],
                $_POST[$this->schlussel.jumlah_manager_wanita],
                $_POST[$this->schlussel.jumlah_manager_pria]
                );
    }
}
