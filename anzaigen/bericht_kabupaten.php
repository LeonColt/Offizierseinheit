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
if(!ist_sitzung_korrigieren())
{
    umleitung(erhalten_base_uri());
}
require_once standart_system_pfad.'darstellung/menu.php';
require_once standart_system_pfad.'anhanger/anhanger_ausgabe_kabupaten.php';
require_once standart_system_pfad.'anhanger/anhanger_gemeinsame.php';
require_once standart_system_pfad.'server_skript/ausgabe/kabupaten/wichtigsten_ausgabe_kabupaten.php';
require_once standart_system_pfad.'anzaigen/Base_anzaigen.php';
class bericht_kabupaten extends Base_anzaigen
{
    protected function stil()
    {
        // TODO: Implement stil() method.
        $this->satz_stil(stil_input, stil_mediaqueriesD, stil_sliding_box, stil_font_kecil,
            stil_cssscroll);
    }

    protected function client_skript()
    {
        // TODO: Implement client_skript() method.
        $this->satz_client_skript(client_skript_ausgabe_kabupaten, client_skript_pdf,
            client_skript_ist_sitzung_korriegieren);
    }

    protected function korper()
    {
        // TODO: Implement korper() method.
        require_once standart_system_pfad.'anzaigen/korper/bericht_kabupaten_korper.php';
    }
}