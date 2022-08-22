<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 14/12/2015
 * Time: 20:00
 */
require_once standart_system_pfad.'server_skript/ausgabe/provinz/Base_pdf_schichten_provinz.php';
class pdf_schichten_provinz
{
    public final function ausfuhren()
    {
        $pdf = new Base_pdf_schichten_provinz(filter_input(INPUT_GET, ausgabe_jahr), filter_input(INPUT_GET, ausgabe_monat), 'L','mm','A4');
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->table();
        $pdf->Output();
    }
}