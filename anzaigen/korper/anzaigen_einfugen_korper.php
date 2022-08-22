<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 05/01/2016
 * Time: 19:29
 */
$menu = new menu(); $menu->karte(); ?>
<form action="<?php echo anhanger_form_url_aktion(); ?>" method="post" onsubmit="return wann_senden();">
    <?php anhanger_gemeinsame_token(); ?>
    <input type="hidden" name="<?php echo bestellung;?>" value="<?php echo bestellung_einfugen; ?>">
    <div id="content" ><div id="insidecontent"><h2 align="center" style="color: white;" > Input - <?php echo htmlentities($_SESSION[benutzername]); ?></h2></div>
        <div id="back">
            <div class="subkontainer">
                <?php
                anhanger_einfugen_provinz();
                anhanger_einfugen_kabupaten();
                anhanger_einfugen_bentuk();
                anhanger_einfugen_jahr();
                anhanger_einfugen_monat();
                ?>
            </div>
            <?php einfugen_wichtigsten(); ?>
        </div>
    </div>
</form>