<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of wichtigsten_einfugen
 *
 * @author LC
 */
require_once standart_system_pfad.'server_skript/base/globale_variable.php';
require_once standart_system_pfad.'server_skript/base/Betrieb.php';
require_once standart_system_pfad.'server_skript/base/Bergmann.php';
require_once standart_system_pfad.'server_skript/base/url_kodierer.php';
require_once standart_system_pfad.'server_skript/base/pfad_kodierer.php';
require_once standart_system_pfad.'server_skript/einfugen/daten_fur_einfugen.php';
require_once standart_system_pfad.'server_skript/einfugen/kontrolleur.php';
require_once standart_system_pfad.'server_skript/einfugen/einfugen_wahle_model_koperasi.php';
require_once standart_system_pfad.'server_skript/einfugen/uberprufen_einfugen_vonhanden.php';
class wichtigsten_einfugen extends Betrieb {
    //put your code here
    private $kontrolleur, $ausfuhren;
    public final function __construct($pfad = standard_pfad, $sprache = standard_sprache, $host = NULL, $hafen = NULL, $daten_bank_name = NULL, $benutzername = NULL, $passwort = NULL)
    {
        parent::__construct($pfad, $sprache, $host, $hafen, $daten_bank_name, $benutzername, $passwort);
        $this->kontrolleur = array();
        $this->ausfuhren = array();
    }

    protected function daten_uberprufen() {
        $schlussel = new einfugen_wahle_model_koperasi(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
        $schlussel->ausfuhren();
        $schlussel = $schlussel->erhalten_daten();
        foreach($schlussel as $temp)
        {
            array_push($this->kontrolleur, new kontrolleur(einfugen_schlussel.$temp[0]));
        }

        foreach($this->kontrolleur as $temp)
        {
            array_push($this->ausfuhren, $temp->ausfuhren());
        }

        if(false)
        {
            echo "panjang : ".count($this->ausfuhren)."<br>";
            for($i = 0; $i < count($schlussel); $i++)
            {
                echo $schlussel[$i][1].' : '.$this->ausfuhren[$i].'<br>';
            }
        }
        
        
        foreach ($this->ausfuhren as $temp)
        {
            if($temp === true)
            {
                return true;
            }
        }
        return false;
    }

    protected function erfolg_ausfuhren() {
        $url = new url_kodierer();
        $url->hinzufugen(bestellung);
        $url->hinzufugen(bestellung_anzaigen_einfugen);
        hinzufugen_url_sprache($url);
        $xml = simplexml_load_file(xml_lader(zeichenfolge));
        umleitung_mit_nachricht($url->erhalten(), htmlentities($xml->einfugen_erfolg));
    }

    protected function erganzung(&$zahler) {
    }

    protected function fehler_ausfuhren() {
        $url = new url_kodierer();
        $url->hinzufugen(bestellung);
        $url->hinzufugen(bestellung_anzaigen_einfugen);
        hinzufugen_url_sprache($url);
        $xml = simplexml_load_file(xml_lader(zeichenfolge));
        umleitung_mit_nachricht($url->erhalten(), htmlentities($xml->einfugen_fehler));
    }

    protected function vorbereiten_abfrage_und_parameter() {
        $this->abfrage = array();
        $this->parameter = array();
        $zeiger = 0;
        foreach($this->ausfuhren as $temp)
        {
            if($temp === true)
            {
                $daten = $this->kontrolleur[$zeiger]->an_daten_fur_einfugen();
                $uberprufen = new uberprufen_einfugen_vonhanden();
                $uberprufen->satz_daten($daten->an_array_fur_uberprufen());
                $uberprufen->ausfuhren();
                if($uberprufen->erhalten_daten())
                {
                    array_push($this->abfrage, "UPDATE rekap SET
jumlah_koperasi= ?,
jumlah_koperasi_aktif= ?,
anggota_wanita=?,
anggota_pria=?,
calon_anggota_wanita=?,
calon_anggota_pria=?,
modal_sendiri=?,
modal_pinjaman=?,
modal_penyertaan=?,
aset=?,
simpanan_diterima=?,
pinjaman_diberikan=?,
volume_usaha=?,
shu=?,
yang_memiliki_ijin_usaha=?,
jumlah_yang_telah_rat=?,
sehat=?,
cukup_sehat=?,
kurang_sehat=?,
tidak_sehat=?,
sangat_tidak_sehat=?,
tidak_dapat_dinilai=?,
karyawan_wanita=?,
karyawan_pria=?,
manager_wanita=?,
manager_pria=?
WHERE
tanggal = ? AND
id_propinsi = ? AND
id_kabupaten_kota = ? AND
id_model = ? AND
id_bentuk = ?");
                    array_push($this->parameter, $daten->an_array_fur_update());
                    array_push($this->abfrage, 'INSERT INTO rekap_aksi_rekap VALUES (2, ?, ?, ?, ?, ?, NOW(), ?, CURRENT_USER())');
                    array_push($this->parameter, array($daten->an_array_fur_uberprufen()[0],
                        $daten->an_array_fur_uberprufen()[1],
                        $daten->an_array_fur_uberprufen()[2],
                        $daten->an_array_fur_uberprufen()[3],
                        $daten->an_array_fur_uberprufen()[4],
                        $_SESSION[id_benutzername]));
                }
                else
                {
                    array_push($this->abfrage, "INSERT INTO rekap(tanggal, id_propinsi, id_kabupaten_kota,
id_model, id_bentuk, jumlah_koperasi, jumlah_koperasi_aktif, anggota_wanita, anggota_pria,
calon_anggota_wanita, calon_anggota_pria, modal_sendiri, modal_pinjaman, modal_penyertaan,
aset, simpanan_diterima, pinjaman_diberikan, volume_usaha, shu, yang_memiliki_ijin_usaha,
jumlah_yang_telah_rat, sehat, cukup_sehat, kurang_sehat, tidak_sehat, sangat_tidak_sehat,
tidak_dapat_dinilai, karyawan_wanita, karyawan_pria, manager_wanita, manager_pria)
VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)
ON DUPLICATE KEY UPDATE tanggal=VALUES(tanggal), id_propinsi=VALUES(id_propinsi),
id_kabupaten_kota = VALUES(id_kabupaten_kota), id_model = VALUES(id_model),
id_bentuk = VALUES(id_bentuk), jumlah_koperasi = VALUES(jumlah_koperasi),
jumlah_koperasi_aktif = VALUES(jumlah_koperasi_aktif),
anggota_wanita = VALUES(anggota_wanita), anggota_pria = VALUES(anggota_pria),
calon_anggota_wanita = VALUES(calon_anggota_wanita),
calon_anggota_pria = VALUES(calon_anggota_pria), modal_sendiri = VALUES(modal_sendiri),
modal_pinjaman = VALUES(modal_pinjaman), modal_penyertaan = VALUES(modal_penyertaan),
aset = VALUES(aset), simpanan_diterima = VALUES(simpanan_diterima),
pinjaman_diberikan = VALUES(pinjaman_diberikan), volume_usaha = VALUES(volume_usaha),
shu = VALUES(shu), yang_memiliki_ijin_usaha = VALUES(yang_memiliki_ijin_usaha),
sehat = VALUES(sehat),cukup_sehat = VALUES(cukup_sehat), kurang_sehat = VALUES(kurang_sehat),
tidak_sehat = VALUES(tidak_sehat), sangat_tidak_sehat = VALUES(sangat_tidak_sehat),
tidak_dapat_dinilai = VALUES(tidak_dapat_dinilai), karyawan_wanita = VALUES(karyawan_wanita),
karyawan_pria = VALUES(karyawan_pria), manager_wanita = VALUES(manager_wanita),
manager_pria = VALUES(manager_pria)");
                    array_push($this->parameter, $daten->an_array());
                    array_push($this->abfrage, 'INSERT INTO rekap_aksi_rekap VALUES (1, ?, ?, ?, ?, ?, NOW(), ?, CURRENT_USER())');
                    array_push($this->parameter, array($daten->an_array_fur_uberprufen()[0],
                        $daten->an_array_fur_uberprufen()[1],
                        $daten->an_array_fur_uberprufen()[2],
                        $daten->an_array_fur_uberprufen()[3],
                        $daten->an_array_fur_uberprufen()[4],
                        $_SESSION[id_benutzername]));
                }
            }
            $zeiger++;
        }
    }
}