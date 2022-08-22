<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of list_language
 *
 * @author christian
 */
class sprache_liste {
    //put your code here
    function erhalten(&$path = "")
    {
        if(file_exists($path."list_languages.xml"))
        {
            $list = simplexml_load_file($path."list_languages.xml");
            echo '<select>';
            foreach ($list->children() as $bahasa)
            {
                echo '<option value="'.$bahasa.'">'.$bahasa.'</option>';
            }
            echo '</select>';
        }
        else
        {
            $this->cannot_find_list_language();
        }
    }
    function erhalten_arr(&$path = "")
    {
        if(file_exists($path."list_languages.xml"))
        {
            $list = simplexml_load_file($path."list_languages.xml");
            $list_bahasa = array();
            foreach ($list->children() as $bahasa)
            {
                array_push($list_bahasa, $bahasa);
            }
            return $list_bahasa;
        }
        else
        {
            $this->kann_nicht_finden_sprache_liste();
        }
        return NULL;
    }
    function sprache_existieren(&$path = "", &$language  = "id")
    {
        $list = $this->select_array($path);
        if(!empty($list))
        {
            foreach ($list as $bahasa)
            {
                if(strcmp($bahasa, $language) == 0)
                {
                    return true;
                }
            }
        }
        else
        {
            $this->sprache->liste_leere();
        }
        return false;
    }
    function kann_nicht_finden_sprache_liste()
    {
        throw new Exception("error, cannot find list_languages.xml");
    }
    function sprache_liste_leere()
    {
        throw new Exception('error, not any single language exists, please contact your admin, to add a language');
    }
}
