<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 05/12/2015
 * Time: 12:00
 */
require_once standart_system_pfad.'server_skript/ausgabe/nationalen/ausgabe_satgas_pro_nationalen.php';
require_once standart_system_pfad.'server_skript/ausgabe/nationalen/ausgabe_ksp_pro_nationalen.php';
require_once standart_system_pfad.'server_skript/ausgabe/Base_ausgabe.php';
require_once standart_system_pfad.'server_skript/wahle/wahle_allen_bentuk_koperasi.php';
require_once standart_system_pfad.'server_skript/wahle/wahle_allen_model_koperasi.php';
abstract class Base_ausgabe_nationalen extends Base_ausgabe
{
    protected $bentuk, $model, $satgas_daten, $kspo_daten, $insgesamt_spalte;
    public function __construct()
    {
        $this->insgesamt_spalte = 20;
    }

    protected abstract function zeichnen_daten();
    protected abstract function ausfuhren();
    protected final function vorbereiten_daten()
    {
        $bentuk = new wahle_allen_bentuk_koperasi(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
        $bentuk->ausfuhren();
        $this->bentuk = $bentuk->erhalten_daten();
        $model = new wahle_allen_model_koperasi(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
        $model->ausfuhren();
        $this->model = $model->erhalten_daten();
        $this->satgas_daten = new ausgabe_satgas_pro_nationalen();
        $this->satgas_daten->ausfuhren();
        $this->satgas_daten = $this->satgas_daten->erhalten_daten();
        $this->kspo_daten = null;
        //$this->kspo_daten = new ausgabe_ksp_pro_nationalen(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
        //$this->kspo_daten->ausfuhren();
        //$this->kspo_daten = $this->kspo_daten->erhalten_daten();
    }
    protected final function zuordnung_daten()
    {
        $daten_zeichnen = array();
        $insgesamt_spalte = 20;
        foreach ($this->bentuk as $temp_bentuk)
        {
            foreach ($this->model as $temp_model)
            {
                for($i = 0; $i<$insgesamt_spalte; $i++)
                {
                    $daten_zeichnen[$temp_bentuk[0]][$temp_model[0]][$i] = 0;
                }
            }
        }
        foreach ($this->bentuk as $temp_bentuk)
        {
            foreach ($this->model as $temp_model)
            {
                for($i = 0; $i<count($this->satgas_daten); $i++)
                {
                    if($this->satgas_daten[$i][0] === $temp_bentuk[0]
                        && $this->satgas_daten[$i][2] === $temp_model[0])
                    {
                        for($j = 0; $j<$insgesamt_spalte; $j++)
                        {
                            $daten_zeichnen[$temp_bentuk[0]][$temp_model[0]][$j] = $daten_zeichnen[$temp_bentuk[0]][$temp_model[0]][$j] + $this->satgas_daten[$i][$j+4];
                        }
                    }
                }
            }
        }
        return $daten_zeichnen;
    }
    protected final function zourdnung_daten_kspo()
    {
        $daten = array();
        foreach ($this->bentuk as $temp_bentuk)
        {
            foreach ($this->model as $temp_model)
            {
                for($i = 0; $i<$this->insgesamt_spalte; $i++)
                {
                    $daten[$temp_bentuk[0]][$temp_model[0]][$i] = 0;
                }
            }
        }
        foreach ($this->bentuk as $temp_bentuk)
        {
            foreach ($this->model as $temp_model)
            {
                for($i = 0; $i<count($this->satgas_daten); $i++)
                {
                    if($this->satgas_daten[$i][0] === $temp_bentuk[0]
                        && $this->satgas_daten[$i][2] === $temp_model[0])
                    {
                        for($j = 0; $j<$this->insgesamt_spalte; $j++)
                        {
                            $daten[$temp_bentuk[0]][$temp_model[0]][$j] = $daten[$temp_bentuk[0]][$temp_model[0]][$j] + $this->kspo_daten[$i][$j+4];
                        }
                    }
                }
            }
        }
        return $daten;
    }
    protected final function berechne_insgesamt_von_bentuk(&$daten)
    {
        $insgesamt = array();
        foreach ($this->bentuk as $bentuk)
        {
            $insgesamt[$bentuk[0]] = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
            foreach($this->model as $model)
            {
                for($i = 0; $i< count($daten[$bentuk[0]][$model[0]]); $i++)
                {
                    $insgesamt[$bentuk[0]][$i] += $daten[$bentuk[0]][$model[0]][$i];
                }
            }
        }
        return $insgesamt;
    }
    protected final function berechne_insgesamt_von_bentuk_primer_und_sekunder($insgesamt_von_bentuk)
    {
        $insgesamt = array();
        $zeiger_insgesamt = 0;
        $insgesamt_spalte = 20;
        $insgesamt[$zeiger_insgesamt] = array();
        $zeiger_daten = 0;
        for($i = 0; $i<$insgesamt_spalte; $i++)
        {
            array_push($insgesamt[$zeiger_insgesamt], 0);
        }
        foreach ($insgesamt_von_bentuk as $daten)
        {
            if($zeiger_daten < (count($insgesamt_von_bentuk)/2)+1)
            {
                for($j = 0; $j<$insgesamt_spalte; $j++)
                {
                    $insgesamt[$zeiger_insgesamt][$j] = $insgesamt[$zeiger_insgesamt][$j] + $daten[$j];
                }
                if($zeiger_daten === count($insgesamt_von_bentuk)/2)
                {
                    $zeiger_insgesamt++;
                    $insgesamt[$zeiger_insgesamt] = array();
                    for($k = 0; $k<$insgesamt_spalte; $k++)
                    {
                        array_push($insgesamt[$zeiger_insgesamt], 0);
                    }
                }
            }
            else
            {
                for($j = 0; $j<$insgesamt_spalte; $j++)
                {
                    $insgesamt[$zeiger_insgesamt][$j] = $insgesamt[$zeiger_insgesamt][$j] + $daten[$j];
                }
            }
            $zeiger_daten++;
        }
        return $insgesamt;
    }
    protected final function berechne_insgesamt_von_insgesamt_primer_insgesamt_sekunder()
    {
        $insgesamt = array();
        $insgesamt_spalte = 20;
        for($i = 0; $i<count($this->model); $i++)
        {
            $insgesamt[$this->model[$i][0]] = array();
            for($j = 0; $j<$insgesamt_spalte; $j++)
            {
                array_push($insgesamt[$this->model[$i][0]], 0);
            }
        }
        $zeiger_satgas_daten = 0;
        $zeiger = 0;
        foreach ($this->model as $model)
        {
            if($zeiger < count($this->satgas_daten))
            {
                for($j = 0; $j<$insgesamt_spalte; $j++)
                {
                    $insgesamt[$model[0]][$j] = $insgesamt[$model[0]][$j] + $this->satgas_daten[$zeiger_satgas_daten][$j+4];
                }
                $zeiger_satgas_daten++;
            }
            $zeiger++;
        }
        return $insgesamt;
    }
}