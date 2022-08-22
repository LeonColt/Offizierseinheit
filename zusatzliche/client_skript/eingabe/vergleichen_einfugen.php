<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 27/12/2015
 * Time: 19:54
 */
require_once '../../../server_skript/base/globale_variable.php';
require_once '../../../server_skript/base/url_kodierer.php';
require_once standart_system_pfad.'server_skript/base/url_kodierer.php';
require_once standart_system_pfad.'server_skript/wahle/wahle_allen_model_koperasi.php';
function einfugen_wichtigsten_andern_erhalten_url($sub_bestellung, $model)
{
    $ausfuhren = new url_kodierer();
    $ausfuhren->hinzufugen(bestellung);
    $ausfuhren->hinzufugen(bestellung_vergleichen);
    $ausfuhren->hinzufugen(sub_bestellung);
    $ausfuhren->hinzufugen($sub_bestellung);
    $ausfuhren->hinzufugen(einfugen_jahr);
    $ausfuhren->hinzufugen('"+document.getElementById("'.einfugen_jahr.'").value+"');
    $ausfuhren->hinzufugen(einfugen_monat);
    $ausfuhren->hinzufugen('"+document.getElementById("'.einfugen_monat.'").value+"');
    $ausfuhren->hinzufugen(einfugen_provinz);
    $ausfuhren->hinzufugen('"+document.getElementById("'.einfugen_provinz.'").value+"');
    $ausfuhren->hinzufugen(einfugen_kabupaten);
    $ausfuhren->hinzufugen('"+document.getElementById("'.einfugen_kabupaten.'").value+"');
    $ausfuhren->hinzufugen(einfugen_bentuk);
    $ausfuhren->hinzufugen('"+document.getElementById("'.einfugen_bentuk.'").value+"');
    $ausfuhren->hinzufugen(einfugen_model);
    $ausfuhren->hinzufugen($model);
    hinzufugen_url_sprache($ausfuhren);
    return $ausfuhren;
}
?>
function satz_aktive_model(aktive_model,
<?php
$model = new wahle_allen_model_koperasi(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
$model->ausfuhren();
$model = $model->erhalten_daten();
for($i = 0; $i < count($model); $i++)
{
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_koperasi.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_koperasi_aktif.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_anggota_wanita.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_anggota_pria.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_anggota.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_calon_anggota_wanita.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_calon_anggota_pria.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_calon_anggota.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.modal_sendiri.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.modal_pinjaman.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.modal_penyertaan.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.asset.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.simpanan_diterima.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.pinjaman_diberikan.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.volume_usaha.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.shu.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.yang_memiliki_ijin_usaha.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_yg_telah_rat.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.telah_dinilai_kesehatannya.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.sehat.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.cukup_sehat.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.kurang_sehat.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.tidak_sehat.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.sangat_tidak_sehat.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.tidak_dapat_dinilai.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.belum_dinilai.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_karyawan_pria.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_karyawan_wanita.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_karyawan.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_manager_wanita.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_manager_pria.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_manager.', ';
    if($i === (count($model) - 1))
        echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_tenaga_kerja.'';
    else echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_tenaga_kerja.', ';
}
?>)
{
    document.getElementById("<?php echo einfugen_aktive_model; ?>").value = aktive_model;
    update_einfugen_ziel(<?php
$model = new wahle_allen_model_koperasi(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
$model->ausfuhren();
$model = $model->erhalten_daten();
for($i = 0; $i < count($model); $i++)
{
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_koperasi.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_koperasi_aktif.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_anggota_wanita.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_anggota_pria.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_anggota.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_calon_anggota_wanita.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_calon_anggota_pria.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_calon_anggota.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.modal_sendiri.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.modal_pinjaman.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.modal_penyertaan.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.asset.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.simpanan_diterima.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.pinjaman_diberikan.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.volume_usaha.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.shu.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.yang_memiliki_ijin_usaha.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_yg_telah_rat.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.telah_dinilai_kesehatannya.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.sehat.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.cukup_sehat.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.kurang_sehat.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.tidak_sehat.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.sangat_tidak_sehat.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.tidak_dapat_dinilai.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.belum_dinilai.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_karyawan_pria.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_karyawan_wanita.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_karyawan.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_manager_wanita.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_manager_pria.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_manager.', ';
    if($i === (count($model) - 1))
        echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_tenaga_kerja.'';
    else echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_tenaga_kerja.', ';
}
?>);
}
function satz_aktive_ziel(sub_bestellung)
{
    document.getElementById("<?php echo einfugen_aktive_ziel; ?>").value = sub_bestellung;
}
function vergleichen_einfugen(ziel, quelle)
{
    if(parseInt(entfernung_drei_punkt(quelle.value)) > -1)
    {
<?php
$ausfuhren = new url_kodierer();
$ausfuhren->hinzufugen(bestellung);
$ausfuhren->hinzufugen(bestellung_vergleichen);
$ausfuhren->hinzufugen(sub_bestellung);
$ausfuhren->hinzufugen('"+document.getElementById("'.einfugen_aktive_ziel.'").value+"');
$ausfuhren->hinzufugen(einfugen_jahr);
$ausfuhren->hinzufugen('"+document.getElementById("'.einfugen_jahr.'").value+"');
$ausfuhren->hinzufugen(einfugen_monat);
$ausfuhren->hinzufugen('"+document.getElementById("'.einfugen_monat.'").value+"');
$ausfuhren->hinzufugen(einfugen_provinz);
$ausfuhren->hinzufugen('"+document.getElementById("'.einfugen_provinz.'").value+"');
$ausfuhren->hinzufugen(einfugen_kabupaten);
$ausfuhren->hinzufugen('"+document.getElementById("'.einfugen_kabupaten.'").value+"');
$ausfuhren->hinzufugen(einfugen_bentuk);
$ausfuhren->hinzufugen('"+document.getElementById("'.einfugen_bentuk.'").value+"');
$ausfuhren->hinzufugen(einfugen_model);
$ausfuhren->hinzufugen('"+document.getElementById("'.einfugen_aktive_model.'").value+"');
hinzufugen_url_sprache($ausfuhren);
?>
        var json = JSON.parse(erhalten_json_von_url("<?php echo $ausfuhren->erhalten(); ?>"));

        if(json.hasOwnProperty("<?php echo json_einfugen_vergleichen; ?>"))
        {
            ziel.innerHTML = json.<?php echo json_einfugen_vergleichen; ?>;
        }
        else
        {
            ziel.innerHTML = "&nbsp;";
        }
    }
    else
    {
        ziel.innerHTML = "&nbsp;";
    }
}
function update_einfugen_ziel(
<?php
$model = new wahle_allen_model_koperasi(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
$model->ausfuhren();
$model = $model->erhalten_daten();
for($i = 0; $i < count($model); $i++)
{
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_koperasi.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_koperasi_aktif.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_anggota_wanita.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_anggota_pria.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_anggota.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_calon_anggota_wanita.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_calon_anggota_pria.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_calon_anggota.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.modal_sendiri.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.modal_pinjaman.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.modal_penyertaan.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.asset.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.simpanan_diterima.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.pinjaman_diberikan.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.volume_usaha.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.shu.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.yang_memiliki_ijin_usaha.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_yg_telah_rat.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.telah_dinilai_kesehatannya.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.sehat.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.cukup_sehat.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.kurang_sehat.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.tidak_sehat.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.sangat_tidak_sehat.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.tidak_dapat_dinilai.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.belum_dinilai.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_karyawan_pria.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_karyawan_wanita.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_karyawan.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_manager_wanita.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_manager_pria.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_manager.', ';
    if($i === (count($model) - 1))
        echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_tenaga_kerja.'';
    else echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_tenaga_kerja.', ';
}
?>)
{
<?php
for($i = 0; $i < count($model); $i++)
{
    echo 'var ziel = document.getElementById(id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_koperasi.');';
    $ausfuhren = einfugen_wichtigsten_andern_erhalten_url(bestellung_vergleichen_einfugen_insgesamt_koperasi, $model[$i][0]);
    ?>
    if(ziel.innerHTML !== "&nbsp;")
    {
    var json = JSON.parse(erhalten_json_von_url("<?php echo $ausfuhren->erhalten(); ?>"));
    if(json.hasOwnProperty("<?php echo json_einfugen_vergleichen; ?>"))
    {
    ziel.innerHTML = json.<?php echo json_einfugen_vergleichen; ?>;
    }
    else
    {
    ziel.innerHTML = "&nbsp;";
    }
    }
    <?php
    echo 'var ziel = document.getElementById(id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_koperasi_aktif.');';
    $ausfuhren = einfugen_wichtigsten_andern_erhalten_url(bestellung_vergleichen_einfugen_insgesamt_koperasi_aktive, $model[$i][0]);
    ?>
    if(ziel.innerHTML !== "&nbsp;")
    {
    var json = JSON.parse(erhalten_json_von_url("<?php echo $ausfuhren->erhalten(); ?>"));
    if(json.hasOwnProperty("<?php echo json_einfugen_vergleichen; ?>"))
    {
    ziel.innerHTML = json.<?php echo json_einfugen_vergleichen; ?>;
    }
    else
    {
    ziel.innerHTML = "&nbsp;";
    }
    }
    <?php
    echo 'var ziel = document.getElementById(id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_anggota_wanita.');';
    $ausfuhren = einfugen_wichtigsten_andern_erhalten_url(bestellung_vergleichen_einfugen_jumlah_anggota_wanita, $model[$i][0]);
    ?>
    if(ziel.innerHTML !== "&nbsp;")
    {
    var json = JSON.parse(erhalten_json_von_url("<?php echo $ausfuhren->erhalten(); ?>"));
    if(json.hasOwnProperty("<?php echo json_einfugen_vergleichen; ?>"))
    {
    ziel.innerHTML = json.<?php echo json_einfugen_vergleichen; ?>;
    }
    else
    {
    ziel.innerHTML = "&nbsp;";
    }
    }
    <?php
    echo 'var ziel = document.getElementById(id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_anggota_pria.');';
    $ausfuhren = einfugen_wichtigsten_andern_erhalten_url(bestellung_vergleichen_einfugen_jumlah_anggota_pria, $model[$i][0]);
    ?>
    if(ziel.innerHTML !== "&nbsp;")
    {
    var json = JSON.parse(erhalten_json_von_url("<?php echo $ausfuhren->erhalten(); ?>"));
    if(json.hasOwnProperty("<?php echo json_einfugen_vergleichen; ?>"))
    {
    ziel.innerHTML = json.<?php echo json_einfugen_vergleichen; ?>;
    }
    else
    {
    ziel.innerHTML = "&nbsp;";
    }
    }
    <?php
    echo 'var ziel = document.getElementById(id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_anggota.');';
    $ausfuhren = einfugen_wichtigsten_andern_erhalten_url(bestellung_vergleichen_einfugen_total_jumlah_anggota, $model[$i][0]);
    ?>
    if(ziel.innerHTML !== "&nbsp;")
    {
    var json = JSON.parse(erhalten_json_von_url("<?php echo $ausfuhren->erhalten(); ?>"));
    if(json.hasOwnProperty("<?php echo json_einfugen_vergleichen; ?>"))
    {
    ziel.innerHTML = json.<?php echo json_einfugen_vergleichen; ?>;
    }
    else
    {
    ziel.innerHTML = "&nbsp;";
    }
    }
    <?php
    echo 'var ziel = document.getElementById(id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_calon_anggota_wanita.');';
    $ausfuhren = einfugen_wichtigsten_andern_erhalten_url(bestellung_vergleichen_einfugen_jumlah_calon_anggota_wanita, $model[$i][0]);
    ?>
    if(ziel.innerHTML !== "&nbsp;")
    {
    var json = JSON.parse(erhalten_json_von_url("<?php echo $ausfuhren->erhalten(); ?>"));
    if(json.hasOwnProperty("<?php echo json_einfugen_vergleichen; ?>"))
    {
    ziel.innerHTML = json.<?php echo json_einfugen_vergleichen; ?>;
    }
    else
    {
    ziel.innerHTML = "&nbsp;";
    }
    }
    <?php
    echo 'var ziel = document.getElementById(id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_calon_anggota_pria.');';
    $ausfuhren = einfugen_wichtigsten_andern_erhalten_url(bestellung_vergleichen_einfugen_jumlah_calon_anggota_pria, $model[$i][0]);
    ?>
    if(ziel.innerHTML !== "&nbsp;")
    {
    var json = JSON.parse(erhalten_json_von_url("<?php echo $ausfuhren->erhalten(); ?>"));
    if(json.hasOwnProperty("<?php echo json_einfugen_vergleichen; ?>"))
    {
    ziel.innerHTML = json.<?php echo json_einfugen_vergleichen; ?>;
    }
    else
    {
    ziel.innerHTML = "&nbsp;";
    }
    }
    <?php
    echo 'var ziel = document.getElementById(id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_calon_anggota.');';
    $ausfuhren = einfugen_wichtigsten_andern_erhalten_url(bestellung_vergleichen_einfugen_total_jumlah_calon_anggota, $model[$i][0]);
    ?>
    if(ziel.innerHTML !== "&nbsp;")
    {
    var json = JSON.parse(erhalten_json_von_url("<?php echo $ausfuhren->erhalten(); ?>"));
    if(json.hasOwnProperty("<?php echo json_einfugen_vergleichen; ?>"))
    {
    ziel.innerHTML = json.<?php echo json_einfugen_vergleichen; ?>;
    }
    else
    {
    ziel.innerHTML = "&nbsp;";
    }
    }
    <?php
    echo 'var ziel = document.getElementById(id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.modal_sendiri.');';
    $ausfuhren = einfugen_wichtigsten_andern_erhalten_url(bestellung_vergleichen_einfugen_modal_sendiri, $model[$i][0]);
    ?>
    if(ziel.innerHTML !== "&nbsp;")
    {
    var json = JSON.parse(erhalten_json_von_url("<?php echo $ausfuhren->erhalten(); ?>"));
    if(json.hasOwnProperty("<?php echo json_einfugen_vergleichen; ?>"))
    {
    ziel.innerHTML = json.<?php echo json_einfugen_vergleichen; ?>;
    }
    else
    {
    ziel.innerHTML = "&nbsp;";
    }
    }
    <?php
    echo 'var ziel = document.getElementById(id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.modal_pinjaman.');';
    $ausfuhren = einfugen_wichtigsten_andern_erhalten_url(bestellung_vergleichen_einfugen_modal_pinjaman, $model[$i][0]);
    ?>
    if(ziel.innerHTML !== "&nbsp;")
    {
    var json = JSON.parse(erhalten_json_von_url("<?php echo $ausfuhren->erhalten(); ?>"));
    if(json.hasOwnProperty("<?php echo json_einfugen_vergleichen; ?>"))
    {
    ziel.innerHTML = json.<?php echo json_einfugen_vergleichen; ?>;
    }
    else
    {
    ziel.innerHTML = "&nbsp;";
    }
    }
    <?php
    echo 'var ziel = document.getElementById(id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.modal_penyertaan.');';
    $ausfuhren = einfugen_wichtigsten_andern_erhalten_url(bestellung_vergleichen_einfugen_modal_penyertaan, $model[$i][0]);
    ?>
    if(ziel.innerHTML !== "&nbsp;")
    {
    var json = JSON.parse(erhalten_json_von_url("<?php echo $ausfuhren->erhalten(); ?>"));
    if(json.hasOwnProperty("<?php echo json_einfugen_vergleichen; ?>"))
    {
    ziel.innerHTML = json.<?php echo json_einfugen_vergleichen; ?>;
    }
    else
    {
    ziel.innerHTML = "&nbsp;";
    }
    }
    <?php
    echo 'var ziel = document.getElementById(id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.asset.');';
    $ausfuhren = einfugen_wichtigsten_andern_erhalten_url(bestellung_vergleichen_einfugen_asset, $model[$i][0]);
    ?>
    if(ziel.innerHTML !== "&nbsp;")
    {
    var json = JSON.parse(erhalten_json_von_url("<?php echo $ausfuhren->erhalten(); ?>"));
    if(json.hasOwnProperty("<?php echo json_einfugen_vergleichen; ?>"))
    {
    ziel.innerHTML = json.<?php echo json_einfugen_vergleichen; ?>;
    }
    else
    {
    ziel.innerHTML = "&nbsp;";
    }
    }
    <?php
    echo 'var ziel = document.getElementById(id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.simpanan_diterima.');';
    $ausfuhren = einfugen_wichtigsten_andern_erhalten_url(bestellung_vergleichen_einfugen_simpanan_diterima, $model[$i][0]);
    ?>
    if(ziel.innerHTML !== "&nbsp;")
    {
    var json = JSON.parse(erhalten_json_von_url("<?php echo $ausfuhren->erhalten(); ?>"));
    if(json.hasOwnProperty("<?php echo json_einfugen_vergleichen; ?>"))
    {
    ziel.innerHTML = json.<?php echo json_einfugen_vergleichen; ?>;
    }
    else
    {
    ziel.innerHTML = "&nbsp;";
    }
    }
    <?php
    echo 'var ziel = document.getElementById(id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.pinjaman_diberikan.');';
    $ausfuhren = einfugen_wichtigsten_andern_erhalten_url(bestellung_vergleichen_einfugen_pinjaman_diberikan, $model[$i][0]);
    ?>
    if(ziel.innerHTML !== "&nbsp;")
    {
    var json = JSON.parse(erhalten_json_von_url("<?php echo $ausfuhren->erhalten(); ?>"));
    if(json.hasOwnProperty("<?php echo json_einfugen_vergleichen; ?>"))
    {
    ziel.innerHTML = json.<?php echo json_einfugen_vergleichen; ?>;
    }
    else
    {
    ziel.innerHTML = "&nbsp;";
    }
    }
    <?php
    echo 'var ziel = document.getElementById(id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.volume_usaha.');';
    $ausfuhren = einfugen_wichtigsten_andern_erhalten_url(bestellung_vergleichen_einfugen_volume_usaha, $model[$i][0]);
    ?>
    if(ziel.innerHTML !== "&nbsp;")
    {
    var json = JSON.parse(erhalten_json_von_url("<?php echo $ausfuhren->erhalten(); ?>"));
    if(json.hasOwnProperty("<?php echo json_einfugen_vergleichen; ?>"))
    {
    ziel.innerHTML = json.<?php echo json_einfugen_vergleichen; ?>;
    }
    else
    {
    ziel.innerHTML = "&nbsp;";
    }
    }
    <?php
    echo 'var ziel = document.getElementById(id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.shu.');';
    $ausfuhren = einfugen_wichtigsten_andern_erhalten_url(bestellung_vergleichen_einfugen_shu, $model[$i][0]);
    ?>
    if(ziel.innerHTML !== "&nbsp;")
    {
    var json = JSON.parse(erhalten_json_von_url("<?php echo $ausfuhren->erhalten(); ?>"));
    if(json.hasOwnProperty("<?php echo json_einfugen_vergleichen; ?>"))
    {
    ziel.innerHTML = json.<?php echo json_einfugen_vergleichen; ?>;
    }
    else
    {
    ziel.innerHTML = "&nbsp;";
    }
    }
    <?php
    echo 'var ziel = document.getElementById(id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.yang_memiliki_ijin_usaha.');';
    $ausfuhren = einfugen_wichtigsten_andern_erhalten_url(bestellung_vergleichen_einfugen_yang_memiliki_ijin_usaha, $model[$i][0]);
    ?>
    if(ziel.innerHTML !== "&nbsp;")
    {
    var json = JSON.parse(erhalten_json_von_url("<?php echo $ausfuhren->erhalten(); ?>"));
    if(json.hasOwnProperty("<?php echo json_einfugen_vergleichen; ?>"))
    {
    ziel.innerHTML = json.<?php echo json_einfugen_vergleichen; ?>;
    }
    else
    {
    ziel.innerHTML = "&nbsp;";
    }
    }
    <?php
    echo 'var ziel = document.getElementById(id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_yg_telah_rat.');';
    $ausfuhren = einfugen_wichtigsten_andern_erhalten_url(bestellung_vergleichen_einfugen_jumlah_yg_telah_rat, $model[$i][0]);
    ?>
    if(ziel.innerHTML !== "&nbsp;")
    {
    var json = JSON.parse(erhalten_json_von_url("<?php echo $ausfuhren->erhalten(); ?>"));
    if(json.hasOwnProperty("<?php echo json_einfugen_vergleichen; ?>"))
    {
    ziel.innerHTML = json.<?php echo json_einfugen_vergleichen; ?>;
    }
    else
    {
    ziel.innerHTML = "&nbsp;";
    }
    }
    <?php
    echo 'var ziel = document.getElementById(id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.telah_dinilai_kesehatannya.');';
    $ausfuhren = einfugen_wichtigsten_andern_erhalten_url(bestellung_vergleichen_einfugen_telah_dinilai_kesehatannya, $model[$i][0]);
    ?>
    if(ziel.innerHTML !== "&nbsp;")
    {
    var json = JSON.parse(erhalten_json_von_url("<?php echo $ausfuhren->erhalten(); ?>"));
    if(json.hasOwnProperty("<?php echo json_einfugen_vergleichen; ?>"))
    {
    ziel.innerHTML = json.<?php echo json_einfugen_vergleichen; ?>;
    }
    else
    {
    ziel.innerHTML = "&nbsp;";
    }
    }
    <?php
    echo 'var ziel = document.getElementById(id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.sehat.');';
    $ausfuhren = einfugen_wichtigsten_andern_erhalten_url(bestellung_vergleichen_einfugen_sehat, $model[$i][0]);
    ?>
    if(ziel.innerHTML !== "&nbsp;")
    {
    var json = JSON.parse(erhalten_json_von_url("<?php echo $ausfuhren->erhalten(); ?>"));
    if(json.hasOwnProperty("<?php echo json_einfugen_vergleichen; ?>"))
    {
    ziel.innerHTML = json.<?php echo json_einfugen_vergleichen; ?>;
    }
    else
    {
    ziel.innerHTML = "&nbsp;";
    }
    }
    <?php
    echo 'var ziel = document.getElementById(id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.cukup_sehat.');';
    $ausfuhren = einfugen_wichtigsten_andern_erhalten_url(bestellung_vergleichen_einfugen_cukup_sehat, $model[$i][0]);
    ?>
    if(ziel.innerHTML !== "&nbsp;")
    {
    var json = JSON.parse(erhalten_json_von_url("<?php echo $ausfuhren->erhalten(); ?>"));
    if(json.hasOwnProperty("<?php echo json_einfugen_vergleichen; ?>"))
    {
    ziel.innerHTML = json.<?php echo json_einfugen_vergleichen; ?>;
    }
    else
    {
    ziel.innerHTML = "&nbsp;";
    }
    }
    <?php
    echo 'var ziel = document.getElementById(id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.kurang_sehat.');';
    $ausfuhren = einfugen_wichtigsten_andern_erhalten_url(bestellung_vergleichen_einfugen_kurang_sehat, $model[$i][0]);
    ?>
    if(ziel.innerHTML !== "&nbsp;")
    {
    var json = JSON.parse(erhalten_json_von_url("<?php echo $ausfuhren->erhalten(); ?>"));
    if(json.hasOwnProperty("<?php echo json_einfugen_vergleichen; ?>"))
    {
    ziel.innerHTML = json.<?php echo json_einfugen_vergleichen; ?>;
    }
    else
    {
    ziel.innerHTML = "&nbsp;";
    }
    }
    <?php
    echo 'var ziel = document.getElementById(id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.tidak_sehat.');';
    $ausfuhren = einfugen_wichtigsten_andern_erhalten_url(bestellung_vergleichen_einfugen_tidak_sehat, $model[$i][0]);
    ?>
    if(ziel.innerHTML !== "&nbsp;")
    {
    var json = JSON.parse(erhalten_json_von_url("<?php echo $ausfuhren->erhalten(); ?>"));
    if(json.hasOwnProperty("<?php echo json_einfugen_vergleichen; ?>"))
    {
    ziel.innerHTML = json.<?php echo json_einfugen_vergleichen; ?>;
    }
    else
    {
    ziel.innerHTML = "&nbsp;";
    }
    }
    <?php
    echo 'var ziel = document.getElementById(id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.sangat_tidak_sehat.');';
    $ausfuhren = einfugen_wichtigsten_andern_erhalten_url(bestellung_vergleichen_einfugen_sangat_tidak_sehat, $model[$i][0]);
    ?>
    if(ziel.innerHTML !== "&nbsp;")
    {
    var json = JSON.parse(erhalten_json_von_url("<?php echo $ausfuhren->erhalten(); ?>"));
    if(json.hasOwnProperty("<?php echo json_einfugen_vergleichen; ?>"))
    {
    ziel.innerHTML = json.<?php echo json_einfugen_vergleichen; ?>;
    }
    else
    {
    ziel.innerHTML = "&nbsp;";
    }
    }
    <?php
    echo 'var ziel = document.getElementById(id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.tidak_dapat_dinilai.');';
    $ausfuhren = einfugen_wichtigsten_andern_erhalten_url(bestellung_vergleichen_einfugen_tidak_dapat_dinilai, $model[$i][0]);
    ?>
    if(ziel.innerHTML !== "&nbsp;")
    {
    var json = JSON.parse(erhalten_json_von_url("<?php echo $ausfuhren->erhalten(); ?>"));
    if(json.hasOwnProperty("<?php echo json_einfugen_vergleichen; ?>"))
    {
    ziel.innerHTML = json.<?php echo json_einfugen_vergleichen; ?>;
    }
    else
    {
    ziel.innerHTML = "&nbsp;";
    }
    }
    <?php
    echo 'var ziel = document.getElementById(id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.belum_dinilai.');';
    $ausfuhren = einfugen_wichtigsten_andern_erhalten_url(bestellung_vergleichen_einfugen_belum_dinilai, $model[$i][0]);
    ?>
    if(ziel.innerHTML !== "&nbsp;")
    {
    var json = JSON.parse(erhalten_json_von_url("<?php echo $ausfuhren->erhalten(); ?>"));
    if(json.hasOwnProperty("<?php echo json_einfugen_vergleichen; ?>"))
    {
    ziel.innerHTML = json.<?php echo json_einfugen_vergleichen; ?>;
    }
    else
    {
    ziel.innerHTML = "&nbsp;";
    }
    }
    <?php
    echo 'var ziel = document.getElementById(id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_karyawan_pria.');';
    $ausfuhren = einfugen_wichtigsten_andern_erhalten_url(bestellung_vergleichen_einfugen_jumlah_karyawan_pria, $model[$i][0]);
    ?>
    if(ziel.innerHTML !== "&nbsp;")
    {
    var json = JSON.parse(erhalten_json_von_url("<?php echo $ausfuhren->erhalten(); ?>"));
    if(json.hasOwnProperty("<?php echo json_einfugen_vergleichen; ?>"))
    {
    ziel.innerHTML = json.<?php echo json_einfugen_vergleichen; ?>;
    }
    else
    {
    ziel.innerHTML = "&nbsp;";
    }
    }
    <?php
    echo 'var ziel = document.getElementById(id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_karyawan_wanita.');';
    $ausfuhren = einfugen_wichtigsten_andern_erhalten_url(bestellung_vergleichen_einfugen_jumlah_karyawan_wanita, $model[$i][0]);
    ?>
    if(ziel.innerHTML !== "&nbsp;")
    {
    var json = JSON.parse(erhalten_json_von_url("<?php echo $ausfuhren->erhalten(); ?>"));
    if(json.hasOwnProperty("<?php echo json_einfugen_vergleichen; ?>"))
    {
    ziel.innerHTML = json.<?php echo json_einfugen_vergleichen; ?>;
    }
    else
    {
    ziel.innerHTML = "&nbsp;";
    }
    }
    <?php
    echo 'var ziel = document.getElementById(id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_karyawan.');';
    $ausfuhren = einfugen_wichtigsten_andern_erhalten_url(bestellung_vergleichen_einfugen_total_jumlah_karyawan, $model[$i][0]);
    ?>
    if(ziel.innerHTML !== "&nbsp;")
    {
    var json = JSON.parse(erhalten_json_von_url("<?php echo $ausfuhren->erhalten(); ?>"));
    if(json.hasOwnProperty("<?php echo json_einfugen_vergleichen; ?>"))
    {
    ziel.innerHTML = json.<?php echo json_einfugen_vergleichen; ?>;
    }
    else
    {
    ziel.innerHTML = "&nbsp;";
    }
    }
    <?php
    echo 'var ziel = document.getElementById(id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_manager_wanita.');';
    $ausfuhren = einfugen_wichtigsten_andern_erhalten_url(bestellung_vergleichen_einfugen_jumlah_manager_wanita, $model[$i][0]);
    ?>
    if(ziel.innerHTML !== "&nbsp;")
    {
    var json = JSON.parse(erhalten_json_von_url("<?php echo $ausfuhren->erhalten(); ?>"));
    if(json.hasOwnProperty("<?php echo json_einfugen_vergleichen; ?>"))
    {
    ziel.innerHTML = json.<?php echo json_einfugen_vergleichen; ?>;
    }
    else
    {
    ziel.innerHTML = "&nbsp;";
    }
    }
    <?php
    echo 'var ziel = document.getElementById(id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_manager_pria.');';
    $ausfuhren = einfugen_wichtigsten_andern_erhalten_url(bestellung_vergleichen_einfugen_jumlah_manager_pria, $model[$i][0]);
    ?>
    if(ziel.innerHTML !== "&nbsp;")
    {
    var json = JSON.parse(erhalten_json_von_url("<?php echo $ausfuhren->erhalten(); ?>"));
    if(json.hasOwnProperty("<?php echo json_einfugen_vergleichen; ?>"))
    {
    ziel.innerHTML = json.<?php echo json_einfugen_vergleichen; ?>;
    }
    else
    {
    ziel.innerHTML = "&nbsp;";
    }
    }
    <?php
    echo 'var ziel = document.getElementById(id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_manager.');';
    $ausfuhren = einfugen_wichtigsten_andern_erhalten_url(bestellung_vergleichen_einfugen_total_jumlah_manager, $model[$i][0]);
    ?>
    if(ziel.innerHTML !== "&nbsp;")
    {
    var json = JSON.parse(erhalten_json_von_url("<?php echo $ausfuhren->erhalten(); ?>"));
    if(json.hasOwnProperty("<?php echo json_einfugen_vergleichen; ?>"))
    {
    ziel.innerHTML = json.<?php echo json_einfugen_vergleichen; ?>;
    }
    else
    {
    ziel.innerHTML = "&nbsp;";
    }
    }
    <?php
    echo 'var ziel = document.getElementById(id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_tenaga_kerja.');';
    $ausfuhren = einfugen_wichtigsten_andern_erhalten_url(bestellung_vergleichen_einfugen_total_jumlah_tenaga_kerja, $model[$i][0]);
    ?>
    if(ziel.innerHTML !== "&nbsp;")
    {
    var json = JSON.parse(erhalten_json_von_url("<?php echo $ausfuhren->erhalten(); ?>"));
    if(json.hasOwnProperty("<?php echo json_einfugen_vergleichen; ?>"))
    {
    ziel.innerHTML = json.<?php echo json_einfugen_vergleichen; ?>;
    }
    else
    {
    ziel.innerHTML = "&nbsp;";
    }
    }
    <?php
}
?>
}
function einfugen_andern_provinz(id_provinz, id_kabupaten,
<?php
$model = new wahle_allen_model_koperasi(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
$model->ausfuhren();
$model = $model->erhalten_daten();
for($i = 0; $i < count($model); $i++)
{
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_koperasi.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_koperasi_aktif.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_anggota_wanita.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_anggota_pria.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_anggota.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_calon_anggota_wanita.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_calon_anggota_pria.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_calon_anggota.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.modal_sendiri.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.modal_pinjaman.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.modal_penyertaan.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.asset.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.simpanan_diterima.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.pinjaman_diberikan.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.volume_usaha.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.shu.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.yang_memiliki_ijin_usaha.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_yg_telah_rat.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.telah_dinilai_kesehatannya.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.sehat.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.cukup_sehat.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.kurang_sehat.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.tidak_sehat.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.sangat_tidak_sehat.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.tidak_dapat_dinilai.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.belum_dinilai.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_karyawan_pria.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_karyawan_wanita.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_karyawan.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_manager_wanita.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_manager_pria.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_manager.', ';
    if($i === (count($model) - 1))
        echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_tenaga_kerja.'';
    else echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_tenaga_kerja.', ';
}
?>)
{
fullung_kab_kota(id_provinz, id_kabupaten);
update_einfugen_ziel(<?php
$model = new wahle_allen_model_koperasi(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
$model->ausfuhren();
$model = $model->erhalten_daten();
for($i = 0; $i < count($model); $i++)
{
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_koperasi.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_koperasi_aktif.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_anggota_wanita.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_anggota_pria.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_anggota.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_calon_anggota_wanita.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_calon_anggota_pria.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_calon_anggota.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.modal_sendiri.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.modal_pinjaman.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.modal_penyertaan.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.asset.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.simpanan_diterima.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.pinjaman_diberikan.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.volume_usaha.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.shu.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.yang_memiliki_ijin_usaha.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_yg_telah_rat.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.telah_dinilai_kesehatannya.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.sehat.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.cukup_sehat.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.kurang_sehat.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.tidak_sehat.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.sangat_tidak_sehat.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.tidak_dapat_dinilai.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.belum_dinilai.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_karyawan_pria.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_karyawan_wanita.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_karyawan.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_manager_wanita.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.jumlah_manager_pria.', ';
    echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_manager.', ';
    if($i === (count($model) - 1))
        echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_tenaga_kerja.'';
    else echo 'id_'.einfugen_schlussel.$model[$i][0].einfugen_ziel.total_jumlah_tenaga_kerja.', ';
}
?>);
}