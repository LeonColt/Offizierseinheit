<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 16/12/2015
 * Time: 16:46
 */
require_once 'server_skript/base/globale_variable.php';
require_once standart_system_pfad.'darstellung/menu.php';
require_once standart_system_pfad.'anhanger/anhanger_hinzufugen_benutzer.php';
require_once standart_system_pfad.'anhanger/anhanger_gemeinsame.php';
require_once  standart_system_pfad.'anzaigen/Base_anzaigen.php';
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
class anzaigen_hinzufugen_benutzer extends Base_anzaigen
{
    public function __construct()
    {
        parent::__construct();
        $xml = simplexml_load_file(xml_lader(zeichenfolge));
        if(strcasecmp(filter_input(INPUT_GET, bestellung_anzaigen_perfil), bestellung_anzaigen_perfil) === 0)
            $this->satz_titel($xml->anzaigen_perfil);
        else $this->satz_titel($xml->anzaigen_hinzufugen_benutzer);
    }

    protected function stil()
    {
        // TODO: Implement stil() method.
        $this->satz_stil(stil_input, stil_mediaqueriesD, stil_sliding_box,
            stil_font_kecil);
    }

    protected function client_skript()
    {
        // TODO: Implement client_skript() method.
        $this->satz_client_skript(client_skript_hinzufugen_benutzer, client_skript_gemeinsame,
            client_skript_fullung_kab_kota, client_skript_ist_sitzung_korriegieren);
    }

    protected function korper()
    {
        // TODO: Implement korper() method.
        require_once standart_system_pfad.'anzaigen/korper/anzaigen_hinzufugen_benutzer_korper.php';
    }
}