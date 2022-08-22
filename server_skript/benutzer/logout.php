<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of logout
 *
 * @author LC
 */
require_once 'server_skript/base/globale_variable.php';
require_once standart_system_pfad.'server_skript/base/sitzung_starter.php';
require_once standart_system_pfad.'server_skript/base/universal_methode.php';
class logout {
    //put your code here
    public final function ausfuhren()
    {
        session_unset();
        session_destroy();
        umleitung(erhalten_base_uri());
    }
}
