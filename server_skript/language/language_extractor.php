<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of language_extractor
 *
 * @author LC
 */
class language_extractor {
    function __construct() {
        if(!class_exists('list_language'))
        {
            include 'list_language.php';
        }
    }
    //put your code here
    function get_strings($path = "", $language = "id")
    {
        $list = new list_language();
        if($list->language_exists($path, $language))
        {
            $language = simplexml_load_file($path.$language.".xml");
            $bahasa = array();
            foreach ($language->string->children() as $temp)
            {
                $bahasa[$temp->getName()] = $temp;
            }
            return $bahasa;
        }
        else
        {
            echo "<script type=\"text/javascript\">alert('error, the language does not exist, please contact admin to add the language.');window.location.href = id;</script>"; exit();      //throw new Exception('error, the language does not exist, please contact admin to add the language.');
        }
        return NULL;
    }
    function get_paths($path = "", $language = "")
    {
        $list = new list_language();
        if($list->language_exists($path, $language))
        {
            $language = simplexml_load_file($path.$language.".xml");
            $bahasa = array();
            foreach ($language->path->children() as $temp)
            {
                $bahasa[$temp->getName()] = $temp;
            }
            return $bahasa;
        }
        else
        {
            throw new Exception('error, the language does not exist, please contact admin to add the language.');
        }
        return NULL;
    }
}
