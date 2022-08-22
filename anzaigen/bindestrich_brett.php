<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
require_once standart_system_pfad.'server_skript/base/globale_variable.php';
require_once standart_system_pfad.'server_skript/base/universal_methode.php';
require_once standart_system_pfad.'server_skript/base/sitzung_starter.php';
require_once standart_system_pfad.'server_skript/base/url_kodierer.php';
require_once standart_system_pfad.'darstellung/menu.php';
require_once standart_system_pfad.'anhanger/anhanger_bindestrich_brett.php';
require_once standart_system_pfad.'anhanger/anhanger_gemeinsame.php';
require_once standart_system_pfad.'anzaigen/Base_anzaigen.php';

class bindestrich_brett extends Base_anzaigen
{
    public function __construct()
    {
        parent::__construct();
        $xml = simplexml_load_file(xml_lader(zeichenfolge));
        $this->satz_titel($xml->anzaigen_bindestrich_brett);
        $this->satz_icon("bilder/garuda.png");
    }

    protected function stil()
    {
        // TODO: Implement stil() method.
        $this->satz_stil(stil_styleI, stil_mediaqueriesD, stil_sliding_box);
    }

    protected function client_skript()
    {
        // TODO: Implement client_skript() method.
        $this->satz_client_skript(client_skript_jquery, client_skript_gemeinsame,
            client_skript_google_api, client_skript_fullung_kab_kota,
            client_skript_bindestricht_brett_chart1, client_skript_bindestricht_brett_chart4,
            client_skript_bindestricht_diagramme_2_und_3, client_skript_ist_sitzung_korriegieren);
    }

    protected function korper()
    {
        // TODO: Implement korper() method.
        require_once standart_system_pfad.'anzaigen/korper/bindestrich_brett_korper.php';
    }
}
