<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 29/11/2015
 * Time: 17:39
 */
require_once standart_system_pfad.'server_skript/daten_bank_json/Bergmann_json.php';
abstract class base_diagramme_1_und_4 extends Bergmann_json
{
    protected $diagramme_typ;
    public final function erhalten_daten()
    {
        // TODO: Implement erhalten_daten() method.
        $this->satz_diagramme_typ();
        $container = array();
        foreach ($this->ergebnis as $daten)
        {
            $temp = array();
            $temp[json_id_model] = $daten[0];
            $temp[json_model] = $daten[1];
            $temp[json_nama_pendek_model] = $daten[2];
            $temp[json_insgesamt_koperasi_satgas] = $daten[3];
            $temp[json_insgesamt_koperasi_data_individual] = $daten[4];
            array_push($container, $temp);
        }
        $this->json->hinzufugen($this->diagramme_typ.diagramme_json_key_result, $container);
    }

    protected function daten_uberprufen()
    {
        // TODO: Implement daten_uberprufen() method.
        if(!$this->ist_null(filter_input(INPUT_GET, diagramme_jahr),
            filter_input(INPUT_GET, diagramme_monat),
            filter_input(INPUT_GET, diagramme_parameter_propinsi),
            filter_input(INPUT_GET, diagramme_parameter_kabupaten)))
        {
            return true;
        }
        return false;
    }
    protected function ist_token_korrigieren()
    {
        return true;
    }

    abstract protected function satz_diagramme_typ();
}