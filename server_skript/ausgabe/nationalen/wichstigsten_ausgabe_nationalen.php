<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of wichstigsten
 *
 * @author LC
 */
require_once standart_system_pfad.'server_skript/base/globale_variable.php';
require_once standart_system_pfad.'server_skript/ausgabe/wahle_allen_bentuk_koperasi_fur_ausgabe.php';
require_once standart_system_pfad.'server_skript/ausgabe/wahle_allen_model_koperasi_fur_ausgabe.php';
require_once standart_system_pfad.'server_skript/ausgabe/nationalen/ausgabe_satgas_pro_nationalen.php';
require_once standart_system_pfad.'server_skript/ausgabe/nationalen/Base_ausgabe_nationalen.php';
class wichstigsten_ausgabe_nasional extends Base_ausgabe_nationalen {
    //put your code here
    public function ausfuhren()
    {
        $this->vorbereiten_daten();
        $this->zeichnen_daten();
    }
    
    protected final function zeichnen_daten()
    {
        $daten_zeichnen = $this->zuordnung_daten();
        //$daten_zichen_kspo = $this->zourdnung_daten_kspo();
        $daten_insgesamt_von_bentuk_zeichnen = $this->berechne_insgesamt_von_bentuk($daten_zeichnen);
        $daten_insgesamt_von_bentuk_primer_und_sekunder = $this->berechne_insgesamt_von_bentuk_primer_und_sekunder($daten_insgesamt_von_bentuk_zeichnen);
        $daten_insgesamt_von_insgesamt_primer_insgesamt_sekunder = $this->berechne_insgesamt_von_insgesamt_primer_insgesamt_sekunder();
        $zahler_bentuk = 0;
        $insgesamt_spalte = 20;
        
        for($i = 0; $i<count($this->bentuk); $i++)
        {
         
            echo '<tr>';
            echo '<td><p3>'.($zahler_bentuk+1).'</p3></td>';
            echo '<td><p3>'.$this->bentuk[$i][1].'</p3></td>';
            for($j = 0; $j<$insgesamt_spalte; $j++)
            {
                $this->karte_wert($daten_insgesamt_von_bentuk_zeichnen[$this->bentuk[$i][0]][$j]);
            }
            echo '</tr>';
            for($j = 0; $j<count($this->model); $j++)
            {
                echo '<tr>';
                echo '<td><p3>  </p3></td>';
                echo '<td><p3>'.$this->model[$j][2].'</p3></td>';
                for($k = 0; $k<$insgesamt_spalte; $k++)
                {
                    $this->karte_wert($daten_zeichnen[$this->bentuk[$i][0]][$this->model[$j][0]][$k]);
                }
                echo '</tr>';

                /*
                echo '<tr>';
                echo '<td><p3>  </p3></td>';
                echo '<td><p3>Data Individu '.$this->model[$j][2].'</p3></td>';
                for($k = 0; $k<$insgesamt_spalte; $k++)
                {
                    echo '<td><p3>'.$daten_zichen_kspo[$this->bentuk[$i][0]][$this->model[$j][0]][$k].'</p3></td>';
                }
                echo '</tr>';
                */
            }
            $zahler_bentuk++;
            if($i == (count($this->bentuk)/3) )
            {
                echo '<tr>';
                echo '<td><p3>  </p3></td>';
                echo '<td><p3>Jumlah Primer</p3></td>';
                for($j = 0; $j < $insgesamt_spalte; $j++)
                {
                    $this->karte_wert($daten_insgesamt_von_bentuk_primer_und_sekunder[0][$j]);
                }
                echo '</tr>';
                $zahler_bentuk = 0;
                continue;
            }
            else if($i === count($this->bentuk)-1)
            {
                echo '<tr>';
                echo '<td><p3>  </p3></td>';
                echo '<td><p3>Jumlah Sekunder</p3></td>';
                for($j = 0; $j < $insgesamt_spalte; $j++)
                {
                    $this->karte_wert($daten_insgesamt_von_bentuk_primer_und_sekunder[1][$j]);
                }
                echo '</tr>';
                $zahler_bentuk = 0;
                continue;
            }
        }
        echo '<tr>';
        echo '<td><p3>   </p3></td>';
        echo '<td><p3>Jumlah Primer + Sekunder</p3></td>';
        for($j = 0; $j < $insgesamt_spalte; $j++)
        {
            $this->karte_wert(($daten_insgesamt_von_bentuk_primer_und_sekunder[0][$j] + $daten_insgesamt_von_bentuk_primer_und_sekunder[1][$j]));
        }
        echo '</tr>';
        $zeiger = 0;
        foreach ($this->model as $model)
        {
            echo '<tr>';
            echo '<td><p3>'.(($zeiger++)+1).'</p3></td>';
            echo '<td><p3>'.$model[2].'</p3></td>';
            for($j = 0; $j<$insgesamt_spalte; $j++)
            {
                $this->karte_wert($daten_insgesamt_von_insgesamt_primer_insgesamt_sekunder[$model[0]][$j]);
            }
            echo '</tr>';


            /*
            echo '<tr>';
            echo '<td><p3>  </p3></td>';
            echo '<td><p3>Data Individu '.$model[2].'</p3></td>';
            for($j = 0; $j<$insgesamt_spalte; $j++)
            {
                echo '<td><p3>0</p3></td>';
            }
            echo '</tr>';
            */
        }
    }
}
