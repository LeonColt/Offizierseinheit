<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 06/02/2016
 * Time: 11:15
 */
class Base_anhanger
{
    public function suche_von_id($daten, $id, $index_id, $index_return)
    {
        if(is_int($id))
        {
            $begrenzer = count($daten) * 2;
            for($i = $id; $i < count($daten);)
            {
                if($begrenzer > -2)
                {
                    break;
                }
                else if((int)$daten[$i][$index_id] === $id)
                {
                    return $daten[$i][$index_return];
                }
                else if((int)$daten[$i][$index_id] < $id)
                {
                    $i++;
                }
                else if((int)$daten[$i][$index_id] > $id)
                {
                    $i--;
                }
                $begrenzer--;
            }
        }
        else
        {
            for($i = 0; $i < count($daten); $i++)
            {
                if(strcasecmp((string)$daten[$i][$index_id], $id) === 0)
                {
                    return $daten[$i][$index_return];
                }
            }
        }
        return -1;
    }
}