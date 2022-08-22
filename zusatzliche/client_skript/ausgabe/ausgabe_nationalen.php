<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once '../../../server_skript/base/globale_variable.php';
require_once '../../../server_skript/base/universal_methode.php';
require_once '../../../server_skript/base/url_kodierer.php';
require_once '../../../server_skript/base/globale_variable_fur_datei.php';
?>
function ausgabe_nationalen_jahr_und_monat_turner()
{
    var jahr = document.getElementById("<?php echo ausgabe_jahr; ?>").value;
    var monat = document.getElementById("<?php echo ausgabe_monat; ?>").value;
<?php
$ausfuhren = new url_kodierer();
$ausfuhren->hinzufugen(bestellung);
$ausfuhren->hinzufugen(bestellung_bericht_nationalen);
$ausfuhren->hinzufugen_variable(ausgabe_jahr);
$ausfuhren->hinzufugen_parameter('"+document.getElementById("'.ausgabe_jahr.'").value+"');
$ausfuhren->hinzufugen_variable(ausgabe_monat);
$ausfuhren->hinzufugen_parameter('"+document.getElementById("'.ausgabe_monat.'").value+"');
hinzufugen_url_sprache($ausfuhren);
?>
    location.replace("<?php echo $ausfuhren->erhalten(); ?>");
}
