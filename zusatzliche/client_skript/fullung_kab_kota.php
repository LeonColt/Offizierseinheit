/**
 * Created by LC on 20/12/2015.
 */
<?php
require_once '../../server_skript/base/globale_variable.php';
require_once standart_system_pfad.'server_skript/base/universal_methode.php';
require_once standart_system_pfad.'server_skript/base/url_kodierer.php';
require_once standart_system_pfad.'server_skript/base/pfad_kodierer.php';
?>
function fullung_kab_kota(id_provinz, id_kabupaten_kota)
{
    var provinz = document.getElementById(id_provinz);
    var kabupaten_kota = document.getElementById(id_kabupaten_kota);
<?php
$pfad = new pfad_kodierer();
$pfad->hinzufugen(standart_system_pfad);
$pfad->hinzufugen(standard_pfad);
$pfad->hinzufugen(standard_sprache);
$pfad->hinzufugen(zeichenfolge);
$xml = simplexml_load_file($pfad->erhalten());
?>
    if(provinz.value.localeCompare("<?php echo $xml->standart_optionen_provinz; ?>") === 0)
    {
        entfernen_combobox(kabupaten_kota);
    }
    else
    {
<?php
$url = new url_kodierer();
$url->hinzufugen(bestellung);
$url->hinzufugen(bestellung_wahle_allen_kabupaten_kota_json);
$url->hinzufugen(parameter_provinz_bestellung_diagramme_wahle_allen_insgesamt_koperasi_von_datum_bentuk_provinz_kabupaten);
$url->hinzufugen('"+provinz.value+"');
hinzufugen_url_sprache($url);
?>
        var json = JSON.parse(erhalten_json_von_url("<?php echo $url->erhalten(); ?>"));
        entfernen_combobox(kabupaten_kota);
        for(var i = 0; i < json.<?php echo json_kabupaten; ?>.length; i++)
        {
            var moglichkeit = document.createElement("option");
            moglichkeit.value = json.<?php echo json_kabupaten; ?>[i].<?php echo json_id_kabupaten; ?>;
            moglichkeit.innerHTML = json.<?php echo json_kabupaten; ?>[i].<?php echo json_name_kabupaten; ?>;
            kabupaten_kota.appendChild(moglichkeit);
        }
    }
}