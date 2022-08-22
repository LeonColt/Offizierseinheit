<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 08/12/2015
 * Time: 21:57
 */
require_once standart_system_pfad.'server_skript/ausgabe/Base_ausgabe.php';
require_once standart_system_pfad.'server_skript/wahle/wahle_allen_kabupaten_kota.php';
require_once standart_system_pfad.'server_skript/wahle/wahle_allen_bentuk_koperasi.php';
require_once standart_system_pfad.'server_skript/ausgabe/kabupaten/ausgabe_satgas_pro_kabupaten_mit_model.php';
require_once standart_system_pfad.'server_skript/ausgabe/kabupaten/ausgabe_satgas_pro_kabupaten_mit_nicth_model.php';
abstract class Base_ausgabe_kabupaten extends Base_ausgabe
{
    protected $kabupaten, $bentuk, $satgas_daten, $kspo_daten, $insgesamt_spalte;
    public function __construct()
    {
        $this->insgesamt_spalte = 22;
    }

    protected function vorbereiten_daten()
    {
        // TODO: Implement vorbereiten_daten() method.
        $this->kabupaten = new wahle_allen_kabupaten_kota(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
        $this->kabupaten->satz_id_provinz(htmlentities(filter_input(INPUT_GET, ausgabe_parameter_provinz)));
        $this->kabupaten->ausfuhren();
        $this->kabupaten = $this->kabupaten->erhalten_daten();
        $this->bentuk = new wahle_allen_bentuk_koperasi(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
        $this->bentuk->ausfuhren();
        $this->bentuk = $this->bentuk->erhalten_daten();
        if(strcasecmp(filter_input(INPUT_GET, ausgabe_parameter_model), ausgabe_parameter_model_alle) === 0)
        {
            $this->satgas_daten = new ausgabe_satgas_pro_kabupaten_mit_nicth_model();
            $this->satgas_daten->ausfuhren();
            $this->satgas_daten = $this->satgas_daten->erhalten_daten();
        }
        else
        {
            $this->satgas_daten = new ausgabe_satgas_pro_kabupaten_mit_model();
            $this->satgas_daten->ausfuhren();
            $this->satgas_daten = $this->satgas_daten->erhalten_daten();
        }
    }

    protected function zuordnung_daten()
    {
        // TODO: Implement zuordnung_daten() method.
        $daten_zeichnen = array();
        foreach ($this->kabupaten as $kabupaten)
        {
            foreach ($this->bentuk as $bentuk)
            {
                for($i = 0; $i<$this->insgesamt_spalte; $i++)
                {
                    $daten_zeichnen[$kabupaten[1]][$bentuk[0]][$i] = 0;
                }
            }
        }
        foreach ($this->kabupaten as $kabupaten)
        {
            foreach ($this->bentuk as $bentuk)
            {
                for($i = 0; $i<count($this->satgas_daten); $i++)
                {
                    if($this->satgas_daten[$i][0] === $kabupaten[1]
                        && $this->satgas_daten[$i][2] === $bentuk[0])
                    {
                        for($j = 0; $j<$this->insgesamt_spalte; $j++)
                        {
                            $daten_zeichnen[$kabupaten[1]][$bentuk[0]][$j] = $daten_zeichnen[$kabupaten[1]][$bentuk[0]][$j] + $this->satgas_daten[$i][$j+4];
                        }
                    }
                }
            }
        }
        return $daten_zeichnen;
    }
    protected function berechne_insgesamt_von_kabupaten(&$daten)
    {
        $daten_zeichnen = array();
        foreach ($this->kabupaten as $kabupaten)
        {
            $daten_zeichnen[$kabupaten[1]] = array();
            for($i = 0; $i<$this->insgesamt_spalte; $i++)
            {
                array_push($daten_zeichnen[$kabupaten[1]], 0);
            }
        }
        foreach ($this->kabupaten as $kabupaten)
        {
            foreach($this->bentuk as $bentuk)
            {
                for($i = 0; $i<$this->insgesamt_spalte; $i++)
                {
                    $daten_zeichnen[$kabupaten[1]][$i] = $daten_zeichnen[$kabupaten[1]][$i] + $daten[$kabupaten[1]][$bentuk[0]][$i];
                }
            }
        }
        return $daten_zeichnen;
    }
    protected function berechne_insgesamt(&$daten)
    {
        $daten_zeichnen = array();
        for($i = 0; $i<$this->insgesamt_spalte; $i++)
        {
            $daten_zeichnen[$i] = 0;
        }
        foreach ($this->kabupaten as $kabupaten)
        {
            for($i = 0; $i<$this->insgesamt_spalte; $i++)
            {
                $daten_zeichnen[$i] = $daten_zeichnen[$i] + $daten[$kabupaten[1]][$i];
            }
        }
        return $daten_zeichnen;
    }
    protected function berechne_insgesamt_von_bentuk(&$daten)
    {
        $daten_zeichnen = array();
        foreach ($this->bentuk as $bentuk) {
            $daten_zeichnen[$bentuk[0]] = array();
            for ($i = 0; $i < $this->insgesamt_spalte; $i++) {
                array_push($daten_zeichnen[$bentuk[0]], 0);
            }
        }
        foreach ($this->kabupaten as $kabupaten)
        {
            foreach($this->bentuk as $bentuk)
            {
                for($i = 0; $i<$this->insgesamt_spalte; $i++)
                {
                    $daten_zeichnen[$bentuk[0]][$i] = $daten_zeichnen[$bentuk[0]][$i] + $daten[$kabupaten[1]][$bentuk[0]][$i];
                }
            }
        }
        return $daten_zeichnen;
    }
    protected abstract function zeichnen_daten();
    public abstract function ausfuhren();
}