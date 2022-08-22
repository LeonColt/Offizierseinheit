<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once standart_system_pfad.'server_skript/base/globale_variable.php';
require_once standart_system_pfad.'server_skript/wahle/wahle_allen_propinsi.php';
require_once standart_system_pfad.'server_skript/wahle/wahle_allen_bentuk_koperasi.php';
require_once standart_system_pfad.'anhanger/anhanger_einfugen/wichtigsten_form.php';
require_once standart_system_pfad.'anhanger/anhanger_einfugen/arbeiter_form.php';
require_once standart_system_pfad.'server_skript/wahle/wahle_allen_model_koperasi.php';
require_once standart_system_pfad.'server_skript/base/url_kodierer.php';
require_once standart_system_pfad.'server_skript/wahle/wahle_allen_kabupaten_kota.php';
require_once standart_system_pfad.'server_skript/wahle/wahle_provinz_von_kabupaten_kota.php';
function anhanger_einfugen_provinz()
{
    echo '<div class ="clabel">PROPINSI</div><div class ="cinput">';
    if(ist_benutzer_kabupaten())
    {
        $provinz = new wahle_provinz_von_kabupaten_kota(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
        $provinz->satz_id_kabupaten_kota($_SESSION[kabupaten][0]);
        $provinz->ausfuhren();
        $provinz = $provinz->erhalten_daten();
        echo '<input type="hidden" name="'.einfugen_provinz.'" id="'.einfugen_provinz.'" readonly="readonly" value="'.  htmlentities($provinz[0][0]).'">';
        echo '<input type="text" readonly="readonly" value="'.  htmlentities($provinz[0][1]).'">';
    }
    else if(ist_benutzer_provinz())
    {
        echo '<input type="hidden" name="'.einfugen_provinz.'" id="'.einfugen_provinz.'" readonly="readonly" value="'.  htmlentities($_SESSION[provinz][0]).'">';
        echo '<input type="text" readonly="readonly" value="'.  htmlentities($_SESSION[provinz][1]).'">';
    }
    else
    {
        echo '<select name="'.einfugen_provinz.'" id="'.einfugen_provinz.'"
        onchange="einfugen_andern_provinz('
            .einfugen_provinz.'.id, '
            .einfugen_kabupaten.'.id,';
        $model = new wahle_allen_model_koperasi(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
        $model->ausfuhren();
        $model = $model->erhalten_daten();
        for($i = 0; $i < count($model); $i++)
        {
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_koperasi.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_koperasi_aktif.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_anggota_wanita.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_anggota_pria.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_anggota.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_calon_anggota_wanita.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_calon_anggota_pria.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_calon_anggota.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.modal_sendiri.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.modal_pinjaman.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.modal_penyertaan.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.asset.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.simpanan_diterima.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.pinjaman_diberikan.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.volume_usaha.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.shu.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.yang_memiliki_ijin_usaha.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_yg_telah_rat.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.telah_dinilai_kesehatannya.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.sehat.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.cukup_sehat.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.kurang_sehat.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.tidak_sehat.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.sangat_tidak_sehat.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.tidak_dapat_dinilai.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.belum_dinilai.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_karyawan_pria.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_karyawan_wanita.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_karyawan.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_manager_wanita.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_manager_pria.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_manager.'.id, ';
            if($i === (count($model) - 1))
                echo einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_tenaga_kerja.'.id';
            else
                echo einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_tenaga_kerja.'.id,';
        }
        echo ');">';
        $xml = simplexml_load_file(xml_lader(zeichenfolge));
        echo '<option>'.$xml->standart_optionen_provinz.'</option>';
        $ausfuhren = new wahle_allen_propinsi(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
        $ausfuhren->ausfuhren();
        $propinsi = $ausfuhren->erhalten_daten();
        foreach ($propinsi as $temp)
        {
            echo '<option value="'.$temp[0].'">'.$temp[1].'</option>';
        }
        echo '</select>';
    }
    echo '</div>';
}
function anhanger_einfugen_kabupaten()
{
    echo  '<div class ="clabel">KABUPATEN</div><div class ="cinput">';
    if(ist_benutzer_kabupaten()) echo '<input type="text" name="'.einfugen_kabupaten.'" id="'.einfugen_kabupaten.'" readonly="readonly" value="'.$_SESSION[kabupaten][1].'">';
    else if(ist_benutzer_provinz())
    {
        echo '<select name="'.einfugen_kabupaten.'" id="'.einfugen_kabupaten.'" onchange="update_einfugen_ziel(';
        $model = new wahle_allen_model_koperasi(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
        $model->ausfuhren();
        $model = $model->erhalten_daten();
        for($i = 0; $i < count($model); $i++)
        {
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_koperasi.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_koperasi_aktif.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_anggota_wanita.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_anggota_pria.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_anggota.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_calon_anggota_wanita.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_calon_anggota_pria.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_calon_anggota.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.modal_sendiri.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.modal_pinjaman.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.modal_penyertaan.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.asset.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.simpanan_diterima.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.pinjaman_diberikan.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.volume_usaha.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.shu.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.yang_memiliki_ijin_usaha.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_yg_telah_rat.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.telah_dinilai_kesehatannya.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.sehat.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.cukup_sehat.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.kurang_sehat.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.tidak_sehat.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.sangat_tidak_sehat.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.tidak_dapat_dinilai.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.belum_dinilai.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_karyawan_pria.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_karyawan_wanita.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_karyawan.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_manager_wanita.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_manager_pria.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_manager.'.id, ';
            if($i === (count($model) - 1))
                echo einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_tenaga_kerja.'.id';
            else
                echo einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_tenaga_kerja.'.id,';
        }
        echo ');">';
        $xml = simplexml_load_file(xml_lader(zeichenfolge));
        echo '<option>'.$xml->standart_optionen_kabupaten_kota.'</option>';
        $ausfuhren = new wahle_allen_kabupaten_kota(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
        $ausfuhren->satz_id_provinz($_SESSION[provinz][0]);
        $ausfuhren->ausfuhren();
        $kabupaten = $ausfuhren->erhalten_daten();
        foreach ($kabupaten as $temp)
        {
            echo '<option value="'.$temp[1].'">'.$temp[2].'</option>';
        }
        echo '</select>';
    }
    else
    {
        echo '<select name="'.einfugen_kabupaten.'" id="'.einfugen_kabupaten.'" onchange="update_einfugen_ziel(';
        $model = new wahle_allen_model_koperasi(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
        $model->ausfuhren();
        $model = $model->erhalten_daten();
        for($i = 0; $i < count($model); $i++)
        {
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_koperasi.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_koperasi_aktif.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_anggota_wanita.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_anggota_pria.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_anggota.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_calon_anggota_wanita.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_calon_anggota_pria.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_calon_anggota.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.modal_sendiri.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.modal_pinjaman.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.modal_penyertaan.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.asset.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.simpanan_diterima.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.pinjaman_diberikan.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.volume_usaha.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.shu.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.yang_memiliki_ijin_usaha.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_yg_telah_rat.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.telah_dinilai_kesehatannya.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.sehat.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.cukup_sehat.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.kurang_sehat.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.tidak_sehat.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.sangat_tidak_sehat.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.tidak_dapat_dinilai.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.belum_dinilai.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_karyawan_pria.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_karyawan_wanita.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_karyawan.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_manager_wanita.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_manager_pria.'.id, ';
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_manager.'.id, ';
            if($i === (count($model) - 1))
                echo einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_tenaga_kerja.'.id';
            else
                echo einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_tenaga_kerja.'.id,';
        }
        echo ');">';
        $xml = simplexml_load_file(xml_lader(zeichenfolge));
        echo '<option>'.$xml->standart_optionen_kabupaten_kota.'</option>';
        echo '</select>';
    }
    echo '</div>';
}

function anhanger_einfugen_bentuk()
{
    echo '<div class ="clabel">BENTUK KOPERASI</div> <div class ="cinput">';
    echo '<select name="'.einfugen_bentuk.'" id="'.einfugen_bentuk.'" onchange="update_einfugen_ziel(';
    $model = new wahle_allen_model_koperasi(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
    $model->ausfuhren();
    $model = $model->erhalten_daten();
    for($i = 0; $i < count($model); $i++)
    {
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_koperasi.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_koperasi_aktif.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_anggota_wanita.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_anggota_pria.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_anggota.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_calon_anggota_wanita.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_calon_anggota_pria.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_calon_anggota.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.modal_sendiri.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.modal_pinjaman.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.modal_penyertaan.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.asset.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.simpanan_diterima.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.pinjaman_diberikan.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.volume_usaha.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.shu.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.yang_memiliki_ijin_usaha.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_yg_telah_rat.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.telah_dinilai_kesehatannya.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.sehat.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.cukup_sehat.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.kurang_sehat.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.tidak_sehat.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.sangat_tidak_sehat.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.tidak_dapat_dinilai.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.belum_dinilai.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_karyawan_pria.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_karyawan_wanita.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_karyawan.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_manager_wanita.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_manager_pria.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_manager.'.id, ';
        if($i === (count($model) - 1))
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_tenaga_kerja.'.id';
        else
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_tenaga_kerja.'.id,';
    }
    echo ');">';
    $ausfuhren = new wahle_allen_bentuk_koperasi(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
    $ausfuhren->ausfuhren();
    $bentuk = $ausfuhren->erhalten_daten();
    foreach ($bentuk as $temp)
    {
        echo '<option value="'.$temp[0].'">'.$temp[1].'</option>';
    }
    echo '</select></div>';
}
function anhanger_einfugen_jahr()
{
    echo '<div style="float: left;margin-right: 1%;">TAHUN</div><div class ="cinput">';
    echo '<select name="'.einfugen_jahr.'" id="'.einfugen_jahr.'" onchange="update_einfugen_ziel(';
    $model = new wahle_allen_model_koperasi(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
    $model->ausfuhren();
    $model = $model->erhalten_daten();
    for($i = 0; $i < count($model); $i++)
    {
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_koperasi.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_koperasi_aktif.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_anggota_wanita.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_anggota_pria.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_anggota.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_calon_anggota_wanita.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_calon_anggota_pria.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_calon_anggota.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.modal_sendiri.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.modal_pinjaman.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.modal_penyertaan.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.asset.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.simpanan_diterima.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.pinjaman_diberikan.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.volume_usaha.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.shu.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.yang_memiliki_ijin_usaha.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_yg_telah_rat.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.telah_dinilai_kesehatannya.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.sehat.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.cukup_sehat.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.kurang_sehat.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.tidak_sehat.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.sangat_tidak_sehat.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.tidak_dapat_dinilai.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.belum_dinilai.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_karyawan_pria.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_karyawan_wanita.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_karyawan.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_manager_wanita.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_manager_pria.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_manager.'.id, ';
        if($i === (count($model) - 1))
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_tenaga_kerja.'.id';
        else
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_tenaga_kerja.'.id,';
    }
    echo ');">';
    date_default_timezone_set('Asia/Jakarta');
    $i = date("Y");
    for($counter = $i-10; $counter < $i+11; $counter++)
    {
        echo '<option value="'.$counter.'" ';
        if($i == $counter) echo ' selected';
        echo '>'.$counter.'</option>';
    }
    echo '</select></div>';
}
function anhanger_einfugen_monat()
{
    echo '<div class ="clabel">BULAN</div><div class ="cinput" >';
    echo '<select name="'.einfugen_monat.'" id="'.einfugen_monat.'" onchange="update_einfugen_ziel(';
    $model = new wahle_allen_model_koperasi(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
    $model->ausfuhren();
    $model = $model->erhalten_daten();
    for($i = 0; $i < count($model); $i++)
    {
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_koperasi.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_koperasi_aktif.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_anggota_wanita.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_anggota_pria.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_anggota.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_calon_anggota_wanita.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_calon_anggota_pria.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_calon_anggota.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.modal_sendiri.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.modal_pinjaman.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.modal_penyertaan.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.asset.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.simpanan_diterima.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.pinjaman_diberikan.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.volume_usaha.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.shu.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.yang_memiliki_ijin_usaha.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_yg_telah_rat.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.telah_dinilai_kesehatannya.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.sehat.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.cukup_sehat.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.kurang_sehat.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.tidak_sehat.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.sangat_tidak_sehat.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.tidak_dapat_dinilai.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.belum_dinilai.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_karyawan_pria.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_karyawan_wanita.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_karyawan.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_manager_wanita.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_manager_pria.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_manager.'.id, ';
        if($i === (count($model) - 1))
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_tenaga_kerja.'.id';
        else
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_tenaga_kerja.'.id,';
    }
    echo ');">';
    echo '<option value="1">Januari</option>';
    echo '<option value="2">Februari</option>';
    echo '<option value="3">Maret</option>';
    echo '<option value="4">April</option>';
    echo '<option value="5">Mei</option>';
    echo '<option value="6">Juni</option>';
    echo '<option value="7">Juli</option>';
    echo '<option value="8">Agustus</option>';
    echo '<option value="9">September</option>';
    echo '<option value="10">Oktober</option>';
    echo '<option value="11">November</option>';
    echo '<option value="12">Desember</option>';
    echo '</select>';
    echo '</div>';
}
function einfugen_wichtigsten()
{
    $model = new wahle_allen_model_koperasi(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
    $model->ausfuhren();
    $model = $model->erhalten_daten();
    echo '<input type="hidden" id="'.einfugen_aktive_model.'" value="'.$model[0][0].'">';
    echo '<input type="hidden" id="'.einfugen_aktive_ziel.'">';
    echo '<div class="tabs">';
    echo '<ul class="tab-links">';
    for($i = 0; $i < count($model); $i++)
    {
        echo '<li '.(($i === 0) ? ('class="active"') : ('')).'><a href="#'.$model[$i][0].'" onclick="satz_aktive_model(\''.$model[$i][0].'\', ';
        parameter_update_wichtigsten_einfugen();
        echo ');">'.$model[$i][2].'</a></li>';
    }                       
    echo '</ul>';
    echo '<div class="tab-content">';
    for($i = 0; $i<count($model); $i++)
    {
        echo '<div id="'.$model[$i][0].'" '.(($i === 0)? ('class="tab active"'):('class="tab"')).'>';
        echo '<input type="hidden" name="'.einfugen_schlussel.$model[$i][0].einfugen_model.'" value="'.$model[$i][0].'">';
        $wichtigsten = new wichtigsten_form(einfugen_schlussel.$model[$i][0]);
        $wichtigsten->karte();
        $arbeiter = new arbeiter_form(einfugen_schlussel.$model[$i][0]);
        $arbeiter->karte();
        echo '</div>';
    }
    echo '</div>';
    echo '</div>';
}
function parameter_update_wichtigsten_einfugen()
{
    $model = new wahle_allen_model_koperasi(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
    $model->ausfuhren();
    $model = $model->erhalten_daten();
    for($i = 0; $i < count($model); $i++)
    {
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_koperasi.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_koperasi_aktif.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_anggota_wanita.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_anggota_pria.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_anggota.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_calon_anggota_wanita.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_calon_anggota_pria.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_calon_anggota.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.modal_sendiri.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.modal_pinjaman.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.modal_penyertaan.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.asset.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.simpanan_diterima.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.pinjaman_diberikan.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.volume_usaha.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.shu.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.yang_memiliki_ijin_usaha.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_yg_telah_rat.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.telah_dinilai_kesehatannya.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.sehat.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.cukup_sehat.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.kurang_sehat.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.tidak_sehat.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.sangat_tidak_sehat.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.tidak_dapat_dinilai.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.belum_dinilai.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_karyawan_pria.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_karyawan_wanita.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_karyawan.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_manager_wanita.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_manager_pria.'.id, ';
        echo einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_manager.'.id, ';
        if($i === (count($model) - 1))
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_tenaga_kerja.'.id';
        else
            echo einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_tenaga_kerja.'.id,';
    }
}