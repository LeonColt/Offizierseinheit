<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 29/11/2015
 * Time: 16:23
 */
require_once standart_system_pfad.'server_skript/base/sitzung_starter.php';
require_once standart_system_pfad.'server_skript/base/Objekt.php';
require_once standart_system_pfad.'server_skript/base/globale_variable.php';
class sub_tor_diagramme extends Objekt
{
    public final function ausfuhren()
    {
        $schlussel = diagramme_optionen_key;
        switch(filter_input(INPUT_GET, sub_bestellung))
        {
            case $schlussel[0]: $this->bestellung_diagramme_wahle_allen_koperasi_von_datum_propinsi_kabupaten_per_model(); break;
            case $schlussel[1]: $this->bestellung_diagramme_wahle_allen_koperasi_aktif_von_datum_propinsi_kabupaten_per_model(); break;
            case $schlussel[2]: $this->bestellung_diagramme_wahle_allen_anggota_von_datum_provinz_kabupaten_per_model(); break;
            case $schlussel[3]: $this->bestellung_diagramme_wahle_allen_modal_sendiri_von_datum_provinz_kabupaten_per_model(); break;
            case $schlussel[4]: $this->bestellung_diagramme_wahle_allen_modal_pinjaman_von_datum_provinz_kabupaten_per_model(); break;
            case $schlussel[5]: $this->bestellung_diagramme_wahle_allen_modal_penyertaan_von_datum_provinz_kabupaten_per_model(); break;
            case $schlussel[6]: $this->bestellung_diagramme_wahle_allen_aset_von_datum_provinz_kabupaten_per_model(); break;
            case $schlussel[7]: $this->bestellung_diagramme_wahle_allen_simpanan_diterima_von_datum_provinz_kabupaten_per_model(); break;
            case $schlussel[8]: $this->bestellung_diagramme_wahle_allen_pinjaman_diberikan_von_datum_provinz_kabupaten_per_model(); break;
            case $schlussel[9]: $this->bestellung_diagramme_wahle_allen_volume_usaha_von_datum_provinz_kabupaten_per_model(); break;
            case $schlussel[10]: $this->bestellung_diagramme_wahle_allen_shu_von_datum_provinz_kabupaten_per_model(); break;
            case $schlussel[11]: $this->bestellung_diagramme_wahle_allen_memiliki_ijin_usaha_von_datum_provinz_kabupaten_per_model(); break;
            case $schlussel[12]: $this->bestellung_diagramme_wahle_allen_rat_von_datum_provinz_kabupaten_per_model(); break;
            case $schlussel[13]: $this->bestellung_diagramme_wahle_allen_sehat_von_datum_provinz_kabupaten_per_model(); break;
            case $schlussel[14]: $this->bestellung_diagramme_wahle_allen_cukup_sehat_von_datum_provinz_kabupaten_per_model(); break;
            case $schlussel[15]: $this->bestellung_diagramme_wahle_allen_kurang_sehat_von_datum_provinz_kabupaten_per_model(); break;
            case $schlussel[16]: $this->bestellung_diagramme_wahle_allen_tidak_sehat_von_datum_provinz_kabupaten_per_model(); break;
            case $schlussel[17]: $this->bestellung_diagramme_wahle_allen_sangat_tidak_sehat_von_datum_provinz_kabupaten_per_model(); break;
            case $schlussel[18]: $this->bestellung_diagramme_wahle_allen_insgesamt_gesund_von_datum_provinz_kabupaten_per_model(); break;
            case $schlussel[19]: $this->bestellung_diagramme_wahle_allen_belum_dinilai_von_datum_provinz_kabupaten_per_model(); break;
            case bestellung_diagramme_wahle_allen_koperasi_von_propinsi: $this->bestellung_diagramme_wahle_allen_koperasi_von_propinsi(); break;
            case bestellung_diagramme_wahle_allen_koperasi_von_kabupaten: $this->bestellung_diagramme_wahle_allen_koperasi_von_kabupaten(); break;
            case bestellung_diagramme_wahle_allen_insgesamt_koperasi_von_datum_bentuk_provinz_kabupaten: $this->bestellung_diagramme_wahle_allen_insgesamt_koperasi_von_datum_bentuk_provinz_kabupaten(); break;
        }
    }
    private final function bestellung_diagramme_wahle_allen_koperasi_von_datum_propinsi_kabupaten_per_model()
    {
        try {
            require_once standart_system_pfad.'server_skript/wahle/diagramme/chart1/diagramme_wahle_allen_koperasi_von_datum_propinsi_kabupaten_per_model.php';
            $ausfuhren = new diagramme_wahle_allen_koperasi_von_datum_propinsi_kabupaten_per_model(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
            $ausfuhren->ausfuhren();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
    private final function bestellung_diagramme_wahle_allen_koperasi_aktif_von_datum_propinsi_kabupaten_per_model()
    {
        try {
            require_once standart_system_pfad.'server_skript/wahle/diagramme/chart1/diagramme_wahle_allen_koperasi_aktif_von_datum_propinsi_kabupaten_per_model.php';
            $ausfuhren = new diagramme_wahle_allen_koperasi_aktif_von_datum_propinsi_kabupaten_per_model(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
            $ausfuhren->ausfuhren();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
    private final function bestellung_diagramme_wahle_allen_anggota_von_datum_provinz_kabupaten_per_model()
    {
        try {
            require_once standart_system_pfad.'server_skript/wahle/diagramme/chart1/diagramme_wahle_allen_anggota_von_datum_provinz_kabupaten_per_model.php';
            $ausfuhren = new diagramme_wahle_allen_anggota_von_datum_provinz_kabupaten_per_model(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
            $ausfuhren->ausfuhren();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
    private final function bestellung_diagramme_wahle_allen_modal_sendiri_von_datum_provinz_kabupaten_per_model()
    {
        try {
            require_once standart_system_pfad.'server_skript/wahle/diagramme/chart1/diagramme_wahle_allen_modal_sendiri_von_datum_provinz_kabupaten_per_model.php';
            $ausfuhren = new diagramme_wahle_allen_modal_sendiri_von_datum_provinz_kabupaten_per_model(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
            $ausfuhren->ausfuhren();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
    private final function bestellung_diagramme_wahle_allen_modal_pinjaman_von_datum_provinz_kabupaten_per_model()
    {
        try {
            require_once standart_system_pfad.'server_skript/wahle/diagramme/chart1/diagramme_wahle_allen_modal_pinjaman_von_datum_provinz_kabupaten_per_model.php';
            $ausfuhren = new diagramme_wahle_allen_modal_pinjaman_von_datum_provinz_kabupaten_per_model(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
            $ausfuhren->ausfuhren();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
    private final function bestellung_diagramme_wahle_allen_modal_penyertaan_von_datum_provinz_kabupaten_per_model()
    {
        try {
            require_once standart_system_pfad.'server_skript/wahle/diagramme/chart1/diagramme_wahle_allen_modal_penyertaan_von_datum_provinz_kabupaten_per_model.php';
            $ausfuhren = new diagramme_wahle_allen_modal_penyertaan_von_datum_provinz_kabupaten_per_model(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
            $ausfuhren->ausfuhren();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
    private final function bestellung_diagramme_wahle_allen_aset_von_datum_provinz_kabupaten_per_model()
    {
        try {
            require_once standart_system_pfad.'server_skript/wahle/diagramme/chart1/diagramme_wahle_allen_aset_von_datum_provinz_kabupaten_per_model.php';
            $ausfuhren = new diagramme_wahle_allen_aset_von_datum_provinz_kabupaten_per_model(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
            $ausfuhren->ausfuhren();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
    private final function bestellung_diagramme_wahle_allen_simpanan_diterima_von_datum_provinz_kabupaten_per_model()
    {
        try {
            require_once standart_system_pfad.'server_skript/wahle/diagramme/chart1/diagramme_wahle_allen_simpanan_diterima_von_datum_provinz_kabupaten_per_model.php';
            $ausfuhren = new diagramme_wahle_allen_simpanan_diterima_von_datum_provinz_kabupaten_per_model(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
            $ausfuhren->ausfuhren();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
    private final function bestellung_diagramme_wahle_allen_pinjaman_diberikan_von_datum_provinz_kabupaten_per_model()
    {
        try {
            require_once standart_system_pfad.'server_skript/wahle/diagramme/chart1/diagramme_wahle_allen_pinjaman_diberikan_von_datum_provinz_kabupaten_per_model.php';
            $ausfuhren = new diagramme_wahle_allen_pinjaman_diberikan_von_datum_provinz_kabupaten_per_model(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
            $ausfuhren->ausfuhren();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
    private final function bestellung_diagramme_wahle_allen_volume_usaha_von_datum_provinz_kabupaten_per_model()
    {
        try {
            require_once standart_system_pfad.'server_skript/wahle/diagramme/chart1/diagramme_wahle_allen_volume_usaha_von_datum_provinz_kabupaten_per_model.php';
            $ausfuhren = new diagramme_wahle_allen_volume_usaha_von_datum_provinz_kabupaten_per_model(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
            $ausfuhren->ausfuhren();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
    private final function bestellung_diagramme_wahle_allen_shu_von_datum_provinz_kabupaten_per_model()
    {
        try {
            require_once standart_system_pfad.'server_skript/wahle/diagramme/chart1/diagramme_wahle_allen_shu_von_datum_provinz_kabupaten_per_model.php';
            $ausfuhren = new diagramme_wahle_allen_shu_von_datum_provinz_kabupaten_per_model(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
            $ausfuhren->ausfuhren();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
    private final function bestellung_diagramme_wahle_allen_memiliki_ijin_usaha_von_datum_provinz_kabupaten_per_model()
    {
        try {
            require_once standart_system_pfad.'server_skript/wahle/diagramme/chart1/diagramme_wahle_allen_memiliki_ijin_usaha_von_datum_provinz_kabupaten_per_model.php';
            $ausfuhren = new diagramme_wahle_allen_memiliki_ijin_usaha_von_datum_provinz_kabupaten_per_model(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
            $ausfuhren->ausfuhren();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
    private final function bestellung_diagramme_wahle_allen_rat_von_datum_provinz_kabupaten_per_model()
    {
        try {
            require_once standart_system_pfad.'server_skript/wahle/diagramme/chart1/diagramme_wahle_allen_rat_von_datum_provinz_kabupaten_per_model.php';
            $ausfuhren = new diagramme_wahle_allen_rat_von_datum_provinz_kabupaten_per_model(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
            $ausfuhren->ausfuhren();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
    private final function bestellung_diagramme_wahle_allen_sehat_von_datum_provinz_kabupaten_per_model()
    {
        try {
            require_once standart_system_pfad.'server_skript/wahle/diagramme/chart1/diagramme_wahle_allen_sehat_von_datum_provinz_kabupaten_per_model.php';
            $ausfuhren = new diagramme_wahle_allen_sehat_von_datum_provinz_kabupaten_per_model(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
            $ausfuhren->ausfuhren();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
    private final function bestellung_diagramme_wahle_allen_cukup_sehat_von_datum_provinz_kabupaten_per_model()
    {
        try {
            require_once standart_system_pfad.'server_skript/wahle/diagramme/chart1/diagramme_wahle_allen_cukup_sehat_von_datum_provinz_kabupaten_per_model.php';
            $ausfuhren = new diagramme_wahle_allen_cukup_sehat_von_datum_provinz_kabupaten_per_model(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
            $ausfuhren->ausfuhren();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
    private final function bestellung_diagramme_wahle_allen_kurang_sehat_von_datum_provinz_kabupaten_per_model()
    {
        try {
            require_once standart_system_pfad.'server_skript/wahle/diagramme/chart1/diagramme_wahle_allen_kurang_sehat_von_datum_provinz_kabupaten_per_model.php';
            $ausfuhren = new diagramme_wahle_allen_kurang_sehat_von_datum_provinz_kabupaten_per_model(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
            $ausfuhren->ausfuhren();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
    private final function bestellung_diagramme_wahle_allen_tidak_sehat_von_datum_provinz_kabupaten_per_model()
    {
        try {
            require_once standart_system_pfad.'server_skript/wahle/diagramme/chart1/diagramme_wahle_allen_tidak_sehat_von_datum_provinz_kabupaten_per_model.php';
            $ausfuhren = new diagramme_wahle_allen_tidak_sehat_von_datum_provinz_kabupaten_per_model(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
            $ausfuhren->ausfuhren();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
    private final function bestellung_diagramme_wahle_allen_sangat_tidak_sehat_von_datum_provinz_kabupaten_per_model()
    {
        try {
            require_once standart_system_pfad.'server_skript/wahle/diagramme/chart1/diagramme_wahle_allen_sangat_tidak_sehat_von_datum_provinz_kabupaten_per_model.php';
            $ausfuhren = new diagramme_wahle_allen_sangat_tidak_sehat_von_datum_provinz_kabupaten_per_model(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
            $ausfuhren->ausfuhren();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
    private final function bestellung_diagramme_wahle_allen_insgesamt_gesund_von_datum_provinz_kabupaten_per_model()
    {
        try {
            require_once standart_system_pfad.'server_skript/wahle/diagramme/chart1/diagramme_wahle_allen_insgesamt_gesund_von_datum_provinz_kabupaten_per_model.php';
            $ausfuhren = new diagramme_wahle_allen_insgesamt_gesund_von_datum_provinz_kabupaten_per_model(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
            $ausfuhren->ausfuhren();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
    private final function bestellung_diagramme_wahle_allen_belum_dinilai_von_datum_provinz_kabupaten_per_model()
    {
        try {
            require_once standart_system_pfad.'server_skript/wahle/diagramme/chart1/diagramme_wahle_allen_belum_dinilai_von_datum_provinz_kabupaten_per_model.php';
            $ausfuhren = new diagramme_wahle_allen_belum_dinilai_von_datum_provinz_kabupaten_per_model(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
            $ausfuhren->ausfuhren();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
    private final function bestellung_diagramme_wahle_allen_koperasi_von_propinsi()
    {
        require_once standart_system_pfad.'server_skript/wahle/diagramme/chart2/diagramme_wahle_allen_koperasi_von_propinsi.php';
        $ausfuhren = new diagramme_wahle_allen_koperasi_von_propinsi();
        $ausfuhren->ausfuhren();
    }
    private final function bestellung_diagramme_wahle_allen_koperasi_von_kabupaten()
    {
        require_once standart_system_pfad.'server_skript/wahle/diagramme/chart3/diagramme_wahle_allen_koperasi_von_kabupaten.php';
        $ausfuhren = new diagramme_wahle_allen_koperasi_von_kabupaten();
        $ausfuhren->ausfuhren();
    }
    private final function bestellung_diagramme_wahle_allen_insgesamt_koperasi_von_datum_bentuk_provinz_kabupaten()
    {
        try {
            require_once standart_system_pfad.'server_skript/wahle/diagramme/chart4/wahle_allen_insgesamt_koperasi_von_datum_bentuk_provinz_kabupaten.php';
            $ausfuhren = new wahle_allen_insgesamt_koperasi_von_datum_bentuk_provinz_kabupaten(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
            $ausfuhren->ausfuhren();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
}