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
class sprache_extraktor {
    function __construct() {
        if(!class_exists('sprache_liste'))
        {
            include 'sprache_liste.php';
        }
    }
    //put your code here
    function erhalten_zeichenfolge($path = "", $language = "id")
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
            echo "<script type=\"text/javascript\">alert('error, the language "
            . "does not exist, please contact admin to add the language"
                    . "default language will be used.');"
                    . "</script>";
            $language = simplexml_load_file($path."id.xml");
            $bahasa = array();
            foreach ($language->string->children() as $temp)
            {
                $bahasa[$temp->getName()] = $temp;
            }
            return $bahasa;
        }
        return NULL;
    }
    function get_pfade($path = "", $language = "")
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
