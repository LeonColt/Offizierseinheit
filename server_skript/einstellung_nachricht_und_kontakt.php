<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 07/01/2016
 * Time: 11:11
 */
require_once standart_system_pfad.'server_skript/base/globale_variable.php';
if(filter_input(INPUT_GET, bestellung) === null)
{
    header('HTTP/1.0 404 Not Found');
}
require_once standart_system_pfad.'server_skript/base/universal_methode.php';
require_once standart_system_pfad.'server_skript/base/url_kodierer.php';
require_once standart_system_pfad.'server_skript/base/pfad_kodierer.php';
class einstellung_nachricht_und_kontakt
{
    private $nachricht, $kontakt;
    public function __construct()
    {
        $this->nachricht = false;
        $this->kontakt = false;
    }

    public function ausfuhren()
    {
        $this->token_uberprufen_schnittstelle();
        $this->daten_uberprufen();
        $this->ausfuhren_schnittstelle();
    }
    private function token_uberprufen_schnittstelle()
    {
        if(!ist_token_korrigieren_post())
        {
            $pfad = new pfad_kodierer();
            $pfad->hinzufugen(standart_system_pfad);
            $pfad->hinzufugen(standard_pfad);
            $pfad->hinzufugen(standard_sprache);
            $pfad->hinzufugen(verbindung_storungsmeldung);
            $xml = simplexml_load_file($pfad->erhalten());
            $url =  new url_kodierer();
            $url->hinzufugen(bestellung);
            $url->hinzufugen(bestellung_anzaigen_einstellung_nachricht_und_kontakt);
            umleitung_mit_nachricht($url->erhalten(), $xml->token_fehler);
        }
        return true;
    }
    private function daten_uberprufen()
    {
        if(!ist_null(filter_input(INPUT_POST, einstellung_nachricht_und_kontakt_nachricht)))
        {
            $this->nachricht = true;
        }
        if(!ist_null(filter_input(INPUT_POST, einstellung_nachricht_und_kontakt_kontakt)))
        {
            $this->kontakt = true;
        }
        if(!$this->nachricht && !$this->kontakt)
        {
            $pfad = new pfad_kodierer();
            $pfad->hinzufugen(standart_system_pfad);
            $pfad->hinzufugen(standard_pfad);
            $pfad->hinzufugen(standard_sprache);
            $pfad->hinzufugen(verbindung_storungsmeldung);
            $xml = simplexml_load_file($pfad->erhalten());
            $url =  new url_kodierer();
            $url->hinzufugen(bestellung);
            $url->hinzufugen(bestellung_anzaigen_einstellung_nachricht_und_kontakt);
            umleitung_mit_nachricht($url->erhalten(), $xml->daten_leere);
        }
        return true;
    }
    private function ausfuhren_schnittstelle()
    {
        $ergebnis = "";
        if($this->nachricht)
        {
            $pfad = new pfad_kodierer();
            $pfad->hinzufugen(standart_system_pfad);
            $pfad->hinzufugen(standard_pfad);
            $pfad->hinzufugen(standard_sprache);
            $pfad->hinzufugen(informationen);
            $xml = simplexml_load_file($pfad->erhalten());
            $xml->text = htmlentities(filter_input(INPUT_POST, einstellung_nachricht_und_kontakt_nachricht));
            if($xml->asXML($pfad->erhalten()) === true)
            {
                $nachricht_ergebnis = true;
            }
            else $nachricht_ergebnis = false;

            if($nachricht_ergebnis)
            {
                $pfad = new pfad_kodierer();
                $pfad->hinzufugen(standart_system_pfad);
                $pfad->hinzufugen(standard_pfad);
                $pfad->hinzufugen(standard_sprache);
                $pfad->hinzufugen(zeichenfolge);
                $xml = simplexml_load_file($pfad->erhalten());
                $ergebnis .= ' '.$xml->einstellung_nachricht_und_kontakt_nachricht_erfolg;
            }
            else $ergebnis .= ' '.$xml->einstellung_nachricht_und_kontakt_nachricht_fehler;
        }

        if($this->kontakt)
        {
            $pfad = new pfad_kodierer();
            $pfad->hinzufugen(standart_system_pfad);
            $pfad->hinzufugen(standard_pfad);
            $pfad->hinzufugen(standard_sprache);
            $pfad->hinzufugen(kontakt);
            $xml = simplexml_load_file($pfad->erhalten());
            $xml->text = filter_input(INPUT_POST, einstellung_nachricht_und_kontakt_kontakt);
            if($xml->asXML($pfad->erhalten()) === true)
            {
                $kontakt_ergebnis = true;
            }
            else $kontakt_ergebnis = false;

            if($kontakt_ergebnis)
            {
                $pfad = new pfad_kodierer();
                $pfad->hinzufugen(standart_system_pfad);
                $pfad->hinzufugen(standard_pfad);
                $pfad->hinzufugen(standard_sprache);
                $pfad->hinzufugen(zeichenfolge);
                $xml = simplexml_load_file($pfad->erhalten());
                $ergebnis .= ' '.$xml->einstellung_nachricht_und_kontakt_nachricht_erfolg;
            }
            else $ergebnis .= ' '.$xml->einstellung_nachricht_und_kontakt_kontakt_fehler;
        }

        $url = new url_kodierer();
        $url->hinzufugen(bestellung);
        $url->hinzufugen(bestellung_anzaigen_einstellung_nachricht_und_kontakt);
        umleitung_mit_nachricht($url->erhalten(), htmlentities($ergebnis));
    }
}