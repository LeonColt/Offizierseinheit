<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 05/12/2015
 * Time: 20:01
 */
require_once standart_system_pfad.'server_skript/base/globale_variable.php';
require_once standart_system_pfad.'server_skript/base/Objekt.php';
require_once standart_system_pfad.'server_skript/base/universal_methode.php';
class sub_tor_pdf extends Objekt
{
    public final function ausfuhren()
    {
        switch(filter_input(INPUT_GET, sub_bestellung))
        {
            case bestellung_ausgabe_pdf_nationalen: $this->bestellung_ausgabe_pdf_nasional(); break;
            case bestellung_ausgabe_pdf_provinz: $this->bestellung_ausgabe_pdf_provinz(); break;
            case bestellung_ausgabe_pdf_kabupaten: $this->bestellung_ausgabe_pdf_kabupaten(); break;
        }
    }
    private final function bestellung_ausgabe_pdf_nasional()
    {
        if(ist_sitzung_korrigieren())
        {
            try {
                require_once standart_system_pfad.'server_skript/ausgabe/nationalen/pdf_schichten_nationalen.php';
                $ausfuhren = new pdf_schichten_nationalen();
                $ausfuhren->ausfuhren();
            } catch (Exception $ex) {
                echo $ex->getMessage();
            }
        }
        else
        {
            $xml = simplexml_load_file(xml_lader(tor_storungsmeldung));
            umleitung_mit_nachricht(erhalten_base_uri(), $xml->bestellung_ist_nicht_anmeldung);
        }
    }
    private final function bestellung_ausgabe_pdf_provinz()
    {
        if(ist_sitzung_korrigieren())
        {
            try {
                require_once standart_system_pfad.'server_skript/ausgabe/provinz/pdf_schichten_provinz.php';
                $ausfuhren = new pdf_schichten_provinz();
                $ausfuhren->ausfuhren();
            } catch (Exception $ex) {
                echo $ex->getMessage();
            }
        }
        else
        {
            $xml = simplexml_load_file(xml_lader(tor_storungsmeldung));
            umleitung_mit_nachricht(erhalten_base_uri(), $xml->bestellung_ist_nicht_anmeldung);
        }
    }
    private final function bestellung_ausgabe_pdf_kabupaten()
    {
        if(ist_sitzung_korrigieren())
        {
            try {
                require_once standart_system_pfad.'server_skript/ausgabe/kabupaten/pdf_schichten_kabupaten.php';
                $ausfuhren = new pdf_schichten_kabupaten();
                $ausfuhren->ausfuhren();
            } catch (Exception $ex) {
                echo $ex->getMessage();
            }
        }
        else
        {
            $xml = simplexml_load_file(xml_lader(tor_storungsmeldung));
            umleitung_mit_nachricht(erhalten_base_uri(), $xml->bestellung_ist_nicht_anmeldung);
        }
    }
}