<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 10/12/2015
 * Time: 10:34
 */
require_once 'server_skript/base/globale_variable.php';
require_once standart_system_pfad.'server_skript/wahle/erhalten_min_max_year.php';
require_once standart_system_pfad.'server_skript/wahle/wahle_allen_model_koperasi.php';
require_once standart_system_pfad.'server_skript/base/url_kodierer.php';
require_once standart_system_pfad.'server_skript/base/globale_variable_fur_datei.php';
require_once standart_system_pfad.'server_skript/base/pfad_kodierer.php';
require_once standart_system_pfad.'server_skript/wahle/wahle_allen_provinz.php';
function anhanger_ausgabe_kabupaten_erhalten_jahr()
{
    echo '<div style="float:left; margin-right:8px;">Tahun</div>';
    echo '<div style="float:left;margin-right:20px;">';
    echo '<select id="'.ausgabe_jahr.'" onchange="ausgabe_kabupaten_jahr_und_monat_turner();">';
    $ausruhren = new erhalten_min_max_year();
    $ausruhren->ausfuhren();
    $jahr_monat_daten = $ausruhren->erhalten_alle_daten();
    $min = explode("-", $jahr_monat_daten[0]["min_year"])[0];
    $max = explode("-", $jahr_monat_daten[0]["max_year"])[0];
    for($i = $min; $i<$max+1; $i++)
    {
        echo '<option value="'.$i.'" '.(($i === (int)  filter_input(INPUT_GET, ausgabe_jahr)) ? ('selected="selected"') : ('')).'>'.$i.'</option>';
    }
    echo '</select>';
    echo '</div>';
}
function anhanger_ausgabe_kabupaten_erhalten_monat()
{
    echo '<div style="float:left; margin-right:8px;">Bulan</div>';
    echo '<div style="float:left;margin-right:20px;">';
    echo '<select id="'.ausgabe_monat.'" onchange="ausgabe_kabupaten_jahr_und_monat_turner();">';
    if((int)  filter_input(INPUT_GET, ausgabe_monat) === 1)
    {
        echo '<option value="1" selected="selected">Januari</option>';
    }
    else
    {
        echo '<option value="1">Januari</option>';
    }
    if((int)  filter_input(INPUT_GET, ausgabe_monat) === 2)
    {
        echo '<option value="2" selected="selected">Februari</option>';
    }
    else
    {
        echo '<option value="2">Februari</option>';
    }
    if((int)  filter_input(INPUT_GET, ausgabe_monat) === 3)
    {
        echo '<option value="3" selected="selected">Maret</option>';
    }
    else
    {
        echo '<option value="3">Maret</option>';
    }
    if((int)  filter_input(INPUT_GET, ausgabe_monat) === 4)
    {
        echo '<option value="4" selected="selected">April</option>';
    }
    else
    {
        echo '<option value="4">April</option>';
    }
    if((int)  filter_input(INPUT_GET, ausgabe_monat) === 5)
    {
        echo '<option value="5" selected="selected">Mei</option>';
    }
    else
    {
        echo '<option value="5">Mei</option>';
    }
    if((int)  filter_input(INPUT_GET, ausgabe_monat) === 6)
    {
        echo '<option value="6" selected="selected">Juni</option>';
    }
    else
    {
        echo '<option value="6">Juni</option>';
    }
    if((int)  filter_input(INPUT_GET, ausgabe_monat) === 7)
    {
        echo '<option value="7" selected="selected">Juli</option>';
    }
    else
    {
        echo '<option value="7">Juli</option>';
    }
    if((int)  filter_input(INPUT_GET, ausgabe_monat) === 8)
    {
        echo '<option value="8" selected="selected">Agustus</option>';
    }
    else
    {
        echo '<option value="8">Agustus</option>';
    }
    if((int)  filter_input(INPUT_GET, ausgabe_monat) === 9)
    {
        echo '<option value="9" selected="selected">September</option>';
    }
    else
    {
        echo '<option value="9">September</option>';
    }
    if((int)  filter_input(INPUT_GET, ausgabe_monat) === 10)
    {
        echo '<option value="10" selected="selected">Oktober</option>';
    }
    else
    {
        echo '<option value="10">Oktober</option>';
    }
    if((int)  filter_input(INPUT_GET, ausgabe_monat) === 11)
    {
        echo '<option value="11" selected="selected">November</option>';
    }
    else
    {
        echo '<option value="11">November</option>';
    }
    if((int)  filter_input(INPUT_GET, ausgabe_monat) === 12)
    {
        echo '<option value="12" selected="selected">Desember</option>';
    }
    else
    {
        echo '<option value="12">Desember</option>';
    }
    echo '</select>';
    echo '</div>';
}
function anhanger_ausgabe_kabupaten_erhalten_provinz()
{
    if(ist_benutzer_provinz())
    {
        echo '<div style="float:left; margin-right:8px;">Provinsi</div>';
        echo '<div style="float:left;margin-right:20px;">';
        echo '<input type="hidden" id="'.ausgabe_parameter_provinz.'" value="'.$_SESSION[provinz][0].'">';
        echo '<input type="text" value="'.$_SESSION[provinz][1].'" readonly="readonly">';
        echo '</div>';
    }
    else
    {
        $provinz = new wahle_allen_provinz(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
        $provinz->ausfuhren();
        $provinz = $provinz->erhalten_daten();
        echo '<div style="float:left; margin-right:8px;">Provinsi</div>';
        echo '<div style="float:left;margin-right:20px;">';
        echo '<select id="'.ausgabe_parameter_provinz.'" onchange="ausgabe_kabupaten_jahr_und_monat_turner();">';
        foreach($provinz as $temp)
        {
            echo '<option value="'.$temp[0].'" '.(((int)filter_input(INPUT_GET, ausgabe_parameter_provinz) === (int)$temp[0]) ? ('selected="selected"') : ('')).'>'.$temp[1].'</option>';
        }
        echo '</select>';
        echo '</div>';
    }
}
function anhanger_ausgabe_kabupaten_erhalten_model()
{
    $ausfuhren = new wahle_allen_model_koperasi(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
    $ausfuhren->ausfuhren();
    $ausfuhren = $ausfuhren->erhalten_daten();
    $allen = simplexml_load_file(xml_lader(zeichenfolge));
    echo '<div style="float:left; margin-right:8px;">Model </div>';
    echo '<div style="float:left;margin-right:5%;margin-bottom:20px;">';
    echo '<select id="'.ausgabe_parameter_model.'" onchange="ausgabe_kabupaten_jahr_und_monat_turner();">';
    echo '<option value="'.ausgabe_parameter_model_alle.'" '.((strcasecmp(filter_input(INPUT_GET, ausgabe_parameter_model), ausgabe_parameter_model_alle) === 0) ? ('selected="selected"') : ('')).'>'.$allen->ausgabe_parameter_model_alle.'</option>';
    foreach ($ausfuhren as $daten)
    {
        echo '<option value="'.$daten[0].'"  '.(((int)filter_input(INPUT_GET, ausgabe_parameter_model) === (int)$daten[0]) ? ('selected="selected"') : ('')).'>'.$daten[1].'</option>';
    }
    echo '</select>';
    echo '</div>';
}
function anhanger_ausgabe_kabupaten_excel_schaltflache()
{
    $model = new wahle_allen_model_koperasi(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
    $model->ausfuhren();
    $model = $model->erhalten_daten();
    $provinz = new wahle_allen_provinz(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
    $provinz->ausfuhren();
    $provinz = $provinz->erhalten_daten();
    $allen = simplexml_load_file(xml_lader(zeichenfolge));
    echo '<div style="float:right; margin-right:20px;" >';
    $ausfuhren = new url_kodierer();
    $ausfuhren->hinzufugen(bestellung);
    $ausfuhren->hinzufugen(bestellung_ausgabe_excel);
    $ausfuhren->hinzufugen(sub_bestellung);
    $ausfuhren->hinzufugen(bestellung_ausgabe_excel_kabupaten);
    $ausfuhren->hinzufugen(ausgabe_jahr);
    $ausfuhren->hinzufugen(filter_input(INPUT_GET, ausgabe_jahr));
    $ausfuhren->hinzufugen(ausgabe_monat);
    $ausfuhren->hinzufugen(filter_input(INPUT_GET, ausgabe_monat));
    $ausfuhren->hinzufugen(ausgabe_parameter_model);
    $ausfuhren->hinzufugen(filter_input(INPUT_GET, ausgabe_parameter_model));
    $ausfuhren->hinzufugen(ausgabe_parameter_provinz);
    $ausfuhren->hinzufugen(filter_input(INPUT_GET, ausgabe_parameter_provinz));
    $ausfuhren->hinzufugen(ausgabe_parameter_model_zeichenfolge);
    if(strcasecmp(filter_input(INPUT_GET, ausgabe_parameter_model), ausgabe_parameter_model_alle) === 0)
    {
        $model = strtoupper($allen->ausgabe_parameter_model_alle);
    }
    else
    {
        foreach($model as $daten) {
            if ((int)$daten[0] === (int)filter_input(INPUT_GET, ausgabe_parameter_model))
            {
                $model = $daten[1];
                break;
            }
        }
    }
    $ausfuhren->hinzufugen(strtoupper($model));
    $ausfuhren->hinzufugen(ausgabe_parameter_provinz_zeichenfolge);
    if(strcasecmp(filter_input(INPUT_GET, ausgabe_parameter_provinz), ausgabe_parameter_provinz_alle) === 0)
    {
        $provinz = $provinz[0][1];
    }
    else
    {
        foreach($provinz as $daten) {
            if ((int)$daten[0] === (int)filter_input(INPUT_GET, ausgabe_parameter_provinz))
            {
                $provinz = $daten[1];
                break;
            }
        }
    }
    $ausfuhren->hinzufugen(strtoupper($provinz));
    hinzufugen_url_sprache($ausfuhren);
    echo '<a href="'.($ausfuhren->erhalten()).'">';
    echo '<img src="bilder/excel.jpg" width="90" height="53" >';
    echo '</a>';
    echo '</div>';
}
function anhanger_ausgabe_kabupaten_pdf_schaltflache()
{
    $model = new wahle_allen_model_koperasi(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
    $model->ausfuhren();
    $model = $model->erhalten_daten();
    $provinz = new wahle_allen_provinz(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
    $provinz->ausfuhren();
    $provinz = $provinz->erhalten_daten();
    $allen = simplexml_load_file(xml_lader(zeichenfolge));
    echo '<div style="float:right;margin-right:5%;">';
    $ausfuhren = new url_kodierer();
    $ausfuhren->hinzufugen(bestellung);
    $ausfuhren->hinzufugen(bestellung_ausgabe_pdf);
    $ausfuhren->hinzufugen(sub_bestellung);
    $ausfuhren->hinzufugen(bestellung_ausgabe_pdf_kabupaten);
    $ausfuhren->hinzufugen(ausgabe_jahr);
    $ausfuhren->hinzufugen(filter_input(INPUT_GET, ausgabe_jahr));
    $ausfuhren->hinzufugen(ausgabe_monat);
    $ausfuhren->hinzufugen(filter_input(INPUT_GET, ausgabe_monat));
    $ausfuhren->hinzufugen(ausgabe_parameter_model);
    $ausfuhren->hinzufugen(filter_input(INPUT_GET, ausgabe_parameter_model));
    $ausfuhren->hinzufugen(ausgabe_parameter_provinz);
    $ausfuhren->hinzufugen(filter_input(INPUT_GET, ausgabe_parameter_provinz));
    $ausfuhren->hinzufugen(ausgabe_parameter_model_zeichenfolge);
    if(strcasecmp(filter_input(INPUT_GET, ausgabe_parameter_model), ausgabe_parameter_model_alle) === 0)
    {
        $model = strtoupper($allen->ausgabe_parameter_model_alle);
    }
    else
    {
        foreach($model as $daten) {
            if ((int)$daten[0] === (int)filter_input(INPUT_GET, ausgabe_parameter_model))
            {
                $model = $daten[1];
                break;
            }
        }
    }
    $ausfuhren->hinzufugen(strtoupper($model));
    $ausfuhren->hinzufugen(ausgabe_parameter_provinz_zeichenfolge);
    if(strcasecmp(filter_input(INPUT_GET, ausgabe_parameter_provinz), ausgabe_parameter_provinz_alle) === 0)
    {
        $provinz = $provinz[0][1];
    }
    else
    {
        foreach($provinz as $daten) {
            if ((int)$daten[0] === (int)filter_input(INPUT_GET, ausgabe_parameter_provinz))
            {
                $provinz = $daten[1];
                break;
            }
        }
    }
    $ausfuhren->hinzufugen(strtoupper($provinz));
    hinzufugen_url_sprache($ausfuhren);
    echo  '<a onclick="pdf_anzaigen(\''.$ausfuhren->erhalten().'\');">';
    echo '<img src="bilder/pdf.jpg" width="90" height="53" >';
    echo '</a>';
    echo '</div>';
}
function ausgabe_erhalten_monat_fur_title($index)
{
    if((int)  $index === 1)
    {
        return 'Januari';
    }
    else if((int)  $index === 2)
    {
        return 'Februari';
    }
    else if((int)  $index === 3)
    {
        return 'Maret';
    }
    else if((int)  $index === 4)
    {
        return 'April';
    }
    else if((int)  $index === 5)
    {
        return 'Mei';
    }
    else if((int)  $index === 6)
    {
        return 'Juni';
    }
    else if((int)  $index === 7)
    {
        return 'Juli';
    }
    else if((int)  $index === 8)
    {
        return 'Agustus';
    }
    else if((int)  $index === 9)
    {
        return 'September';
    }
    else if((int)  $index === 10)
    {
        return 'Oktober';
    }
    else if((int)  $index === 11)
    {
        return 'November';
    }
    else if((int)  $index === 12)
    {
        return 'Desember';
    }
}
function anhanger_ausgabe_kabupaten_erhalten_titel()
{
    $model = new wahle_allen_model_koperasi(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
    $model->ausfuhren();
    $model = $model->erhalten_daten();
    $allen = simplexml_load_file(xml_lader(zeichenfolge));
    if(strcasecmp(filter_input(INPUT_GET, ausgabe_parameter_model), ausgabe_parameter_model_alle) === 0)
    {
        echo htmlentities(strtoupper($allen->ausgabe_parameter_model_alle));
    }
    else
    {
        foreach($model as $temp)
        {
            if((int)$temp[0] === (int)filter_input(INPUT_GET, ausgabe_parameter_model))
            {
                echo strtoupper(htmlentities($temp[1]));
                break;
            }
        }
    }
}
function anhanger_ausgabe_kabupaten_erhalten_provinz_titel()
{
    $provinz = new wahle_allen_provinz(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
    $provinz->ausfuhren();
    $provinz = $provinz->erhalten_daten();
    foreach($provinz as $temp)
    {
        if((int)$temp[0] === (int)filter_input(INPUT_GET, ausgabe_parameter_provinz))
        {
            echo strtoupper(htmlentities($temp[1]));
            break;
        }
    }
}