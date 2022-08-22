<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 07/01/2016
 * Time: 16:57
 */

$menu = new menu(); $menu->karte();
$xml = simplexml_load_file(xml_lader(zeichenfolge));
if(strcasecmp(filter_input(INPUT_GET, bestellung), bestellung_hinzufugen_benutzer_anzaigen) === 0)
{
    $titel = $xml->anzaigen_hinzufugen_benutzer;
    $benutzername = '';
    $email = '';
    $adresse = '';
    $telefon = '';
    $telefax = '';
    $benutzer_bilder = 'bilder/org.png';
}
else
{
    $titel =  $xml->anzaigen_perfil;
    require_once standart_system_pfad.'server_skript/benutzer/wahle_benutzer_perfil.php';
    $perfil = new wahle_benutzer_perfil();
    $perfil->ausfuhren();
    $perfil = $perfil->erhalten_daten();

    $benutzername = $_SESSION[benutzername];

    if(count($perfil) > 0)
    {
        $email = $perfil[0][0];
        $adresse = $perfil[0][1];
        $telefon = $perfil[0][2];
        $telefax = $perfil[0][3];
        if(strcasecmp($perfil[0][4], 'NULL') === 0)
            $benutzer_bilder = 'bilder/org.png';
        else $benutzer_bilder = $perfil[0][4];
    }
    else
    {
        $email = '';
        $adresse = '';
        $telefon = '';
        $telefax = '';
        $benutzer_bilder = 'bilder/org.png';
    }
}
?>
<div id="content" >
    <div id="insidecontent"><h1 align="center" ><?php echo htmlentities($titel); ?></h1>
    </div>
    <div id="back" style="height:450px;">
        <form method="post" action="<?php anhanger_form_url_aktion(); ?>" enctype="multipart/form-data">
            <?php anhanger_gemeinsame_token();
            anhanger_hinzufugen_benutzer_aktion();
            anhanger_hinzufugen_benutzer_id();
            ?>
            <div style="float:left;margin-left:250px; "><b>Username</b></div>
            <div style="float:left;margin-left:10px;">
                <input  style="margin-left:10px;" type="text" id="circle" name="<?php echo hinzufugen_Benutzer_benutzer; ?>" value="<?php echo htmlentities($benutzername); ?>" <?php if(strcasecmp(filter_input(INPUT_GET, bestellung), bestellung_anzaigen_perfil) === 0) echo ' readonly="readonly"'; ?>>
            </div>
            <div style="float:left;margin-left:50px;"><b>Email</b></div>
            <div style="float:left;margin-left:10px;">
                <input type="email" id="circle" style="margin-left:10px;" name="<?php echo hinzufugen_benutzer_email; ?>" value="<?php echo htmlentities($email); ?>" <?php if(strcasecmp(filter_input(INPUT_GET, bestellung), bestellung_anzaigen_perfil) === 0) echo ' readonly="readonly"'; ?>>
            </div>
            <?php anhanger_hinzufugen_benutzer_benutzer_typ();
            anhanger_hinzufugen_benutzer_provinz();
            anhanger_hinzufugen_benutzer_kabupaten();
            ?>
            <div style="clear:both; float:left;margin-left:225px; margin-top :40px;">
                <div style=" float:left;" ><b>Alamat Dinas </b> </div>
                <div style=" float:left;margin-left:20px; ">
                    <textarea rows="4" cols="35" id="circle" name="<?php echo hinzufugen_benutzer_adresse; ?>"><?php echo htmlentities($adresse); ?></textarea>
                </div>
                <div style=" float:left; margin-top :30px; clear:both;"><b>No Telpon</b></div>
                <div style=" float:left;margin-left:30px;margin-top :30px;">
                    <input id="circle" style="margin-left:10px;" type="text" name="<?php echo hinzufugen_benutzer_telefon; ?>" value="<?php echo htmlentities($telefon); ?>">
                </div>
                <div style=" float:left; margin-top :60px;clear:both;"><b>No Fax</b></div>
                <div style=" float:left;margin-left:30px;margin-top :60px;">
                    <input  style="margin-left:30px;" type="text"id="circle" name="<?php echo hinzufugen_benutzer_telefax; ?>" value="<?php echo htmlentities($telefax); ?>">
                </div>
            </div>
            <div style=" float:left;margin-left:50px;margin-top :40px;">
                <div style=" float:left; margin-left:50px;" ><b>masukan photo anda </b> </div>
                <div style=" float:left;margin-left:50px;margin-top :20px;clear: both;" >
                    <img width="150px" height="170px"id="<?php echo hinzufugen_benutzer_vorschau_bilder_bilder; ?>" src="<?php echo $benutzer_bilder; ?>" name="<?php echo hinzufugen_benutzer_vorschau_bilder_bilder; ?>">
                </div>
            </div>
            <div style=" float:left;margin-left:700px;margin-top :20px;clear: both;" >
                <input id="<?php echo hinzufugen_benutzer_vorschau_bilder_einfugen; ?>" type="file" accept="image/*" onchange="vorschau_bilder(this.id, <?php echo hinzufugen_benutzer_vorschau_bilder_bilder; ?>.id);" name="<?php echo hinzufugen_benutzer_vorschau_bilder_einfugen; ?>" value="<?php echo htmlentities($benutzer_bilder); ?>">
            </div>
            <div style=" float:left;margin-left:500px;margin-top :60px;clear: both;">
                <button name="subject" type="submit" value="simpan">Simpan</button>
            </div>
            <div style=" float:left;margin-left:30px;margin-top :60px;" >
                <button name="subject" type="Reset" value="Reset" onclick="zurucksetzen(<?php echo hinzufugen_benutzer_vorschau_bilder_bilder; ?>.id);">Reset</button>
            </div>
        </form>
    </div>
</div>