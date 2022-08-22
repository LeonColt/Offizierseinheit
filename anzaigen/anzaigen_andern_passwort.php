<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 20/12/2015
 * Time: 10:17
 */
require_once 'server_skript/base/globale_variable.php';
require_once standart_system_pfad.'darstellung/menu.php';
require_once standart_system_pfad.'anhanger/anhanger_andern_passwort.php';
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
class anzaigen_andern_passwort extends Base_anzaigen
{
    protected function stil()
    {
        // TODO: Implement stil() method.
        $this->satz_stil(stil_input, stil_mediaqueriesD, stil_sliding_box, stil_font_kecil);
    }

    protected function client_skript()
    {
        // TODO: Implement client_skript() method.
        $this->satz_client_skript(client_skript_ist_sitzung_korriegieren);
    }

    protected function korper()
    {
        // TODO: Implement korper() method.
        require_once standart_system_pfad.'anzaigen/korper/anzaigen_andern_passwort_korper.php';
    }
}