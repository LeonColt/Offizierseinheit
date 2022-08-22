<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 09/01/2016
 * Time: 10:38
 */
$menu = new menu(); $menu->karte();
$anhanger = new anhanger_ausgabe_provinz();
?>
<div id="content" >
    <div id="insidecontent">
        <h1 align="center" > Laporan-Provinsi </h1>
    </div>
    <div id="back">
        <?php $anhanger->anhanger_ausgabe_provinz_erhalten_jahr();
        $anhanger->anhanger_ausgabe_provinz_erhalten_monat();
        $anhanger->anhanger_ausgabe_provinz_erhalten_model();
        $anhanger->anhanger_ausgabe_provinz_excel_schaltflache();
        $anhanger->anhanger_ausgabe_provinz_pdf_schaltflache();
        ?>
        <div style=" clear:both; "align="center"><b>REKAPITULASI <?php $anhanger->anhanger_ausgabe_provinz_erhalten_titel(); ?><br> PRIMER DAN SEKUNDER NASIONAL <br> Berdasarkan Propinsi <br> POSISI PER <br>Tahun <?php echo htmlentities(filter_input(INPUT_GET, ausgabe_jahr))."   "; ?>Bulan <?php echo htmlentities($anhanger->ausgabe_erhalten_monat_fur_title(filter_input(INPUT_GET, ausgabe_monat))); ?></b></div>
        <table border="1">
            <tr>
                <th rowspan="2"><p1>No</p1></th>
                <th rowspan="2" width="9%"><p1>Kabupaten/Kota</p1></th>
                <th rowspan="2" width="6%"><p1>Jumlah Koperasi</p1></th>
                <th rowspan="2" width="6%"><p1>Jumlah Koperasi Aktif</p1></th>
                <th rowspan="2" width="6%"><p1>Jumlah Anggota Pria</p1></th>
                <th rowspan="2" width="6%"><p1>Jumlah Anggota Wanita</p1></th>
                <th rowspan="2" width="6%"><p1>Total Jumlah Anggota</p1></th>
                <th rowspan="2" width="6%"><p1>Modal Sendir</p1>i</th>
                <th rowspan="2" width="6%"><p1>Modal Pinjaman</p1></th>
                <th rowspan="2" width="6%"><p1>Modal Penyertaan</p1></th>
                <th rowspan="2" width="6%"><p1>Nilai Aset</p1></th>
                <th rowspan="2" width="6%"><p1>Simpanan Diterima</p1></th>
                <th rowspan="2" width="6%"><p1>Pinjaman Diberikan</p1></th>
                <th rowspan="2" width="6%"><p1>SHU Belum Dibagi</p1></th>
                <th rowspan="2" width="6%"><p1>SHU Tahun Berjalan</p1></th>
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
                for($i = 0; $i<24; $i++)
                {
                    echo '<td align="center"><p1>'.($i+1).'</p1></td>';
                }
                ?>
            </tr>
            <?php
            $ausfuhren = new wichtigsten_ausgabe_provinsi();
            $ausfuhren->ausfuhren();
            ?>
        </table>
    </div>
</div><!--content-->