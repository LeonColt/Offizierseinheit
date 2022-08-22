<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 09/01/2016
 * Time: 13:30
 */
require_once standart_system_pfad.'server_skript/base/Betrieb.php';
class update_benutzer_perfil extends Betrieb
{
    private $id, $email, $adresse, $telefon, $telefax,
        $bilder, $bilder_pfad, $typs = array(IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG);
    protected function daten_uberprufen()
    {
        // TODO: Implement daten_uberprufen() method.
        if(!$this->ist_null(filter_input(INPUT_POST, hinzufugen_benutzer_id),
                filter_input(INPUT_POST, hinzufugen_Benutzer_benutzer),
                filter_input(INPUT_POST, hinzufugen_benutzer_email),
                filter_input(INPUT_POST, hinzufugen_benutzer_adresse),
                filter_input(INPUT_POST, hinzufugen_benutzer_telefon),
                filter_input(INPUT_POST, hinzufugen_benutzer_telefax)))
        {
            $this->id = filter_input(INPUT_POST, hinzufugen_benutzer_id);
            $this->email = filter_input(INPUT_POST, hinzufugen_benutzer_email);
            $this->adresse = filter_input(INPUT_POST, hinzufugen_benutzer_adresse);
            $this->telefon = filter_input(INPUT_POST, hinzufugen_benutzer_telefon);
            $this->telefax = filter_input(INPUT_POST, hinzufugen_benutzer_telefax);
            if(file_exists($_FILES[hinzufugen_benutzer_vorschau_bilder_einfugen]['tmp_name'])
                || is_uploaded_file($_FILES[hinzufugen_benutzer_vorschau_bilder_einfugen]['tmp_name']))
            {
                $typ = exif_imagetype($_FILES[hinzufugen_benutzer_vorschau_bilder_einfugen]['tmp_name']);
                if(in_array($typ, $this->typs))
                {
                    if($_FILES[hinzufugen_benutzer_vorschau_bilder_einfugen]['size'] < 3000001)
                    {
                        $this->bilder = $_FILES[hinzufugen_benutzer_vorschau_bilder_einfugen];
                        $this->bilder_pfad = 'bilder/benutzer/';
                        $typ = exif_imagetype($_FILES[hinzufugen_benutzer_vorschau_bilder_einfugen]['tmp_name']);
                        if($typ === IMAGETYPE_PNG)
                        {
                            $this->bilder_pfad .= $this->id.'.png';
                        }
                        else if($typ === IMAGETYPE_JPEG)
                        {
                            $this->bilder_pfad .= $this->id.'.jpeg';
                        }
                        else
                        {
                            $this->bilder_pfad .= $this->id.'.gif';
                        }
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
            else $this->bilder = null;
            return true;
        }
        return false;
    }

    protected function erganzung(&$zahler)
    {
        // TODO: Implement erganzung() method.
        if((int)$zahler === 0)
        {
            if($this->bilder !== null)
            {
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
                {
                    $this->weiter = false;
                }
            }
        }
    }

    protected function erfolg_ausfuhren()
    {
        // TODO: Implement erfolg_ausfuhren() method.
        $xml = simplexml_load_file(xml_lader(zeichenfolge));
        $url = new url_kodierer();
        $url->hinzufugen(bestellung);
        $url->hinzufugen(bestellung_anzaigen_perfil);
        $this->umleitung_mit_nachricht($url->erhalten(), $xml->update_benutzer_perfil_erfolg);
    }

    protected function fehler_ausfuhren()
    {
        // TODO: Implement fehler_ausfuhren() method.
        $xml = simplexml_load_file(xml_lader(zeichenfolge));
        $url = new url_kodierer();
        $url->hinzufugen(bestellung);
        $url->hinzufugen(bestellung_anzaigen_perfil);
        $this->umleitung_mit_nachricht($url->erhalten(), $xml->update_benutzer_perfil_fehler);
    }

    protected function vorbereiten_abfrage_und_parameter()
    {
        // TODO: Implement vorbereiten_abfrage_und_parameter() method.
        $this->abfrage = array();
        $this->parameter = array();
        array_push($this->abfrage, 'INSERT INTO detail_sg_user(id, email, alamat, no_telp, no_fax, path_picture) VALUES (?, ?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE alamat = VALUES(alamat), no_telp = VALUES(no_telp), no_fax = VALUES(no_fax), path_picture = VALUES(path_picture);');
        array_push($this->parameter, array($_SESSION[id_benutzername], $this->email, $this->adresse, $this->telefon, $this->telefax, $this->bilder_pfad ));
        array_push($this->abfrage, 'INSERT INTO sg_user_rekap VALUES (5, ?,NOW(),?,CURRENT_USER());');
        array_push($this->parameter, array($_SESSION[id_benutzername], $_SESSION[id_benutzername]));
    }
}