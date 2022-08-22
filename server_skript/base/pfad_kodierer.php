<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 08/12/2015
 * Time: 22:29
 */
class pfad_kodierer
{
    private $datei_typ, $pfad;
    public function __construct($datei_typ = NULL)
    {
        $this->datei_typ = $datei_typ;
        $this->pfad = array();
    }

    public function erhalten()
    {
        $temp = "";
        for($i = 0; $i<count($this->pfad); $i++)
        {
            $temp .= $this->pfad[$i];
            if($i < (count($this->pfad) - 1))
            {
                $temp .= '/';
            }
        }
        if($this->datei_typ !== NULL)
        {
            $temp .= '.';
            $temp .= $this->datei_typ;
        }
        return $temp;
    }
    public function hinzufugen($pfad)
    {
        array_push($this->pfad, $pfad);
    }
}