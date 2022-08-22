<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 17/12/2015
 * Time: 19:37
 */
require_once standart_system_pfad.'server_skript/ausgabe/kabupaten/Base_pdf_schichten_kabupaten.php';
class pdf_schichten_kabupaten
{
    public final function ausfuhren()
    {
        $pdf = new Base_pdf_schichten_kabupaten(filter_input(INPUT_GET, ausgabe_jahr), filter_input(INPUT_GET, ausgabe_monat), 'L','mm','A4');
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->table();
        $pdf->Output();
    }
}