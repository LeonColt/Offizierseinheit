<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 22/02/2016
 * Time: 14:39
 */
require_once '../../../server_skript/base/globale_variable.php';
require_once standart_system_pfad.'server_skript/base/universal_methode.php';
require_once standart_system_pfad.'server_skript/wahle/wahle_allen_model_koperasi.php';
$xml = simplexml_load_file(xml_lader(zeichenfolge));
$model = new wahle_allen_model_koperasi(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
$model->ausfuhren();
$model = $model->erhalten_daten();
$xml_verbindung = simplexml_load_file(xml_lader(verbindung_storungsmeldung));
?>
function wann_senden()
{
    var nachricht = "";
    var ermoglichen = true;
    if(document.getElementById("<?php echo einfugen_provinz; ?>").value === "<?php echo $xml->standart_optionen_provinz; ?>")
    {
        nachricht += "<?php echo $xml->fehler.' : '.$xml->standart_optionen_provinz_ist_nicht_gewahlt_nachricht; ?>\n";
        ermoglichen = false;
    }
    if(document.getElementById("<?php echo einfugen_kabupaten; ?>").value === "<?php echo $xml->standart_optionen_kabupaten_kota; ?>")
    {
        nachricht += "<?php echo $xml->fehler.' : '.$xml->standart_optionen_kabupaten_kota_ist_nicht_gewahlt_nachricht; ?>\n";
        ermoglichen = false;
    }
    var zahler = 0;
    var model_lange = <?php echo count($model); ?>;
    <?php
for($i = 0; $i < count($model); $i++) {
    ?>
    if(ist_eine_fullung(<?php drucken_model_von_model_id_erhalten_value($model[$i][0]); ?>))
    {
        if(wann_senden_ist_leer(<?php drucken_model_von_model_id_erhalten_value($model[$i][0]); ?>))
        {
            ermoglichen = false;
            nachricht += "<?php echo ($xml->fehler.' : '.$model[$i][1].' '.$xml_verbindung->daten_leere); ?>\n";
        }
    }
    else
    {
        nachricht += "<?php echo $xml->warnung.' : '.$model[$i][1].' '.$xml->standart_nachrich_ist_nicht_fullung; ?>\n";
        zahler++;
    }
    <?php
}
?>
    if(!ermoglichen)
    {
        alert(nachricht);
        return ermoglichen;
    }
    else
    {
        if(nachricht.localeCompare('') !== 0)
        {
            if(zahler < model_lange)
            {
                alert(nachricht);
                if(confirm("<?php echo $xml->weiterhin_speichen; ?>"))
                {
                    return ermoglichen;
                }
                else
                {
                    return false;
                }
            }
            else
            {
                nachricht += "<?php echo $xml->fehler.' : '.$xml->standart_nachrich_ist_nicht_fullung; ?>\n";
                alert(nachricht);
                return false;
            }
        }
    }
    return ermoglichen;
}
    <?php
function drucken_model_von_model_id_erhalten_value($id)
{
    $model = new wahle_allen_model_koperasi(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
    $model->ausfuhren();
    $model = $model->erhalten_daten();
    for($i = 0; $i < count($model); $i++) {
        if(strcasecmp($model[$i][0], $id) === 0)
        {
            echo 'document.getElementById("' . einfugen_schlussel . $model[$i][0] . jumlah_koperasi . '").value, ';
            echo 'document.getElementById("' . einfugen_schlussel . $model[$i][0] . jumlah_koperasi_aktif . '").value, ';
            echo 'document.getElementById("' . einfugen_schlussel . $model[$i][0] . jumlah_anggota_wanita . '").value, ';
            echo 'document.getElementById("' . einfugen_schlussel . $model[$i][0] . jumlah_anggota_pria . '").value, ';
            echo 'document.getElementById("' . einfugen_schlussel . $model[$i][0] . total_jumlah_anggota . '").value, ';
            echo 'document.getElementById("' . einfugen_schlussel . $model[$i][0] . jumlah_calon_anggota_wanita . '").value, ';
            echo 'document.getElementById("' . einfugen_schlussel . $model[$i][0] . jumlah_calon_anggota_pria . '").value, ';
            echo 'document.getElementById("' . einfugen_schlussel . $model[$i][0] . total_jumlah_calon_anggota . '").value, ';
            echo 'document.getElementById("' . einfugen_schlussel . $model[$i][0] . modal_sendiri . '").value, ';
            echo 'document.getElementById("' . einfugen_schlussel . $model[$i][0] . modal_pinjaman . '").value, ';
            echo 'document.getElementById("' . einfugen_schlussel . $model[$i][0] . modal_penyertaan . '").value, ';
            echo 'document.getElementById("' . einfugen_schlussel . $model[$i][0] . asset . '").value, ';
            echo 'document.getElementById("' . einfugen_schlussel . $model[$i][0] . simpanan_diterima . '").value, ';
            echo 'document.getElementById("' . einfugen_schlussel . $model[$i][0] . pinjaman_diberikan . '").value, ';
            echo 'document.getElementById("' . einfugen_schlussel . $model[$i][0] . volume_usaha . '").value, ';
            echo 'document.getElementById("' . einfugen_schlussel . $model[$i][0] . shu . '").value, ';
            echo 'document.getElementById("' . einfugen_schlussel . $model[$i][0] . yang_memiliki_ijin_usaha . '").value, ';
            echo 'document.getElementById("' . einfugen_schlussel . $model[$i][0] . jumlah_yg_telah_rat . '").value, ';
            echo 'document.getElementById("' . einfugen_schlussel . $model[$i][0] . telah_dinilai_kesehatannya . '").value, ';
            echo 'document.getElementById("' . einfugen_schlussel . $model[$i][0] . sehat . '").value, ';
            echo 'document.getElementById("' . einfugen_schlussel . $model[$i][0] . cukup_sehat . '").value, ';
            echo 'document.getElementById("' . einfugen_schlussel . $model[$i][0] . kurang_sehat . '").value, ';
            echo 'document.getElementById("' . einfugen_schlussel . $model[$i][0] . tidak_sehat . '").value, ';
            echo 'document.getElementById("' . einfugen_schlussel . $model[$i][0] . sangat_tidak_sehat . '").value, ';
            echo 'document.getElementById("' . einfugen_schlussel . $model[$i][0] . tidak_dapat_dinilai . '").value, ';
            echo 'document.getElementById("' . einfugen_schlussel . $model[$i][0] . belum_dinilai . '").value, ';
            echo 'document.getElementById("' . einfugen_schlussel . $model[$i][0] . jumlah_karyawan_pria . '").value, ';
            echo 'document.getElementById("' . einfugen_schlussel . $model[$i][0] . jumlah_karyawan_wanita . '").value, ';
            echo 'document.getElementById("' . einfugen_schlussel . $model[$i][0] . total_jumlah_karyawan . '").value, ';
            echo 'document.getElementById("' . einfugen_schlussel . $model[$i][0] . jumlah_manager_wanita . '").value, ';
            echo 'document.getElementById("' . einfugen_schlussel . $model[$i][0] . jumlah_manager_pria . '").value, ';
            echo 'document.getElementById("' . einfugen_schlussel . $model[$i][0] . total_jumlah_manager . '").value, ';
            echo 'document.getElementById("' . einfugen_schlussel . $model[$i][0] . total_jumlah_tenaga_kerja . '").value';
            break;
        }
    }
}
function drucken_model_von_model_id($id)
{
    $model = new wahle_allen_model_koperasi(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
    $model->ausfuhren();
    $model = $model->erhalten_daten();
    for($i = 0; $i < count($model); $i++) {
        if(strcasecmp($model[$i][0], $id) === 0)
        {
            echo 'id_' . einfugen_schlussel . $model[$i][0] . einfugen_ziel . jumlah_koperasi . ', ';
            echo 'id_' . einfugen_schlussel . $model[$i][0] . einfugen_ziel . jumlah_koperasi_aktif . ', ';
            echo 'id_' . einfugen_schlussel . $model[$i][0] . einfugen_ziel . jumlah_anggota_wanita . ', ';
            echo 'id_' . einfugen_schlussel . $model[$i][0] . einfugen_ziel . jumlah_anggota_pria . ', ';
            echo 'id_' . einfugen_schlussel . $model[$i][0] . einfugen_ziel . total_jumlah_anggota . ', ';
            echo 'id_' . einfugen_schlussel . $model[$i][0] . einfugen_ziel . jumlah_calon_anggota_wanita . ', ';
            echo 'id_' . einfugen_schlussel . $model[$i][0] . einfugen_ziel . jumlah_calon_anggota_pria . ', ';
            echo 'id_' . einfugen_schlussel . $model[$i][0] . einfugen_ziel . total_jumlah_calon_anggota . ', ';
            echo 'id_' . einfugen_schlussel . $model[$i][0] . einfugen_ziel . modal_sendiri . ', ';
            echo 'id_' . einfugen_schlussel . $model[$i][0] . einfugen_ziel . modal_pinjaman . ', ';
            echo 'id_' . einfugen_schlussel . $model[$i][0] . einfugen_ziel . modal_penyertaan . ', ';
            echo 'id_' . einfugen_schlussel . $model[$i][0] . einfugen_ziel . asset . ', ';
            echo 'id_' . einfugen_schlussel . $model[$i][0] . einfugen_ziel . simpanan_diterima . ', ';
            echo 'id_' . einfugen_schlussel . $model[$i][0] . einfugen_ziel . pinjaman_diberikan . ', ';
            echo 'id_' . einfugen_schlussel . $model[$i][0] . einfugen_ziel . volume_usaha . ', ';
            echo 'id_' . einfugen_schlussel . $model[$i][0] . einfugen_ziel . shu . ', ';
            echo 'id_' . einfugen_schlussel . $model[$i][0] . einfugen_ziel . yang_memiliki_ijin_usaha . ', ';
            echo 'id_' . einfugen_schlussel . $model[$i][0] . einfugen_ziel . jumlah_yg_telah_rat . ', ';
            echo 'id_' . einfugen_schlussel . $model[$i][0] . einfugen_ziel . telah_dinilai_kesehatannya . ', ';
            echo 'id_' . einfugen_schlussel . $model[$i][0] . einfugen_ziel . sehat . ', ';
            echo 'id_' . einfugen_schlussel . $model[$i][0] . einfugen_ziel . cukup_sehat . ', ';
            echo 'id_' . einfugen_schlussel . $model[$i][0] . einfugen_ziel . kurang_sehat . ', ';
            echo 'id_' . einfugen_schlussel . $model[$i][0] . einfugen_ziel . tidak_sehat . ', ';
            echo 'id_' . einfugen_schlussel . $model[$i][0] . einfugen_ziel . sangat_tidak_sehat . ', ';
            echo 'id_' . einfugen_schlussel . $model[$i][0] . einfugen_ziel . tidak_dapat_dinilai . ', ';
            echo 'id_' . einfugen_schlussel . $model[$i][0] . einfugen_ziel . belum_dinilai . ', ';
            echo 'id_' . einfugen_schlussel . $model[$i][0] . einfugen_ziel . jumlah_karyawan_pria . ', ';
            echo 'id_' . einfugen_schlussel . $model[$i][0] . einfugen_ziel . jumlah_karyawan_wanita . ', ';
            echo 'id_' . einfugen_schlussel . $model[$i][0] . einfugen_ziel . total_jumlah_karyawan . ', ';
            echo 'id_' . einfugen_schlussel . $model[$i][0] . einfugen_ziel . jumlah_manager_wanita . ', ';
            echo 'id_' . einfugen_schlussel . $model[$i][0] . einfugen_ziel . jumlah_manager_pria . ', ';
            echo 'id_' . einfugen_schlussel . $model[$i][0] . einfugen_ziel . total_jumlah_manager . ', ';
            echo 'id_' . einfugen_schlussel . $model[$i][0] . einfugen_ziel . total_jumlah_tenaga_kerja . '';
            break;
        }
    }
}
function drucken_model()
{
    $model = new wahle_allen_model_koperasi(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
    $model->ausfuhren();
    $model = $model->erhalten_daten();
    for($i = 0; $i < count($model); $i++) {
        echo 'id_' . einfugen_schlussel . $model[$i][0] . einfugen_ziel . jumlah_koperasi . ', ';
        echo 'id_' . einfugen_schlussel . $model[$i][0] . einfugen_ziel . jumlah_koperasi_aktif . ', ';
        echo 'id_' . einfugen_schlussel . $model[$i][0] . einfugen_ziel . jumlah_anggota_wanita . ', ';
        echo 'id_' . einfugen_schlussel . $model[$i][0] . einfugen_ziel . jumlah_anggota_pria . ', ';
        echo 'id_' . einfugen_schlussel . $model[$i][0] . einfugen_ziel . total_jumlah_anggota . ', ';
        echo 'id_' . einfugen_schlussel . $model[$i][0] . einfugen_ziel . jumlah_calon_anggota_wanita . ', ';
        echo 'id_' . einfugen_schlussel . $model[$i][0] . einfugen_ziel . jumlah_calon_anggota_pria . ', ';
        echo 'id_' . einfugen_schlussel . $model[$i][0] . einfugen_ziel . total_jumlah_calon_anggota . ', ';
        echo 'id_' . einfugen_schlussel . $model[$i][0] . einfugen_ziel . modal_sendiri . ', ';
        echo 'id_' . einfugen_schlussel . $model[$i][0] . einfugen_ziel . modal_pinjaman . ', ';
        echo 'id_' . einfugen_schlussel . $model[$i][0] . einfugen_ziel . modal_penyertaan . ', ';
        echo 'id_' . einfugen_schlussel . $model[$i][0] . einfugen_ziel . asset . ', ';
        echo 'id_' . einfugen_schlussel . $model[$i][0] . einfugen_ziel . simpanan_diterima . ', ';
        echo 'id_' . einfugen_schlussel . $model[$i][0] . einfugen_ziel . pinjaman_diberikan . ', ';
        echo 'id_' . einfugen_schlussel . $model[$i][0] . einfugen_ziel . volume_usaha . ', ';
        echo 'id_' . einfugen_schlussel . $model[$i][0] . einfugen_ziel . shu . ', ';
        echo 'id_' . einfugen_schlussel . $model[$i][0] . einfugen_ziel . yang_memiliki_ijin_usaha . ', ';
        echo 'id_' . einfugen_schlussel . $model[$i][0] . einfugen_ziel . jumlah_yg_telah_rat . ', ';
        echo 'id_' . einfugen_schlussel . $model[$i][0] . einfugen_ziel . telah_dinilai_kesehatannya . ', ';
        echo 'id_' . einfugen_schlussel . $model[$i][0] . einfugen_ziel . sehat . ', ';
        echo 'id_' . einfugen_schlussel . $model[$i][0] . einfugen_ziel . cukup_sehat . ', ';
        echo 'id_' . einfugen_schlussel . $model[$i][0] . einfugen_ziel . kurang_sehat . ', ';
        echo 'id_' . einfugen_schlussel . $model[$i][0] . einfugen_ziel . tidak_sehat . ', ';
        echo 'id_' . einfugen_schlussel . $model[$i][0] . einfugen_ziel . sangat_tidak_sehat . ', ';
        echo 'id_' . einfugen_schlussel . $model[$i][0] . einfugen_ziel . tidak_dapat_dinilai . ', ';
        echo 'id_' . einfugen_schlussel . $model[$i][0] . einfugen_ziel . belum_dinilai . ', ';
        echo 'id_' . einfugen_schlussel . $model[$i][0] . einfugen_ziel . jumlah_karyawan_pria . ', ';
        echo 'id_' . einfugen_schlussel . $model[$i][0] . einfugen_ziel . jumlah_karyawan_wanita . ', ';
        echo 'id_' . einfugen_schlussel . $model[$i][0] . einfugen_ziel . total_jumlah_karyawan . ', ';
        echo 'id_' . einfugen_schlussel . $model[$i][0] . einfugen_ziel . jumlah_manager_wanita . ', ';
        echo 'id_' . einfugen_schlussel . $model[$i][0] . einfugen_ziel . jumlah_manager_pria . ', ';
        echo 'id_' . einfugen_schlussel . $model[$i][0] . einfugen_ziel . total_jumlah_manager . ', ';
        if ($i === (count($model) - 1))
            echo 'id_' . einfugen_schlussel . $model[$i][0] . einfugen_ziel . total_jumlah_tenaga_kerja . '';
        else echo 'id_' . einfugen_schlussel . $model[$i][0] . einfugen_ziel . total_jumlah_tenaga_kerja . ', ';
    }
}
?>