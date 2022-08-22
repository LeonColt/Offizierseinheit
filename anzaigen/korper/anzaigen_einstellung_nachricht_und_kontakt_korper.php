<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 05/01/2016
 * Time: 18:50
 */
require_once standart_system_pfad.'server_skript/base/globale_variable.php';
require_once standart_system_pfad.'anhanger/anhanger_gemeinsame.php';
$menu = new menu(); $menu->karte(); ?>
<div id="content" >
    <div id="insidecontent">
        <h1 align="center" >Memo dan Kontak</h1>
    </div>
    <div id="back" style=" height:380px;">
        <div  align="center">
            <form method="post" action="<?php anhanger_form_url_aktion(); ?>">
                <?php anhanger_gemeinsame_token(); ?>
                <input type="hidden" name="<?php echo bestellung; ?>" value="<?php echo bestellung_einstellung_nachricht_und_kontakt; ?>">
                <b>MEMO</b>
                <br>
                <textarea id="<?php echo einstellung_nachricht_und_kontakt_nachricht; ?>" rows="4" cols="50" name="<?php echo einstellung_nachricht_und_kontakt_nachricht; ?>" style="margin-top:10px;" placeholder="ubah memo disini"></textarea>
                <br>
                <input type="button" onclick="resetmemo()" value="Reset memo" style=" margin-left: 10px;margin-top:10px;">

            <script>
                function resetmemo() {
                    document.getElementById("<?php echo einstellung_nachricht_und_kontakt_nachricht; ?>").value = "";
                }
            </script>
        </div>
        <br>
        <br>
        <br>
        <div  align="center">
                <b>KONTAK</b>
                <br>
                <textarea id="<?php echo einstellung_nachricht_und_kontakt_kontakt; ?>" rows="8" cols="50" name="<?php echo einstellung_nachricht_und_kontakt_kontakt; ?>" style="margin-top:10px;" placeholder="ubah kontak disini"></textarea>
                <br>
                <input type="submit"  value="simpan"style="margin-top:10px;" >
                <input type="button" onclick="resetkontak()" value="Reset kontak" style=" margin-left: 10px;margin-top:10px;">

            </form>
            <script>
                function resetkontak() {
                    document.getElementById("<?php echo einstellung_nachricht_und_kontakt_kontakt; ?>").value = "";
                }
            </script>
        </div>
    </div>
</div>
