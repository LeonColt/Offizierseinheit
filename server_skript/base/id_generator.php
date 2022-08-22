<?php
/**
 * Description of idgenerator
 *
 * @author LC
 */
class id_generator {
    function erhalten_id($id, $kode = '')
    {
        if((int)$id === -1)
                return $kode."1";
        else
        {
            $intid = str_split($id);
            for($a = count($intid)-1; $a>2; $a--)
            {
                if($a == 3 && (int)$intid[$a] == 9)
                {
                    $intid[$a] = '0';
                    $temp = array('1');
                    array_splice($intid, $a-1, 0, $temp); break;
                }
                else if((int)$intid[$a]<9)
                {
                    $intid[$a] = ""+((int)$intid[$a]+1); break;
                }
                else if((int)$intid[$a] == 9)
                {
                    $intid[$a] = '0';
                }
            }
            return implode("", $intid);
        }
    }
}
