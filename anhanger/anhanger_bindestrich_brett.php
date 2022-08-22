<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once standart_system_pfad.'server_skript/base/globale_variable.php';
require_once standart_system_pfad.'server_skript/base/globale_variable_fur_daten_bank.php';
require_once standart_system_pfad.'server_skript/wahle/erhalten_min_max_year.php';
require_once standart_system_pfad.'server_skript/wahle/wahle_allen_bentuk_koperasi.php';
require_once standart_system_pfad.'server_skript/wahle/wahle_allen_propinsi.php';
require_once standart_system_pfad.'server_skript/wahle/wahle_propinsi_von_kabupaten_kota.php';
require_once standart_system_pfad.'server_skript/wahle/wahle_allen_kabupaten_kota.php';
function anhanger_index_karte_chart_1()
{
    echo '<div style="float:left;margin-right: 1%;margin-left:1%;">Tahun </div>';
    echo '<div style="float:left;margin-right: 1%;">';
    echo '<select id="'.diagramme1.diagramme_jahr.'" onchange="zeichnen_diagramme_1();">';
    anhanger_index_erhalten_jahr();
    echo '</select>';
    echo '</div>';
    echo '<div style="float:left;margin-right: 1%;">Bulan </div>';
    echo '<div  style="float:left;margin-right: 1%;">';
    echo '<select id="'.diagramme1.diagramme_monat.'" onchange="zeichnen_diagramme_1();"><option value="1">Januari</option><option value="2">Februari</option><option value="3">Maret</option><option value="4">April</option><option value="5">Mei</option><option value="6">Juni</option><option value="7">Juli</option><option value="8">Agustus</option><option value="9">September</option><option value="10">Oktober</option><option value="11">November</option><option value="12">Desember</option></select>';
    echo '</div>';
    echo '<div style="float:left;margin-right: 1%;">Kategori </div>';
    echo '<div style="float:left;margin-right: 1%;">';
    echo '<select id="'.diagramme1.diagramme_parameter_diagramme1_kategorie.'" onchange="zeichnen_diagramme_1();">';
    anhanger_index_filter_kategori();
    echo '</select>';
    echo '</div>';
    anhanger_index_erhalten_provinz_diagramme1();
    anhanger_index_erhalten_kabupaten_diagramme1();
    echo '<div>';
    echo '<div id="chart1" style="width: 100%; height: 100%; clear: both;"></div>';
    echo '</div>';
}
function anhanger_index_karte_chart_2()
{
    if($_SESSION[admin] !== false || $_SESSION[nationalen] !== false)
    {
        echo '<div>';
        echo '<div style="float:left;margin-right: 1%;margin-left:1%;">Tahun </div>';
        echo '<div style="float:left;margin-right: 1%;" >';
        echo '<select id="'.diagramme2.diagramme_jahr.'" onchange="chart_2_schnittstelle();">';
        anhanger_index_erhalten_jahr();
        echo '</select>';
        echo '</div>';
        echo '<div style="float:left;margin-right: 1%;">Bulan </div>';
        echo '<div>';
        echo '<select id="'.diagramme2.diagramme_monat.'" onchange="chart_2_schnittstelle();"><option value="1">Januari</option><option value="2">Februari</option><option value="3">Maret</option><option value="4">April</option><option value="5">Mei</option><option value="6">Juni</option><option value="7">Juli</option><option value="8">Agustus</option><option value="9">September</option><option value="10">Oktober</option><option value="11">November</option><option value="12">Desember</option></select>';
        echo '</div>';
        echo '<div style=" margin-left: 0px;" >';
        echo '<div id="chart2" style="width: 100%; height: 100%; margin-left: 0px; background-color: #4c4c4c;"></div>';
        echo '</div>';
        echo '</div>';
    }
}
function anhanger_index_karte_chart_3()
{
    echo '<div>';
    echo '<div id="chart3" style="width: 100%; height: 100%;"></div>';
    echo '</div>';
}
function anhanger_index_karte_chart_4()
{
    echo '<div>';
    echo '<div style="float:left;margin-right: 1%;margin-left:1%;">Tahun</div>';
    echo '<div style="float:left;margin-right: 1%;" >';
    echo '<select id="'.diagramme4.diagramme_jahr.'" onchange="zeichnen_diagramme_4();">';
    anhanger_index_erhalten_jahr();
    echo '</select>';
    echo '</div>';
    echo '<div style="float:left;margin-right: 1%;">Bulan</div>';
    echo '<div  style="float:left;margin-right: 1%;">';
    echo '<select id="'.diagramme4.diagramme_monat.'"  onchange="zeichnen_diagramme_4();"><option value="1">Januari</option><option value="2">Februari</option><option value="3">Maret</option><option value="4">April</option><option value="5">Mei</option><option value="6">Juni</option><option value="7">Juli</option><option value="8">Agustus</option><option value="9">September</option><option value="10">Oktober</option><option value="11">November</option><option value="12">Desember</option></select>';
    echo '</div>';
    echo '<div style="float:left;margin-right: 1%;">Bentuk</div>';
    echo '<div style="float:left;margin-right: 1%;">';
    echo '<select id="'.diagramme4.diagramme_parameter_bentuk.'" onchange="zeichnen_diagramme_4();">';
    anhanger_index_bentuk_diagramme_4();
    echo '</select>';
    echo '</div>';
    anhanger_index_erhalten_provinz_diagramme4();
    anhanger_index_erhalten_kabupaten_diagramme4();
    echo '</div>';
    echo '<div>';
    echo '<div id="chart4" style="width: 100%; height: 100%;"></div>';
    echo '</div>';
}
function anhanger_index_erhalten_jahr()
{
    $ausfuhren = new erhalten_min_max_year(); 
    $ausfuhren->ausfuhren();
    $jahr_monat = $ausfuhren->erhalten_daten();
    $min = explode("-", $jahr_monat[0]["min_year"])[0];
    $max = explode("-", $jahr_monat[0]["max_year"])[0];
    date_default_timezone_set('Asia/Jakarta');
    $aktuelle_jahr = date('Y');
    for($i = $min; $i<$max+1; $i++)
    {
        echo '<option value="'.$i.'" '.(($i === $aktuelle_jahr) ? ('selected="selected"') : ('')).'>'.$i."</option>";
    }
}
function anhanger_index_filter_kategori()
{
    if(count(diagramme_optionen_key) === count(diagramme_optionen_string_key))
    {
        $counter = 0;
        $schlussel = diagramme_optionen_key;
        foreach (diagramme_optionen_string_key as $temp)
        {
            echo '<option value="'.$schlussel[$counter++].'">'.$temp.'</option>';
        }
    }
}
function anhanger_index_erhalten_provinz_diagramme1()
{
    if(ist_benutzer_kabupaten())
    {
        require_once standart_system_pfad.'server_skript/wahle/wahle_provinz_von_kabupaten_kota.php';
        $provinz = new wahle_provinz_von_kabupaten_kota(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
        $provinz->satz_id_kabupaten_kota($_SESSION[kabupaten][0]);
        $provinz->ausfuhren();
        echo '<div style="float:left;margin-right: 1%;">Provinsi </div>';
        echo '<div style="float:left;margin-right: 1%;">';
        echo '<input type="hidden" id="'.diagramme1.diagramme_parameter_propinsi.'" readonly="readonly" value="'.  htmlentities($provinz->erhalten_daten()[0][0]).'">';
        echo '<input type="text" readonly="readonly" value="'.  htmlentities($provinz->erhalten_daten()[0][1]).'">';
        echo '</div>';
    }
    else if(ist_benutzer_provinz())
    {
        echo '<div style="float:left;margin-right: 1%;">Provinsi </div>';
        echo '<div style="float:left;margin-right: 1%;">';
        echo '<input type="hidden" id="'.diagramme1.diagramme_parameter_propinsi.'" readonly="readonly" value="'.  htmlentities($_SESSION[provinz][0]).'">';
        echo '<input type="text" readonly="readonly" value="'.  htmlentities($_SESSION[provinz][1]).'">';
        echo '</div>';
    }
    else
    {
        echo '<div style="float:left;margin-right: 1%;">Provinsi </div>';
        echo '<div style="float:left;margin-right: 1%;">';
        echo '<select id="'.diagramme1.diagramme_parameter_propinsi.'" onchange="zeichnen_diagramme_1_schnittstelle('.diagramme1.diagramme_parameter_propinsi.'.id, '.diagramme1.diagramme_parameter_kabupaten.'.id);">';
        echo '<option>pilih provinsi</option>';
        $ausfuhren = new wahle_allen_propinsi(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
        $ausfuhren->ausfuhren();
        $propinsi = $ausfuhren->erhalten_daten();
        foreach ($propinsi as $temp)
        {
            echo '<option value="'.$temp[0].'">'.$temp[1].'</option>';
        }
        echo '</select>';
        echo '</div>';
    }
}
function anhanger_index_erhalten_kabupaten_diagramme1()
{
    if(ist_benutzer_kabupaten())
    {
        echo '<div style="float:left;margin-right: 1%;">Kabupaten </div>';
        echo '<div >';
        echo '<input type="text" readonly="readonly" value="'.$_SESSION[kabupaten][1].'">';
        echo '<input type="hidden" id="'.diagramme1.diagramme_parameter_kabupaten.'" readonly="readonly" value="'.$_SESSION[kabupaten][0].'">';
        echo '</div >';
    }
    else if(ist_benutzer_provinz())
    {
        echo '<div style="float:left;margin-right: 1%;">Kabupaten </div>';
        echo '<div >';
        echo '<select id="'.diagramme1.diagramme_parameter_kabupaten.'"  onchange="zeichnen_diagramme_1();">';
        echo '<option>pilih kabupaten/kota</option>';
        $ausfuhren = new wahle_allen_kabupaten_kota(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
        $ausfuhren->satz_id_provinz($_SESSION[provinz][0]);
        $ausfuhren->ausfuhren();
        $kabupaten = $ausfuhren->erhalten_daten();
        foreach ($kabupaten as $temp)
        {
            echo '<option value="'.$temp[1].'">'.$temp[2].'</option>';
        }
        echo '</select>';
        echo '</div >';
    }
    else
    {
        echo '<div style="float:left;margin-right: 1%;">Kabupaten </div>';
        echo '<div >';
        echo '<select id="'.diagramme1.diagramme_parameter_kabupaten.'"  onchange="zeichnen_diagramme_1();"><option>pilih kabupaten/kota</option></select>';
        echo '</div>';
    }
}
function anhanger_index_bentuk_diagramme_4()
{
    $ausfuhren = new wahle_allen_bentuk_koperasi("server_skript/xml/", "id", kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
    $ausfuhren->ausfuhren();
    $bentuk = $ausfuhren->erhalten_daten();
    foreach ($bentuk as $bentuk_temp)
    {
        echo '<option value="'.$bentuk_temp[0].'">'.$bentuk_temp[1].'</option>';
    }
}
function anhanger_index_erhalten_provinz_diagramme4()
{
    if(ist_benutzer_kabupaten())
    {
        $provinz = new wahle_provinz_von_kabupaten_kota(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
        $provinz->satz_id_kabupaten_kota($_SESSION[kabupaten][0]);
        $provinz->ausfuhren();
        echo '<div style="float:left;margin-right: 1%;">Provinsi </div>';
        echo '<div style="float:left;margin-right: 1%;">';
        echo '<input type="hidden" id="'.diagramme4.diagramme_parameter_propinsi.'" readonly="readonly" value="'.  htmlentities($provinz->erhalten_daten()[0][0]).'">';
        echo '<input type="text" readonly="readonly" value="'.  htmlentities($provinz->erhalten_daten()[0][1]).'">';
        echo '</div>';
    }
    else if(ist_benutzer_provinz())
    {
        echo '<div style="float:left;margin-right: 1%;">Provinsi </div>';
        echo '<div style="float:left;margin-right: 1%;">';
        echo '<input type="hidden" id="'.diagramme4.diagramme_parameter_propinsi.'" readonly="readonly" value="'.  htmlentities($_SESSION[provinz][0]).'">';
        echo '<input type="text" readonly="readonly" value="'.  htmlentities($_SESSION[provinz][1]).'">';
        echo '</div>';
    }
    else
    {
        echo '<div style="float:left;margin-right: 1%;">Provinsi </div>';
        echo '<div style="float:left;margin-right: 1%;">';
        echo '<select id="'.diagramme4.diagramme_parameter_propinsi.'" onchange="zeichnen_diagramme_4_schnittstelle('.diagramme4.diagramme_parameter_propinsi.'.id, '.diagramme4.diagramme_parameter_kabupaten.'.id);">';
        echo '<option>pilih provinsi</option>';
        $ausfuhren = new wahle_allen_propinsi("server_skript/xml/", "id", kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
        $ausfuhren->ausfuhren();
        $propinsi = $ausfuhren->erhalten_daten();
        foreach ($propinsi as $temp)
        {
            echo '<option value="'.$temp[0].'">'.$temp[1].'</option>';
        }
        echo '</select>';
        echo '</div>';
    }
}
function anhanger_index_erhalten_kabupaten_diagramme4()
{
    if(ist_benutzer_kabupaten())
    {
        echo '<div style="float:left;margin-right: 1%;">Kabupaten </div>';
        echo '<div >';
        echo '<input type="text" readonly="readonly" value="'.$_SESSION[kabupaten][1].'">';
        echo '<input type="hidden" id="'.diagramme4.diagramme_parameter_kabupaten.'" readonly="readonly" value="'.$_SESSION[kabupaten][0].'">';
        echo '</div >';
    }
    else if(ist_benutzer_provinz())
    {
        echo '<div style="float:left;margin-right: 1%;">Kabupaten </div>';
        echo '<div >';
        echo '<select id="'.diagramme4.diagramme_parameter_kabupaten.'"  onchange="zeichnen_diagramme_4();">';
        echo '<option>pilih kabupaten/kota</option>';
        $ausfuhren = new wahle_allen_kabupaten_kota("server_skript/xml/", "id", kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
        $ausfuhren->satz_id_provinz($_SESSION[provinz][0]);
        $ausfuhren->ausfuhren();
        $kabupaten = $ausfuhren->erhalten_daten();
        foreach ($kabupaten as $temp)
        {
            echo '<option value="'.$temp[1].'">'.$temp[2].'</option>';
        }
        echo '</select>';
        echo '</div >';
    }
    else
    {
        echo '<div style="float:left;margin-right: 1%;">Kabupaten </div>';
        echo '<div >';
        echo '<select id="'.diagramme4.diagramme_parameter_kabupaten.'"  onchange="zeichnen_diagramme_4();"><option>pilih kabupaten/kota</option></select>';
        echo '</div>';
    }
}