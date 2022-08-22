<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 09/01/2016
 * Time: 11:18
 */
$menu = new menu(); $menu->karte();
?>
<div id="content" ><div id="insidecontent"><img class="monitoring" src="bilder/tagline.png"></div>
    <div id="back"><center></center>
        <h1 align="center">
            <?php
            echo htmlentities(filter_input(INPUT_GET, nachricht));
            ?>
            <br>
            <br>
            <br>
            <br>
            Terima Kasih atas Kerjasamanya.
    </div>
</div>