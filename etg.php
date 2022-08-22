<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 09/01/2016
 * Time: 12:33
 */
?>
<input type="email" name="email">
<?php
class etg
{
    function ausfuhren()
    {
        // TODO: Implement daten_uberprufen() method.
        $headers = 'From: '. 'admin@admin.test' . "\r\n" .
            'Reply-To: ';
        if(mail('cahyo9823@gmail.com', 'test', 'cahyo', $headers))
        {
            echo 'sent';
        }
        else
        {
            echo 'hasnt sent';
        }
    }
}
$ausfuhren = new etg();
$ausfuhren->ausfuhren();