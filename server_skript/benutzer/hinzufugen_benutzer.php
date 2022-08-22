<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 16/12/2015
 * Time: 18:41
 */
require_once standart_system_pfad.'server_skript/base/globale_variable.php';
require_once standart_system_pfad.'server_skript/base/globale_variable_fur_datei.php';
require_once standart_system_pfad.'server_skript/base/Betrieb.php';
require_once standart_system_pfad.'server_skript/base/pfad_kodierer.php';
require_once standart_system_pfad.'server_skript/base/url_kodierer.php';
require_once standart_system_pfad.'server_skript/benutzer/wahle_benutzer_von_id_oder_benutzer_oder_email.php';
class hinzufugen_benutzer extends Betrieb
{
    private $id, $benutzername, $passwort, $benutzer_typ, $email, $adresse, $telefon, $telefax,
    $bilder, $bilder_pfad, $provinz, $kabupaten, $typs = array(IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG);
    protected function daten_uberprufen()
    {
        // TODO: Implement daten_uberprufen() method.
        /*
        echo 'id '.filter_input(INPUT_POST, hinzufugen_benutzer_id).'<br>';
        echo 'username '.filter_input(INPUT_POST, hinzufugen_Benutzer_benutzer).'<br>';
        echo 'tipe '.filter_input(INPUT_POST, hinzufugen_benutzer_typ).'<br>';
        echo 'provinsi '.filter_input(INPUT_POST, hinzufugen_benutzer_provinz).'<br>';
        echo 'kabupaten '.filter_input(INPUT_POST, hinzufugen_benutzer_kabupaten).'<br>';
        echo 'email '.filter_input(INPUT_POST, hinzufugen_benutzer_email).'<br>';
        echo 'alamat '.filter_input(INPUT_POST, hinzufugen_benutzer_adresse).'<br>';
        echo 'telefon '.filter_input(INPUT_POST, hinzufugen_benutzer_telefon).'<br>';
        echo 'telefax '.filter_input(INPUT_POST, hinzufugen_benutzer_telefax).'<br>';
        */
        if(!$this->ist_null(filter_input(INPUT_POST, hinzufugen_benutzer_id),
                filter_input(INPUT_POST, hinzufugen_Benutzer_benutzer),
                filter_input(INPUT_POST, hinzufugen_benutzer_typ),
                filter_input(INPUT_POST, hinzufugen_benutzer_email),
                filter_input(INPUT_POST, hinzufugen_benutzer_adresse),
                filter_input(INPUT_POST, hinzufugen_benutzer_telefon),
                filter_input(INPUT_POST, hinzufugen_benutzer_telefax))
            && (file_exists($_FILES[hinzufugen_benutzer_vorschau_bilder_einfugen]['tmp_name'])
                || is_uploaded_file($_FILES[hinzufugen_benutzer_vorschau_bilder_einfugen]['tmp_name'])))
        {
            $benutzer = new wahle_benutzer_von_id_oder_benutzer_oder_email();
            $benutzer->satz_daten(filter_input(INPUT_POST, hinzufugen_benutzer_id), filter_input(INPUT_POST, hinzufugen_Benutzer_benutzer), filter_input(INPUT_POST, hinzufugen_benutzer_email));
            $benutzer->ausfuhren();
            $benutzer = $benutzer->erhalten_daten();
            if((int)$benutzer[0][0] > 0)
            {
                $xml = simplexml_load_file(xml_lader(zeichenfolge));
                $url = new url_kodierer();
                $url->hinzufugen(bestellung);
                $url->hinzufugen(bestellung_hinzufugen_benutzer_anzaigen);
                hinzufugen_url_sprache($url);
                umleitung_mit_nachricht($url->erhalten(), $xml->hinzufugen_benutzer_bereits_vorhanden);
            }
            $typ = exif_imagetype($_FILES[hinzufugen_benutzer_vorschau_bilder_einfugen]['tmp_name']);
            if(in_array($typ, $this->typs))
            {
                if($_FILES[hinzufugen_benutzer_vorschau_bilder_einfugen]['size'] < 3000001)
                {
                    if((int)filter_input(INPUT_GET, hinzufugen_benutzer_typ) === 3)
                    {
                        if(!$this->ist_null(filter_input(INPUT_POST, hinzufugen_benutzer_provinz)))
                        {
                            $this->id = filter_input(INPUT_POST, hinzufugen_benutzer_id);
                            $this->benutzername = filter_input(INPUT_POST, hinzufugen_Benutzer_benutzer);
                            $this->passwort = password_hash(filter_input(INPUT_POST, hinzufugen_Benutzer_benutzer), PASSWORD_DEFAULT);
                            $this->benutzer_typ = filter_input(INPUT_POST, hinzufugen_benutzer_typ);
                            $this->provinz = filter_input(INPUT_POST, hinzufugen_benutzer_provinz);
                            $this->email = filter_input(INPUT_POST, hinzufugen_benutzer_email);
                            $this->adresse = filter_input(INPUT_POST, hinzufugen_benutzer_adresse);
                            $this->telefon = filter_input(INPUT_POST, hinzufugen_benutzer_telefon);
                            $this->telefax = filter_input(INPUT_POST, hinzufugen_benutzer_telefax);
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
                            return true;
                        }
                        else
                        {
                            $url = new url_kodierer();
                            $url->hinzufugen(bestellung);
                            $url->hinzufugen(bestellung_hinzufugen_benutzer_anzaigen);
                            hinzufugen_url_sprache($url);
                            $xml = simplexml_load_file(xml_lader(zeichenfolge));
                            umleitung_mit_nachricht($url->erhalten(), $xml->hinzufugen_benutzer_mit_nicht_provinz);
                        }
                    }
                    else if((int)filter_input(INPUT_GET, hinzufugen_benutzer_typ) === 4)
                    {
                        if(!$this->ist_null(filter_input(INPUT_POST, hinzufugen_benutzer_provinz), filter_input(INPUT_POST, hinzufugen_benutzer_kabupaten)))
                        {
                            $this->id = filter_input(INPUT_POST, hinzufugen_benutzer_id);
                            $this->benutzername = filter_input(INPUT_POST, hinzufugen_Benutzer_benutzer);
                            $this->passwort = password_hash(filter_input(INPUT_POST, hinzufugen_Benutzer_benutzer), PASSWORD_DEFAULT);
                            $this->benutzer_typ = filter_input(INPUT_POST, hinzufugen_benutzer_typ);
                            $this->provinz = filter_input(INPUT_POST, hinzufugen_benutzer_provinz);
                            $this->kabupaten = filter_input(INPUT_POST, hinzufugen_benutzer_kabupaten);
                            $this->email = filter_input(INPUT_POST, hinzufugen_benutzer_email);
                            $this->adresse = filter_input(INPUT_POST, hinzufugen_benutzer_adresse);
                            $this->telefon = filter_input(INPUT_POST, hinzufugen_benutzer_telefon);
                            $this->telefax = filter_input(INPUT_POST, hinzufugen_benutzer_telefax);
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
                            return true;
                        }
                        else
                        {
                            $url = new url_kodierer();
                            $url->hinzufugen(bestellung);
                            $url->hinzufugen(bestellung_hinzufugen_benutzer_anzaigen);
                            hinzufugen_url_sprache($url);
                            $xml = simplexml_load_file(xml_lader(zeichenfolge));
                            umleitung_mit_nachricht($url->erhalten(), $xml->hinzufugen_benutzer_mit_nicht_provinz.' '.$xml->hinzufugen_benutzer_mit_nicht_kabupaten);
                        }
                    }
                    else
                    {
                        $this->id = filter_input(INPUT_POST, hinzufugen_benutzer_id);
                        $this->benutzername = filter_input(INPUT_POST, hinzufugen_Benutzer_benutzer);
                        $this->passwort = password_hash(filter_input(INPUT_POST, hinzufugen_Benutzer_benutzer), PASSWORD_DEFAULT);
                        $this->benutzer_typ = filter_input(INPUT_POST, hinzufugen_benutzer_typ);
                        $this->email = filter_input(INPUT_POST, hinzufugen_benutzer_email);
                        $this->adresse = filter_input(INPUT_POST, hinzufugen_benutzer_adresse);
                        $this->telefon = filter_input(INPUT_POST, hinzufugen_benutzer_telefon);
                        $this->telefax = filter_input(INPUT_POST, hinzufugen_benutzer_telefax);
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
                        return true;
                    }
                }
                else
                {
                    $url = new url_kodierer();
                    $url->hinzufugen(bestellung);
                    $url->hinzufugen(bestellung_hinzufugen_benutzer_anzaigen);
                    hinzufugen_url_sprache($url);
                    $xml = simplexml_load_file(xml_lader(zeichenfolge));
                    umleitung_mit_nachricht($url->erhalten(), $xml->bilder_ist_uber_größe);
                }
            }
            else
            {
                $url = new url_kodierer();
                $url->hinzufugen(bestellung);
                $url->hinzufugen(bestellung_hinzufugen_benutzer_anzaigen);
                hinzufugen_url_sprache($url);
                $xml = simplexml_load_file(xml_lader(zeichenfolge));
                umleitung_mit_nachricht($url->erhalten(), $xml->bilder_ist_nicht_bilder);
            }
        }
        return false;
    }

    protected function erganzung(&$zahler)
    {
        // TODO: Implement erganzung() method.
        if((int)$zahler === 1)
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

    protected function erfolg_ausfuhren()
    {
        // TODO: Implement erfolg_ausfuhren() method.
        $xml = simplexml_load_file(xml_lader(zeichenfolge));
        $url = new url_kodierer();
        $url->hinzufugen(bestellung);
        $url->hinzufugen(bestellung_hinzufugen_benutzer_anzaigen);
        hinzufugen_url_sprache($url);
        $this->umleitung_mit_nachricht($url->erhalten(), $xml->hinzufugen_benutzer_erfolg);
    }

    protected function fehler_ausfuhren()
    {
        // TODO: Implement fehler_ausfuhren() method.
        $xml = simplexml_load_file(xml_lader(zeichenfolge));
        $url = new url_kodierer();
        $url->hinzufugen(bestellung);
        $url->hinzufugen(bestellung_hinzufugen_benutzer_anzaigen);
        hinzufugen_url_sprache($url);
        $this->umleitung_mit_nachricht($url->erhalten(), $xml->hinzufugen_benutzer_fehler);
    }

    protected function vorbereiten_abfrage_und_parameter()
    {
        // TODO: Implement vorbereiten_abfrage_und_parameter() method.
        $this->abfrage = array();
        array_push($this->abfrage, 'INSERT INTO sg_user (id, username, pass, id_jenis) VALUES (?, ?, ?, ?);');
        array_push($this->abfrage, 'INSERT INTO detail_sg_user VALUES (?, ?, ?, ?, ?, ?);');
        $this->parameter = array();
        $eine = array($this->id, $this->benutzername, $this->passwort, $this->benutzer_typ);
        $zwei = array($this->id, $this->email, $this->adresse, $this->telefon, $this->telefax, $this->bilder_pfad);
        array_push($this->parameter, $eine);
        array_push($this->parameter, $zwei);
        if((int)filter_input(INPUT_POST, hinzufugen_benutzer_typ) === 3)
        {
            array_push($this->abfrage, 'INSERT INTO user_tingkat_provinsi VALUES (?, ?);');
            array_push($this->parameter, array($this->id, filter_input(INPUT_POST, hinzufugen_benutzer_provinz)));
        }
        else if((int)filter_input(INPUT_POST, hinzufugen_benutzer_typ) === 4)
        {
            array_push($this->abfrage, 'INSERT INTO user_tingkat_kabupaten_kota VALUES (?, ?);');
            array_push($this->parameter, array($this->id, filter_input(INPUT_POST, hinzufugen_benutzer_kabupaten)));
        }
        array_push($this->abfrage, 'INSERT INTO sg_user_rekap VALUES (3, ?,NOW(),?,CURRENT_USER())');
        array_push($this->parameter, array($this->id, $_SESSION[id_benutzername]));
        /*
        var_dump($this->abfrage);
        echo '<br><br><br>';
        var_dump($this->parameter);
        exit();
        */
    }
}