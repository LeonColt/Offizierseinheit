<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 11/12/2015
 * Time: 20:53
 */
require_once standart_system_pfad.'server_skript/ausgabe/kabupaten/Base_ausgabe_kabupaten.php';
class wichtigsten_ausgabe_kabupaten extends Base_ausgabe_kabupaten
{
    protected function zeichnen_daten()
    {
        // TODO: Implement zeichnen_daten() method.
        $daten_zeichnen = $this->zuordnung_daten();
        $daten_insgesamt_von_kabupaten = $this->berechne_insgesamt_von_kabupaten($daten_zeichnen);
        $daten_insgesamt = $this->berechne_insgesamt($daten_insgesamt_von_kabupaten);
        $daten_insgesamt_von_bentuk = $this->berechne_insgesamt_von_bentuk($daten_zeichnen);
        $zeiger = 1;
        for($i = 0; $i<count($this->kabupaten); $i++)
        {

            echo '<tr>';
            echo '<td><p3>'.($zeiger++).'</p3></td>';
            echo '<td><p3>'.$this->kabupaten[$i][2].'</p3></td>';
            for($j = 0; $j<$this->insgesamt_spalte; $j++)
            {
                $this->karte_wert($daten_insgesamt_von_kabupaten[$this->kabupaten[$i][1]][$j]);
            }
            echo '</tr>';
            for($j = 0; $j<count($this->bentuk); $j++)
            {
                echo '<tr>';
                echo '<td><p3>  </p3></td>';
                echo '<td><p3>'.$this->bentuk[$j][1].'</p3></td>';
                for($k = 0; $k<$this->insgesamt_spalte; $k++)
                {
                    $this->karte_wert($daten_zeichnen[$this->kabupaten[$i][1]][$this->bentuk[$j][0]][$k]);
                }
                echo '</tr>';
            }
        }
        echo '<tr>';
        echo '<td><p3>'.($zeiger++).'</p3></td>';
        echo '<td><p3>Jumlah Total</p3></td>';
        for($k = 0; $k<$this->insgesamt_spalte; $k++)
        {
            $this->karte_wert($daten_insgesamt[$k]);
        }
        echo '</tr>';
        for($i = 0; $i<count($this->bentuk); $i++)
        {
            echo '<tr>';
            echo '<td><p3>  </p3></td>';
            echo '<td><p3>'.$this->bentuk[$i][1].'</p3></td>';
            for($k = 0; $k<$this->insgesamt_spalte; $k++)
            {
                $this->karte_wert($daten_insgesamt_von_bentuk[$this->bentuk[$i][0]][$k]);
            }
            echo '</tr>';
        }
    }

    public function ausfuhren()
    {
        // TODO: Implement ausfuhren() method.
        $this->vorbereiten_daten();
        $this->zeichnen_daten();
    }
}