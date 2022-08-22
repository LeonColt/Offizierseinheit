<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 12/12/2015
 * Time: 14:12
 */
error_reporting(E_ALL & ~E_NOTICE);
require_once 'server_skript/base/globale_variable.php';
require_once standart_system_pfad.'server_skript/base/universal_methode.php';
require_once standart_system_pfad.'server_skript/base/sitzung_starter.php';
require_once standart_system_pfad.'server_skript/base/url_kodierer.php';
if(ist_null(filter_input(INPUT_GET, bestellung)) || ist_null(filter_input(INPUT_GET, parameter_sprache)) || (strlen(filter_input(INPUT_GET, parameter_sprache)) > 2 && strlen(filter_input(INPUT_GET, parameter_sprache)) < 2))
{
    $url = new url_kodierer();
    $url->hinzufugen(bestellung);
    $url->hinzufugen(bestellung_bindestricht_brett);
    hinzufugen_url_sprache($url);
    umleitung($url->erhalten());
}
else
{
    if(strcasecmp(filter_input(INPUT_GET, parameter_sprache), standard_sprache) !== 0)
    {
        if(!file_exists(standart_system_pfad.standard_pfad.filter_input(INPUT_GET, parameter_sprache))
            || !file_exists(xml_lader(zeichenfolge))
            || !file_exists(xml_lader(informationen))
            || !file_exists(xml_lader(kontakt)) || !file_exists(xml_lader(tor_storungsmeldung))
            || !file_exists(xml_lader(verbindung_storungsmeldung)))
        {
            if(ist_null(filter_input(INPUT_GET, bestellung)))
            {
                $url = new url_kodierer();
                $url->hinzufugen(bestellung);
                $url->hinzufugen(bestellung_bindestricht_brett);
                hinzufugen_url_sprache($url, true);
                umleitung($url->erhalten());
            }
            else
            {
                $url = new url_kodierer();
                $url->hinzufugen(bestellung);
                $url->hinzufugen(filter_input(INPUT_GET, bestellung));
                hinzufugen_url_sprache($url, true);
                umleitung($url->erhalten());
            }
        }
    }
    switch(filter_input(INPUT_GET, bestellung))
    {
        case bestellung_bindestricht_brett: bestellung_bindestricht_brett(); break;
        case bestellung_anzaigen_anmeldung: bestellung_anzaigen_anmeldung(); break;
        case bestellung_anzaigen_einfugen: bestellung_anzaigen_einfugen();  break;
        case bestellung_bericht_nationalen: bestellung_bericht_nationalen();  break;
        case bestellung_bericht_provinz: bestellung_bericht_provinz(); break;
        case bestellung_bericht_kabupaten: bestellung_bericht_kabupaten(); break;
        case bestellung_hinzufugen_benutzer_anzaigen: bestellung_hinzufugen_benutzer_anzaigen(); break;
        case bestellung_anzaigen_andern_passwort: bestellung_anzaigen_andern_passwort(); break;
        case bestellung_fehler: bestellung_fehler(); break;
        case bestellung_anzaigen_einstellung_nachricht_und_kontakt: bestellung_anzaigen_einstellung_nachricht_und_kontakt(); break;
        case bestellung_anzaigen_perfil: bestellung_hinzufugen_benutzer_anzaigen(); break;
        case bestellung_anzaigen_einstellung_benutzer: bestellung_anzaigen_einstellung_benutzer(); break;
        case bestellung_anzaigen_einfugen_datei: bestellung_anzaigen_einfugen_datei(); break;
        default:
        {
            require_once standart_system_pfad.'anzaigen/ausfuhren.php';
            exit();
        } break;
    }
}
function bestellung_bindestricht_brett()
{
    if(ist_sitzung_korrigieren())
    {
        require_once standart_system_pfad.'anzaigen/bindestrich_brett.php';
        $ausfuhren = new bindestrich_brett();
        $ausfuhren->ausfuhren();
        exit();
    }
    else
    {
        require_once standart_system_pfad.'anzaigen/anzaigen_anmeldung.php';
        $ausfuhren = new anzaigen_anmeldung();
        $ausfuhren->ausfuhren();
        exit();
    }
}
function bestellung_anzaigen_anmeldung()
{
    if(ist_sitzung_korrigieren())
    {
        $url = new url_kodierer();
        $url->hinzufugen(bestellung);
        $url->hinzufugen(bestellung_bindestricht_brett);
        umleitung($url->erhalten());
    }
    else
    {
        require_once standart_system_pfad.'anzaigen/anzaigen_anmeldung.php';
        $ausfuhren = new anzaigen_anmeldung();
        $ausfuhren->ausfuhren();
        exit();
    }
}
function bestellung_anzaigen_einfugen()
{
    if(ist_sitzung_korrigieren())
    {
        require_once standart_system_pfad.'anzaigen/anzaigen_einfugen.php';
        $ausfuhren = new anzaigen_einfugen();
        $ausfuhren->ausfuhren();
        exit();
    }
    else
    {
        require_once standart_system_pfad.'anzaigen/anzaigen_anmeldung.php';
        $ausfuhren = new anzaigen_anmeldung();
        $ausfuhren->ausfuhren();
        exit();
    }
}
function bestellung_bericht_nationalen()
{
    if(ist_sitzung_korrigieren())
    {
        if(ist_benutzer_admin() || ist_benutzer_nationalen())
        {
            require_once standart_system_pfad.'anzaigen/bericht_nationalen.php';
            $ausfuhren= new bericht_nationalen();
            $ausfuhren->ausfuhren();
            exit();
        }
        else
        {
            $url = new url_kodierer();
            $url->hinzufugen(bestellung);
            $url->hinzufugen(bestellung_bindestricht_brett);
            hinzufugen_url_sprache($url);
            umleitung($url->erhalten());
        }
    }
    else
    {
        require_once standart_system_pfad.'anzaigen/anzaigen_anmeldung.php';
        $ausfuhren = new anzaigen_anmeldung();
        $ausfuhren->ausfuhren();
        exit();
    }
}
function bestellung_bericht_provinz()
{
    if(ist_sitzung_korrigieren())
    {
        if(ist_benutzer_admin() || ist_benutzer_nationalen())
        {
            require_once standart_system_pfad.'anzaigen/bericht_provinz.php';
            $ausfuhren= new bericht_provinz();
            $ausfuhren->ausfuhren();
            exit();
        }
        else
        {
            $url = new url_kodierer();
            $url->hinzufugen(bestellung);
            $url->hinzufugen(bestellung_bindestricht_brett);
            hinzufugen_url_sprache($url);
            umleitung($url->erhalten());
        }
    }
    else
    {
        require_once standart_system_pfad.'anzaigen/anzaigen_anmeldung.php';
        $ausfuhren = new anzaigen_anmeldung();
        $ausfuhren->ausfuhren();
        exit();
    }
}
function bestellung_bericht_kabupaten()
{
    if(ist_sitzung_korrigieren())
    {
        if(ist_benutzer_admin() || ist_benutzer_nationalen() || ist_benutzer_provinz())
        {
            require_once standart_system_pfad.'anzaigen/bericht_kabupaten.php';
            $ausfuhren= new bericht_kabupaten();
            $ausfuhren->ausfuhren();
            exit();
        }
        else
        {
            $url = new url_kodierer();
            $url->hinzufugen(bestellung);
            $url->hinzufugen(bestellung_bindestricht_brett);
            hinzufugen_url_sprache($url);
            umleitung($url->erhalten());
        }
    }
    else
    {
        require_once standart_system_pfad.'anzaigen/anzaigen_anmeldung.php';
        $ausfuhren = new anzaigen_anmeldung();
        $ausfuhren->ausfuhren();
        exit();
    }
}
function bestellung_anzaigen_andern_passwort()
{
    if(ist_sitzung_korrigieren())
    {
        require_once standart_system_pfad.'anzaigen/anzaigen_andern_passwort.php';
        $ausfuhren = new anzaigen_andern_passwort();
        $ausfuhren->ausfuhren();
        exit();
    }
    else
    {
        require_once standart_system_pfad.'anzaigen/anzaigen_anmeldung.php';
        $ausfuhren = new anzaigen_anmeldung();
        $ausfuhren->ausfuhren();
        exit();
    }
}
function bestellung_hinzufugen_benutzer_anzaigen()
{
    if(ist_sitzung_korrigieren())
    {
        if(strcasecmp(filter_input(INPUT_GET, bestellung), bestellung_hinzufugen_benutzer_anzaigen) === 0)
        {
            if(ist_benutzer_admin())
            {
                require_once standart_system_pfad.'anzaigen/anzaigen_hinzufugen_benutzer.php';
                $ausfuhren = new anzaigen_hinzufugen_benutzer();
                $ausfuhren->ausfuhren();
                exit();
            }
            else
            {
                $url = new url_kodierer();
                $url->hinzufugen(bestellung);
                $url->hinzufugen(bestellung_anzaigen_perfil);
                hinzufugen_url_sprache($url);
                umleitung($url->erhalten());
            }
        }
        else
        {
            require_once standart_system_pfad.'anzaigen/anzaigen_hinzufugen_benutzer.php';
            $ausfuhren = new anzaigen_hinzufugen_benutzer();
            $ausfuhren->ausfuhren();
            exit();
        }
    }
    else
    {
        require_once standart_system_pfad.'anzaigen/anzaigen_anmeldung.php';
        $ausfuhren = new anzaigen_anmeldung();
        $ausfuhren->ausfuhren();
        exit();
    }
}
function bestellung_fehler()
{
    require_once 'anzaigen/fehler.php';
    $ausfuhren = new fehler();
    $ausfuhren->ausfuhren();
    exit();
}
function bestellung_anzaigen_einstellung_nachricht_und_kontakt()
{
    if(ist_sitzung_korrigieren())
    {
        if(ist_benutzer_admin())
        {
            require_once standart_system_pfad.'anzaigen/anzaigen_einstellung_nachricht_und_kontakt.php';
            $ausfuhren = new anzaigen_einstellung_nachricht_und_kontakt();
            $ausfuhren->ausfuhren();
            exit();
        }
        else
        {
            $url = new url_kodierer();
            $url->hinzufugen(bestellung);
            $url->hinzufugen(bestellung_bindestricht_brett);
            hinzufugen_url_sprache($url);
            umleitung($url->erhalten());
        }
    }
    else
    {
        require_once standart_system_pfad.'anzaigen/anzaigen_anmeldung.php';
        $ausfuhren = new anzaigen_anmeldung();
        $ausfuhren->ausfuhren();
        exit();
    }
}
function bestellung_anzaigen_einstellung_benutzer()
{
    if(ist_sitzung_korrigieren())
    {
        if(ist_benutzer_admin())
        {
            require_once standart_system_pfad.'anzaigen/anzaigen_einstellung_benutzer.php';
            $ausfuhren = new anzaigen_einstellung_benutzer();
            $ausfuhren->ausfuhren();
            exit();
        }
        else
        {
            $url = new url_kodierer();
            $url->hinzufugen(bestellung);
            $url->hinzufugen(bestellung_bindestricht_brett);
            hinzufugen_url_sprache($url);
            umleitung($url->erhalten());
        }
    }
    else
    {
        require_once standart_system_pfad.'anzaigen/anzaigen_anmeldung.php';
        $ausfuhren = new anzaigen_anmeldung();
        $ausfuhren->ausfuhren();
        exit();
    }
}
function bestellung_anzaigen_einfugen_datei()
{
    if(ist_sitzung_korrigieren())
    {
        require_once standart_system_pfad.'anzaigen/anzaigen_einfugen_datei.php';
        $ausfuhren = new anzaigen_einfugen_datei();
        $ausfuhren->ausfuhren();
        exit();
    }
    else
    {
        require_once standart_system_pfad.'anzaigen/anzaigen_anmeldung.php';
        $ausfuhren = new anzaigen_anmeldung();
        $ausfuhren->ausfuhren();
        exit();
    }
}