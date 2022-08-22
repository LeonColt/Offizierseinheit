/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
<?php
require_once '../../../../server_skript/base/globale_variable.php';
require_once standart_system_pfad.'server_skript/base/universal_methode.php';
require_once standart_system_pfad.'server_skript/base/url_kodierer.php';
?>
google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(zeichnen_diagramme_1);

function zeichnen_diagramme_1()
{
    var daten = new google.visualization.DataTable();
    daten.addColumn('string', 'model');
    daten.addColumn('number', 'Satgas');
    daten.addColumn('number', 'Data Individu');

    url = "<?php
$url = new url_kodierer();
$url->hinzufugen(bestellung);
$url->hinzufugen(bestellung_diagramme);
$url->hinzufugen(sub_bestellung);
$url->hinzufugen('"+document.getElementById("'.diagramme1.diagramme_parameter_diagramme1_kategorie.'").value+"');
$url->hinzufugen(diagramme_jahr);
$url->hinzufugen('"+document.getElementById("'.diagramme1.diagramme_jahr.'").value+"');
$url->hinzufugen(diagramme_monat);
$url->hinzufugen('"+document.getElementById("'.diagramme1.diagramme_monat.'").value+"');
$url->hinzufugen(diagramme_parameter_propinsi);
$url->hinzufugen('"+document.getElementById("'.diagramme1.diagramme_parameter_propinsi.'").value+"');
$url->hinzufugen(diagramme_parameter_kabupaten);
$url->hinzufugen('"+document.getElementById("'.diagramme1.diagramme_parameter_kabupaten.'").value+"');
hinzufugen_url_sprache($url);
echo $url->erhalten(); ?>";


    var jsono = JSON.parse(erhalten_json_von_url(url));

    var vaxis_insgesamt = 0;
    if(jsono.hasOwnProperty("sz104200sz104211"))
    {
        vaxis_insgesamt = jsono.sz104200sz104211.length;
        for(var i = 0; i < jsono.sz104200sz104211.length; i++)
        {
            daten.addRows([[   jsono.sz104200sz104211[i].sz104502, parseInt(jsono.sz104200sz104211[i].sz104503), parseInt(jsono.sz104200sz104211[i].sz104504)                    ]]);
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
    var diagramme = new google.visualization.ColumnChart(document.getElementById('chart1'));
    diagramme.draw(daten, options);
}
function zeichnen_diagramme_1_schnittstelle(id_provinz, id_kabupaten_kota)
{
    fullung_kab_kota(id_provinz, id_kabupaten_kota);
    zeichnen_diagramme_1();
}

