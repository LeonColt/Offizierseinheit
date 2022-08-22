<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 09/01/2016
 * Time: 08:53
 */
$menu = new menu(); $menu->karte(); ?>
<div id="content" >
    <div id="insidecontent">
        <h1 align="center" > Laporan-Nasional </h1>
    </div>
    <div id="back">
        <?php
        anhanger_ausgabe_nationalen_erhalten_jahr();
        anhanger_ausgabe_nationalen_erhalten_monat();
        anhanger_ausgabe_nationalen_pdf_schaltflache();
        anhanger_ausgabe_nationalen_excel_schaltflache();
        ?>
        <div style=" clear:both; "align="center">
            <b>
                REKAPITULASI USAHA SIMPAN PINJAM OLEH KOPERASI
                <br>
                Tahun
                <?php echo htmlentities(filter_input(INPUT_GET, ausgabe_jahr))."   "; ?>
                Bulan
                <?php echo htmlentities(ausgabe_erhalten_monat_fur_title(htmlentities(filter_input(INPUT_GET, ausgabe_monat)))); ?>
            </b>
        </div>
        <div align="center"><b>Seluruh Indonesia</b> </div>
        <table border="1">
            <tr>
                <th rowspan="2"><p1>No</p1></th>
                <th rowspan="2" width="9%"><p1>Kabupaten/Kota</p1></th>
                <th rowspan="2" width="6%"><p1>Jumlah Koperasi</p1></th>
                <th rowspan="2" width="6%"><p1>Jumlah Koperasi Aktif</p1></th>
                <th rowspan="2" width="6%"><p1>Jumlah Anggota</p1></th>
                <th rowspan="2" width="6%"><p1>Modal Sendir</p1>i</th>
                <th rowspan="2" width="6%"><p1>Modal Pinjaman</p1></th>
                <th rowspan="2" width="6%"><p1>Modal Penyertaan</p1></th>
                <th rowspan="2" width="6%"><p1>Nilai Aset</p1></th>
                <th rowspan="2" width="6%"><p1>Simpanan Diterima</p1></th>
                <th rowspan="2" width="6%"><p1>Pinjaman Diberikan</p1></th>
                <th rowspan="2" width="6%"><p1>Volume Usaha</p1></th>
                <th rowspan="2" width="6%"><p1>SHU</p1></th>
                <th rowspan="2" width="6%"><p1>yang memiliki ijin usaha</p1></th>
                <th rowspan="2" width="6%"><p1>Telah RAT</p1></th>
                <th colspan="6" align="center"><p1>telah dinilai oleh dinas</p1></th>
                <th rowspan="2"><p1>Belum Dinilai</p1></th>
            </tr>
            <tr>
                <th><p2>Sehat</p2></th>
                <th><p2>Cukup sehat</p2></th>
                <th><p2>Kurang Sehat</p2></th>
                <th><p2>Tidak Sehat</p2></th>
                <th><p2>Sangat Tidak Sehat</p2></th>
                <th><p2>Jumlah</p2></th>
            </tr>
            <tr>
                <?php
                for($i = 0; $i<22; $i++)
                {
                    echo '<td align="center"><p1>'.($i+1).'</p1></td>';
                }
                ?>
            </tr>
            <?php
            $ausfuhren = new wichstigsten_ausgabe_nasional();
            $ausfuhren->ausfuhren();
            ?>
        </table>
    </div>
</div><!--content-->
