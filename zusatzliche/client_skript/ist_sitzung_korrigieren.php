<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 16/01/2016
 * Time: 13:42
 */
require_once '../../server_skript/base/globale_variable.php';
require_once standart_system_pfad.'server_skript/base/url_kodierer.php';
?>
setInterval(ist_sitzung_korrigieren, 3000);
function ist_sitzung_korrigieren()
{
<?php
$url = new url_kodierer();
$url->hinzufugen(bestellung);
$url->hinzufugen(bestellung_json_sitzung_aktive_nicht_aktive);
hinzufugen_url_sprache($url);
?>
    var json = JSON.parse(erhalten_json_von_url("<?php echo $url->erhalten(); ?>"));
    if(json.hasOwnProperty("<?php echo json_sitzung_aktive_nicht_aktive; ?>"))
    {
        if(json.<?php echo json_sitzung_aktive_nicht_aktive;?>.localeCompare("<?php echo json_sitzung_aktive_nicht_aktive_nicht_aktive;?>") === 0)
        {
<?php
$url = new url_kodierer();
$url->hinzufugen(bestellung);
$url->hinzufugen(bestellung_anzaigen_anmeldung);
hinzufugen_url_sprache($url);
?>
            location.replace("<?php echo $url->erhalten(); ?>");
        }
    }
}
