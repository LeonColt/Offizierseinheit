<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 14/12/2015
 * Time: 19:28
 */
require_once standart_system_pfad.'server_skript/ausgabe/provinz/Base_ausgabe_provinz.php';
class pdf_daten_bergmann_provinz extends Base_ausgabe_provinz
{
    private $daten;
    protected function zeichnen_daten()
    {
        // TODO: Implement zeichnen_daten() method.
        $this->daten = array();
        $daten_zeichnen = $this->zuordnung_daten();
        $daten_insgesamt_von_provinz = $this->berechne_insgesamt_von_provinz($daten_zeichnen);
        for($i = 0; $i<count($this->provinz); $i++)
        {
            $temp = array();
            array_push($temp, ($i+1));
            array_push($temp, $this->provinz[$i][1]);
            for($j = 0; $j<$this->insgesamt_spalte; $j++)
            {
                array_push($temp, $this->erhalten_wert($daten_insgesamt_von_provinz[$this->provinz[$i][0]][$j]));
            }
            array_push($this->daten, $temp);
            for($j = 0; $j<count($this->bentuk); $j++)
            {
                $temp = array();
                array_push($temp, ' ');
                array_push($temp, $this->bentuk[$j][1]);
                for($k = 0; $k<$this->insgesamt_spalte; $k++)
                {
                    array_push($temp, $this->erhalten_wert($daten_zeichnen[$this->provinz[$i][0]][$this->bentuk[$j][0]][$k]));
                }
                array_push($this->daten, $temp);
            }
        }
    }

    public function ausfuhren()
    {
        // TODO: Implement ausfuhren() method.
        $this->vorbereiten_daten();
        $this->zeichnen_daten();
        return $this->daten;
    }
    public function ausgabe_erhalten_monat_fur_title($index)
    {
        return parent::ausgabe_erhalten_monat_fur_title($index); // TODO: Change the autogenerated stub
    }
}