<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 20/12/2015
 * Time: 10:21
 */
require_once standart_system_pfad.'server_skript/wahle/wahle_allen_benutzer_typ.php';
require_once standart_system_pfad.'server_skript/base/url_kodierer.php';
require_once standart_system_pfad.'server_skript/base/csrf_sicherheit.php';
require_once standart_system_pfad.'server_skript/base/id_generator.php';
require_once standart_system_pfad.'server_skript/wahle/erhalten_letzte_benutzer_id.php';
require_once standart_system_pfad.'server_skript/wahle/wahle_allen_provinz.php';
function anhanger_andern_passwort_aktion()
{
    echo '<input type="hidden" name="'.bestellung.'" value="'.bestellung_andern_passwort.'">';
}
function anhanger_andern_passwort_benutzer_id()
{
    echo '<input type="hidden" name="'.hinzufugen_benutzer_id.'" value="'.$_SESSION[id_benutzername].'">';
}