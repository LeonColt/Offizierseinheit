<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of erhalten_min_max_year_fur_menu
 *
 * @author christian
 */
require_once standart_system_pfad.'server_skript/wahle/erhalten_min_max_year.php';
class erhalten_max_jahr_monat_fur_menu extends erhalten_min_max_year {
    //put your code here
    public function erhalten_daten() {
        return null;
    }
    public function erhalten_jahr()
    {
        return explode("-", $this->ergebnis[0]["max_year"])[0];
    }
    public function erhalten_monat()
    {
        return explode("-", $this->ergebnis[0]["max_year"])[1];
    }
}
