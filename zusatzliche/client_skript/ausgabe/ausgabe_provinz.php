<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once '../../../server_skript/base/globale_variable.php';
require_once standart_system_pfad.'server_skript/base/universal_methode.php';
require_once standart_system_pfad.'server_skript/base/url_kodierer.php';
require_once standart_system_pfad.'server_skript/base/globale_variable_fur_datei.php';
require_once standart_system_pfad.'server_skript/wahle/wahle_allen_model_koperasi.php';
require_once standart_system_pfad.'server_skript/base/pfad_kodierer.php';
?>
function ausgabe_provinz_jahr_und_monat_turner()
{
<?php
$model = new wahle_allen_model_koperasi(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
$model->ausfuhren();
$model = $model->erhalten_daten();
$kodierer = new pfad_kodierer();
$kodierer->hinzufugen(standart_system_pfad);
$kodierer->hinzufugen(ordner_server_skript);
$kodierer->hinzufugen(ordner_xml);
$kodierer->hinzufugen(standard_sprache);
$kodierer->hinzufugen(zeichenfolge);
$allen = simplexml_load_file($kodierer->erhalten());
$ausfuhren = new url_kodierer();
$ausfuhren->hinzufugen(bestellung);
$ausfuhren->hinzufugen(bestellung_bericht_provinz);
$ausfuhren->hinzufugen(ausgabe_jahr);
$ausfuhren->hinzufugen('"+document.getElementById("'.ausgabe_jahr.'").value+"');
$ausfuhren->hinzufugen(ausgabe_monat);
$ausfuhren->hinzufugen('"+document.getElementById("'.ausgabe_monat.'").value+"');
$ausfuhren->hinzufugen(ausgabe_parameter_model);
$ausfuhren->hinzufugen('"+document.getElementById("'.ausgabe_parameter_model.'").value+"');
hinzufugen_url_sprache($ausfuhren);
?>
    location.replace("<?php echo $ausfuhren->erhalten(); ?>);
}
