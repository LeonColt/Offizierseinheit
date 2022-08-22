<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 08/12/2015
 * Time: 16:39
 */
interface Interface_excel_schichten
{
    public function satz_header();
    public function zeichnen_grenze();
    public function satz_auto_spalte_breite();
}