
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
require_once standart_system_pfad.'server_skript/base/globale_variable.php';
require_once standart_system_pfad.'anzaigen/Base_anzaigen.php';
require_once standart_system_pfad.'darstellung/menu.php';
class anzaigen_einstellung_benutzer extends Base_anzaigen
{
    public function __construct()
    {
        parent::__construct();
        $xml = simplexml_load_file(xml_lader(zeichenfolge));
        $this->satz_titel($xml->anzaigen_einstellung_benutzer);
    }

    protected function stil()
    {
        // TODO: Implement stil() method.
        $this->satz_stil(stil_input, stil_mediaqueriesD, stil_sliding_box,
            '<style>
            table {
        border-collapse: collapse;
         table-layout: fixed;
                width:1270px;
            }

             td {
        padding:2px;
        text-align: center;
        border-bottom: 2px solid #ddd;
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
        </style>');
    }

    protected function client_skript()
    {
        // TODO: Implement client_skript() method.
        $this->satz_client_skript(client_skript_gemeinsame, client_skript_fullung_kab_kota,
            client_skript_anhanger_base_tabelle_und_filter, client_skript_benutzer_anzaigen_einstellung_benutzer,
            client_skript_ist_sitzung_korriegieren);
    }

    protected function korper()
    {
        // TODO: Implement korper() method.
        require_once standart_system_pfad.'anzaigen/korper/anzaigen_einstellung_benutzer_korper.php';
    }
}