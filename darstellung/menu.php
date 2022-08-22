<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of menu
 *
 * @author LC
 */
require_once 'server_skript/base/globale_variable.php';
require_once standart_system_pfad.'server_skript/base/universal_methode.php';
require_once standart_system_pfad.'server_skript/base/sitzung_starter.php';
require_once standart_system_pfad.'server_skript/base/url_kodierer.php';
require_once standart_system_pfad.'server_skript/base/globale_variable_fur_datei.php';
require_once standart_system_pfad.'server_skript/wahle/erhalten_max_jahr_monat_fur_menu.php';
require_once standart_system_pfad.'server_skript/wahle/wahle_allen_provinz.php';
require_once standart_system_pfad.'server_skript/wahle/wahle_allen_model_koperasi.php';
require_once standart_system_pfad.'server_skript/base/pfad_kodierer.php';
class menu {
    //put your code here
    private $xml;
    public function __construct()
    {
        $this->xml = simplexml_load_file(xml_lader(zeichenfolge));
    }

    function karte()
    {
        echo '<div class="menuBackground">';
        echo '<ul class="dropDownMenu">';
        $this->erhalten_bindestrich_brett();
        $this->erhalten_einfugen();
        $this->erhalten_output();
        $this->erhalten_einstellung();
        $this->erhalten_logout();
        echo '</ul>';
        echo '</div>';
    }
    public function erhalten_menu()
    {
        return '<div class="menuBackground"><ul class="dropDownMenu">'
        .$this->erhalten_bindestrich_brett()
        .$this->erhalten_einfugen()
        .$this->erhalten_output()
        .$this->erhalten_einstellung()
        .$this->erhalten_logout().'</ul></div>';
    }
    private function erhalten_bindestrich_brett()
    {
        if(ist_sitzung_korrigieren())
        {
            $ausfuhren = new url_kodierer();
            $ausfuhren->hinzufugen(bestellung);
            $ausfuhren->hinzufugen(bestellung_bindestricht_brett);
            hinzufugen_url_sprache($ausfuhren);
            echo '<li><a href="'.$ausfuhren->erhalten().'">'.$this->xml->anzaigen_bindestrich_brett.'</a></li>';
        }
        else
        {
            $ausfuhren = new url_kodierer();
            $ausfuhren->hinzufugen(bestellung);
            $ausfuhren->hinzufugen(bestellung_anzaigen_anmeldung);
            hinzufugen_url_sprache($ausfuhren);
            echo '<li><a href="'.$ausfuhren->erhalten().'">'.$this->xml->anzaigen_bindestrich_brett.'</a></li>';
        }
    }
    private function erhalten_einfugen() {
    	if(ist_sitzung_korrigieren())
    	{
            echo '<li>';
            echo '<a>'.$this->xml->anzaigen_einfugen.'</a>';
            echo '<ul>';
            $ausfuhren = new url_kodierer();
            $ausfuhren->hinzufugen(bestellung);
            $ausfuhren->hinzufugen(bestellung_anzaigen_einfugen);
            hinzufugen_url_sprache($ausfuhren);
            echo '<li><a href="'.$ausfuhren->erhalten().'">'.$this->xml->anzaigen_einfugen.'</a></li>';
            $ausfuhren = new url_kodierer();
            $ausfuhren->hinzufugen(bestellung);
            $ausfuhren->hinzufugen(bestellung_anzaigen_einfugen_datei);
            $ausfuhren->hinzufugen(parameter_anzaigen_einfugen_datei_optionen_filter);
            $ausfuhren->hinzufugen(anzaigen_einfugen_datei_optionen_alle);
            $ausfuhren->hinzufugen(parameter_anzaigen_einfugen_datei_numerische_seite);
            $ausfuhren->hinzufugen(1);
            hinzufugen_url_sprache($ausfuhren);
            echo '<li><a href="'.$ausfuhren->erhalten().'">'.$this->xml->anzaigen_einfugen_datei.'</a></li>';
            echo '</ul>';
            echo '</li>';
    	}
    }
    private function erhalten_logout()
    {
    	if(ist_sitzung_korrigieren())
    	{
            $ausfuhren = new url_kodierer();
            $ausfuhren->hinzufugen(bestellung);
            $ausfuhren->hinzufugen(bestellung_logout);
            hinzufugen_url_sprache($ausfuhren);
            echo '<li>';
            echo '<a href="'.$ausfuhren->erhalten().'">'.$this->xml->anzaigen_logout.'</a>';
            echo '</li>';
    	}
    }
    private function erhalten_einstellung()
    {
        if(ist_sitzung_korrigieren())
        {
            echo '<li>';
            echo '<a>Setting</a>';
            echo '<ul>';
            if(ist_benutzer_admin())
            {
                $einstellung_benutzer = new url_kodierer();
                $einstellung_benutzer->hinzufugen(bestellung);
                $einstellung_benutzer->hinzufugen(bestellung_anzaigen_einstellung_benutzer);
                $einstellung_benutzer->hinzufugen(parameter_anzaigen_einstellung_benutzer_optionen_filter);
                $einstellung_benutzer->hinzufugen(anzaigen_einstellung_benutzer_optionen_alle);
                $einstellung_benutzer->hinzufugen(parameter_anzaigen_einstellung_benutzer_numerische_seite);
                $einstellung_benutzer->hinzufugen(1);
                hinzufugen_url_sprache($einstellung_benutzer);
                echo '<li> <a href="'.($einstellung_benutzer->erhalten()).'">'.$this->xml->anzaigen_einstellung_benutzer.'</a></li>';
                $hinzufugen_benutzer = new url_kodierer();
                $hinzufugen_benutzer->hinzufugen(bestellung);
                $hinzufugen_benutzer->hinzufugen(bestellung_hinzufugen_benutzer_anzaigen);
                hinzufugen_url_sprache($hinzufugen_benutzer);
                echo '<li> <a href="'.($hinzufugen_benutzer->erhalten()).'">'.$this->xml->anzaigen_hinzufugen_benutzer.'</a></li>';
                $ausfuhren = new url_kodierer();
                $ausfuhren->hinzufugen(bestellung);
                $ausfuhren->hinzufugen(bestellung_anzaigen_einstellung_nachricht_und_kontakt);
                hinzufugen_url_sprache($ausfuhren);
                echo '<li> <a href="'.($ausfuhren->erhalten()).'">'.$this->xml->anzaigen_einstellung_nachricht_und_kontakt.'</a></li>';
            }
            $anderen_passwort = new url_kodierer();
            $anderen_passwort->hinzufugen(bestellung);
            $anderen_passwort->hinzufugen(bestellung_anzaigen_andern_passwort);
            hinzufugen_url_sprache($anderen_passwort);
            echo '<li> <a href="'.($anderen_passwort->erhalten()).'">'.$this->xml->anzaigen_andern_passwort.'</a></li>';
            $perfil = new url_kodierer();
            $perfil->hinzufugen(bestellung);
            $perfil->hinzufugen(bestellung_anzaigen_perfil);
            hinzufugen_url_sprache($perfil);
            echo '<li> <a href="'.($perfil->erhalten()).'">'.$this->xml->anzaigen_perfil.'</a></li>';
            echo '</ul>';
            echo '</li>';
        }
    }
    private function erhalten_output()
    {
        if(ist_sitzung_korrigieren())
        {
            echo '<li>';
            echo '<a>Laporan</a>';
            echo '<ul>';
            $this->anzaigen_ausgabe_nationalen();
            $this->anzaigen_ausgabe_provinz();
            $this->anzaigen_ausgabe_kabupaten();
            echo '</ul>';
            echo '</li>';
        }
    }
    private final function anzaigen_ausgabe_nationalen()
    {
        if(ist_sitzung_korrigieren()) {
            $jahr_erhalten = new erhalten_max_jahr_monat_fur_menu();
            $jahr_erhalten->ausfuhren();
            $jahr = $jahr_erhalten->erhalten_jahr();
            $monat = $jahr_erhalten->erhalten_monat();
            if (ist_benutzer_admin() || ist_benutzer_nationalen()) {
                $nationalen = new url_kodierer();
                $nationalen->hinzufugen(bestellung);
                $nationalen->hinzufugen(bestellung_bericht_nationalen);
                $nationalen->hinzufugen(ausgabe_jahr);
                $nationalen->hinzufugen($jahr);
                $nationalen->hinzufugen(ausgabe_monat);
                $nationalen->hinzufugen($monat);
                hinzufugen_url_sprache($nationalen);
                echo '<li> <a href="' . ($nationalen->erhalten()) . '">Rekapitulasi Nasional</a></li>';
            }
        }
    }
    private final function anzaigen_ausgabe_provinz()
    {
        if(ist_sitzung_korrigieren()) {
            $jahr_erhalten = new erhalten_max_jahr_monat_fur_menu();
            $jahr_erhalten->ausfuhren();
            $jahr = $jahr_erhalten->erhalten_jahr();
            $monat = $jahr_erhalten->erhalten_monat();
            if (ist_benutzer_admin() || ist_benutzer_nationalen()) {
                $provinz = new url_kodierer();
                $provinz->hinzufugen(bestellung);
                $provinz->hinzufugen(bestellung_bericht_provinz);
                $provinz->hinzufugen(ausgabe_jahr);
                $provinz->hinzufugen($jahr);
                $provinz->hinzufugen(ausgabe_monat);
                $provinz->hinzufugen($monat);
                $provinz->hinzufugen(ausgabe_parameter_model);
                $provinz->hinzufugen(ausgabe_parameter_model_alle);
                hinzufugen_url_sprache($provinz);
                echo '<li> <a href="' . ($provinz->erhalten()) . '">Rekapitulasi Provinsi</a></li>';
            }
        }
    }
    private final function anzaigen_ausgabe_kabupaten()
    {
        if(ist_sitzung_korrigieren()) {
            $jahr_erhalten = new erhalten_max_jahr_monat_fur_menu();
            $jahr_erhalten->ausfuhren();
            $jahr = $jahr_erhalten->erhalten_jahr();
            $monat = $jahr_erhalten->erhalten_monat();
            if (ist_benutzer_admin() || ist_benutzer_nationalen()) {
                $provinz = new wahle_allen_provinz(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
                $provinz->ausfuhren();
                $provinz = $provinz->erhalten_daten();
                $kabupaten = new url_kodierer();
                $kabupaten->hinzufugen(bestellung);
                $kabupaten->hinzufugen(bestellung_bericht_kabupaten);
                $kabupaten->hinzufugen(ausgabe_jahr);
                $kabupaten->hinzufugen($jahr);
                $kabupaten->hinzufugen(ausgabe_monat);
                $kabupaten->hinzufugen($monat);
                $kabupaten->hinzufugen(ausgabe_parameter_model);
                $kabupaten->hinzufugen(ausgabe_parameter_model_alle);
                $kabupaten->hinzufugen(ausgabe_parameter_provinz);
                $kabupaten->hinzufugen($provinz[0][0]);
                hinzufugen_url_sprache($kabupaten);
                echo '<li> <a href="' . ($kabupaten->erhalten()) . '">Rekapitulasi Kabupaten</a></li>';
            } else if (ist_benutzer_provinz()) {
                $kabupaten = new url_kodierer();
                $kabupaten->hinzufugen(bestellung);
                $kabupaten->hinzufugen(bestellung_bericht_kabupaten);
                $kabupaten->hinzufugen(ausgabe_jahr);
                $kabupaten->hinzufugen($jahr);
                $kabupaten->hinzufugen(ausgabe_monat);
                $kabupaten->hinzufugen($monat);
                $kabupaten->hinzufugen(ausgabe_parameter_model);
                $kabupaten->hinzufugen(ausgabe_parameter_model_alle);
                $kabupaten->hinzufugen(ausgabe_parameter_provinz);
                $kabupaten->hinzufugen($_SESSION[provinz][0]);
                hinzufugen_url_sprache($kabupaten);
                echo '<li> <a href="' . ($kabupaten->erhalten()) . '">Rekapitulasi Kabupaten</a></li>';
            }
        }
    }
}
