<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 09/01/2016
 * Time: 11:09
 */
$menu = new menu(); $menu->karte(); ?>
<div id="content" >
    <div id="insidecontent">
        <h1 align="center" >Setting Tambah User</h1>
    </div>
    <div id="back" style="height:200px;">
        <form method="post" action="<?php anhanger_form_url_aktion(); ?>">
            <?php anhanger_gemeinsame_token();
            anhanger_andern_passwort_aktion();
            anhanger_andern_passwort_benutzer_id();
            ?>
            <div style=" float:left;margin-left:520px;"><b>Username</b></div>
            <div style=" float:left;margin-left:112px; margin-top:10px;">
                <input  style="margin-left:10px;" type="text" id="circle" name="<?php echo andern_passwort_benutzername; ?>" value="<?php echo htmlentities($_SESSION[benutzername]); ?>" readonly="readonly">
            </div>
            <div style=" float:left;margin-left:520px;clear:both;"><b>Current Password</b></div>
            <div style=" float:left;margin-left:58px;margin-top:10px;">
                <input  style="margin-left:10px;" type="password" id="circle" name="<?php echo andern_passwort_aktuelle_passwort; ?>">
            </div>
            <div style=" float:left;margin-left:520px;clear:both;"><b>Password Baru</b></div>
            <div style=" float:left;margin-left:10px;margin-top:10px;">
                <input  style="margin-left:79px;" type="password" id="circle" name="<?php echo andern_passwort_neu_passwort; ?>">
            </div>
            <div style=" float:left;margin-left:520px;clear:both;"><b>Confirm Password Baru</b></div>
            <div style=" float:left;margin-left:10px; margin-top:10px;">
                <input  style="margin-left:20px;" type="password" id="circle" name="<?php echo andern_passwort_bestatigen_neu_passwort; ?>">
            </div>
            <div style=" float:left;margin-left:550px;margin-top :30px;clear: both;">
                <button name="subject" type="submit" value="simpan">Simpan</button>
            </div>
            <div style=" float:left;margin-left:30px;margin-top :30px;" >
                <button name="subject" type="Reset" value="Reset" onclick="zurucksetzen(<?php echo hinzufugen_benutzer_vorschau_bilder_bilder; ?>.id);">Reset</button>
            </div>
        </form>
    </div>
</div>