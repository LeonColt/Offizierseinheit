<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of client_skript
 *
 * @author LC
 */
class client_skript {
    //put your code here
    public function erhalte_jquery($path = "")
    {
        echo '<script src="'.$path.'zusatzliche/client_skript/jquery-2.1.4.min.js"></script>';
    }
    public function erhalten_gemeinsame($path="")
    {
        echo '<script src="'.$path.'zusatzliche/client_skript/gemeinsame.js"></script>';
    }
    public function erhalten_eingabe($path="")
    {
        echo '<script src="'.$path.'zusatzliche/client_skript/eingabe/eingabe.js"></script>';
    }
}
