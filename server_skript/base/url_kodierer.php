<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 06/12/2015
 * Time: 13:44
 */
require_once 'universal_methode.php';
class url_kodierer
{
    private $wichtigsten_datei, $variable, $parameter, $zeiger;
    public function __construct($wichtigsten_datei = '')
    {
        $this->wichtigsten_datei = htmlentities($wichtigsten_datei);
        $this->variable = array();
        $this->parameter = array();
        $this->zeiger = 0;
    }
    public function erhalten()
    {
        $temp = $this->wichtigsten_datei;
        if(count($this->variable) > 0)
        {
            $temp .= "?";
            for($i = 0; $i<count($this->variable); $i++)
            {
                $temp .= $this->variable[$i];
                $temp .= "=";
                $temp .= $this->parameter[$i];
                if($i !== (count($this->variable) - 1))
                {
                    $temp .= "&";
                }
            }
        }
        return erhalten_base_uri().$temp;
    }
    public function hinzufugen($param)
    {
        if($this->zeiger % 2 === 0)
        {
            array_push($this->variable, htmlspecialchars($param, ENT_HTML5 | ENT_NOQUOTES));
        }
        else
        {
            array_push($this->parameter, htmlspecialchars($param, ENT_HTML5 | ENT_NOQUOTES));
        }
        $this->zeiger++;
    }
    public function hinzufugen_variable($variable)
    {
        array_push($this->variable, htmlspecialchars($variable, ENT_HTML5 | ENT_NOQUOTES));
        $this->zeiger++;
    }
    public function hinzufugen_parameter($parameter)
    {
        array_push($this->parameter, htmlspecialchars($parameter, ENT_HTML5 | ENT_NOQUOTES));
        $this->zeiger++;
    }
}