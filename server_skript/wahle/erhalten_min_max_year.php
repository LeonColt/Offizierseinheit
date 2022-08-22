<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of erhalten_min_max_year
 *
 * @author LC
 */
require_once standart_system_pfad.'server_skript/base/globale_variable.php';
require_once standart_system_pfad.'server_skript/base/Bergmann.php';
require_once standart_system_pfad.'server_skript/base/universal_methode.php';
class erhalten_min_max_year extends Bergmann {
    protected function daten_leere() {
        return true;
    }

    protected function daten_uberprufen() {
        return true;
    }

    protected function vorbereiten_abfrage_und_parameter() {
        $this->abfrage = 'SELECT 
CASE WHEN MIN(tanggal) < (SELECT MIN('.kspo_daten_bank_name.'.tblkoperasi.CreatedDate) FROM '.kspo_daten_bank_name.'.tblkoperasi) THEN 
MIN(tanggal)
ELSE (SELECT MIN('.kspo_daten_bank_name.'.tblkoperasi.CreatedDate) FROM '.kspo_daten_bank_name.'.tblkoperasi)
      END as min_year, 
CASE WHEN MAX(tanggal) > (SELECT MAX('.kspo_daten_bank_name.'.tblkoperasi.CreatedDate) FROM '.kspo_daten_bank_name.'.tblkoperasi) THEN
MAX(tanggal) 
ELSE (SELECT MAX('.kspo_daten_bank_name.'.tblkoperasi.CreatedDate) FROM '.kspo_daten_bank_name.'.tblkoperasi) 
END
as max_year 
FROM rekap;';
    }

    public function erhalten_daten() {
        //$min = explode("-", $this->ergebnis[0]["min_year"])[0];
        //$max = explode("-", $this->ergebnis[0]["max_year"])[0];
        //for($i = $min; $i<$max+1; $i++)
        //{
            //echo '<option value="'.$i.'">'.$i."</option>";
        //}
        return $this->ergebnis;
    }
    
    protected function ist_token_korrigieren() {
        return true;
    }

//put your code here
}
