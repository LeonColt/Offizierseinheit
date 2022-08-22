<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 05/12/2015
 * Time: 17:32
 */
require_once 'Base_ausgabe_provinz.php';
class wichtigsten_ausgabe_provinsi extends Base_ausgabe_provinz
{

    protected function zeichnen_daten()
    {
        // TODO: Implement zeichnen_daten() method.
        $daten_zeichnen = $this->zuordnung_daten();
        $daten_insgesamt_von_provinz = $this->berechne_insgesamt_von_provinz($daten_zeichnen);

        for($i = 0; $i<count($this->provinz); $i++)
        {

            echo '<tr>';
            echo '<td><p3>'.($i+1).'</p3></td>';
            echo '<td><p3>'.$this->provinz[$i][1].'</p3></td>';
            for($j = 0; $j<$this->insgesamt_spalte; $j++)
            {
                $this->karte_wert($daten_insgesamt_von_provinz[$this->provinz[$i][0]][$j]);
            }
            echo '</tr>';
            for($j = 0; $j<count($this->bentuk); $j++)
            {
                echo '<tr>';
                echo '<td><p3>  </p3></td>';
                echo '<td><p3>'.$this->bentuk[$j][1].'</p3></td>';
                for($k = 0; $k<$this->insgesamt_spalte; $k++)
                {
                    $this->karte_wert($daten_zeichnen[$this->provinz[$i][0]][$this->bentuk[$j][0]][$k]);
                }
                echo '</tr>';
            }
        }
    }

    public function ausfuhren()
    {
        // TODO: Implement ausfuhren() method.
        $this->vorbereiten_daten();
        $this->zeichnen_daten();
    }
}