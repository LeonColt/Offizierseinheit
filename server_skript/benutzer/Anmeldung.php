<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Anmeldung
 *
 * @author LC
 */
require_once 'server_skript/base/globale_variable.php';
require_once standart_system_pfad.'server_skript/base/sitzung_starter.php';
require_once standart_system_pfad.'server_skript/base/universal_methode.php';
require_once standart_system_pfad.'server_skript/base/Bergmann.php';
require_once standart_system_pfad.'server_skript/base/globale_variable_fur_datei.php';
require_once standart_system_pfad.'server_skript/base/url_kodierer.php';
require_once standart_system_pfad.'server_skript/base/pfad_kodierer.php';
class Anmeldung extends Bergmann{
    private $benutzername, $passwort;
    protected function daten_leere() {
        $xml = simplexml_load_file(xml_lader(zeichenfolge));
        $this->umleitung_mit_nachricht(erhalten_base_uri(), $xml->anmeldung_null_benutzer);
    }

    protected function daten_uberprufen() {
        if(!$this->ist_null(filter_input(INPUT_POST, benutzername), filter_input(INPUT_POST, passwort)))
        {
            if(!ist_leer(filter_input(INPUT_POST, benutzername), filter_input(INPUT_POST, passwort)))
            {
                $this->benutzername = strtolower(filter_input(INPUT_POST, benutzername));
                $this->passwort = filter_input(INPUT_POST, passwort);
                return true;
            }
        }
        return false;
    }

    protected function vorbereiten_abfrage_und_parameter() {
        $this->abfrage = 'SELECT sg_user.id,
sg_user.username,
            sg_user.pass,
            jenis_user.id_jenis,
            CASE WHEN user_tingkat_kabupaten_kota.id_kabupaten_kota IS NOT NULL
            THEN user_tingkat_kabupaten_kota.id_kabupaten_kota
WHEN user_tingkat_provinsi.id_provinsi IS NOT NULL
THEN user_tingkat_provinsi.id_provinsi
ELSE jenis_user.jenis END AS id,
CASE WHEN user_tingkat_kabupaten_kota.id_kabupaten_kota IS NOT NULL
THEN '.kspo_daten_bank_name.'.tblkabupaten.Kabupaten
WHEN user_tingkat_provinsi.id_provinsi IS NOT NULL
THEN '.kspo_daten_bank_name.'.tblpropinsi.Propinsi
ELSE jenis_user.jenis END AS nama
FROM sg_user
LEFT JOIN jenis_user
ON sg_user.id_jenis = jenis_user.id_jenis
LEFT JOIN user_tingkat_provinsi
ON sg_user.id = user_tingkat_provinsi.id
LEFT JOIN user_tingkat_kabupaten_kota
ON sg_user.id = user_tingkat_kabupaten_kota.id
LEFT JOIN '.kspo_daten_bank_name.'.tblpropinsi
ON user_tingkat_provinsi.id_provinsi = '.kspo_daten_bank_name.'.tblpropinsi.IdPropinsi
LEFT JOIN '.kspo_daten_bank_name.'.tblkabupaten
ON user_tingkat_kabupaten_kota.id_kabupaten_kota = '.kspo_daten_bank_name.'.tblkabupaten.IdKabupaten
WHERE sg_user.username = ? AND active = 1';
        $this->parameter = array($this->benutzername);
    }

    public function erhalten_daten() {
        $url = new url_kodierer();
        $url->hinzufugen(bestellung);
        $url->hinzufugen(bestellung_bindestricht_brett);
        hinzufugen_url_sprache($url);
        if(strcmp($this->benutzername, $this->ergebnis[0]["username"]) === 0)
        {
            if(password_verify($this->passwort, $this->ergebnis[0]["pass"]))
            {
                if($this->ergebnis[0]["id_jenis"] == 1)
                {
                    $_SESSION[id_benutzername] = $this->ergebnis[0][0];
                    $_SESSION[benutzername] = $this->benutzername;
                    $_SESSION[admin] = admin;
                    $_SESSION[nationalen] = false;
                    $_SESSION[provinz] = false;
                    $_SESSION[kabupaten] = false;
                    $_SESSION[zeit] = time();
                    $_SESSION[fertig_zeit] = time() + anmeldung_zeit;
                    $this->umleitung_mit_nachricht($url->erhalten(), 'welcome '.$_SESSION[benutzername]);
                }
                else if($this->ergebnis[0]["id_jenis"] == 2)
                {
                    $_SESSION[id_benutzername] = $this->ergebnis[0][0];
                    $_SESSION[benutzername] = $this->benutzername;
                    $_SESSION[admin] = false;
                    $_SESSION[nationalen] = nationalen;
                    $_SESSION[provinz] = false;
                    $_SESSION[kabupaten] = false;
                    $_SESSION[zeit] = time();
                    $_SESSION[fertig_zeit] = time() + anmeldung_zeit;
                    $this->umleitung_mit_nachricht($url->erhalten(), 'welcome '.$_SESSION[benutzername]);
                }
                elseif ($this->ergebnis[0]["id_jenis"] == 3)
                {
                    $_SESSION[id_benutzername] = $this->ergebnis[0][0];
                    $_SESSION[benutzername] = $this->benutzername;
                    $_SESSION[admin] = false;
                    $_SESSION[nationalen] = false;
                    $_SESSION[provinz] = array($this->ergebnis[0]["id"], $this->ergebnis[0]["nama"]);
                    $_SESSION[kabupaten] = false;
                    $_SESSION[zeit] = time();
                    $_SESSION[fertig_zeit] = time() + anmeldung_zeit;
                    $this->umleitung_mit_nachricht($url->erhalten(), 'welcome '.$_SESSION[benutzername]);
                }
                else if($this->ergebnis[0]["id_jenis"] == 4)
                {
                    $_SESSION[id_benutzername] = $this->ergebnis[0][0];
                    $_SESSION[benutzername] = $this->benutzername;
                    $_SESSION[admin] = false;
                    $_SESSION[nationalen] = false;
                    $_SESSION[provinz] = false;
                    $_SESSION[kabupaten] = array($this->ergebnis[0]["id"], $this->ergebnis[0]["nama"]);
                    $_SESSION[zeit] = time();
                    $_SESSION[fertig_zeit] = time() + anmeldung_zeit;
                    $this->umleitung_mit_nachricht($url->erhalten(), 'welcome '.$_SESSION[benutzername]);
                }
                else
                {
                    $xml = simplexml_load_file(xml_lader(zeichenfolge));
                    umleitung_mit_nachricht(erhalten_base_uri(), $xml->allgemein_benutzer);
                }
            }
            else
            {
                $xml = simplexml_load_file(xml_lader(zeichenfolge));
                $this->umleitung_mit_nachricht($url->erhalten(), $xml->falsch_passwort);
            }
        }
        else
        {
            $xml = simplexml_load_file(xml_lader(zeichenfolge));
            $this->umleitung_mit_nachricht($url->erhalten(), $xml->anmeldung_null_benutzer);
        }
    }
//put your code here
}
