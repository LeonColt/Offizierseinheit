<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 14/01/2016
 * Time: 13:26
 */
require_once standart_system_pfad.'server_skript/einfugen/datei/datei.php';
class datei_loschen
{
    private $datei, $datei_name;
    public function ausfuhren()
    {
        $this->satz_datei();
        $this->ist_nicht_datei();
        if(ist_token_korrigieren())
        {
            $this->satz_datei();
            $this->ist_nicht_datei();
            $xml_pfad = new pfad_kodierer();
            $xml_pfad->hinzufugen(standart_system_pfad);
            $xml_pfad->hinzufugen(ordner_server_skript);
            $xml_pfad->hinzufugen(ordner_xml);
            $xml_pfad->hinzufugen(dateien);
            $dateien = simplexml_load_file($xml_pfad->erhalten());
            $id = explode('nmlf', filter_input(INPUT_GET, parameter_anzaigen_einfugen_datei_datei_name_fur_mulleimer));
            $ziel = -1;
            for($i = 0; $i< count($dateien->datei); $i++)
            {
                $xml_id = explode('-', $dateien->datei[$i]->id);
                if(strcasecmp($xml_id[0], $id[0]) === 0)
                {
                    $ziel = $i;
                    break;
                }
            }
            if($this->ist_benutzer_zulassig($dateien, $ziel))
            {
                unset($dateien->datei[$ziel]);
                if($dateien->asXML($xml_pfad->erhalten()))
                {
                    if(unlink($this->datei))
                    {
                        $xml = simplexml_load_file(xml_lader(zeichenfolge));
                        $ausfuhren = new url_kodierer();
                        $ausfuhren->hinzufugen(bestellung);
                        $ausfuhren->hinzufugen(bestellung_anzaigen_einfugen_datei);
                        $ausfuhren->hinzufugen(parameter_anzaigen_einfugen_datei_optionen_filter);
                        $ausfuhren->hinzufugen(anzaigen_einfugen_datei_optionen_alle);
                        $ausfuhren->hinzufugen(parameter_anzaigen_einfugen_datei_numerische_seite);
                        $ausfuhren->hinzufugen(1);
                        hinzufugen_url_sprache($ausfuhren);
                        umleitung_mit_nachricht($ausfuhren->erhalten(), $xml->anzaigen_einfugen_datei_datei_loschen_erfolg);
                    }
                    else
                    {
                        $xml = simplexml_load_file(xml_lader(zeichenfolge));
                        $ausfuhren = new url_kodierer();
                        $ausfuhren->hinzufugen(bestellung);
                        $ausfuhren->hinzufugen(bestellung_anzaigen_einfugen_datei);
                        $ausfuhren->hinzufugen(parameter_anzaigen_einfugen_datei_optionen_filter);
                        $ausfuhren->hinzufugen(anzaigen_einfugen_datei_optionen_alle);
                        $ausfuhren->hinzufugen(parameter_anzaigen_einfugen_datei_numerische_seite);
                        $ausfuhren->hinzufugen(1);
                        hinzufugen_url_sprache($ausfuhren);
                        umleitung_mit_nachricht($ausfuhren->erhalten(), $xml->anzaigen_einfugen_datei_datei_loschen_fehler);
                    }
                }
                else
                {
                    $xml = simplexml_load_file(xml_lader(zeichenfolge));
                    $ausfuhren = new url_kodierer();
                    $ausfuhren->hinzufugen(bestellung);
                    $ausfuhren->hinzufugen(bestellung_anzaigen_einfugen_datei);
                    $ausfuhren->hinzufugen(parameter_anzaigen_einfugen_datei_optionen_filter);
                    $ausfuhren->hinzufugen(anzaigen_einfugen_datei_optionen_alle);
                    $ausfuhren->hinzufugen(parameter_anzaigen_einfugen_datei_numerische_seite);
                    $ausfuhren->hinzufugen(1);
                    hinzufugen_url_sprache($ausfuhren);
                    umleitung_mit_nachricht($ausfuhren->erhalten(), $xml->anzaigen_einfugen_datei_datei_loschen_fehler);
                }
            }
            else
            {
                $xml = simplexml_load_file(xml_lader(zeichenfolge));
                $ausfuhren = new url_kodierer();
                $ausfuhren->hinzufugen(bestellung);
                $ausfuhren->hinzufugen(bestellung_anzaigen_einfugen_datei);
                $ausfuhren->hinzufugen(parameter_anzaigen_einfugen_datei_optionen_filter);
                $ausfuhren->hinzufugen(anzaigen_einfugen_datei_optionen_alle);
                $ausfuhren->hinzufugen(parameter_anzaigen_einfugen_datei_numerische_seite);
                $ausfuhren->hinzufugen(1);
                hinzufugen_url_sprache($ausfuhren);
                umleitung_mit_nachricht($ausfuhren->erhalten(), $xml->anzaigen_einfugen_datei_datei_loschen_fehler);
            }
        }
        else
        {
            $xml = simplexml_load_file(xml_lader(tor_storungsmeldung));
            $ausfuhren = new url_kodierer();
            $ausfuhren->hinzufugen(bestellung);
            $ausfuhren->hinzufugen(bestellung_anzaigen_einfugen_datei);
            $ausfuhren->hinzufugen(parameter_anzaigen_einfugen_datei_optionen_filter);
            $ausfuhren->hinzufugen(anzaigen_einfugen_datei_optionen_alle);
            $ausfuhren->hinzufugen(parameter_anzaigen_einfugen_datei_numerische_seite);
            $ausfuhren->hinzufugen(1);
            hinzufugen_url_sprache($ausfuhren);
            umleitung_mit_nachricht($ausfuhren->erhalten(), $xml->bestellung_ist_nicht_bekannt);
        }
    }
    private function satz_datei()
    {
        $pfad = new pfad_kodierer();
        $pfad->hinzufugen(standart_system_pfad);
        $pfad->hinzufugen(ordner_server_skript);
        $pfad->hinzufugen(ordner_xml);
        $pfad->hinzufugen(dateien);
        $xml = simplexml_load_file($pfad->erhalten());
        $dateien = array();
        foreach($xml->datei as $datei)
        {
            $datei = new datei($datei->id, $datei->datum, $datei->datei_name, $datei->benutzer_id, $datei->benutzername, $datei->pfad_datei);
            array_push($dateien, $datei);
        }
        $id = filter_input(INPUT_GET, parameter_anzaigen_einfugen_datei_datei_name_fur_mulleimer);
        $id = explode('nmlf', $id);
        $zahle = -1;
        for($i = count($dateien) -1; $i > -1; $i--)
        {
            $xml_id = $dateien[$i]->erhalten_id();
            $xml_id = explode('-', $xml_id);
            if(strcasecmp($id[0], $xml_id[0]) === 0)
            {
                $zahle = $i; break;
            }
        }
        if((int)$zahle === -1)
        {
            $xml = simplexml_load_file(xml_lader(zeichenfolge));
            $ausfuhren = new url_kodierer();
            $ausfuhren->hinzufugen(bestellung);
            $ausfuhren->hinzufugen(bestellung_anzaigen_einfugen_datei);
            $ausfuhren->hinzufugen(parameter_anzaigen_einfugen_datei_optionen_filter);
            $ausfuhren->hinzufugen(anzaigen_einfugen_datei_optionen_alle);
            $ausfuhren->hinzufugen(parameter_anzaigen_einfugen_datei_numerische_seite);
            $ausfuhren->hinzufugen(1);
            hinzufugen_url_sprache($ausfuhren);
            umleitung_mit_nachricht($ausfuhren->erhalten(), $xml->anzaigen_einfugen_datei_nicht_datei);
        }
        $this->datei_name = $dateien[$zahle]->erhalten_name();
        $this->datei = new pfad_kodierer(base64_decode($xml_id[2]));
        $this->datei->hinzufugen(standart_system_pfad);
        $this->datei->hinzufugen(ordner_tabellen_kalkulation);
        $this->datei->hinzufugen(implode('-', $xml_id));
        $this->datei = $this->datei->erhalten();
    }
    private function ist_nicht_datei()
    {
        if(!file_exists($this->datei))
        {
            $xml = simplexml_load_file(xml_lader(zeichenfolge));
            $ausfuhren = new url_kodierer();
            $ausfuhren->hinzufugen(bestellung);
            $ausfuhren->hinzufugen(bestellung_anzaigen_einfugen_datei);
            $ausfuhren->hinzufugen(parameter_anzaigen_einfugen_datei_optionen_filter);
            $ausfuhren->hinzufugen(anzaigen_einfugen_datei_optionen_alle);
            $ausfuhren->hinzufugen(parameter_anzaigen_einfugen_datei_numerische_seite);
            $ausfuhren->hinzufugen(1);
            hinzufugen_url_sprache($ausfuhren);
            umleitung_mit_nachricht($ausfuhren->erhalten(), $xml->anzaigen_einfugen_datei_nicht_datei);

        }
    }
    private final function ist_benutzer_zulassig($dateien, $ziel)
    {
        if(ist_benutzer_admin())
        {
            if(strcasecmp($_SESSION[id_benutzername], super_admin) === 0) return true;
            else
            {
                if(strcasecmp(super_admin, $dateien->datei[$ziel]->erhalten_benutzer_id()) === 0) return false;
                else if(strcasecmp($_SESSION[id_benutzername], $dateien->datei[$ziel]->erhalten_benutzer_id()) === 0) return true;
                else return false;
            }
        }
        else
        {
            if(strcasecmp($_SESSION[id_benutzername], $dateien->datei[$ziel]->erhalten_benutzer_id()) === 0) return true;
            else return false;
        }
    }
}