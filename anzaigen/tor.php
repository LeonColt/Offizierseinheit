<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tor
 *
 * @author LC
 */
require_once standart_system_pfad.'server_skript/base/globale_variable.php';
require_once standart_system_pfad.'server_skript/base/sitzung_starter.php';
require_once standart_system_pfad.'server_skript/base/Objekt.php';
require_once standart_system_pfad.'server_skript/base/globale_variable_fur_daten_bank.php';
require_once standart_system_pfad.'server_skript/base/universal_methode.php';
class tor extends Objekt {
    //put your code here
    private $methode = NULL;
    private $zeichenfolge;
    public function __construct()
    {
        $pfad = new pfad_kodierer();
        $pfad->hinzufugen(standart_system_pfad);
        $pfad->hinzufugen(standard_pfad);
        $pfad->hinzufugen(standard_sprache);
        $pfad->hinzufugen(zeichenfolge);
        $this->zeichenfolge = simplexml_load_file($pfad->erhalten());
    }

    public final function ausfuhren()
    {
        if($this->bestellung_uberprufen())
        {
            if(strcasecmp($this->methode, methode_post) === 0)
            {
                if(ist_bestellung_korriegieren(filter_input(INPUT_POST, bestellung)))
                {
                    $this->methode_post();
                }
                else
                {
                    $xml = simplexml_load_file(xml_lader(tor_storungsmeldung));
                    umleitung_mit_nachricht(erhalten_base_uri(), $xml->bestellung_ist_nicht_zulassig);
                }
            }
            else if(strcasecmp($this->methode, methode_get) === 0)
            {
                if(ist_bestellung_korriegieren(filter_input(INPUT_GET, bestellung)))
                {
                    $this->methode_get();
                }
                else
                {
                    $xml = simplexml_load_file(xml_lader(tor_storungsmeldung));
                    umleitung_mit_nachricht(erhalten_base_uri(), $xml->bestellung_ist_nicht_zulassig);
                }
            }
            else
            {
                $xml = simplexml_load_file(xml_lader(tor_storungsmeldung));
                umleitung_mit_nachricht(erhalten_base_uri(), $xml->methode_ist_nicht_aktiviert);
            }
        }
        else
        {
            $xml = simplexml_load_file(xml_lader(tor_storungsmeldung));
            umleitung_mit_nachricht(erhalten_base_uri(), $xml->bestellung_ist_nicht_bekannt);
        }
    }
    private final function bestellung_uberprufen()
    {
        if(filter_input(INPUT_POST, bestellung) !== NULL)
        {
            $this->methode = methode_post;
            return true;
        }
        else if(filter_input(INPUT_GET, bestellung) !== NULL)
        {
            $this->methode = methode_get;
            return true;
        }
        else
        {
            return false;
        }
    }
    private final function methode_post()
    {
        require_once standart_system_pfad.'anzaigen/tor/tor_post.php';
        $ausfuhren = new tor_post();
        $ausfuhren->ausfuhren();
    }
    private final function methode_get()
    {
        require_once standart_system_pfad.'anzaigen/tor/tor_get.php';
        $ausfuhren = new tor_get();
        $ausfuhren->ausfuhren();
    }
}