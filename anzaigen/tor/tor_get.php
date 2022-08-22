<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 13/01/2016
 * Time: 18:38
 */
class tor_get extends Objekt
{
    public function ausfuhren()
    {
        switch (filter_input(INPUT_GET, bestellung))
        {
            case bestellung_logout: $this->logout(); break;
            case bestellung_wahle_allen_kabupaten_kota_json : $this->wahle_allen_kabupaten_kota_json(); break;
            case bestellung_diagramme: $this->bestellung_diagramme(); break;
            case bestellung_ausgabe_excel: $this->bestellung_ausgabe_excel(); break;
            case bestellung_ausgabe_pdf: $this->bestellung_ausgabe_pdf(); break;
            case bestellung_vergleichen: $this->bestellung_vergleichen_einfugen(); break;
            case bestellung_einfugen_datei_download: $this->bestellung_einfugen_datei_download(); break;
            case bestellung_einfugen_datei_mulleimer: $this->bestellung_einfugen_datei_mulleimer(); break;
            case bestellung_einstellung_benutzer_benutzer_mulleimer: $this->bestellung_einstellung_benutzer_benutzer_mulleimer(); break;
            case bestellung_einstellung_benutzer_benutzer_wiederherstellen: $this->bestellung_einstellung_benutzer_benutzer_wiederherstellen(); break;
            case bestellung_vergessen_passwort: $this->bestellung_vergessen_password(); break;
            case bestellung_json_sitzung_aktive_nicht_aktive: $this->bestellung_json_sitzung_aktive_nicht_aktive(); break;
        }
    }
    private final function wahle_allen_kabupaten_kota_json()
    {
        if(ist_sitzung_korrigieren())
        {
            try
            {
                require_once standart_system_pfad.'server_skript/wahle/wahle_allen_kabupaten_kota_json.php';
                $ausfuhren = new wahle_allen_kabupaten_kota_json(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
                $ausfuhren->ausfuhren();
            } catch (Exception $ex) {
                umleitung_fehler($ex->getFile(), $ex->getMessage());
            }
        }
    }
    private final function bestellung_diagramme()
    {
        if(ist_sitzung_korrigieren())
        {
            try {
                require_once standart_system_pfad.'anzaigen/tor/sub_tor_diagramme.php';
                $ausfuhren = new sub_tor_diagramme();
                $ausfuhren->ausfuhren();
            } catch (Exception $ex) {
                echo $ex->getMessage();
            }
        }
    }
    private final function bestellung_ausgabe_excel()
    {
        if(ist_sitzung_korrigieren())
        {
            require_once standart_system_pfad.'anzaigen/tor/sub_tor_excel.php';
            $ausfuhren = new sub_tor_excel();
            $ausfuhren->ausfuhren();
        }
        else
        {
            $xml = simplexml_load_file(xml_lader(tor_storungsmeldung));
            umleitung_mit_nachricht(erhalten_base_uri(), $xml->bestellung_ist_nicht_anmeldung);
        }
    }
    private final function bestellung_ausgabe_pdf()
    {
        if(ist_sitzung_korrigieren())
        {
            require_once standart_system_pfad.'anzaigen/tor/sub_tor_pdf.php';
            $ausfuhren = new sub_tor_pdf();
            $ausfuhren->ausfuhren();
        }
        else
        {
            $xml = simplexml_load_file(xml_lader(tor_storungsmeldung));
            umleitung_mit_nachricht(erhalten_base_uri(), $xml->bestellung_ist_nicht_anmeldung);
        }
    }
    private final function bestellung_vergleichen_einfugen()
    {
        if(ist_sitzung_korrigieren())
        {
            require_once standart_system_pfad.'anzaigen/tor/sub_tor_vergleichen_einfugen.php';
            $ausfuhren = new sub_tor_vergleichen_einfugen();
            $ausfuhren->ausfuhren();
        }
        else
        {
            $xml = simplexml_load_file(xml_lader(tor_storungsmeldung));
            umleitung_mit_nachricht(erhalten_base_uri(), $xml->bestellung_ist_nicht_anmeldung);
        }
    }
    private final function bestellung_einfugen_datei_download()
    {
        if(ist_sitzung_korrigieren())
        {
            try {
                require_once standart_system_pfad.'server_skript/einfugen/datei/datei_download.php';
                $ausfuhren = new datei_download();
                $ausfuhren->ausfuhren();
            } catch(Exception $ex) {
                umleitung_fehler($ex->getCode(), $ex->getMessage());
            }
        }
        else
        {
            $xml = simplexml_load_file(xml_lader(tor_storungsmeldung));
            umleitung_mit_nachricht(erhalten_base_uri(), $xml->bestellung_ist_nicht_anmeldung);
        }
    }
    private final function bestellung_einfugen_datei_mulleimer()
    {
        if(ist_sitzung_korrigieren())
        {
            try {
                require_once standart_system_pfad.'server_skript/einfugen/datei/datei_loschen.php';
                $ausfuhren = new datei_loschen();
                $ausfuhren->ausfuhren();
            } catch(Exception $ex) {
                umleitung_fehler($ex->getCode(), $ex->getMessage());
            }
        }
        else
        {
            $xml = simplexml_load_file(xml_lader(tor_storungsmeldung));
            umleitung_mit_nachricht(erhalten_base_uri(), $xml->bestellung_ist_nicht_anmeldung);
        }
    }
    private final function logout()
    {
        require_once standart_system_pfad.'server_skript/benutzer/logout.php';
        try {
            $logout = new logout();
            $logout->ausfuhren();
        } catch(Exception $ex) {
            umleitung_fehler($ex->getCode(), $ex->getMessage());
        }
    }
    private final function bestellung_einstellung_benutzer_benutzer_mulleimer()
    {
        if(ist_sitzung_korrigieren())
        {
            if(ist_benutzer_admin())
            {
                try {
                    require_once standart_system_pfad.'server_skript/benutzer/einstellung_benutzer_mulleimer.php';
                    $ausfuhren = new einstellung_benutzer_mulleimer();
                    $ausfuhren->ausfuhren();
                } catch (Exception $ex) {
                    umleitung_fehler($ex->getCode(), $ex->getMessage());
                }
            }
            else
            {
                $xml = simplexml_load_file(xml_lader(tor_storungsmeldung));
                umleitung_mit_nachricht(erhalten_base_uri(), $xml->bestellung_ist_nicht_bekannt);
            }
        }
        else
        {
            $xml = simplexml_load_file(xml_lader(tor_storungsmeldung));
            umleitung_mit_nachricht(erhalten_base_uri(), $xml->bestellung_ist_nicht_anmeldung);
        }
    }
    private final function bestellung_einstellung_benutzer_benutzer_wiederherstellen()
    {
        if(ist_sitzung_korrigieren())
        {
            if(ist_benutzer_admin())
            {
                try {
                    require_once standart_system_pfad.'server_skript/benutzer/einstellung_benutzer_wiederherstellen.php';
                    $ausfuhren = new einstellung_benutzer_wiederherstellen();
                    $ausfuhren->ausfuhren();
                } catch (Exception $ex) {
                    umleitung_fehler($ex->getCode(), $ex->getMessage());
                }
            }
            else
            {
                $xml = simplexml_load_file(xml_lader(tor_storungsmeldung));
                umleitung_mit_nachricht(erhalten_base_uri(), $xml->bestellung_ist_nicht_bekannt);
            }
        }
        else
        {
            $xml = simplexml_load_file(xml_lader(tor_storungsmeldung));
            umleitung_mit_nachricht(erhalten_base_uri(), $xml->bestellung_ist_nicht_anmeldung);
        }
    }

    public final function bestellung_vergessen_password()
    {
        try {
            require_once standart_system_pfad.'server_skript/benutzer/vergessen_passwort.php';
            $ausfuhren = new vergessen_passwort();
            $ausfuhren->ausfuhren();
        } catch (Exception $ex) {
            umleitung_fehler($ex->getCode(), $ex->getMessage());
        }
    }
    private final function bestellung_json_sitzung_aktive_nicht_aktive()
    {
        try {
            require_once standart_system_pfad.'server_skript/wahle_sitzung_korrigieren.php';
            $ausfuhren = new wahle_sitzung_korrigieren();
            $ausfuhren->ausfuhren();
        } catch (Exception $ex) {
            umleitung_fehler($ex->getCode(), $ex->getMessage());
        }
    }
}