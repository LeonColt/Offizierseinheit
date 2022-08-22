<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 27/12/2015
 * Time: 18:33
 */
require_once standart_system_pfad.'server_skript/base/globale_variable.php';
require_once standart_system_pfad.'server_skript/base/Objekt.php';
require_once standart_system_pfad.'server_skript/einfugen/vergleichen/vergleichen_allen_koperasi_von_jahr_monat_provinz_kabupaten_bentuk_model.php';
require_once standart_system_pfad.'server_skript/einfugen/vergleichen/vergleichen_allen_koperasi_aktive_von_jahr_monat_provinz_kabupaten_bentuk_model.php';
require_once standart_system_pfad.'server_skript/einfugen/vergleichen/vergleichen_allen_anggota_wanita_aktive_von_jahr_monat_provinz_kabupaten_bentuk_model.php';
require_once standart_system_pfad.'server_skript/einfugen/vergleichen/vergleichen_allen_anggota_pria_aktive_von_jahr_monat_provinz_kabupaten_bentuk_model.php';
require_once standart_system_pfad.'server_skript/einfugen/vergleichen/vergleichen_allen_calon_anggota_wanita_aktive_von_jahr_monat_provinz_kabupaten_bentuk_model.php';
require_once standart_system_pfad.'server_skript/einfugen/vergleichen/vergleichen_allen_calon_anggota_pria_aktive_von_jahr_monat_provinz_kabupaten_bentuk_model.php';
require_once standart_system_pfad.'server_skript/einfugen/vergleichen/vergleichen_modal_sendiri_von_jahr_monat_provinz_kabupaten_bentuk_model.php';
require_once standart_system_pfad.'server_skript/einfugen/vergleichen/vergleichen_modal_pinjaman_von_jahr_monat_provinz_kabupaten_bentuk_model.php';
require_once standart_system_pfad.'server_skript/einfugen/vergleichen/vergleichen_aset_von_jahr_monat_provinz_kabupaten_bentuk_model.php';
require_once standart_system_pfad.'server_skript/einfugen/vergleichen/vergleichen_modal_penyertaan_von_jahr_monat_provinz_kabupaten_bentuk_model.php';
require_once standart_system_pfad.'server_skript/einfugen/vergleichen/vergleichen_simpanan_diterima_von_jahr_monat_provinz_kabupaten_bentuk_model.php';
require_once standart_system_pfad.'server_skript/einfugen/vergleichen/vergleichen_pinjaman_diberikan_von_jahr_monat_provinz_kabupaten_bentuk_model.php';
require_once standart_system_pfad.'server_skript/einfugen/vergleichen/vergleichen_volume_usaha_von_jahr_monat_provinz_kabupaten_bentuk_model.php';
require_once standart_system_pfad.'server_skript/einfugen/vergleichen/vergleichen_shu_von_jahr_monat_provinz_kabupaten_bentuk_model.php';
require_once standart_system_pfad.'server_skript/einfugen/vergleichen/vergleichen_yang_memiliki_ijin_usaha_von_jahr_monat_provinz_kabupaten_bentuk_model.php';
require_once standart_system_pfad.'server_skript/einfugen/vergleichen/vergleichen_rat_von_jahr_monat_provinz_kabupaten_bentuk_model.php';
require_once standart_system_pfad.'server_skript/einfugen/vergleichen/vergleichen_sehat_von_jahr_monat_provinz_kabupaten_bentuk_model.php';
require_once standart_system_pfad.'server_skript/einfugen/vergleichen/vergleichen_cukup_sehat_von_jahr_monat_provinz_kabupaten_bentuk_model.php';
require_once standart_system_pfad.'server_skript/einfugen/vergleichen/vergleichen_kurang_sehat_von_jahr_monat_provinz_kabupaten_bentuk_model.php';
require_once standart_system_pfad.'server_skript/einfugen/vergleichen/vergleichen_tidak_sehat_von_jahr_monat_provinz_kabupaten_bentuk_model.php';
require_once standart_system_pfad.'server_skript/einfugen/vergleichen/vergleichen_sangat_tidak_sehat_von_jahr_monat_provinz_kabupaten_bentuk_model.php';
require_once standart_system_pfad.'server_skript/einfugen/vergleichen/vergleichen_tidak_dapat_dinilai_von_jahr_monat_provinz_kabupaten_bentuk_model.php';
require_once standart_system_pfad.'server_skript/einfugen/vergleichen/vergleichen_belum_dinilai_von_jahr_monat_provinz_kabupaten_bentuk_model.php';
require_once standart_system_pfad.'server_skript/einfugen/vergleichen/vergleichen_allen_karyawan_wanita_aktive_von_jahr_monat_provinz_kabupaten_bentuk_model.php';
require_once standart_system_pfad.'server_skript/einfugen/vergleichen/vergleichen_allen_karyawan_pria_aktive_von_jahr_monat_provinz_kabupaten_bentuk_model.php';
require_once standart_system_pfad.'server_skript/einfugen/vergleichen/vergleichen_allen_manajer_wanita_aktive_von_jahr_monat_provinz_kabupaten_bentuk_model.php';
require_once standart_system_pfad.'server_skript/einfugen/vergleichen/vergleichen_allen_manajer_pria_aktive_von_jahr_monat_provinz_kabupaten_bentuk_model.php';
class sub_tor_vergleichen_einfugen extends Objekt
{
    public final function ausfuhren()
    {
        switch(filter_input(INPUT_GET, sub_bestellung))
        {
            case bestellung_vergleichen_einfugen_insgesamt_koperasi: $this->bestellung_vergleichen_einfugen_insgesamt_koperasi(); break;
            case bestellung_vergleichen_einfugen_insgesamt_koperasi_aktive: $this->bestellung_vergleichen_einfugen_insgesamt_koperasi_aktive(); break;
            case bestellung_vergleichen_einfugen_jumlah_anggota_wanita: $this->bestellung_vergleichen_einfugen_jumlah_anggota_wanita(); break;
            case bestellung_vergleichen_einfugen_jumlah_anggota_pria: $this->bestellung_vergleichen_einfugen_jumlah_anggota_pria(); break;
            case bestellung_vergleichen_einfugen_total_jumlah_anggota: break;
            case bestellung_vergleichen_einfugen_jumlah_calon_anggota_wanita: $this->bestellung_vergleichen_einfugen_calon_jumlah_anggota_wanita(); break;
            case bestellung_vergleichen_einfugen_jumlah_calon_anggota_pria: $this->bestellung_vergleichen_einfugen_calon_jumlah_anggota_pria(); break;
            case bestellung_vergleichen_einfugen_total_jumlah_calon_anggota: break;
            case bestellung_vergleichen_einfugen_modal_sendiri: $this->bestellung_vergleichen_einfugen_modal_sendiri(); break;
            case bestellung_vergleichen_einfugen_modal_pinjaman: $this->bestellung_vergleichen_einfugen_modal_pinjaman(); break;
            case bestellung_vergleichen_einfugen_modal_penyertaan: $this->bestellung_vergleichen_einfugen_modal_penyertaan(); break;
            case bestellung_vergleichen_einfugen_asset: $this->bestellung_vergleichen_einfugen_aset(); break;
            case bestellung_vergleichen_einfugen_simpanan_diterima: $this->bestellung_vergleichen_einfugen_simpanan_diterima(); break;
            case bestellung_vergleichen_einfugen_pinjaman_diberikan: $this->bestellung_vergleichen_einfugen_pinjaman_diberikan(); break;
            case bestellung_vergleichen_einfugen_volume_usaha: $this->bestellung_vergleichen_einfugen_volume_usaha(); break;
            case bestellung_vergleichen_einfugen_shu: $this->bestellung_vergleichen_einfugen_shu(); break;
            case bestellung_vergleichen_einfugen_yang_memiliki_ijin_usaha: $this->bestellung_vergleichen_einfugen_yang_memiliki_ijin_usaha(); break;
            case bestellung_vergleichen_einfugen_jumlah_yg_telah_rat: $this->bestellung_vergleichen_einfugen_jumlah_yg_telah_rat(); break;
            case bestellung_vergleichen_einfugen_telah_dinilai_kesehatannya: break;
            case bestellung_vergleichen_einfugen_sehat: $this->bestellung_vergleichen_einfugen_sehat(); break;
            case bestellung_vergleichen_einfugen_cukup_sehat: $this->bestellung_vergleichen_einfugen_cukup_sehat(); break;
            case bestellung_vergleichen_einfugen_kurang_sehat: $this->bestellung_vergleichen_einfugen_kurang_sehat(); break;
            case bestellung_vergleichen_einfugen_tidak_sehat: $this->bestellung_vergleichen_einfugen_tidak_sehat(); break;
            case bestellung_vergleichen_einfugen_sangat_tidak_sehat: $this->bestellung_vergleichen_einfugen_sangat_tidak_sehat(); break;
            case bestellung_vergleichen_einfugen_tidak_dapat_dinilai: $this->bestellung_vergleichen_einfugen_tidak_dapat_dinilai(); break;
            case bestellung_vergleichen_einfugen_belum_dinilai: $this->bestellung_vergleichen_einfugen_belum_dinilai(); break;
            case bestellung_vergleichen_einfugen_jumlah_karyawan_wanita: $this->bestellung_vergleichen_einfugen_karyawan_wanita(); break;
            case bestellung_vergleichen_einfugen_jumlah_karyawan_pria: $this->bestellung_vergleichen_einfugen_karyawan_pria(); break;
            case bestellung_vergleichen_einfugen_total_jumlah_karyawan: break;
            case bestellung_vergleichen_einfugen_jumlah_manager_wanita: $this->bestellung_vergleichen_einfugen_manajer_wanita(); break;
            case bestellung_vergleichen_einfugen_jumlah_manager_pria: $this->bestellung_vergleichen_einfugen_manajer_pria(); break;
            case bestellung_vergleichen_einfugen_total_jumlah_manager: break;
            case bestellung_vergleichen_einfugen_total_jumlah_tenaga_kerja: break;
        }
    }
    private final function bestellung_vergleichen_einfugen_insgesamt_koperasi()
    {
        $ausfuhren = new vergleichen_allen_koperasi_von_jahr_monat_provinz_kabupaten_bentuk_model(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
        $ausfuhren->ausfuhren();
    }
    private final function bestellung_vergleichen_einfugen_insgesamt_koperasi_aktive()
    {
        $ausfuhren = new vergleichen_allen_koperasi_aktive_von_jahr_monat_provinz_kabupaten_bentuk_model(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
        $ausfuhren->ausfuhren();
    }
    private final function bestellung_vergleichen_einfugen_jumlah_anggota_wanita()
    {
        $ausfuhren = new vergleichen_allen_anggota_wanita_aktive_von_jahr_monat_provinz_kabupaten_bentuk_model(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
        $ausfuhren->ausfuhren();
    }
    private final function bestellung_vergleichen_einfugen_jumlah_anggota_pria()
    {
        $ausfuhren = new vergleichen_allen_anggota_pria_aktive_von_jahr_monat_provinz_kabupaten_bentuk_model(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
        $ausfuhren->ausfuhren();
    }
    private final function bestellung_vergleichen_einfugen_calon_jumlah_anggota_wanita()
    {
        $ausfuhren = new vergleichen_allen_calon_anggota_wanita_aktive_von_jahr_monat_provinz_kabupaten_bentuk_model(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
        $ausfuhren->ausfuhren();
    }
    private final function bestellung_vergleichen_einfugen_calon_jumlah_anggota_pria()
    {
        $ausfuhren = new vergleichen_allen_calon_anggota_pria_aktive_von_jahr_monat_provinz_kabupaten_bentuk_model(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
        $ausfuhren->ausfuhren();
    }
    private final function bestellung_vergleichen_einfugen_modal_sendiri()
    {
        $ausfuhren = new vergleichen_modal_sendiri_von_jahr_monat_provinz_kabupaten_bentuk_model(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
        $ausfuhren->ausfuhren();
    }
    private final function bestellung_vergleichen_einfugen_modal_pinjaman()
    {
        $ausfuhren = new vergleichen_modal_pinjaman_von_jahr_monat_provinz_kabupaten_bentuk_model(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
        $ausfuhren->ausfuhren();
    }
    private final function bestellung_vergleichen_einfugen_modal_penyertaan()
    {
        $ausfuhren = new vergleichen_modal_penyertaan_von_jahr_monat_provinz_kabupaten_bentuk_model(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
        $ausfuhren->ausfuhren();
    }
    private final function bestellung_vergleichen_einfugen_aset()
    {
        $ausfuhren = new vergleichen_aset_von_jahr_monat_provinz_kabupaten_bentuk_model(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
        $ausfuhren->ausfuhren();
    }
    private final function bestellung_vergleichen_einfugen_simpanan_diterima()
    {
        $ausfuhren = new vergleichen_simpanan_diterima_von_jahr_monat_provinz_kabupaten_bentuk_model(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
        $ausfuhren->ausfuhren();
    }
    private final function bestellung_vergleichen_einfugen_pinjaman_diberikan()
    {
        $ausfuhren = new vergleichen_pinjaman_diberikan_von_jahr_monat_provinz_kabupaten_bentuk_model(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
        $ausfuhren->ausfuhren();
    }
    private final function bestellung_vergleichen_einfugen_volume_usaha()
    {
        $ausfuhren = new vergleichen_volume_usaha_von_jahr_monat_provinz_kabupaten_bentuk_model(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
        $ausfuhren->ausfuhren();
    }
    private final function bestellung_vergleichen_einfugen_shu()
    {
        $ausfuhren = new vergleichen_shu_von_jahr_monat_provinz_kabupaten_bentuk_model(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
        $ausfuhren->ausfuhren();
    }
    private final function bestellung_vergleichen_einfugen_yang_memiliki_ijin_usaha()
    {
        $ausfuhren = new vergleichen_yang_memiliki_ijin_usaha_von_jahr_monat_provinz_kabupaten_bentuk_model(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
        $ausfuhren->ausfuhren();
    }
    private final function bestellung_vergleichen_einfugen_jumlah_yg_telah_rat()
    {
        $ausfuhren = new vergleichen_rat_von_jahr_monat_provinz_kabupaten_bentuk_model(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
        $ausfuhren->ausfuhren();
    }
    private final function bestellung_vergleichen_einfugen_sehat()
    {
        $ausfuhren = new vergleichen_sehat_von_jahr_monat_provinz_kabupaten_bentuk_model(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
        $ausfuhren->ausfuhren();
    }
    private final function bestellung_vergleichen_einfugen_cukup_sehat()
    {
        $ausfuhren = new vergleichen_cukup_sehat_von_jahr_monat_provinz_kabupaten_bentuk_model(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
        $ausfuhren->ausfuhren();
    }
    private final function bestellung_vergleichen_einfugen_kurang_sehat()
    {
        $ausfuhren = new vergleichen_kurang_sehat_von_jahr_monat_provinz_kabupaten_bentuk_model(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
        $ausfuhren->ausfuhren();
    }
    private final function bestellung_vergleichen_einfugen_tidak_sehat()
    {
        $ausfuhren = new vergleichen_tidak_sehat_von_jahr_monat_provinz_kabupaten_bentuk_model(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
        $ausfuhren->ausfuhren();
    }
    private final function bestellung_vergleichen_einfugen_sangat_tidak_sehat()
    {
        $ausfuhren = new vergleichen_sangat_tidak_sehat_von_jahr_monat_provinz_kabupaten_bentuk_model(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
        $ausfuhren->ausfuhren();
    }
    private final function bestellung_vergleichen_einfugen_tidak_dapat_dinilai()
    {
        $ausfuhren = new vergleichen_tidak_dapat_dinilai_von_jahr_monat_provinz_kabupaten_bentuk_model(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
        $ausfuhren->ausfuhren();
    }
    private final function bestellung_vergleichen_einfugen_belum_dinilai()
    {
        $ausfuhren = new vergleichen_belum_dinilai_von_jahr_monat_provinz_kabupaten_bentuk_model(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
        $ausfuhren->ausfuhren();
    }
    private final function bestellung_vergleichen_einfugen_karyawan_wanita()
    {
        $ausfuhren = new vergleichen_allen_karyawan_wanita_aktive_von_jahr_monat_provinz_kabupaten_bentuk_model(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
        $ausfuhren->ausfuhren();
    }
    private final function bestellung_vergleichen_einfugen_karyawan_pria()
    {
        $ausfuhren = new vergleichen_allen_karyawan_pria_aktive_von_jahr_monat_provinz_kabupaten_bentuk_model(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
        $ausfuhren->ausfuhren();
    }
    private final function bestellung_vergleichen_einfugen_manajer_wanita()
    {
        $ausfuhren = new vergleichen_allen_manajer_wanita_aktive_von_jahr_monat_provinz_kabupaten_bentuk_model(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
        $ausfuhren->ausfuhren();
    }
    private final function bestellung_vergleichen_einfugen_manajer_pria()
    {
        $ausfuhren = new vergleichen_allen_manajer_pria_aktive_von_jahr_monat_provinz_kabupaten_bentuk_model(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
        $ausfuhren->ausfuhren();
    }
}