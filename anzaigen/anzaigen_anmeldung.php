<!DOCTYPE html>
<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 05/01/2016
 * Time: 14:38
 */
require_once 'server_skript/base/globale_variable.php';
require_once standart_system_pfad.'server_skript/base/universal_methode.php';
require_once standart_system_pfad.'server_skript/base/sitzung_starter.php';
require_once standart_system_pfad.'anzaigen/Base_anzaigen.php';
require_once standart_system_pfad.'darstellung/menu.php';
require_once standart_system_pfad.'anhanger/anhanger_gemeinsame.php';
require_once standart_system_pfad.'server_skript/base/pfad_kodierer.php';
class anzaigen_anmeldung extends Base_anzaigen
{
    private $zeichenfolge;
    public function __construct($informationen = false, $kontakt = false)
    {
        parent::__construct($informationen, $kontakt);
        $pfad = new pfad_kodierer();
        $pfad->hinzufugen(standart_system_pfad);
        $pfad->hinzufugen(standard_pfad);
        $pfad->hinzufugen($this->sprache);
        $pfad->hinzufugen(zeichenfolge);
        $this->zeichenfolge = simplexml_load_file($pfad->erhalten());
        $this->satz_titel($this->zeichenfolge->anzaigen_anmeldung);
        $this->satz_icon("bilder/garuda.png");
    }
    protected function stil()
    {
        // TODO: Implement stil() method.
        $this->satz_stil(stil_style, stil_mediaqueries);
    }

    protected function client_skript()
    {
        // TODO: Implement client_skript() method.
        $this->satz_client_skript(client_skript_js_image_slider);
    }
    protected function korper()
    {
        // TODO: Implement korper() method.
        require_once standart_system_pfad.'anzaigen/korper/anzaigen_anmeldung_korper.php';
    }
}