<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 05/01/2016
 * Time: 13:40
 */
require_once 'server_skript/base/globale_variable.php';
require_once standart_system_pfad.'server_skript/base/sitzung_starter.php';
require_once standart_system_pfad.'server_skript/base/pfad_kodierer.php';
require_once standart_system_pfad.'darstellung/menu.php';
require_once standart_system_pfad.'anhanger/anhanger_gemeinsame.php';
require_once standart_system_pfad.'anzaigen/Base_anzaigen.php';
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
class anzaigen_einstellung_nachricht_und_kontakt extends Base_anzaigen
{
    private $zeichenfolge;
    public function __construct()
    {
        parent::__construct();
        $pfad = new pfad_kodierer();
        $pfad->hinzufugen(standart_system_pfad);
        $pfad->hinzufugen(standard_pfad);
        $pfad->hinzufugen($this->sprache);
        $pfad->hinzufugen(zeichenfolge);
        $this->zeichenfolge = simplexml_load_file($pfad->erhalten());
        $this->satz_titel($this->zeichenfolge->anzaigen_einstellung_nachricht_und_kontakt);
        $this->satz_icon("bilder/garuda.png");
    }

    protected function stil()
    {
        // TODO: Implement stil() method.
        $this->satz_stil(stil_input, stil_mediaqueriesD, stil_sliding_box);
    }

    protected function client_skript()
    {
        // TODO: Implement client_skript() method.
        $this->satz_client_skript(client_skript_ist_sitzung_korriegieren);
    }

    protected function korper()
    {
        // TODO: Implement korper() method.
        require_once standart_system_pfad.'anzaigen/korper/anzaigen_einstellung_nachricht_und_kontakt_korper.php';
    }
}
?>
