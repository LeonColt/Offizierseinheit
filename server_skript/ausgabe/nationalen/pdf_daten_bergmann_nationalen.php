<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 05/12/2015
 * Time: 19:25
 */
require_once 'Base_ausgabe_nationalen.php';
class pdf_daten_bergmann_nationalen extends Base_ausgabe_nationalen
{
    private $daten;
    protected function zeichnen_daten()
    {
        $this->daten = array();
        // TODO: Implement zeichnen_daten() method.
        $daten_zeichnen = $this->zuordnung_daten();
        $daten_zeichnen_ksp = $this->zourdnung_daten_kspo();
        $daten_insgesamt_von_bentuk_zeichnen = $this->berechne_insgesamt_von_bentuk($daten_zeichnen);
        $daten_insgesamt_von_bentuk_primer_und_sekunder = $this->berechne_insgesamt_von_bentuk_primer_und_sekunder($daten_insgesamt_von_bentuk_zeichnen);
        $daten_insgesamt_von_insgesamt_primer_insgesamt_sekunder = $this->berechne_insgesamt_von_insgesamt_primer_insgesamt_sekunder();
        $zahler_bentuk = 0;

        for($i = 0; $i<count($this->bentuk); $i++)
        {
            $row = array();
            array_push($row, ($zahler_bentuk+1));
            array_push($row, $this->bentuk[$i][1]);
            for($j = 0; $j<$this->insgesamt_spalte; $j++)
            {
                array_push($row, $this->erhalten_wert($daten_insgesamt_von_bentuk_zeichnen[$this->bentuk[$i][0]][$j]));
            }
            array_push($this->daten, $row);
            for($j = 0; $j<count($this->model); $j++)
            {
                $row = array();
                array_push($row, ' ');
                array_push($row, $this->model[$j][2]);
                for($k = 0; $k<$this->insgesamt_spalte; $k++)
                {
                    array_push($row, $this->erhalten_wert($daten_zeichnen[$this->bentuk[$i][0]][$this->model[$j][0]][$k]));
                }
                array_push($this->daten, $row);

                /*
                $row = array();
                array_push($row, ' ');
                array_push($row, ('Data Individu '.$this->model[$j][2]));
                for($k = 0; $k<$this->insgesamt_spalte; $k++)
                {
                    array_push($row, $daten_zeichnen_ksp[$this->bentuk[$i][0]][$this->model[$j][0]][$k]);
                }
                array_push($this->daten, $row);
                */
            }
            $zahler_bentuk++;
            if($i == (count($this->bentuk)/3) )
            {
                $row = array();
                array_push($row, ' ');
                array_push($row, 'Jumlah Primer');
                for($j = 0; $j < $this->insgesamt_spalte; $j++)
                {
                    array_push($row, $this->erhalten_wert($daten_insgesamt_von_bentuk_primer_und_sekunder[0][$j]));
                }
                array_push($this->daten, $row);
                $zahler_bentuk = 0;
                continue;
            }
            else if($i === count($this->bentuk)-1)
            {
                $row = array();
                array_push($row, ' ');
                array_push($row, 'Jumlah Sekunder');
                for($j = 0; $j < $this->insgesamt_spalte; $j++)
                {
                    array_push($row, $this->erhalten_wert($daten_insgesamt_von_bentuk_primer_und_sekunder[1][$j]));
                }
                array_push($this->daten, $row);
                $zahler_bentuk = 0;
                continue;
            }
        }
        $row = array();
        array_push($row, ' ');
        array_push($row, 'Jumlah Primer + Sekunder');
        for($j = 0; $j < $this->insgesamt_spalte; $j++)
        {
            array_push($row, $this->erhalten_wert(($daten_insgesamt_von_bentuk_primer_und_sekunder[0][$j] + $daten_insgesamt_von_bentuk_primer_und_sekunder[1][$j])));
        }
        array_push($this->daten, $row);
        $zeiger = 0;
        foreach ($this->model as $model)
        {
            $row = array();
            array_push($row, $zeiger++);
            array_push($row, $model[2]);
            for($j = 0; $j<$this->insgesamt_spalte; $j++)
            {
                array_push($row, $this->erhalten_wert($daten_insgesamt_von_insgesamt_primer_insgesamt_sekunder[$model[0]][$j]));
            }
            array_push($this->daten, $row);
        }
    }

    public final function ausfuhren()
    {
        // TODO: Implement ausfuhren() method.
        $this->vorbereiten_daten();
        $this->zeichnen_daten();
        return $this->daten;
    }
    public function ausgabe_erhalten_monat_fur_title($index)
    {
        return parent::ausgabe_erhalten_monat_fur_title($index);
    }
}