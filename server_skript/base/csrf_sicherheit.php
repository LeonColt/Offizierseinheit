<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of csrf_sicherheit
 *
 * @author LC
 */
require_once standart_system_pfad.'server_skript/base/globale_variable.php';
require_once standart_system_pfad.'server_skript/base/sitzung_starter.php';
class csrf_sicherheit {
    //put your code here
    private $schlussel, $token;
    public final function ausfuhren()
    {
        $cstrong = true;
        $this->schlussel = csrf_schlussel.mt_rand(0, csrf_zeit);
        $this->token = bin2hex(openssl_random_pseudo_bytes(csrf_token_length, $cstrong));
        $_SESSION[$this->schlussel] = $this->token;
        $_SESSION[csrf_zeit_schlussel] = time() + csrf_zeit;
    }
    public final function erhalten_schlussel()
    {
        return $this->schlussel;
    }
    public final function erhalten_token()
    {
        return $this->token;
    }
}
