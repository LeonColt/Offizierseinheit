<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 10/01/2016
 * Time: 10:43
 */
require_once standart_system_pfad.'server_skript/benutzer/wahle_allen_benutzer.php';
require_once standart_system_pfad.'anhanger/anhanger_einstellung_benutzer.php';
require_once standart_system_pfad.'server_skript/wahle/wahle_allen_benutzer_typ.php';
require_once standart_system_pfad.'server_skript/wahle/wahle_allen_provinz.php';
require_once standart_system_pfad.'server_skript/benutzer/wahle_max_seite_benutzer.php';
$menu = new menu(); $menu->karte();
$anhanger = new anhanger_einstellung_benutzer();
?>
<div id="content" >
    <div id="insidecontent">
        <h1 align="center" ><?php $xml = simplexml_load_file(xml_lader(zeichenfolge)); echo $xml->anzaigen_einstellung_benutzer; ?></h1>
    </div>
    <div id="back" style="height:auto;">
        <div >
            <div align="center">
                <?php $anhanger->anhanger_tabelle_und_filter_ebene();
                $anhanger->anhanger_tabelle_und_filter_provinz();
                $anhanger->anhanger_tabelle_und_filter_kabupaten(); ?>
                <button onclick="optionen_filter(<?php echo anzaigen_einstellung_benutzer_optionen_ebene; ?>.id, <?php echo anzaigen_einstellung_benutzer_optionen_provinz; ?>.id, <?php echo anzaigen_einstellung_benutzer_optionen_kabupaten;?>.id);">filter</button>
            </div>
            <br>
            <br>
            <?php
            $anhanger->anhanger_tabelle_und_filter_vorschau(0);
            $anhanger->anhanger_tabelle_und_filter_nachste(1230);
            ?>
            <table style="margin-top:10px;" >
                <tr bgcolor="#0a84bd">
                    <th width="2%" height="35">no</th>
                    <th >id</th>
                    <th > Username </th>
                    <th > Email </th>
                    <th > Level </th>
                    <th width="28%"><p1>Alamat Dinas</p1>  </th>
                    <th > No Telpon </th>
                    <th > No Fax </th>
                    <th> photo </th>
                    <th > Keterangan </th>
                </tr>
                <?php
                $anhanger->anhanger_tabelle_und_filter_tabelle();
                ?>
            </table>
        </div>
    </div>
