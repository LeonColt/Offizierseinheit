<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 14/01/2016
 * Time: 11:20
 */
require_once standart_system_pfad.'server_skript/base/globale_variable.php';
require_once standart_system_pfad.'server_skript/base/globale_variable_fur_datei.php';
require_once standart_system_pfad.'server_skript/base/universal_methode.php';
require_once standart_system_pfad.'server_skript/base/Betrieb.php';
class einstellung_benutzer_mulleimer extends Betrieb
{
    private $id;
    protected function daten_uberprufen()
    {
        // TODO: Implement daten_uberprufen() method.
        if(!ist_null(filter_input(INPUT_GET, parameter_einstellung_benutzer_benutzer_mulleimer_id)))
        {
            if(strcasecmp(filter_input(INPUT_GET, parameter_einstellung_benutzer_benutzer_mulleimer_id), super_admin) === 0)
                $this->id = $_SESSION[id_benutzername];
            else $this->id = filter_input(INPUT_GET, parameter_einstellung_benutzer_benutzer_mulleimer_id);
            return true;
        }
        return false;
    }

    protected function erganzung(&$zahler)
    {
        // TODO: Implement erganzung() method.
    }

    protected function erfolg_ausfuhren()
    {
        // TODO: Implement erfolg_ausfuhren() method.
        $xml = simplexml_load_file(xml_lader(zeichenfolge));
        $einstellung_benutzer = new url_kodierer();
        $einstellung_benutzer->hinzufugen(bestellung);
        $einstellung_benutzer->hinzufugen(bestellung_anzaigen_einstellung_benutzer);
        $einstellung_benutzer->hinzufugen(parameter_anzaigen_einstellung_benutzer_optionen_filter);
        $einstellung_benutzer->hinzufugen(anzaigen_einstellung_benutzer_optionen_alle);
        $einstellung_benutzer->hinzufugen(parameter_anzaigen_einstellung_benutzer_numerische_seite);
        $einstellung_benutzer->hinzufugen(1);
        hinzufugen_url_sprache($einstellung_benutzer);
        umleitung_mit_nachricht($einstellung_benutzer->erhalten(), $xml->anzaigen_einstellung_benutzer_benutzer_mulleimer_erfolg);
    }

    protected function fehler_ausfuhren()
    {
        // TODO: Implement fehler_ausfuhren() method.
        $xml = simplexml_load_file(xml_lader(zeichenfolge));
        $einstellung_benutzer = new url_kodierer();
        $einstellung_benutzer->hinzufugen(bestellung);
        $einstellung_benutzer->hinzufugen(bestellung_anzaigen_einstellung_benutzer);
        $einstellung_benutzer->hinzufugen(parameter_anzaigen_einstellung_benutzer_optionen_filter);
        $einstellung_benutzer->hinzufugen(anzaigen_einstellung_benutzer_optionen_alle);
        $einstellung_benutzer->hinzufugen(parameter_anzaigen_einstellung_benutzer_numerische_seite);
        $einstellung_benutzer->hinzufugen(1);
        hinzufugen_url_sprache($einstellung_benutzer);
        umleitung_mit_nachricht($einstellung_benutzer->erhalten(), $xml->anzaigen_einstellung_benutzer_benutzer_mulleimer_fehler);
    }

    protected function vorbereiten_abfrage_und_parameter()
    {
        // TODO: Implement vorbereiten_abfrage_und_parameter() method.
        $this->abfrage = array();
        $this->parameter = array();
        array_push($this->abfrage, 'UPDATE sg_user SET active = FALSE WHERE id = ?');
        array_push($this->parameter, array($this->id));
        array_push($this->abfrage, 'INSERT INTO sg_user_rekap VALUES (4, ?,NOW(),?,CURRENT_USER());');
        array_push($this->parameter, array($this->id, $_SESSION[id_benutzername]));
    }
}