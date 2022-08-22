<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 17/12/2015
 * Time: 10:19
 */
require_once standart_system_pfad.'server_skript/base/globale_variable.php';
require_once standart_system_pfad.'server_skript/base/csrf_sicherheit.php';
require_once standart_system_pfad.'server_skript/base/json_kodierer.php';
class erhalten_token_json
{
    public function ausfuhren()
    {
        $csrf = new csrf_sicherheit();
        $csrf->ausfuhren();
        $json = new json_kodierer();
        $json->hinzufugen(json_csrf_schlussel, $csrf->erhalten_schlussel());
        $json->hinzufugen(json_csrf_token, $csrf->erhalten_token());
        $json->karte();
    }
}