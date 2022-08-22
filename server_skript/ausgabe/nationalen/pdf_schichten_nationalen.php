<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 05/12/2015
 * Time: 19:14
 */
require_once 'Base_pdf_schichten_nationalen.php';
class pdf_schichten_nationalen
{
    public final function ausfuhren()
    {
        $pdf = new Base_pdf_schichten_nationalen(htmlentities(filter_input(INPUT_GET, ausgabe_jahr)), htmlentities(filter_input(INPUT_GET, ausgabe_monat)), 'L','mm','A4');
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->table();
        $pdf->Output();
    }
}