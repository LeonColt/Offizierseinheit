/**
 * Created by LC on 10/01/2016.
 */
<?php
require_once '../../../server_skript/base/globale_variable.php';
require_once standart_system_pfad.'server_skript/base/url_kodierer.php';
require_once  standart_system_pfad.'server_skript/base/universal_methode.php';

?>
function optionen_filter(id_typ, id_provinz, id_kabupaten)
{
    var typ = document.getElementById(id_typ);
    var provinz = document.getElementById(id_provinz);
    var kabupaten = document.getElementById(id_kabupaten);
    if(typ.value.localeCompare("<?php echo anzaigen_einstellung_benutzer_optionen_alle; ?>") === 0)
    {
<?php
$einstellung_benutzer = new url_kodierer();
$einstellung_benutzer->hinzufugen(bestellung);
$einstellung_benutzer->hinzufugen(bestellung_anzaigen_einstellung_benutzer);
$einstellung_benutzer->hinzufugen(parameter_anzaigen_einstellung_benutzer_optionen_filter);
$einstellung_benutzer->hinzufugen(anzaigen_einstellung_benutzer_optionen_alle);
$einstellung_benutzer->hinzufugen(parameter_anzaigen_einstellung_benutzer_numerische_seite);
$einstellung_benutzer->hinzufugen((!ist_null(filter_input(INPUT_GET, parameter_anzaigen_einstellung_benutzer_numerische_seite, FILTER_VALIDATE_INT))) ? (filter_input(INPUT_GET, parameter_anzaigen_einstellung_benutzer_numerische_seite, FILTER_VALIDATE_INT)) : (1));
hinzufugen_url_sprache($einstellung_benutzer);
?>
        location.replace("<?php echo $einstellung_benutzer->erhalten(); ?>");
    }
    else if(parseInt(typ.value) === 3)
    {
<?php
$einstellung_benutzer = new url_kodierer();
$einstellung_benutzer->hinzufugen(bestellung);
$einstellung_benutzer->hinzufugen(bestellung_anzaigen_einstellung_benutzer);
$einstellung_benutzer->hinzufugen(parameter_anzaigen_einstellung_benutzer_optionen_filter);
$einstellung_benutzer->hinzufugen('"+typ.value+"');
$einstellung_benutzer->hinzufugen(parameter_anzaigen_einstellung_benutzer_optionen_provinz);
$einstellung_benutzer->hinzufugen('"+provinz.value+"');
$einstellung_benutzer->hinzufugen(parameter_anzaigen_einstellung_benutzer_numerische_seite);
$einstellung_benutzer->hinzufugen((!ist_null(filter_input(INPUT_GET, parameter_anzaigen_einstellung_benutzer_numerische_seite, FILTER_VALIDATE_INT))) ? (filter_input(INPUT_GET, parameter_anzaigen_einstellung_benutzer_numerische_seite, FILTER_VALIDATE_INT)) : (1));
hinzufugen_url_sprache($einstellung_benutzer);
?>
        location.replace("<?php echo $einstellung_benutzer->erhalten(); ?>");
    }
    else if(parseInt(typ.value) === 4)
    {
<?php
$einstellung_benutzer = new url_kodierer();
$einstellung_benutzer->hinzufugen(bestellung);
$einstellung_benutzer->hinzufugen(bestellung_anzaigen_einstellung_benutzer);
$einstellung_benutzer->hinzufugen(parameter_anzaigen_einstellung_benutzer_optionen_filter);
$einstellung_benutzer->hinzufugen('"+typ.value+"');
$einstellung_benutzer->hinzufugen(parameter_anzaigen_einstellung_benutzer_optionen_provinz);
$einstellung_benutzer->hinzufugen('"+provinz.value+"');
$einstellung_benutzer->hinzufugen(parameter_anzaigen_einstellung_benutzer_optionen_kabupaten);
$einstellung_benutzer->hinzufugen('"+kabupaten.value+"');
$einstellung_benutzer->hinzufugen(parameter_anzaigen_einstellung_benutzer_numerische_seite);
$einstellung_benutzer->hinzufugen((!ist_null(filter_input(INPUT_GET, parameter_anzaigen_einstellung_benutzer_numerische_seite, FILTER_VALIDATE_INT))) ? (filter_input(INPUT_GET, parameter_anzaigen_einstellung_benutzer_numerische_seite, FILTER_VALIDATE_INT)) : (1));
hinzufugen_url_sprache($einstellung_benutzer);
?>
        location.replace("<?php echo $einstellung_benutzer->erhalten(); ?>");
    }
    else
    {
<?php
$einstellung_benutzer = new url_kodierer();
$einstellung_benutzer->hinzufugen(bestellung);
$einstellung_benutzer->hinzufugen(bestellung_anzaigen_einstellung_benutzer);
$einstellung_benutzer->hinzufugen(parameter_anzaigen_einstellung_benutzer_optionen_filter);
$einstellung_benutzer->hinzufugen('"+typ.value+"');
$einstellung_benutzer->hinzufugen(parameter_anzaigen_einstellung_benutzer_numerische_seite);
$einstellung_benutzer->hinzufugen((!ist_null(filter_input(INPUT_GET, parameter_anzaigen_einstellung_benutzer_numerische_seite, FILTER_VALIDATE_INT))) ? (filter_input(INPUT_GET, parameter_anzaigen_einstellung_benutzer_numerische_seite, FILTER_VALIDATE_INT)) : (1));
hinzufugen_url_sprache($einstellung_benutzer);
?>
        location.replace("<?php echo $einstellung_benutzer->erhalten(); ?>");
    }
}
