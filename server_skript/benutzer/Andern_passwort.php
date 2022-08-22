<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 11/12/2015
 * Time: 20:11
 */
require_once standart_system_pfad.'server_skript/base/globale_variable.php';
require_once standart_system_pfad.'server_skript/base/Betrieb.php';
require_once standart_system_pfad.'server_skript/base/pfad_kodierer.php';
require_once standart_system_pfad.'server_skript/base/url_kodierer.php';
require_once standart_system_pfad.'server_skript/base/globale_variable_fur_datei.php';
class Andern_passwort extends Betrieb
{
    private $id, $benutzername, $pass;
    protected function daten_uberprufen()
    {
        // TODO: Implement daten_uberprufen() method.
        if(!$this->ist_null($_SESSION[id_benutzername],
            filter_input(INPUT_POST, andern_passwort_benutzername),
            filter_input(INPUT_POST, andern_passwort_neu_passwort)))
        {
            $this->id = $_SESSION[id_benutzername];
            $this->benutzername = filter_input(INPUT_POST, andern_passwort_benutzername);
            $this->pass = password_hash(filter_input(INPUT_POST, andern_passwort_neu_passwort), PASSWORD_DEFAULT);
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
        $pfad = new pfad_kodierer();
        $pfad->hinzufugen(standart_system_pfad);
        $pfad->hinzufugen(standard_pfad);
        $pfad->hinzufugen(standard_sprache);
        $pfad->hinzufugen(zaichenfolge);
        $xml = simplexml_load_file($pfad->erhalten());
        session_destroy();
        $this->umleitung_mit_nachricht(erhalten_base_uri(), $xml->andern_passwort_erfolg);
    }

    protected function fehler_ausfuhren()
    {
        // TODO: Implement fehler_ausfuhren() method.
        $pfad = new pfad_kodierer();
        $pfad->hinzufugen(standart_system_pfad);
        $pfad->hinzufugen(standard_pfad);
        $pfad->hinzufugen(standard_sprache);
        $pfad->hinzufugen(zaichenfolge);
        $xml = simplexml_load_file($pfad->erhalten());
        $url = new url_kodierer();
        $url->hinzufugen(bestellung);
        $url->hinzufugen(bestellung_anzaigen_andern_passwort);
        $this->umleitung_mit_nachricht($url->erhalten(), $xml->andern_passwort_fehler);
    }

    protected function vorbereiten_abfrage_und_parameter()
    {
        // TODO: Implement vorbereiten_abfrage_und_parameter() method.
        $this->abfrage = array();
        $this->parameter = array();
        array_push($this->abfrage, 'UPDATE sg_user SET pass = ? WHERE id = ? AND username = ?');
        array_push($this->parameter, array($this->pass, $this->id, $this->benutzername));
        array_push($this->abfrage, 'INSERT INTO sg_user_rekap VALUES (6, ?,NOW(),?,CURRENT_USER())');
        array_push($this->parameter, array($_SESSION[id_benutzername], $_SESSION[id_benutzername]));
    }
}