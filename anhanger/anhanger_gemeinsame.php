<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 17/12/2015
 * Time: 09:40
 */
require_once standart_system_pfad.'server_skript/base/globale_variable.php';
require_once standart_system_pfad.'server_skript/base/globale_variable_fur_datei.php';
require_once standart_system_pfad.'server_skript/base/csrf_sicherheit.php';
require_once standart_system_pfad.'server_skript/base/pfad_kodierer.php';
require_once standart_system_pfad.'server_skript/base/url_kodierer.php';
require_once standart_system_pfad.'server_skript/base/universal_methode.php';
function anhanger_gemeinsame_token()
{
    $csrf = new csrf_sicherheit();
    $csrf->ausfuhren();
    echo '<input type="hidden" name="'.csrf_schlussel.'" id="'.csrf_schlussel.'" value="'.$csrf->erhalten_schlussel().'">';
    echo '<input type="hidden" name="'.csrf_token.'" id="'.csrf_token.'" value="'.$csrf->erhalten_token().'">';
    return $csrf;
}
function anhanger_form_url_aktion()
{
    $url = new url_kodierer();
    $url->hinzufugen(bestellung);
    $url->hinzufugen(bin2hex(openssl_random_pseudo_bytes(rand(csrf_token_length, (int)(anmeldung_zeit/(rand(5, 100)))))));
    hinzufugen_url_sprache($url);
    echo $url->erhalten();
}
function anhanger_erhalten_informationen()
{
    echo '<div id="header"></div>';
    echo '<div id ="info">';
    echo '<marquee direction="left" scrollamount="5" text-align="center">';
    $pfad = new pfad_kodierer();
    $pfad->hinzufugen(standart_system_pfad);
    $pfad->hinzufugen(standard_pfad);
    $pfad->hinzufugen(standard_sprache);
    $pfad->hinzufugen(informationen);
    $xml = simplexml_load_file($pfad->erhalten());
    echo '<p>'.htmlentities($xml->text).'</p></marquee>';
    echo '</div>';
}
function anhanger_erhalten_kontakt_und_hilfe()
{
    echo '<input type="checkbox"  id="cek">';
    echo '<label id="tombol" for="cek">';
    echo '<span id="buka">Help</span>';
    echo '<span id="tutup">Help</span>';
    echo '</label>';
    echo '<div id="box">';
    echo '<div id="konten">';
    $pfad = new pfad_kodierer();
    $pfad->hinzufugen(standart_system_pfad);
    $pfad->hinzufugen(standard_pfad);
    $pfad->hinzufugen(standard_sprache);
    $pfad->hinzufugen(kontakt);
    $xml = simplexml_load_file($pfad->erhalten());
    echo htmlspecialchars($xml->text);
    echo '</div>';
    echo '</div>';
}