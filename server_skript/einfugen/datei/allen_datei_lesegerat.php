<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 12/01/2016
 * Time: 18:03
 */
require_once standart_system_pfad.'server_skript/base/globale_variable.php';
require_once standart_system_pfad.'server_skript/base/universal_methode.php';
require_once standart_system_pfad.'server_skript/base/url_kodierer.php';
require_once standart_system_pfad.'server_skript/base/pfad_kodierer.php';
require_once standart_system_pfad.'server_skript/einfugen/datei/datei.php';
class allen_datei_lesegerat
{
    private $dateien;
    public function ausfuhren()
    {
        $this->ist_sitzung_korrigieren_schnittstelle();
        $this->lesegerat();
        $dateien = array();
        foreach($this->dateien->datei as $datei)
        {
            $datei = new datei($datei->id, $datei->datum, $datei->datei_name, $datei->benutzer_id, $datei->benutzername, $datei->pfad_datei);
            array_push($dateien, $datei);
        }
        return $dateien;
    }
    private function ist_sitzung_korrigieren_schnittstelle()
    {
        if(!ist_sitzung_korrigieren())
        {
            $url = new url_kodierer();
            $url->hinzufugen(bestellung);
            $url->hinzufugen(bestellung_anzaigen_anmeldung);
            hinzufugen_url_sprache($url);
            $xml = simplexml_load_file(tor_storungsmeldung);
            umleitung_mit_nachricht($url->erhalten(), $xml->bestellung_ist_nicht_anmeldung);
        }
    }
    private function lesegerat()
    {
        $pfad = new pfad_kodierer();
        $pfad->hinzufugen(standart_system_pfad);
        $pfad->hinzufugen(ordner_server_skript);
        $pfad->hinzufugen(ordner_xml);
        $pfad->hinzufugen(dateien);
        $this->dateien = simplexml_load_file($pfad->erhalten());
    }
}