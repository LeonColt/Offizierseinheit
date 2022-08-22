<?php
require 'server_skript/base/globale_variable.php';
require_once standart_system_pfad.'server_skript/base/universal_methode.php';
require_once standart_system_pfad.'server_skript/base/sitzung_starter.php';
require_once standart_system_pfad.'anzaigen/Base_anzaigen.php';
require_once standart_system_pfad.'darstellung/menu.php';
require_once standart_system_pfad.'anhanger/anhanger_gemeinsame.php';
require_once standart_system_pfad.'server_skript/base/pfad_kodierer.php';
?>
<div id="header" ></div>
<?php
$menu = new menu(); $menu->karte();
$zeichenfolge = simplexml_load_file(xml_lader(zeichenfolge));
?>
<div id="content">
    <div id="insidecontent">
        <img style="float:left;" src="bilder/tagline.png" alt="bild nicht gefunden">
    </div>
    <div id="back">
        <table  width="990px">
            <tr>
                <td align="center">
                    <div id=slidercontainer>
                        <div id=css3slider>
                            <img src="bilder/anzaigen_anmeldung/ns1.jpg" alt="Square-tailed kite">
                            <img src="bilder/anzaigen_anmeldung/ns2.jpg" alt="White-tailed kite">
                            <img src="bilder/anzaigen_anmeldung/ns3.jpg" alt="Hawk" title="Hawk">
                            <img src="bilder/anzaigen_anmeldung/ns4.jpg" alt="Osprey">
                        </div>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</div>
<div id="kotak">
    <div id="atas">
        <p id ="kanan"> LOGIN </p>
    </div>
    <div id="bawah">
        <form method="post" action="<?php anhanger_form_url_aktion(); ?>" onsubmit="return ist_input_korriegieren();">
            <?php $csrf =  anhanger_gemeinsame_token(); ?>
            <input type="hidden" name="<?php echo bestellung; ?>" value="<?php echo bestellung_anmeldung; ?>">
            <input class="masuk" type="text"  placeholder="<?php echo htmlentities($zeichenfolge->anmeldung_benutzername_platz_inhaber); ?>" name="<?php echo benutzername; ?>" id="<?php echo benutzername; ?>"><br/>
            <input class="masuk" type="password"  placeholder="<?php echo htmlentities($zeichenfolge->anmeldung_passwort_platz_inhaber); ?>" name="<?php echo passwort; ?>" id="<?php echo passwort; ?>"><br/>
            <input id="tombol" type="submit" value="<?php echo htmlentities($zeichenfolge->anmeldung_schaltflace); ?>" name="<?php echo btt_anmeldung; ?>">
        </form>
        <button id="tombol" onclick="vergessen_passwort();"><?php echo htmlentities($zeichenfolge->anmeldung_vergessen_passwort); ?></button>
        <script>
            function vergessen_passwort()
            {
                var email = prompt("<?php echo $zeichenfolge->vergessen_passwort_nachricht_email; ?>");
                if(email !== null)
                {
                    <?php
                    $url = new url_kodierer();
                    $url->hinzufugen(bestellung);
                    $url->hinzufugen(bestellung_vergessen_passwort);
                    $url->hinzufugen(parameter_vergessen_passwort_email);
                    $url->hinzufugen('"+email+"');
                    $url->hinzufugen(csrf_schlussel);
                    $url->hinzufugen($csrf->erhalten_schlussel());
                    $url->hinzufugen(csrf_token);
                    $url->hinzufugen($csrf->erhalten_token());
                    hinzufugen_url_sprache($url);
                    ?>
                    location.replace("<?php echo $url->erhalten(); ?>");
                }
            }
        </script>
    </div>
</div>
