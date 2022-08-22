<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once standart_system_pfad.'server_skript/base/globale_variable.php';
require_once standart_system_pfad.'server_skript/base/sitzung_starter.php';
require_once standart_system_pfad.'anzaigen/tor.php';
try
{
    $tor = new tor(standard_pfad, standard_sprache);
    $tor->ausfuhren();
} catch (Exception $ex) {
    echo $ex->getMessage();
}
