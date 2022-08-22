<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 09/01/2016
 * Time: 12:33
 */
require_once standart_system_pfad.'server_skript/base/Betrieb.php';
class vergessen_passwort extends Betrieb
{
    private $password, $e_password, $daten;
    protected function daten_uberprufen()
    {
        // TODO: Implement daten_uberprufen() method.
        if(!$this->ist_null(filter_input(INPUT_GET, parameter_vergessen_passwort_email)))
        {
            require_once standart_system_pfad.'server_skript/benutzer/wahle_eine_benutzer_von_email.php';
            $this->daten = new wahle_eine_benutzer_von_email();
            $this->daten->satz_email(filter_input(INPUT_GET, parameter_vergessen_passwort_email));
            $this->daten->ausfuhren();
            $this->daten = $this->daten->erhalten_daten();
            if(count($this->daten) > 0)
            {
                $this->e_password = bin2hex(openssl_random_pseudo_bytes(vergessen_passwort_passwort_lange));
                $this->password = password_hash($this->e_password, PASSWORD_DEFAULT);
                $korper = $this->satz_email_daten(array($this->daten[0][0], $this->daten[0][1], $this->e_password));
                $xml = simplexml_load_file(xml_lader(zeichenfolge));
                $headers = 'From: '. $xml->vergessen_passwort_email_von_email . "\r\n" .
                    'Reply-To: ';
                if(mail(filter_input(INPUT_GET, parameter_vergessen_passwort_email), $xml->vergessen_passwort_email_betreff, $korper, $headers))
                {
                    return true;
                }
                else
                {
                    $xml = simplexml_load_file(xml_lader(zeichenfolge));
                    $url = new url_kodierer();
                    $url->hinzufugen(bestellung);
                    $url->hinzufugen(bestellung_anzaigen_anmeldung);
                    hinzufugen_url_sprache($url);
                    umleitung_mit_nachricht($url->erhalten(), $xml->vergessen_passwort_fehler);
                }
            }
            else
            {
                $xml = simplexml_load_file(xml_lader(zeichenfolge));
                $url = new url_kodierer();
                $url->hinzufugen(bestellung);
                $url->hinzufugen(bestellung_anzaigen_anmeldung);
                hinzufugen_url_sprache($url);
                umleitung_mit_nachricht($url->erhalten(), $xml->vergessen_passwort_nicht_email);
            }
        }
        else
        {
            $xml = simplexml_load_file(xml_lader(zeichenfolge));
            $url = new url_kodierer();
            $url->hinzufugen(bestellung);
            $url->hinzufugen(bestellung_anzaigen_anmeldung);
            hinzufugen_url_sprache($url);
            umleitung_mit_nachricht($url->erhalten(), $xml->vergessen_passwort_nicht_email);
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
        $xml = simplexml_load_file(xml_lader(zeichenfolge));
        $url = new url_kodierer();
        $url->hinzufugen(bestellung);
        $url->hinzufugen(bestellung_anzaigen_anmeldung);
        hinzufugen_url_sprache($url);
        umleitung_mit_nachricht($url->erhalten(), $xml->vergessen_passwort_erfolg);
    }

    protected function fehler_ausfuhren()
    {
        // TODO: Implement fehler_ausfuhren() method.
        $xml = simplexml_load_file(xml_lader(zeichenfolge));
        $url = new url_kodierer();
        $url->hinzufugen(bestellung);
        $url->hinzufugen(bestellung_anzaigen_anmeldung);
        hinzufugen_url_sprache($url);
        umleitung_mit_nachricht($url->erhalten(), $xml->vergessen_passwort_fehler);
    }

    protected function vorbereiten_abfrage_und_parameter()
    {
        // TODO: Implement vorbereiten_abfrage_und_parameter() method.
        $this->abfrage = array();
        $this->parameter = array();
        array_push($this->abfrage, 'UPDATE sg_user SET pass = ? WHERE id = ? AND username = ?');
        array_push($this->parameter, array($this->password, $this->daten[0][0], $this->daten[0][1]));
        array_push($this->abfrage, 'INSERT INTO sg_user_rekap VALUES (7, ?,NOW(),?,CURRENT_USER())');
        array_push($this->parameter, array($this->daten[0][0], $this->daten[0][0]));
    }

    private final function satz_email_daten($value)
    {
        if(is_array($value))
        {
            $daten = "";
            $xml = simplexml_load_file(xml_lader(zeichenfolge));
            $temp = $xml->vergessen_passwort_email_korper_id;
            $temp = explode('?', $temp);
            $daten .= $temp[0];
            $daten .= $value[0];
            $daten .= $temp[1];

            $temp = $xml->vergessen_passwort_email_korper_username;
            $temp = explode('?', $temp);
            $daten .= $temp[0];
            $daten .= $value[1];
            $daten .= $temp[1];

            $temp = $xml->vergessen_passwort_email_korper_passwort;
            $temp = explode('?', $temp);
            $daten .= $temp[0];
            $daten .= $value[2];
            $daten .= $temp[1];

            return $daten;
        }
        else
        {
            $xml = simplexml_load_file(xml_lader(zeichenfolge));
            return $xml->vergessen_passwort_email_format_fehler;
        }
    }
}