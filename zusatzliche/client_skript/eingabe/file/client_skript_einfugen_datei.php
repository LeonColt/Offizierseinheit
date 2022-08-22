/**
 * Created by PhpStorm.
 * User: LC
 * Date: 14/01/2016
 * Time: 17:55
 */
<?php
require_once '../../../../server_skript/base/globale_variable.php';
require_once standart_system_pfad.'server_skript/base/url_kodierer.php';
require_once standart_system_pfad.'server_skript/base/universal_methode.php';
?>
function monat_numerische(monat)
{
    if(monat.localeCompare("January") === 0) return 1;
    else if(monat.localeCompare( "February") === 0) return 2;
    else if(monat.localeCompare( "March") === 0) return 3;
    else if(monat.localeCompare( "April") === 0) return 4;
    else if(monat.localeCompare( "May") === 0) return 5;
    else if(monat.localeCompare( "June") === 0) return 6;
    else if(monat.localeCompare( "July") === 0) return 7;
    else if(monat.localeCompare( "August") === 0) return 8;
    else if(monat.localeCompare( "September") === 0) return 9;
    else if(monat.localeCompare( "October") === 0) return 10;
    else if(monat.localeCompare( "November") === 0) return 11;
    else if(monat.localeCompare( "December") === 0) return 12;
    return -1;
}
function datum_konverter(datum_wert)
{
    var datum = datum_wert.split(" ");
    datum[0] = monat_numerische(datum[0]);
    return datum.join("-");
}
function optionen_filter(id_datum, id_typ, id_provinz, id_kabupaten)
{
    var datum = document.getElementById(id_datum);
    var typ = document.getElementById(id_typ);
    var provinz = document.getElementById(id_provinz);
    var kabupaten = document.getElementById(id_kabupaten);
    if(typ.value.localeCompare("<?php echo anzaigen_einstellung_benutzer_optionen_alle; ?>") === 0)
    {
        if(datum.value.length < 1)
        {
            <?php
            $url = new url_kodierer();
            $url->hinzufugen(bestellung);
            $url->hinzufugen(bestellung_anzaigen_einfugen_datei);
            $url->hinzufugen(parameter_anzaigen_einfugen_datei_optionen_filter);
            $url->hinzufugen(anzaigen_einfugen_datei_optionen_alle);
            $url->hinzufugen(parameter_anzaigen_einfugen_datei_numerische_seite);
            $url->hinzufugen((!ist_null(filter_input(INPUT_GET, parameter_anzaigen_einstellung_benutzer_numerische_seite, FILTER_VALIDATE_INT))) ? (filter_input(INPUT_GET, parameter_anzaigen_einstellung_benutzer_numerische_seite, FILTER_VALIDATE_INT)) : (1));
            hinzufugen_url_sprache($url);
            ?>
            location.replace("<?php echo $url->erhalten(); ?>");
        }
        else
        {
            <?php
            $url = new url_kodierer();
            $url->hinzufugen(bestellung);
            $url->hinzufugen(bestellung_anzaigen_einfugen_datei);
            $url->hinzufugen(parameter_anzaigen_einfugen_datei_optionen_filter);
            $url->hinzufugen(anzaigen_einfugen_datei_optionen_alle);
            $url->hinzufugen(parameter_anzaigen_einfugen_datei_datum);
            $url->hinzufugen('"+datum_konverter(datum.value)+"');
            $url->hinzufugen(parameter_anzaigen_einfugen_datei_numerische_seite);
            $url->hinzufugen((!ist_null(filter_input(INPUT_GET, parameter_anzaigen_einstellung_benutzer_numerische_seite, FILTER_VALIDATE_INT))) ? (filter_input(INPUT_GET, parameter_anzaigen_einstellung_benutzer_numerische_seite, FILTER_VALIDATE_INT)) : (1));
            hinzufugen_url_sprache($url);
            ?>
            location.replace("<?php echo $url->erhalten(); ?>");
        }
    }
    else if(parseInt(typ.value) === 3)
    {
        if(datum.value.length < 1)
        {
            <?php
            $url = new url_kodierer();
            $url->hinzufugen(bestellung);
            $url->hinzufugen(bestellung_anzaigen_einfugen_datei);
            $url->hinzufugen(parameter_anzaigen_einfugen_datei_optionen_filter);
            $url->hinzufugen('"+typ.value+"');
            $url->hinzufugen(parameter_anzaigen_einfugen_datei_optionen_provinz);
            $url->hinzufugen('"+provinz.value+"');
            $url->hinzufugen(parameter_anzaigen_einfugen_datei_numerische_seite);
            $url->hinzufugen((!ist_null(filter_input(INPUT_GET, parameter_anzaigen_einstellung_benutzer_numerische_seite, FILTER_VALIDATE_INT))) ? (filter_input(INPUT_GET, parameter_anzaigen_einstellung_benutzer_numerische_seite, FILTER_VALIDATE_INT)) : (1));
            hinzufugen_url_sprache($url);
            ?>
            location.replace("<?php echo $url->erhalten(); ?>");
        }
        else
        {
            <?php
            $url = new url_kodierer();
            $url->hinzufugen(bestellung);
            $url->hinzufugen(bestellung_anzaigen_einfugen_datei);
            $url->hinzufugen(parameter_anzaigen_einfugen_datei_optionen_filter);
            $url->hinzufugen('"+typ.value+"');
            $url->hinzufugen(parameter_anzaigen_einfugen_datei_datum);
            $url->hinzufugen('"+datum_konverter(datum.value)+"');
            $url->hinzufugen(parameter_anzaigen_einfugen_datei_optionen_provinz);
            $url->hinzufugen('"+provinz.value+"');
            $url->hinzufugen(parameter_anzaigen_einfugen_datei_numerische_seite);
            $url->hinzufugen((!ist_null(filter_input(INPUT_GET, parameter_anzaigen_einstellung_benutzer_numerische_seite, FILTER_VALIDATE_INT))) ? (filter_input(INPUT_GET, parameter_anzaigen_einstellung_benutzer_numerische_seite, FILTER_VALIDATE_INT)) : (1));
            hinzufugen_url_sprache($url);
            ?>
            location.replace("<?php echo $url->erhalten(); ?>");
        }
    }
    else if(parseInt(typ.value) === 4)
    {
        if(datum.value.length < 1)
        {
            <?php
            $url = new url_kodierer();
            $url->hinzufugen(bestellung);
            $url->hinzufugen(bestellung_anzaigen_einfugen_datei);
            $url->hinzufugen(parameter_anzaigen_einfugen_datei_optionen_filter);
            $url->hinzufugen('"+typ.value+"');
            $url->hinzufugen(parameter_anzaigen_einfugen_datei_optionen_provinz);
            $url->hinzufugen('"+provinz.value+"');
            $url->hinzufugen(parameter_anzaigen_einfugen_datei_optionen_kabupaten);
            $url->hinzufugen('"+kabupaten.value+"');
            $url->hinzufugen(parameter_anzaigen_einfugen_datei_numerische_seite);
            $url->hinzufugen((!ist_null(filter_input(INPUT_GET, parameter_anzaigen_einstellung_benutzer_numerische_seite, FILTER_VALIDATE_INT))) ? (filter_input(INPUT_GET, parameter_anzaigen_einstellung_benutzer_numerische_seite, FILTER_VALIDATE_INT)) : (1));
            hinzufugen_url_sprache($url);
            ?>
            location.replace("<?php echo $url->erhalten(); ?>");
        }
        else
        {
            <?php
            $url = new url_kodierer();
            $url->hinzufugen(bestellung);
            $url->hinzufugen(bestellung_anzaigen_einfugen_datei);
            $url->hinzufugen(parameter_anzaigen_einfugen_datei_optionen_filter);
            $url->hinzufugen('"+typ.value+"');
            $url->hinzufugen(parameter_anzaigen_einfugen_datei_datum);
            $url->hinzufugen('"+datum_konverter(datum.value)+"');
            $url->hinzufugen(parameter_anzaigen_einfugen_datei_optionen_provinz);
            $url->hinzufugen('"+provinz.value+"');
            $url->hinzufugen(parameter_anzaigen_einfugen_datei_optionen_kabupaten);
            $url->hinzufugen('"+kabupaten.value+"');
            $url->hinzufugen(parameter_anzaigen_einfugen_datei_numerische_seite);
            $url->hinzufugen((!ist_null(filter_input(INPUT_GET, parameter_anzaigen_einstellung_benutzer_numerische_seite, FILTER_VALIDATE_INT))) ? (filter_input(INPUT_GET, parameter_anzaigen_einstellung_benutzer_numerische_seite, FILTER_VALIDATE_INT)) : (1));
            hinzufugen_url_sprache($url);
            ?>
            location.replace("<?php echo $url->erhalten(); ?>");
        }
    }
    else
    {
if(datum.value.length < 1)
{
    <?php
    $url = new url_kodierer();
    $url->hinzufugen(bestellung);
    $url->hinzufugen(bestellung_anzaigen_einfugen_datei);
    $url->hinzufugen(parameter_anzaigen_einfugen_datei_optionen_filter);
    $url->hinzufugen('"+typ.value+"');
    $url->hinzufugen(parameter_anzaigen_einfugen_datei_numerische_seite);
    $url->hinzufugen((!ist_null(filter_input(INPUT_GET, parameter_anzaigen_einstellung_benutzer_numerische_seite, FILTER_VALIDATE_INT))) ? (filter_input(INPUT_GET, parameter_anzaigen_einstellung_benutzer_numerische_seite, FILTER_VALIDATE_INT)) : (1));
        hinzufugen_url_sprache($url);
        ?>
        location.replace("<?php echo $url->erhalten(); ?>");
}
else
{
<?php
$url = new url_kodierer();
$url->hinzufugen(bestellung);
$url->hinzufugen(bestellung_anzaigen_einfugen_datei);
$url->hinzufugen(parameter_anzaigen_einfugen_datei_optionen_filter);
$url->hinzufugen('"+typ.value+"');
$url->hinzufugen(parameter_anzaigen_einfugen_datei_datum);
$url->hinzufugen('"+datum_konverter(datum.value)+"');
$url->hinzufugen(parameter_anzaigen_einfugen_datei_numerische_seite);
$url->hinzufugen((!ist_null(filter_input(INPUT_GET, parameter_anzaigen_einstellung_benutzer_numerische_seite, FILTER_VALIDATE_INT))) ? (filter_input(INPUT_GET, parameter_anzaigen_einstellung_benutzer_numerische_seite, FILTER_VALIDATE_INT)) : (1));
hinzufugen_url_sprache($url);
?>
location.replace("<?php echo $url->erhalten(); ?>");
}
    }
}