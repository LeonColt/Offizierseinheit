<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 27/11/2015
 * Time: 21:07
 */
const daten_bank_host = "localhost";
const daten_bank_hafen = "3306";
const daten_bank_name = "satgas";
const daten_bank_benutzername = "root";
const daten_bank_passwort = "";

//datenbank
//beginnen satgas
if(!defined("satgas_daten_bank_host"))
{
    define("satgas_daten_bank_host", "localhost");
}
if(!defined("satgas_daten_bank_hafen"))
{
    define("satgas_daten_bank_hafen", "3306");
}
if(!defined("satgas_daten_bank_name"))
{
    define("satgas_daten_bank_name", "satgas");
}
if(!defined("satgas_daten_bank_benutzername"))
{
    define("satgas_daten_bank_benutzername", "root");
}
if(!defined("satgas_daten_bank_passwort"))
{
    define("satgas_daten_bank_passwort", "ANNODOMINO33131");
}
//ende satgas
//beginnen kspo
if(!defined("kspo_daten_bank_host"))
{
    define("kspo_daten_bank_host", "localhost");
}
if(!defined("kspo_daten_bank_hafen"))
{
    define("kspo_daten_bank_hafen", "3306");
}
if(!defined("kspo_daten_bank_name"))
{
    define("kspo_daten_bank_name", "ksp");
}
if(!defined("kspo_daten_bank_benutzername"))
{
    define("kspo_daten_bank_benutzername", "root");
}
if(!defined("kspo_daten_bank_passwort"))
{
    define("kspo_daten_bank_passwort", "");
}
//ende kspo