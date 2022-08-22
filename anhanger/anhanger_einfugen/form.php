<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of arbeiter_form_zeile_eine
 *
 * @author LC
 */
class form {
    //put your code here
    private $platz_matrix;
    private $zeiger;
    public final function __construct() {
        $this->platz_matrix = array();
        $this->zeiger = 0;
    }
    public final function hinzufugen_zeile()
    {
        $this->platz_matrix[$this->zeiger] = array();
        $this->zeiger++;
    }
    public final function hizufuten_spalte($wert)
    {
        if(is_array($wert))
        {
            if(array_key_exists($this->zeiger, $this->platz_matrix))
            {
                array_push($this->platz_matrix[$this->zeiger], $wert);
                $this->zeiger++;
            }
            else
            {
                throw new Exception("row tidak ada");
            }
        }
        else
        {
            throw new Exception("value harus array, yg berisi title dan isi");
        }
    }
    public final function karte()
    {
        for($i = 0; $i<count($this->platz_matrix); $i++)
        {
            echo '<div class="subkontainer_inside">';
            for($j = 0; $j<count($this->platz_matrix[$i]); $j++)
            {
                echo '<div class="clabel_inside">'.$this->platz_matrix[$i][$j][0].'</div>';
                echo '<div class="cinput_inside">'.$this->platz_matrix[$i][$j][1].'</div>';
            }
            echo '</div>';
        }
    }
    public final function satz_zeiger($zeiger)
    {
        $this->zeiger = $zeiger;
    }
}
