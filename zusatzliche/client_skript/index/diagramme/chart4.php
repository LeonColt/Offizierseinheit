/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
<?php
require_once '../../../../server_skript/base/globale_variable.php';
require_once '../../../../server_skript/base/universal_methode.php';
require_once '../../../../server_skript/base/url_kodierer.php';
?>
google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(zeichnen_diagramme_4);

function zeichnen_diagramme_4()
{
    var daten_diagramme = new google.visualization.DataTable();
    daten_diagramme.addColumn('string', 'Model Koperasi');
    daten_diagramme.addColumn('number', 'Satgas');
    daten_diagramme.addColumn('number', 'Data Individu');
<?php
$url = new url_kodierer();
$url->hinzufugen(bestellung);
$url->hinzufugen(bestellung_diagramme);
$url->hinzufugen(sub_bestellung);
$url->hinzufugen(bestellung_diagramme_wahle_allen_insgesamt_koperasi_von_datum_bentuk_provinz_kabupaten);
$url->hinzufugen(diagramme_jahr);
$url->hinzufugen('"+document.getElementById("'.diagramme4.diagramme_jahr.'").value+"');
$url->hinzufugen(diagramme_monat);
$url->hinzufugen('"+document.getElementById("'.diagramme4.diagramme_monat.'").value+"');
$url->hinzufugen(diagramme_parameter_propinsi);
$url->hinzufugen('"+document.getElementById("'.diagramme4.diagramme_parameter_propinsi.'").value+"');
$url->hinzufugen(diagramme_parameter_kabupaten);
$url->hinzufugen('"+document.getElementById("'.diagramme4.diagramme_parameter_kabupaten.'").value+"');
$url->hinzufugen(diagramme_parameter_bentuk);
$url->hinzufugen('"+document.getElementById("'.diagramme4.diagramme_parameter_bentuk.'").value+"');
hinzufugen_url_sprache($url);
?>
    var jsono = JSON.parse(erhalten_json_von_url("<?php echo $url->erhalten(); ?>"));
    var vaxis_insgesamt = 0;
    if(jsono.hasOwnProperty("<?php echo diagramme4.diagramme_json_key_result; ?>"))
    {
        vaxis_insgesamt = jsono.<?php echo diagramme4.diagramme_json_key_result; ?>.length;
        for(var i = 0; i < jsono.<?php echo diagramme4.diagramme_json_key_result; ?>.length; i++)
        {
            daten_diagramme.addRows([  [jsono.<?php echo diagramme4.diagramme_json_key_result; ?>[i].<?php echo json_nama_pendek_model; ?>, parseInt(jsono.<?php echo diagramme4.diagramme_json_key_result; ?>[i].<?php echo json_insgesamt_koperasi_satgas; ?>), parseInt(jsono.<?php echo diagramme4.diagramme_json_key_result; ?>[i].<?php echo json_insgesamt_koperasi_data_individual; ?>)]               ]);
        }
    }

    var options = {
        title: '',
        width: '100%',
        height: '500',
        vAxis: { gridlines: { count: vaxis_insgesamt }, textStyle:{ fontSize: 10} },
        hAxis: { textStyle:{ fontSize: 10}, slantedText:true, slantedTextAngle:90 },
        chartArea:{width:"80%",height:"50%"},
        legend:{position:"top"}
    };

    var diagramme = new google.visualization.ColumnChart(document.getElementById('chart4'));
    diagramme.draw(daten_diagramme, options);
};
function zeichnen_diagramme_4_schnittstelle(id_provinz, id_kabupaten_kota)
{
    fullung_kab_kota(id_provinz, id_kabupaten_kota);
    zeichnen_diagramme_4();
}

