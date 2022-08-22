<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 12/01/2016
 * Time: 12:56
 */
require_once 'server_skript/base/globale_variable.php';
require_once standart_system_pfad.'server_skript/base/universal_methode.php';
require_once standart_system_pfad.'anzaigen/Base_anzaigen.php';
require_once standart_system_pfad.'darstellung/menu.php';
require_once standart_system_pfad.'anhanger/anhanger_gemeinsame.php';
require_once standart_system_pfad.'server_skript/wahle/wahle_allen_benutzer_typ.php';
require_once standart_system_pfad.'anhanger/anhanger_einfugen_datei.php';
require_once standart_system_pfad.'server_skript/wahle/wahle_allen_provinz.php';
class anzaigen_einfugen_datei extends Base_anzaigen
{
    public function __construct()
    {
        parent::__construct();
        $xml = simplexml_load_file(xml_lader(zeichenfolge));
        $this->satz_titel($xml->anzaigen_einfugen_datei);
    }

    protected function stil()
    {
        // TODO: Implement stil() method.
        $this->satz_stil(stil_input, stil_mediaqueriesD, stil_sliding_box, stil_jquery_ui,
            '<style>

            table {
        border-collapse: collapse;
         table-layout: fixed;

                margin-left: 75px;
            }

             td {
        padding:1px;
        text-align: center;
        border-bottom: 5px solid #ddd;
        white-space: pre-wrap; /* css-3 */
       white-space: -moz-pre-wrap; /* Mozilla, since 1999 */
        white-space: -pre-wrap; /* Opera 4-6 */
        white-space: -o-pre-wrap; /* Opera 7 */
        word-wrap: break-word; /* Internet Explorer 5.5+ */


            }
            th{
                padding:2px;
        text-align: left;
                color:#fff;
                 text-align: center;
            }
            #tb_atas td{
                width:2;
                border:1px;
            }
        </style>');
    }

    protected function client_skript()
    {
        // TODO: Implement client_skript() method.
        $this->satz_client_skript(client_skript_gemeinsame, client_skript_fullung_kab_kota,
            client_skript_anhanger_base_tabelle_und_filter, client_skript_google_jquery,
            client_skript_einfugen_datei, client_skript_ist_sitzung_korriegieren,
            client_skript_eingabe_daten_refresh);
    }

    protected function korper()
    {
        // TODO: Implement korper() method.
        require_once standart_system_pfad.'anzaigen/korper/anzaigen_einfugen_datei_korper.php';
    }
}


