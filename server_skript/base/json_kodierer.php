<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of json_encoder
 *
 * @author LC
 */
class json_kodierer {
    //put your code here
    private $json;
    public function __construct() {
        $this->json = array();
    }
    public function Stoß($value)
    {
        array_push($this->json, $value);
    }
    public function hinzufugen($key, $value)
    {
        if(is_array($key))
        {
            $temp_array = &$this->json;
            $last_key = "";
            foreach ($key as $temp)
            {
                if(array_key_exists($temp, $temp_array))
                {
                    $temp_array = &$temp_array[$temp];
                }
                else
                {
                    $temp_array[$temp] = array();
                    $temp_array = &$temp_array[$temp];
                }
                $last_key = $temp;
            }
            if(!array_key_exists($last_key, $temp_array))
            {
                $temp_array = $value;
            }
            else
            {
                throw new Exception("key is already defined; m");
            }
        }
        else
        {
            if(!array_key_exists($key, $this->json))
            {
                $this->json[$key] = $value;
            }
            else
            {
                throw new Exception("key is already defined; 1");
            }
        }
    }
    public function hinzufugen_von_xml_knoten($key, $xml, $key_xml)
    {
        $nodes = $xml->getElementsByTagName($key_xml);
        if($nodes->length === 1)
        {
            $temp = "";
            foreach ($nodes as $node)
            {
                $temp = $node->nodeValue;
            }
            $this->add($key, $temp);
        }
        else if($nodes->length > 1)
        {
            $temp = array();
            foreach ($nodes as $node)
            {
                array_push($temp, $node->nodeValue);
            }
            $this->add($key, $temp);
        }
        else
        {
            throw new Exception("node is empty");
        }
    }
    public function loschen($key)
    {
        if(!array_key_exists($key, $this->json))
        {
            array_splice($this->json, $key, 1);
        }
        else
        {
            throw new Exception("json index is out of bounds");
        }
    }

    public function karte()
    {
        echo json_encode($this->json);
    }
}
