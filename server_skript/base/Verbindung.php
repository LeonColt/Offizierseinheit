<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Verbindung
 *
 * @author LC
 */
require_once standart_system_pfad.'server_skript/base/sitzung_starter.php';
require_once standart_system_pfad.'server_skript/base/Objekt.php';
require_once standart_system_pfad.'server_skript/base/globale_variable_fur_daten_bank.php';
require_once standart_system_pfad.'server_skript/base/globale_variable_fur_datei.php';
require_once standart_system_pfad.'server_skript/base/pfad_kodierer.php';
abstract class Verbindung extends Objekt {
    //put your code here
    protected $verbindung = NULL;
    private $pfad, $sprache, $xml, $host, $hafen, $daten_bank_name, $benutzername, $passwort;
    public function __construct($pfad = standard_pfad, $sprache = standard_sprache, $host = NULL, $hafen = NULL,
                                $daten_bank_name = NULL, $benutzername = NULL, $passwort = NULL) {
        error_reporting(E_ALL);
        $this->pfad = $pfad;
        $this->sprache = $sprache;
        if(!defined("fehler_token") || !defined("fehler_verbindung") || !defined("daten_leere")
            ||  !defined("variable_leere") || !defined("fehler_vorbereiten_anweisung")
            || !defined("fehler_ausfuhren_anweisung"))
        {
            $this->lesen();
            $this->erhalten_alle();
        }
        $this->host = $host;
        $this->hafen = $hafen;
        $this->daten_bank_name = $daten_bank_name;
        $this->benutzername = $benutzername;
        $this->passwort = $passwort;
        if($this->host === NULL)
        {
            $this->host = daten_bank_host;
        }
        if($this->hafen === NULL)
        {
            $this->hafen = daten_bank_hafen;
        }
        if($this->daten_bank_name === NULL)
        {
            $this->daten_bank_name = daten_bank_name;
        }
        if($this->benutzername === NULL)
        {
            $this->benutzername = daten_bank_benutzername;
        }
        if($this->passwort === NULL)
        {
            $this->passwort = daten_bank_passwort;
        }
    }

    protected final function verbinde()
    {
        if((int)$this->hafen === 3306)
        {
            try
            {
                $this->verbindung = new PDO("mysql:host="
                    .$this->host
                    .";dbname=".$this->daten_bank_name,
                    $this->benutzername,
                    $this->passwort);
            } catch (Exception $ex) {
                throw $ex;
            }
        }
        else
        {
            try
            {
                $this->verbindung = new PDO("mysql:host="
                    .$this->host
                    .":"
                    .$this->hafen
                    .";dbname=".$this->daten_bank_name,
                    $this->benutzername,
                    $this->passwort);
            } catch (Exception $ex) {
                throw $ex;
            }
        }
    }
    protected final function close()
    {
        $this->verbindung = NULL;
    }
    
    protected function ist_token_korrigieren()
    {
        if(!$this->ist_null(filter_input(INPUT_POST, csrf_schlussel), filter_input(INPUT_POST, csrf_token)))
        {
            if(isset($_SESSION[filter_input(INPUT_POST, csrf_schlussel)]))
            {
                if(!$this->ist_sitzung_zeit_heraus(csrf_zeit_schlussel) && filter_input(INPUT_POST, csrf_token) === $_SESSION[filter_input(INPUT_POST, csrf_schlussel)])
                {
                    unset($_SESSION[filter_input(INPUT_POST, csrf_schlussel)]);
                    unset($_SESSION[csrf_zeit_schlussel]);
                    return true;
                }
            }
        }
        else if(!$this->ist_null(filter_input(INPUT_GET, csrf_schlussel), filter_input(INPUT_GET, csrf_token)))
        {
            if(isset($_SESSION[filter_input(INPUT_GET, csrf_schlussel)]))
            {
                if(!$this->ist_sitzung_zeit_heraus(csrf_zeit_schlussel) && filter_input(INPUT_GET, csrf_token) === $_SESSION[filter_input(INPUT_GET, csrf_schlussel)])
                {
                    unset($_SESSION[filter_input(INPUT_GET, csrf_schlussel)]);
                    unset($_SESSION[csrf_zeit_schlussel]);
                    return true;
                }
            }
        }
        return false;
    }

    protected function ist_sitzung_zeit_heraus($key)
    {
        if(isset($_SESSION[$key]))
        {
            if(time() > $_SESSION[$key])
            {
                return true;
            }
        }
        return false;
    }
    private final function lesen()
    {
        $kodierer = new pfad_kodierer();
        $kodierer->hinzufugen(standart_system_pfad);
        $kodierer->hinzufugen(standard_pfad);
        $kodierer->hinzufugen(standard_sprache);
        $kodierer->hinzufugen(verbindung_storungsmeldung);
        $this->xml = simplexml_load_file($kodierer->erhalten());
    }
    private function erhalten_alle()
    {
        if(!defined("fehler_token"))
        {
            define("fehler_token", $this->xml->token_fehler);
        }
        if(!defined("fehler_verbindung"))
        {
            define("fehler_verbindung", $this->xml->fehler_verbindung);
        }
        if(!defined("daten_leere"))
        {
            define("daten_leere", $this->xml->daten_leere);
        }
        if(!defined("variable_leere"))
        {
            define("variable_leere", $this->xml->variable_leere);
        }
        if(!defined("fehler_vorbereiten_anweisung"))
        {
            define("fehler_vorbereiten_anweisung", $this->xml->fehler_vorbeiten_anweisung);
        }
        if(!defined("fehler_ausfuhren_anweisung"))
        {
            define("fehler_ausfuhren_anweisung", $this->xml->fehler_ausfuhren_anweisung);
        }
    }
}
