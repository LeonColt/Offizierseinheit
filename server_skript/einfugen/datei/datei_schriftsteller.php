<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 12/01/2016
 * Time: 18:43
 */
require_once standart_system_pfad.'server_skript/base/globale_variable.php';
require_once standart_system_pfad.'server_skript/base/universal_methode.php';
require_once standart_system_pfad.'server_skript/base/pfad_kodierer.php';
require_once standart_system_pfad.'server_skript/base/url_kodierer.php';
require_once standart_system_pfad.'server_skript/base/globale_variable_fur_datei.php';
require_once standart_system_pfad.'server_skript/library/Excel/PHPExcel.php';
require_once standart_system_pfad.'server_skript/library/Excel/PHPExcel/Reader/Excel5.php';
require_once standart_system_pfad.'server_skript/library/Excel/PHPExcel/Reader/Excel2007.php';
require_once standart_system_pfad.'server_skript/einfugen/datei/allen_datei_lesegerat.php';
class datei_schriftsteller
{
    private $datei, $pfad;
    public function ausfuhren()
    {
        $this->daten_uberprufen();
        $this->ist_datei_excel();
        $str = true;
        $id = bin2hex(openssl_random_pseudo_bytes(einfugen_datei_datei_id_lange, $str));
        $salz = bin2hex(openssl_random_pseudo_bytes(einfugen_datei_datei_id_salz_lange, $str));
        $id_typ = base64_encode(pathinfo($this->datei['name'], PATHINFO_EXTENSION));
        $this->pfad = new pfad_kodierer(pathinfo($this->datei['name'], PATHINFO_EXTENSION));
        $this->pfad->hinzufugen(standart_system_pfad);
        $this->pfad->hinzufugen(ordner_tabellen_kalkulation);
        $this->pfad->hinzufugen(($id.'-'.$salz.'-'.$id_typ));
        if(move_uploaded_file($this->datei['tmp_name'], $this->pfad->erhalten()))
        {
            $pfad = new pfad_kodierer();
            $pfad->hinzufugen(standart_system_pfad);
            $pfad->hinzufugen(ordner_server_skript);
            $pfad->hinzufugen(ordner_xml);
            $pfad->hinzufugen(dateien);
            $xml = simplexml_load_file($pfad->erhalten());
            $datei = $xml->addChild('datei');
            $datei->addChild('id', ($id.'-'.$salz.'-'.$id_typ));
            date_default_timezone_set('Asia/Jakarta');
            $datei->addChild('datum', $this->datum_konverter(getdate()));
            $datei->addChild('datei_name', pathinfo($this->datei['name'], PATHINFO_FILENAME));
            $datei->addChild('benutzer_id', $_SESSION[id_benutzername]);
            $datei->addChild('benutzername', $_SESSION[benutzername]);
            $pfad_datei = new pfad_kodierer(pathinfo($this->datei['name'], PATHINFO_EXTENSION));
            $pfad_datei->hinzufugen(ordner_tabellen_kalkulation);
            $pfad_datei->hinzufugen($id);
            $datei->addChild('pfad_datei', $pfad_datei->erhalten());
            if($xml->asXML($pfad->erhalten()) === true)
            {
                $xml = simplexml_load_file(xml_lader(zeichenfolge));
                $ausfuhren = new url_kodierer();
                $ausfuhren->hinzufugen(bestellung);
                $ausfuhren->hinzufugen(bestellung_anzaigen_einfugen_datei);
                $ausfuhren->hinzufugen(parameter_anzaigen_einfugen_datei_optionen_filter);
                $ausfuhren->hinzufugen(anzaigen_einfugen_datei_optionen_alle);
                $ausfuhren->hinzufugen(parameter_anzaigen_einfugen_datei_numerische_seite);
                $ausfuhren->hinzufugen(1);
                hinzufugen_url_sprache($ausfuhren);
                umleitung_mit_nachricht($ausfuhren->erhalten(), $xml->anzaigen_einfugen_datei_datei_schriftsteller_erfolg);
            }
            else
            {
                if(file_exists($this->pfad->erhalten())) unlink($this->pfad->erhalten());
                $xml = simplexml_load_file(xml_lader(zeichenfolge));
                $ausfuhren = new url_kodierer();
                $ausfuhren->hinzufugen(bestellung);
                $ausfuhren->hinzufugen(bestellung_anzaigen_einfugen_datei);
                $ausfuhren->hinzufugen(parameter_anzaigen_einfugen_datei_optionen_filter);
                $ausfuhren->hinzufugen(anzaigen_einfugen_datei_optionen_alle);
                $ausfuhren->hinzufugen(parameter_anzaigen_einfugen_datei_numerische_seite);
                $ausfuhren->hinzufugen(1);
                hinzufugen_url_sprache($ausfuhren);
                umleitung_mit_nachricht($ausfuhren->erhalten(), $xml->anzaigen_einfugen_datei_datei_schriftsteller_fehler);
            }
        }
        else
        {
            $xml = simplexml_load_file(xml_lader(zeichenfolge));
            $ausfuhren = new url_kodierer();
            $ausfuhren->hinzufugen(bestellung);
            $ausfuhren->hinzufugen(bestellung_anzaigen_einfugen_datei);
            $ausfuhren->hinzufugen(parameter_anzaigen_einfugen_datei_optionen_filter);
            $ausfuhren->hinzufugen(anzaigen_einfugen_datei_optionen_alle);
            $ausfuhren->hinzufugen(parameter_anzaigen_einfugen_datei_numerische_seite);
            $ausfuhren->hinzufugen(1);
            hinzufugen_url_sprache($ausfuhren);
            umleitung_mit_nachricht($ausfuhren->erhalten(), $xml->anzaigen_einfugen_datei_datei_schriftsteller_fehler);
        }
    }
    public function daten_uberprufen()
    {
        if(!(is_uploaded_file($_FILES[parameter_anzaigen_einfugen_datei_datei_fur_upload]['tmp_name']) && file_exists($_FILES[parameter_anzaigen_einfugen_datei_datei_fur_upload]['tmp_name'])))
        {
            $xml = simplexml_load_file(xml_lader(zeichenfolge));
            $ausfuhren = new url_kodierer();
            $ausfuhren->hinzufugen(bestellung);
            $ausfuhren->hinzufugen(bestellung_anzaigen_einfugen_datei);
            $ausfuhren->hinzufugen(parameter_anzaigen_einfugen_datei_optionen_filter);
            $ausfuhren->hinzufugen(anzaigen_einfugen_datei_optionen_alle);
            $ausfuhren->hinzufugen(parameter_anzaigen_einfugen_datei_numerische_seite);
            $ausfuhren->hinzufugen(1);
            hinzufugen_url_sprache($ausfuhren);
            umleitung_mit_nachricht($ausfuhren->erhalten(), $xml->anzaigen_einfugen_datei_datei_schriftsteller_daten_uberprufen_fehler);
        }
        else $this->datei = $_FILES[parameter_anzaigen_einfugen_datei_datei_fur_upload];
    }
    public function ist_datei_excel()
    {
        $types = array('Excel2007', 'Excel5');
        $ergebnis = false;
        foreach($types as $type)
        {
            $lesen = PHPExcel_IOFactory::createReader($type);
            if($lesen->canRead($this->datei['tmp_name']))
            {
                $ergebnis = true; break;
            }
        }
        if(!$ergebnis)
        {
            $xml = simplexml_load_file(xml_lader(zeichenfolge));
            $ausfuhren = new url_kodierer();
            $ausfuhren->hinzufugen(bestellung);
            $ausfuhren->hinzufugen(bestellung_anzaigen_einfugen_datei);
            $ausfuhren->hinzufugen(parameter_anzaigen_einfugen_datei_optionen_filter);
            $ausfuhren->hinzufugen(anzaigen_einfugen_datei_optionen_alle);
            $ausfuhren->hinzufugen(parameter_anzaigen_einfugen_datei_numerische_seite);
            $ausfuhren->hinzufugen(1);
            hinzufugen_url_sprache($ausfuhren);
            umleitung_mit_nachricht($ausfuhren->erhalten(), $xml->anzaigen_einfugen_datei_datei_schriftsteller_datei_fehler);
        }
    }
    private final function datum_konverter($datum)
    {
        $temp = array();
        array_push($temp, $datum["seconds"]);
        array_push($temp, $datum["minutes"]);
        array_push($temp, $datum["hours"]);
        array_push($temp, $datum["mday"]);
        array_push($temp, $datum["mon"]);
        array_push($temp, $datum["year"]);
        return implode(',', $temp);
    }
}