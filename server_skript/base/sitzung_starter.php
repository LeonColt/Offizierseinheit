<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'globale_variable.php';
ini_set('session.cookie_httponly', 1);
ini_set('session.entropy_file', '/dev/urandom');
ini_set('session.hash_function', 'whirlpool');
ini_set('session.use_only_cookie', 1);
//ini_set('session.cookie_secure', 1);
if(session_status() === PHP_SESSION_NONE || session_status() === PHP_SESSION_DISABLED)
{
    session_name(sitzung_name);
    session_start();
    session_regenerate_id();
}
