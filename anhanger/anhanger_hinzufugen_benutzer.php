<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 16/12/2015
 * Time: 16:59
 */
require_once standart_system_pfad.'server_skript/wahle/wahle_allen_benutzer_typ.php';
require_once standart_system_pfad.'server_skript/base/url_kodierer.php';
require_once standart_system_pfad.'server_skript/base/csrf_sicherheit.php';
require_once standart_system_pfad.'server_skript/base/id_generator.php';
require_once standart_system_pfad.'server_skript/wahle/erhalten_letzte_benutzer_id.php';
require_once standart_system_pfad.'server_skript/wahle/wahle_allen_provinz.php';
require_once standart_system_pfad.'server_skript/base/universal_methode.php';
function anhanger_hinzufugen_benutzer_aktion()
{
    if(strcasecmp(filter_input(INPUT_GET, bestellung), bestellung_hinzufugen_benutzer_anzaigen) === 0)
        echo '<input type="hidden" name="'.bestellung.'" value="'.bestellung_hinzufugen_benutzer.'">';
    else echo '<input type="hidden" name="'.bestellung.'" value="'.bestellung_update_benutzer_perfil.'">';
}
function anhanger_hinzufugen_benutzer_id()
{
    if(strcasecmp(filter_input(INPUT_GET, bestellung), bestellung_hinzufugen_benutzer_anzaigen) === 0)
    {
        $id = new erhalten_letzte_benutzer_id();
        $id->ausfuhren();
        $id = $id->erhalten_daten();
        $generator = new id_generator();
        $id = $generator->erhalten_id($id);
        echo '<input type="hidden" name="'.hinzufugen_benutzer_id.'" value="'.$id.'" readonly="readonly">';
    }
    else echo '<input type="hidden" name="'.hinzufugen_benutzer_id.'" value="'.$_SESSION[id_benutzername].'" readonly="readonly">';
}
function anhanger_hinzufugen_benutzer_benutzer_typ()
{
    if(strcasecmp(filter_input(INPUT_GET, bestellung), bestellung_hinzufugen_benutzer_anzaigen) === 0)
    {
        echo '<div style=" float:left;margin-left:270px; clear:both;margin-top:40px; "><b>Level</b></div>';
        echo '<div style=" float:left;margin-left:40px;margin-top:40px;">';
        echo '<select id="'.hinzufugen_benutzer_typ.'" name="'.hinzufugen_benutzer_typ.'" onchange="verstecken_karte_provinz_und_kabupaten(this.id, '.hinzufugen_benutzer_provinz.'.id, '.hinzufugen_benutzer_kabupaten.'.id);">';
        $benutzer_type = new wahle_allen_benutzer_typ();
        $benutzer_type->ausfuhren();
        $benutzer_type = $benutzer_type->erhalten_daten();
        foreach ($benutzer_type as $daten)
        {
            echo '<option value="'.$daten[0].'">'.$daten[1].'</option>';
        }
        echo '</select>';
        echo '</div>';
    }
}
function anhanger_hinzufugen_benutzer_provinz()
{
    if(strcasecmp(filter_input(INPUT_GET, bestellung), bestellung_hinzufugen_benutzer_anzaigen) === 0)
    {
        echo '<div style=" float:left;margin-left:50px; margin-top:40px;visibility: hidden;" id="p_titel"><b>Provinsi</b></div>';
        echo '<div style=" float:left;margin-left:20px; margin-top:40px;visibility: hidden;" id="p_korper">';
        echo '<select id="'.hinzufugen_benutzer_provinz.'" name="'.hinzufugen_benutzer_provinz.'" style="visibility: hidden;" onchange="fullung_kab_kota('.hinzufugen_benutzer_provinz.'.id, '.hinzufugen_benutzer_kabupaten.'.id)">';
        $xml = simplexml_load_file(xml_lader(zeichenfolge));
        echo '<option value="'.$xml->standart_optionen_provinz.'">'.$xml->standart_optionen_provinz.'</option>';
        $provinz = new wahle_allen_provinz(standart_system_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
        $provinz->ausfuhren();
        $provinz = $provinz->erhalten_daten();
        foreach ($provinz as $daten)
        {
            echo '<option value="'.$daten[0].'">'.$daten[1].'</option>';
        }
        echo '</select>';
        echo '</div>';
    }
}
function anhanger_hinzufugen_benutzer_kabupaten()
{
    echo '<div style=" float:left;margin-left:50px;margin-top:40px; visibility: hidden;"  id="k_titel"><b>Kabupaten</b></div>';
    echo '<div style=" float:left;margin-left:20px; margin-top:40px;visibility: hidden;"  id="k_korper">';
    echo '<select id="'.hinzufugen_benutzer_kabupaten.'" name="'.hinzufugen_benutzer_kabupaten.'" style="visibility: hidden;">';
    $xml = simplexml_load_file(xml_lader(zeichenfolge));
    echo '<option value="'.$xml->standart_optionen_kabupaten_kota.'">'.$xml->standart_optionen_kabupaten_kota.'</option>';
    echo '</select>';
    echo '</div>';
}