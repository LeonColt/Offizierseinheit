<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Objekt
 *
 * @author LC
 */
abstract class Objekt {
    //put your code here
    function ist_null()
    {
    	for($i = 0; $i<func_num_args(); $i++)
    	{
    		if(func_get_arg($i) == NULL)
    		{
    			return true;
    		}
    	}
    	return false;
    }
	public final function umleitung($url)
	{
		header('Location:'.$url);
		session_write_close();
		session_regenerate_id();
		exit();
	}
	public final function umleitung_mit_nachricht($url, $message)
	{
		echo '<script type="text/javascript">window.alert("'.$message.'");window.location.href ="'.$url.'"</script>';
		session_write_close();
		session_regenerate_id();
		exit();
	}
}
