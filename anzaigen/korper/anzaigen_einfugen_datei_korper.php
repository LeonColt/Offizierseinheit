<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 12/01/2016
 * Time: 12:58
 */
$menu = new menu(); $menu->karte();
$anhanger = new anhanger_einfugen_datei();
?>
<div id="content" >
    <div id="insidecontent">
        <h1 align="center" >Upload File</h1>
    </div>
    <div id="back" style=" height:auto;">
        <div >
            <div >
                <form action="<?php anhanger_form_url_aktion(); ?>" method="post" enctype="multipart/form-data">
                    <?php $csrf = anhanger_gemeinsame_token(); $anhanger->satz_csrf($csrf); ?>
                    <input type="hidden" name="<?php echo bestellung; ?>" value="<?php echo bestellung_einfugen_datei_upload; ?>">
                    <table id="tb_atas" width="800" style="margin-left:300px;" >
                        <tr>
                            <td width="40%"> Upload file <input type="file" name="<?php echo parameter_anzaigen_einfugen_datei_datei_fur_upload;?>" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"> </td>
                            <td><input type="submit" value="save"></td>
                            <!--<td> download form upload</td>
                            <td width="5%"> <a title="download"> <img src="bilder/excel.jpg" width="70"></a></td>-->
                        </tr>
                    </table>
                </form>
                <br>
                <div style="margin-left:200px;">
                    <?php
                    $anhanger->anhanger_einfugen_datei_datum();
                    $anhanger->anhanger_tabelle_und_filter_ebene();
                    $anhanger->anhanger_tabelle_und_filter_provinz();
                    $anhanger->anhanger_tabelle_und_filter_kabupaten();
                    ?>
                    <button onclick="optionen_filter(<?php echo anzaigen_einfugen_datei_benutzer_datum; ?>.id,<?php echo anzaigen_einfugen_datei_benutzer_typ;?>.id, <?php echo anzaigen_einfugen_datei_benutzer_provinz; ?>.id, <?php echo anzaigen_einfugen_datei_benutzer_kabupaten; ?>.id );">filter</button>
                </div>
            </div>
            <br>

            <?php
            $anhanger->anhanger_tabelle_und_filter_vorschau(80);
            $anhanger->anhanger_tabelle_und_filter_nachste(1125);
            ?>
            <table style="margin-top:10px;width:1100px;"  >
                <tr bgcolor="#0a84bd" >
                    <th width="2%" >no</th>
                    <th>id</th>
                    <th >Tanggal</th>
                    <th width="35%"> Nama file </th>
                    <th width="25%"> Pengupload </th>
                    <th colspan="2"> Event </th>
                </tr>
                <?php $anhanger->anhanger_tabelle_und_filter_tabelle(); ?>
            </table>

        </div>
    </div>


</div>