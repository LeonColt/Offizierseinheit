<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 12/01/2016
 * Time: 18:44
 */
set_time_limit(0);
ini_set('memory_limit', '2048M');
require_once standart_system_pfad.'server_skript/base/globale_variable.php';
require_once standart_system_pfad.'server_skript/base/universal_methode.php';
require_once standart_system_pfad.'server_skript/base/pfad_kodierer.php';
require_once standart_system_pfad.'server_skript/base/url_kodierer.php';
require_once standart_system_pfad.'server_skript/einfugen/datei/datei.php';
class datei_download
{
    private $datei, $datei_name, $datei_typ;
    public function ausfuhren()
    {
        if(ist_token_korrigieren())
        {
            $this->satz_datei();
            $this->ist_nicht_datei();
            $größe = filesize($this->datei);
            if(isset($_SERVER['HTTP_RANGE']))
            {
                preg_match('/bytes=(\d+)-(\d+)?/', $_SERVER['HTTP_RANGE'], $matches);
                $offset = intval($matches[1]);
                $lange = intval($matches[2]) - $offset;
                $fhandle = fopen($this->datei, 'r');
                fseek($fhandle, $offset); // seek to the requested offset, this is 0 if it's not a partial content request
                $data = fread($fhandle, $lange);
                fclose($fhandle);
                header('HTTP/1.1 206 Partial Content');
                header('Content-Range: bytes ' . $offset . '-' . ($offset + $lange) . '/' . $größe);
            }
            header("Content-Disposition: attachment;filename=".($this->datei_name.'.'.$this->datei_typ[0]));
            header('Content-Type: '.$this->datei_typ[1]);
            header("Accept-Ranges: bytes");
            header("Pragma: public");
            header("Expires: -1");
            header("Cache-Control: no-cache");
            header("Cache-Control: public, must-revalidate, post-check=0, pre-check=0");
            header("Content-Length: ".filesize($this->datei));
            $chunksize = 8 * (1024 * 1024); //8MB (highest possible fread length)
            if ($größe > $chunksize)
            {
                $handle = fopen($_FILES["file"]["tmp_name"], 'rb');
                $buffer = '';
                while (!feof($handle) && (connection_status() === CONNECTION_NORMAL))
                {
                    $buffer = fread($handle, $chunksize);
                    print $buffer;
                    ob_flush();
                    flush();
                }
                if(connection_status() !== CONNECTION_NORMAL)
                {
                    echo "Connection aborted";
                }
                fclose($handle);
            }
            else
            {
                ob_clean();
                flush();
                readfile($this->datei);
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
            umleitung_mit_nachricht($ausfuhren->erhalten(), $xml->anzaigen_einfugen_datei_nicht_datei);
        }
    }
    private function satz_datei()
    {
        $pfad = new pfad_kodierer();
        $pfad->hinzufugen(standart_system_pfad);
        $pfad->hinzufugen(ordner_server_skript);
        $pfad->hinzufugen(ordner_xml);
        $pfad->hinzufugen(dateien);
        $xml = simplexml_load_file($pfad->erhalten());
        $dateien = array();
        foreach($xml->datei as $datei)
        {
            $datei = new datei($datei->id, $datei->datum, $datei->datei_name, $datei->benutzer_id, $datei->benutzername, $datei->pfad_datei);
            array_push($dateien, $datei);
        }
        $id = filter_input(INPUT_GET, parameter_anzaigen_einfugen_datei_datei_name_fur_download);
        $id = explode('nmlf', $id);
        $zahle = -1;
        for($i = count($dateien) -1; $i > -1; $i--)
        {
            $xml_id = $dateien[$i]->erhalten_id();
            $xml_id = explode('-', $xml_id);
            if(strcasecmp($id[0], $xml_id[0]) === 0)
            {
                $zahle = $i; break;
            }
        }
        if((int)$zahle === -1)
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
            umleitung_mit_nachricht($ausfuhren->erhalten(), $xml->anzaigen_einfugen_datei_nicht_datei);
        }
        $this->datei_name = $dateien[$zahle]->erhalten_name();
        $this->datei_typ = array(base64_decode($xml_id[2]), "application/vnd.ms-excel");
        $this->datei = new pfad_kodierer(base64_decode($xml_id[2]));
        $this->datei->hinzufugen(standart_system_pfad);
        $this->datei->hinzufugen(ordner_tabellen_kalkulation);
        $this->datei->hinzufugen(implode('-', $xml_id));
        $this->datei = $this->datei->erhalten();
    }
    private function ist_nicht_datei()
    {
        if(!file_exists($this->datei))
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
            umleitung_mit_nachricht($ausfuhren->erhalten(), $xml->anzaigen_einfugen_datei_nicht_datei);

        }
    }
}