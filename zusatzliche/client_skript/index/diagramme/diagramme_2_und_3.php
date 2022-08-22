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
google.setOnLoadCallback(zeichnen_diagramme_2);

var daten_diagramme_1, diagramme_1, wahle, ausgewahlt_propinsi = -1;

function zeichnen_diagramme_2() {
    daten_diagramme_1 = new google.visualization.DataTable();
    daten_diagramme_1.addColumn('string', 'Propinsi');
    daten_diagramme_1.addColumn('number', 'Satgas');
    daten_diagramme_1.addColumn('number', 'Data Individu');
    daten_diagramme_1.addColumn('number', 'id_propinsi');
<?php
$url = new url_kodierer();
$url->hinzufugen(bestellung);
$url->hinzufugen(bestellung_diagramme);
$url->hinzufugen(sub_bestellung);
$url->hinzufugen(bestellung_diagramme_wahle_allen_koperasi_von_propinsi);
$url->hinzufugen(diagramme_jahr);
$url->hinzufugen('"+document.getElementById("'.diagramme2.diagramme_jahr.'").value+"');
$url->hinzufugen(diagramme_monat);
$url->hinzufugen('"+document.getElementById("'.diagramme2.diagramme_monat.'").value+"');
hinzufugen_url_sprache($url);
?>
    var jsono = JSON.parse(erhalten_json_von_url("<?php echo $url->erhalten(); ?>"));
    var vaxis_insgesamt = 0;
    if(jsono.hasOwnProperty("propinsi"))
    {
        vaxis_insgesamt = jsono.propinsi.length/2;
        for(var i = 0; i < jsono.propinsi.length; i++)
        {
            daten_diagramme_1.addRows([[jsono.propinsi[i].propinsi , parseInt(jsono.propinsi[i].satgas), parseInt(jsono.propinsi[i].data_individual), parseInt(jsono.propinsi[i].id_propinsi) ]]);
        }
    }
    var view = new google.visualization.DataView(daten_diagramme_1);
    view.setColumns([0,1,2]);
    var options = {
        title: '',
        witdh: '100%',
        height: '500',
        vAxis: { gridlines: { count: vaxis_insgesamt }, textStyle:{ fontSize: 10}},
        hAxis: { textStyle:{ fontSize: 10}, slantedText:true, slantedTextAngle:90},
        chartArea:{width:"80%",height:"50%"},
        legend:{position:"top"}
    };
    
    diagramme_1 = new google.visualization.ColumnChart(document.getElementById('chart2'));
    diagramme_1.draw(view, options);
    
    google.visualization.events.addListener(diagramme_1, 'select', wahle_sie_handler);
};

function chart_2_schnittstelle()
{
    zeichnen_diagramme_2();
    zeichnen_diagramme_3();
}

function wahle_sie_handler()
{
    var wahle = diagramme_1.getSelection();
    for(var i = 0; i < wahle.length; i++)
    {
        ausgewahlt_propinsi = daten_diagramme_1.getFormattedValue(wahle[i].row, 3);
    }
    zeichnen_diagramme_3();
}

google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(zeichnen_diagramme_3);
function zeichnen_diagramme_3() {
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Kabupaten');
    data.addColumn('number', 'Satgas');
    data.addColumn('number', 'Data Individu');
<?php
$url = new url_kodierer();
$url->hinzufugen(bestellung);
$url->hinzufugen(bestellung_diagramme);
$url->hinzufugen(sub_bestellung);
$url->hinzufugen(bestellung_diagramme_wahle_allen_koperasi_von_kabupaten);
$url->hinzufugen(diagramme_parameter_propinsi);
$url->hinzufugen('"+ausgewahlt_propinsi+"');
$url->hinzufugen(diagramme_jahr);
$url->hinzufugen('"+document.getElementById("'.diagramme2.diagramme_jahr.'").value+"');
$url->hinzufugen(diagramme_monat);
$url->hinzufugen('"+document.getElementById("'.diagramme2.diagramme_monat.'").value+"');
hinzufugen_url_sprache($url);
?>
    var url = "<?php echo $url->erhalten(); ?>";
    var jsono = JSON.parse(erhalten_json_von_url(url));
    var vaxis_insgesamt = 0;
    if(jsono.hasOwnProperty("kabupaten"))
    {
        vaxis_insgesamt = jsono.kabupaten.length/2;
        for(var i = 0; i < jsono.kabupaten.length; i++)
        {
            data.addRows([[jsono.kabupaten[i].kabupaten_kota, parseInt(jsono.kabupaten[i].satgas), parseInt(jsono.kabupaten[i].data_individual)]]);
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
    
    
    var chart = new google.visualization.ColumnChart(document.getElementById('chart3'));
    chart.draw(data, options);
};
