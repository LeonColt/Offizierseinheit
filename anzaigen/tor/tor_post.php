<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 13/01/2016
 * Time: 18:35
 */
class tor_post extends Objekt
{
    public function ausfuhren()
    {
        switch (filter_input(INPUT_POST, bestellung))
        {
            case bestellung_anmeldung: $this->anmeldung(); break;
            case bestellung_logout: $this->logout(); break;
            case bestellung_einfugen: $this->einfugen(); break;
            case bestellung_hinzufugen_benutzer: $this->bestellung_hinzufugen_benutzer(); break;
            case bestellung_andern_passwort: $this->bestellung_andern_passwort(); break;
            case bestellung_einstellung_nachricht_und_kontakt: $this->bestellung_einstellung_nachricht_und_kontakt(); break;
            case bestellung_update_benutzer_perfil: $this->bestellung_update_benutzer_perfil(); break;
            case bestellung_einfugen_datei_upload: $this->bestellung_einfugen_datei_upload(); break;
            default :
            {
                $xml = simplexml_load_file(xml_lader(tor_storungsmeldung));
                umleitung_mit_nachricht(erhalten_base_uri(), $xml->methode_ist_nicht_aktiviert);
            } break;
        }
    }
    private final function anmeldung()
    {
        try
        {
            require_once standart_system_pfad.'server_skript/benutzer/Anmeldung.php';
            $ausfuhren = new Anmeldung();
            $ausfuhren->ausfuhren();
        } catch (Exception $ex) {
            umleitung_fehler($ex->getCode(), $ex->getMessage());
        }
    }
    private final function logout()
    {
        try {
            require_once standart_system_pfad.'server_skript/benutzer/logout.php';
            $ausfuhren = new logout();
            $ausfuhren->ausfuhren();
        } catch (Exception $ex) {
            umleitung_fehler($ex->getCode(), $ex->getMessage());
        }
    }

    private final function einfugen()
    {
        if(ist_sitzung_korrigieren())
        {
            try
            {
                require_once standart_system_pfad.'server_skript/einfugen/wichtigsten_einfugen.php';
                $ausfuhren = new wichtigsten_einfugen();
                $ausfuhren->ausfuhren();
            } catch (Exception $ex) {
                umleitung_fehler($ex->getCode(), $ex->getMessage());
            }
        }
        else
        {
            $xml = simplexml_load_file(xml_lader(tor_storungsmeldung));
            umleitung_mit_nachricht(erhalten_base_uri(), $xml->bestellung_ist_nicht_anmeldung);
        }
    }
    private final function bestellung_hinzufugen_benutzer()
    {
        if(ist_sitzung_korrigieren())
        {
            if(ist_benutzer_admin())
            {
                try {
                    require_once standart_system_pfad.'server_skript/benutzer/hinzufugen_benutzer.php';
                    $ausfuhren = new hinzufugen_benutzer();
                    $ausfuhren->ausfuhren();
                } catch (Exception $ex) {
                    umleitung_fehler($ex->getCode(), $ex->getMessage());
                }
            }
            else
            {
                $xml = simplexml_load_file(xml_lader(tor_storungsmeldung));
                umleitung_mit_nachricht(erhalten_base_uri(), $xml->bestellung_ist_nicht_anmeldung);
            }
        }
        else
        {
            $xml = simplexml_load_file(xml_lader(tor_storungsmeldung));
            umleitung_mit_nachricht(erhalten_base_uri(), $xml->bestellung_ist_nicht_anmeldung);
        }
    }
    private final function bestellung_andern_passwort()
    {
        if(ist_sitzung_korrigieren())
        {
            try
            {
                if(strcasecmp(filter_input(INPUT_POST, andern_passwort_neu_passwort), filter_input(INPUT_POST, andern_passwort_bestatigen_neu_passwort)) === 0)
                {
                    require_once standart_system_pfad.'server_skript/benutzer/ist_passwort_korriegieren.php';
                    $korriegieren = new ist_passwort_korrigieren();
                    $korriegieren->ausfuhren();
                    if($korriegieren->erhalten_daten())
                    {
                        require_once standart_system_pfad.'server_skript/benutzer/Andern_passwort.php';
                        $andere = new Andern_passwort();
                        $andere->ausfuhren();
                    }
                    else
                    {
                        $url = new url_kodierer();
                        $url->hinzufugen(bestellung);
                        $url->hinzufugen(bestellung_anzaigen_andern_passwort);
                        umleitung_mit_nachricht($url->erhalten(), $this->zeichenfolge->andere_passwort_aktuelle_passwort_fehler);
                    }
                }
                else
                {
                    $url = new url_kodierer();
                    $url->hinzufugen(bestellung);
                    $url->hinzufugen(bestellung_anzaigen_andern_passwort);
                    umleitung_mit_nachricht($url->erhalten(), $this->zeichenfolge->andere_passwort_neu_und_bestatigen_ist_nicht_gleichen);
                }
            } catch (Exception $ex) {
                umleitung_fehler($ex->getCode(), $ex->getMessage());
            }
        }
        else
        {
            $xml = simplexml_load_file(xml_lader(tor_storungsmeldung));
            umleitung_mit_nachricht(erhalten_base_uri(), $xml->bestellung_ist_nicht_anmeldung);
        }
    }
    private final function bestellung_einstellung_nachricht_und_kontakt()
    {
        if(ist_sitzung_korrigieren())
        {
            try {
                require_once standart_system_pfad.'server_skript/einstellung_nachricht_und_kontakt.php';
                $ausfuhren = new einstellung_nachricht_und_kontakt();
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
    private final function bestellung_update_benutzer_perfil()
    {
        if(ist_sitzung_korrigieren())
        {
            require_once standart_system_pfad.'server_skript/benutzer/wahle_benutzer_perfil.php';
            $perfil = new wahle_benutzer_perfil();
            $perfil->ausfuhren();
            $perfil = $perfil->erhalten_daten();
            if(count($perfil) > 0)
            {
                $adresse = filter_input(INPUT_POST, hinzufugen_benutzer_adresse);
                $telefon = filter_input(INPUT_POST, hinzufugen_benutzer_telefon);
                $telefax = filter_input(INPUT_POST, hinzufugen_benutzer_telefax);
                if(strcasecmp($adresse, $perfil[0][1]) === 0
                    && strcasecmp($telefon, $perfil[0][2]) === 0
                    && strcasecmp($telefax, $perfil[0][3]) === 0
                    && strcasecmp(null, $perfil[0][4]) !== 0)
                {
                    try {
                        require_once standart_system_pfad.'server_skript/benutzer/update_benutzer_bilder.php';
                        $ausfuhren = new update_benutzer_bilder();
                        $ausfuhren->ausfuhren();
                    } catch(Exception $ex) {
                        umleitung_fehler($ex->getCode(), $ex->getMessage());
                    }
                }
                else
                {
                    try {
                        require_once standart_system_pfad.'server_skript/benutzer/update_benutzer_perfil.php';
                        $ausfuhren = new update_benutzer_perfil();
                        $ausfuhren->ausfuhren();
                    } catch(Exception $ex) {
                        umleitung_fehler($ex->getCode(), $ex->getMessage());
                    }
                }
            }
            else
            {
                try {
                    require_once standart_system_pfad.'server_skript/benutzer/update_benutzer_perfil.php';
                    $ausfuhren = new update_benutzer_perfil();
                    $ausfuhren->ausfuhren();
                } catch(Exception $ex) {
                    umleitung_fehler($ex->getCode(), $ex->getMessage());
                }
            }
        }
        else
        {
            $xml = simplexml_load_file(xml_lader(tor_storungsmeldung));
            umleitung_mit_nachricht(erhalten_base_uri(), $xml->bestellung_ist_nicht_anmeldung);
        }
    }
    private final function bestellung_einfugen_datei_upload()
    {
        if(ist_sitzung_korrigieren())
        {
            try {
                require_once standart_system_pfad.'server_skript/einfugen/datei/datei_schriftsteller.php';
                $ausfuhren = new datei_schriftsteller();
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
}