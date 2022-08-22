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
require_once standart_system_pfad.'server_skript/base/pfad_kodierer.php';
require_once standart_system_pfad.'anzaigen/Base_anzaigen.php';
require_once standart_system_pfad.'darstellung/menu.php';
require_once standart_system_pfad.'anhanger/anhanger_einfugen.php';
require_once standart_system_pfad.'anhanger/anhanger_gemeinsame.php';
class anzaigen_einfugen extends Base_anzaigen
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
        $this->satz_titel($this->zeichenfolge->anzaigen_einfugen);
        $this->satz_icon("bilder/garuda.png");
    }

    protected function stil()
    {
        // TODO: Implement stil() method.
        $this->satz_stil(stil_input, stil_mediaqueriesD, stil_sliding_box, stil_menudalam, stil_input_style);
    }

    protected function client_skript()
    {
        // TODO: Implement client_skript() method.
        $this->satz_client_skript(client_skript_gemeinsame,
            client_skript_vergleichen_einfugen, client_skript_wann_senden,
            client_skript_jquery, client_skript_menudalamA,
            client_skript_fullung_kab_kota, client_skript_eingabe_eingabe,
            client_skript_eigabe_einfugen_schnittstelle,
            client_skript_ist_sitzung_korriegieren);
    }

    protected function korper()
    {
        // TODO: Implement korper() method.
        require_once standart_system_pfad.'anzaigen/korper/anzaigen_einfugen_korper.php';
    }
}
