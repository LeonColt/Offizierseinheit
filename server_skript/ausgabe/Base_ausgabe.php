<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 08/12/2015
 * Time: 23:20
 */
abstract class Base_ausgabe
{
    abstract protected function vorbereiten_daten();
    abstract protected function zuordnung_daten();
    protected function karte_wert($wert)
    {
        //if((int)$wert > 1000) $wert = $this->dot_adder($wert);
        //echo '<td '.(((int)$wert === 0) ? 'align="center"' : '').'><p3>'.(((int)$wert === 0) ? '-' : $wert).'</p3></td>';
        echo '<td '.(((int)$wert === 0) ? 'align="center"' : '').'><p3>';
        if((int)$wert === 0) echo '-';
        else if((int)$wert > 999) echo $this->dot_adder($wert);
        else echo $wert;
        echo '</p3></td>';
    }
    protected function erhalten_wert($wert)
    {
        if((int)$wert === 0) return '-';
        else if((int)$wert > 999) return $this->dot_adder($wert);
        else return $wert;
    }
    protected function dot_adder($wert)
    {
        $temp = "";
        $counter = 0;
        for($i = strlen($wert)-1; $i > -1; $i--)
        {
            $temp .= substr($wert, $i, 1);
            $counter++;
            if($counter === 3)
            {
                $counter = 0;
                $temp .= ".";
            }
        }
        $wert = "";
        for($i = strlen($temp)-1; $i > -1; $i--)
        {
            $wert .= substr($temp, $i, 1);
        }
        return $wert;
    }
    protected function ausgabe_erhalten_monat_fur_title($index)
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
        else return '';
    }
}