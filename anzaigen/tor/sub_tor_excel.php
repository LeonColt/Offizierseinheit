<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 05/12/2015
 * Time: 20:13
 */
require_once standart_system_pfad.'server_skript/base/globale_variable.php';
require_once standart_system_pfad.'server_skript/base/Objekt.php';
require_once standart_system_pfad.'server_skript/base/universal_methode.php';
class sub_tor_excel extends Objekt
{
    public final function ausfuhren()
    {
        switch (filter_input(INPUT_GET, sub_bestellung))
        {
            case bestellung_ausgabe_excel_nationalen: $this->bestellung_ausgabe_excel_nationalen(); break;
            case bestellung_ausgabe_excel_provinz: $this->bestellung_ausgabe_excel_provinz(); break;
            case bestellung_ausgabe_excel_kabupaten: $this->bestellung_ausgabe_excel_kabupaten(); break;
        }
    }
    private final function bestellung_ausgabe_excel_nationalen()
    {
        if(ist_sitzung_korrigieren())
        {
            require_once standart_system_pfad.'server_skript/ausgabe/nationalen/excel_schichten_nationalen.php';
            $ausfuhren = new excel_schichten_nationalen();
            $ausfuhren->ausfuhren();
        }
        else
        {
            $xml = simplexml_load_file(xml_lader(tor_storungsmeldung));
            umleitung_mit_nachricht(erhalten_base_uri(), $xml->bestellung_ist_nicht_anmeldung);
        }
    }
    private final function bestellung_ausgabe_excel_provinz()
    {
        if(ist_sitzung_korrigieren())
        {
            require_once standart_system_pfad.'server_skript/ausgabe/provinz/excel_schichten_provinz.php';
            $ausfuhren = new excel_schichten_provinz();
            $ausfuhren->ausfuhren();
        }
        else
        {
            $xml = simplexml_load_file(xml_lader(tor_storungsmeldung));
            umleitung_mit_nachricht(erhalten_base_uri(), $xml->bestellung_ist_nicht_anmeldung);
        }
    }
    private final function bestellung_ausgabe_excel_kabupaten()
    {
        if(ist_sitzung_korrigieren())
        {
            require_once standart_system_pfad.'server_skript/ausgabe/kabupaten/excel_schichten_kabupaten.php';
            $ausfuhren = new excel_schichten_kabupaten();
            $ausfuhren->ausfuhren();
        }
        else
        {
            $xml = simplexml_load_file(xml_lader(tor_storungsmeldung));
            umleitung_mit_nachricht(erhalten_base_uri(), $xml->bestellung_ist_nicht_anmeldung);
        }
    }
}