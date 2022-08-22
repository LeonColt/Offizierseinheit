<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 05/12/2015
 * Time: 17:32
 */
require_once standart_system_pfad.'server_skript/wahle/wahle_allen_provinz.php';
require_once standart_system_pfad.'server_skript/wahle/wahle_allen_bentuk_koperasi.php';
require_once standart_system_pfad.'server_skript/ausgabe/Base_ausgabe.php';
require_once standart_system_pfad.'server_skript/ausgabe/provinz/ausgabe_satgas_pro_provinz_mit_model.php';
require_once standart_system_pfad.'server_skript/ausgabe/provinz/ausgabe_satgas_pro_provinz_mit_nicht_model.php';
abstract class Base_ausgabe_provinz extends Base_ausgabe
{
    protected $provinz, $bentuk, $satgas_daten, $kspo_daten, $insgesamt_spalte;
    public function __construct()
    {
        $this->insgesamt_spalte = 22;
    }

    protected abstract function zeichnen_daten();
    public abstract function ausfuhren();
    protected final function vorbereiten_daten()
    {
        $this->provinz = new wahle_allen_provinz(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
        $this->provinz->ausfuhren();
        $this->provinz = $this->provinz->erhalten_daten();
        $this->bentuk = new wahle_allen_bentuk_koperasi(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
        $this->bentuk->ausfuhren();
        $this->bentuk = $this->bentuk->erhalten_daten();
        if(strcasecmp(htmlentities(filter_input(INPUT_GET, ausgabe_parameter_model)), ausgabe_parameter_model_alle) === 0)
        {
            $this->satgas_daten = new ausgabe_satgas_pro_provinz_mit_nicht_model();
            $this->satgas_daten->ausfuhren();
            $this->satgas_daten = $this->satgas_daten->erhalten_daten();
        }
        else
        {
            $this->satgas_daten = new ausgabe_satgas_pro_provinz_mit_model();
            $this->satgas_daten->ausfuhren();
            $this->satgas_daten = $this->satgas_daten->erhalten_daten();
        }
    }
    protected final function zuordnung_daten()
    {
        $daten_zeichnen = array();
        foreach ($this->provinz as $provinz)
        {
            foreach ($this->bentuk as $bentuk)
            {
                for($i = 0; $i<$this->insgesamt_spalte; $i++)
                {
                    $daten_zeichnen[$provinz[0]][$bentuk[0]][$i] = 0;
                }
            }
        }
        foreach ($this->provinz as $provinz)
        {
            foreach ($this->bentuk as $bentuk)
            {
                for($i = 0; $i<count($this->satgas_daten); $i++)
                {
                    if($this->satgas_daten[$i][0] === $provinz[0]
                        && $this->satgas_daten[$i][2] === $bentuk[0])
                    {
                        for($j = 0; $j<$this->insgesamt_spalte; $j++)
                        {
                            $daten_zeichnen[$provinz[0]][$bentuk[0]][$j] = $daten_zeichnen[$provinz[0]][$bentuk[0]][$j] + $this->satgas_daten[$i][$j+4];
                        }
                    }
                }
            }
        }
        return $daten_zeichnen;
    }
    protected final function berechne_insgesamt_von_provinz(&$daten)
    {
        $insgesamt = array();
        foreach ($this->provinz as $provinz)
        {
            $insgesamt[$provinz[0]] = array();
            for($i = 0; $i < $this->insgesamt_spalte; $i++)
            {
                array_push($insgesamt[$provinz[0]], 0);
            }
            foreach($this->bentuk as $bentuk)
            {
                for($j = 0; $j< count($daten[$provinz[0]][$bentuk[0]]); $j++)
                {
                    $insgesamt[$provinz[0]][$j] += $daten[$provinz[0]][$bentuk[0]][$j];
                }
            }
        }
        return $insgesamt;
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
    }
}