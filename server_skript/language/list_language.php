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
class list_language {
    //put your code here
    function select(&$path = "")
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
    function select_array(&$path = "")
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
            $this->cannot_find_list_language();
        }
        return NULL;
    }
    function language_exists(&$path = "", &$language  = "id")
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
            $this->list_language_is_empty();
        }
        return false;
    }
    function add_language()
    {
        $list = simple;
    }
    function cannot_find_list_language()
    {
        throw new Exception("error, cannot find list_languages.xml");
    }
    function list_language_is_empty()
    {
        throw new Exception('error, not any single language exists, please contact your admin, to add a language');
    }
}
