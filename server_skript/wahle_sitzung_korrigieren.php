<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 16/01/2016
 * Time: 13:13
 */
require_once standart_system_pfad.'server_skript/base/json_kodierer.php';
class wahle_sitzung_korrigieren
{
    public function ausfuhren()
    {
        if(ist_sitzung_korrigieren())
        {
            $json = new json_kodierer();
            $json->hinzufugen(json_sitzung_aktive_nicht_aktive, json_sitzung_aktive_nicht_aktive_aktive);
            $json->karte();
        }
        else
        {
            $json = new json_kodierer();
            $json->hinzufugen(json_sitzung_aktive_nicht_aktive, json_sitzung_aktive_nicht_aktive_nicht_aktive);
            $json->karte();
        }
    }
}