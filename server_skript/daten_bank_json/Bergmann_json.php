<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Bergmann_json
 *
 * @author LC
 */
require_once 'server_skript/base/globale_variable.php';
require_once standart_system_pfad.'server_skript/base/Bergmann.php';
require_once standart_system_pfad.'server_skript/base/json_kodierer.php';
abstract class Bergmann_json extends Bergmann {
    //put your code here
    protected $json;
    public function __construct($pfad = "server_skript/xml/", $sprache = "id", $host = NULL, $hafen = NULL, $daten_bank_name = NULL, $benutzername = NULL, $passwort = NULL) {
        parent::__construct($pfad, $sprache, $host, $hafen, $daten_bank_name, $benutzername, $passwort);
        $this->json = new json_kodierer();
    }
    public function ausfuhren() {
        parent::ausfuhren();
        $this->json->karte();
    }
}
