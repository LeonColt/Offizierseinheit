<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of getip
 *
 * @author LC
 */
class getip {
    function getip()
    {
        $headers = NULL;
        if(function_exists('apache_request_headers'))
        {
            $headers = apache_request_headers();
        }
        else
        {
            $headers = $_SERVER;
        }
        if(array_key_exists('X-Forwarded-For', $headers) && filter_var($headers['X-Forwarded-For'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4))
        {
            return $headers['X-Forwarded-For'];
        }
        else if(array_key_exists('HTTP_X_FORWARDED_FOR', $headers) && filter_var($headers['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4))
        {
            return $headers['HTTP_X_FORWARDED_FOR'];
        }
        else
        {
            return filter_var($_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4);
        }
    }
}
