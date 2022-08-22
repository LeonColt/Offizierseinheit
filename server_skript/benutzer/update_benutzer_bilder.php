<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 09/01/2016
 * Time: 20:29
 */
require_once standart_system_pfad.'server_skript/base/Betrieb.php';
class update_benutzer_bilder extends Betrieb
{
    private $id, $bilder, $typs = array(IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG);
    protected function daten_uberprufen()
    {
        // TODO: Implement daten_uberprufen() method.
        if(!ist_null(filter_input(INPUT_POST, hinzufugen_benutzer_id)))
        {
            $this->id = filter_input(INPUT_POST, hinzufugen_benutzer_id);
            if(file_exists($_FILES[hinzufugen_benutzer_vorschau_bilder_einfugen]['tmp_name'])
                || is_uploaded_file($_FILES[hinzufugen_benutzer_vorschau_bilder_einfugen]['tmp_name']))
            {
                $typ = exif_imagetype($_FILES[hinzufugen_benutzer_vorschau_bilder_einfugen]['tmp_name']);
                if(in_array($typ, $this->typs))
                {
                    if($_FILES[hinzufugen_benutzer_vorschau_bilder_einfugen]['size'] < 3000001)
                    {
                        $this->bilder = $_FILES[hinzufugen_benutzer_vorschau_bilder_einfugen];
                        return true;
                    }
                    else
                    {
                        $url = new url_kodierer();
                        $url->hinzufugen(bestellung);
                        $url->hinzufugen(bestellung_hinzufugen_benutzer_anzaigen);
                        $xml = simplexml_load_file(xml_lader(zeichenfolge));
                        umleitung_mit_nachricht($url->erhalten(), $xml->bilder_ist_uber_größe);
                    }
                }
                else
                {
                    $url = new url_kodierer();
                    $url->hinzufugen(bestellung);
                    $url->hinzufugen(bestellung_hinzufugen_benutzer_anzaigen);
                    $xml = simplexml_load_file(xml_lader(zeichenfolge));
                    umleitung_mit_nachricht($url->erhalten(), $xml->bilder_ist_nicht_bilder);
                }
            }
            else
            {
                $xml = simplexml_load_file(xml_lader(zeichenfolge));
                $url = new url_kodierer();
                $url->hinzufugen(bestellung);
                $url->hinzufugen(bestellung_anzaigen_perfil);
                umleitung_mit_nachricht($url->erhalten(), $xml->update_benutzer_perfil_fehler);
            }
        }
        else
        {
            $url = new url_kodierer();
            $url->hinzufugen(bestellung);
            $url->hinzufugen(bestellung_hinzufugen_benutzer_anzaigen);
            $xml = simplexml_load_file(xml_lader(verbindung_storungsmeldung));
            umleitung_mit_nachricht($url->erhalten(), $xml->daten_leere);
        }
        return false;
    }

    protected function erganzung(&$zahler)
    {
        // TODO: Implement erganzung() method.
        $bilder = new pfad_kodierer();
        $bilder->hinzufugen(standart_system_pfad);
        $bilder->hinzufugen('bilder/benutzer/');
        $typ = exif_imagetype($this->bilder['tmp_name']);
        if($typ === IMAGETYPE_PNG)
        {
            $bilder->hinzufugen($this->id.'.png');
        }
        else if($typ === IMAGETYPE_JPEG)
        {
            $bilder->hinzufugen($this->id.'.jpeg');
        }
        else
        {
            $bilder->hinzufugen($this->id.'.gif');
        }
        if(!move_uploaded_file($this->bilder['tmp_name'], $bilder->erhalten()))
            $this->weiter = false;
    }

    protected function erfolg_ausfuhren()
    {
        // TODO: Implement erfolg_ausfuhren() method.
        $xml = simplexml_load_file(xml_lader(zeichenfolge));
        $url = new url_kodierer();
        $url->hinzufugen(bestellung);
        $url->hinzufugen(bestellung_anzaigen_perfil);
        umleitung_mit_nachricht($url->erhalten(), $xml->update_benutzer_perfil_erfolg);
    }

    protected function fehler_ausfuhren()
    {
        // TODO: Implement fehler_ausfuhren() method.
        $xml = simplexml_load_file(xml_lader(zeichenfolge));
        $url = new url_kodierer();
        $url->hinzufugen(bestellung);
        $url->hinzufugen(bestellung_anzaigen_perfil);
        umleitung_mit_nachricht($url->erhalten(), $xml->update_benutzer_perfil_fehler);
    }

    protected function vorbereiten_abfrage_und_parameter()
    {
        // TODO: Implement vorbereiten_abfrage_und_parameter() method.
        $this->abfrage = array('INSERT INTO sg_user_rekap VALUES (5, ?,NOW(),?,CURRENT_USER());');
        $this->parameter = array(array($_SESSION[id_benutzername], $_SESSION[id_benutzername]));
    }
}