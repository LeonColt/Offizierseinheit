<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
require_once standart_system_pfad.'server_skript/base/globale_variable.php';
require_once standart_system_pfad.'server_skript/base/universal_methode.php';
require_once standart_system_pfad.'darstellung/menu.php';
require_once standart_system_pfad.'anhanger/anhanger_gemeinsame.php';
require_once standart_system_pfad.'anzaigen/Base_anzaigen.php';
class fehler extends Base_anzaigen
{
    protected function stil()
    {
        // TODO: Implement stil() method.
        $this->satz_stil(stil_styleI, stil_mediaqueriesD, stil_sliding_box);
    }

    protected function client_skript()
    {
        // TODO: Implement client_skript() method.
    }

    protected function korper()
    {
        // TODO: Implement korper() method.
        require_once standart_system_pfad.'anzaigen/korper/fehler_korper.php';
    }
}
