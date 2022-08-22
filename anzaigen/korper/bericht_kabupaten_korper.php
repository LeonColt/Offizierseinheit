<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 09/01/2016
 * Time: 10:54
 */
$menu = new menu(); $menu->karte(); ?>
<div id="content" >
    <div id="insidecontent">
        <h1 align="center" > Laporan-Kabupaten </h1>
    </div>
    <div id="back">
        <?php anhanger_ausgabe_kabupaten_erhalten_jahr();
        anhanger_ausgabe_kabupaten_erhalten_monat();
        anhanger_ausgabe_kabupaten_erhalten_provinz();
        anhanger_ausgabe_kabupaten_erhalten_model();
        anhanger_ausgabe_kabupaten_pdf_schaltflache();
        anhanger_ausgabe_kabupaten_excel_schaltflache();
        ?>
        <div style=" clear:both; "align="center"><b>REKAPITULASI <?php anhanger_ausgabe_kabupaten_erhalten_titel(); ?><br> PRIMER DAN SEKUNDER <br> PROPINSI <?php anhanger_ausgabe_kabupaten_erhalten_provinz_titel(); ?> <br> Berdasarkan KABUPATEN/KOTA <br> POSISI <br>Tahun <?php echo htmlentities(filter_input(INPUT_GET, ausgabe_jahr))."   "; ?>Bulan <?php echo htmlentities(ausgabe_erhalten_monat_fur_title(filter_input(INPUT_GET, ausgabe_monat))); ?></b></div>
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
                <td align="center"><p1>1</p1></td>
                <td align="center"><p1>2</p1></td>
                <td align="center"><p1>3</p1></td>
                <td align="center"><p1>4</p1></td>
                <td align="center"><p1>5</p1></td>
                <td align="center"><p1>6</p1></td>
                <td align="center"><p1>7</p1></td>
                <td align="center"><p1>8</p1></td>
                <td align="center"><p1>9</p1></td>
                <td align="center"><p1>10</p1></td>
                <td align="center"><p1>11</p1></td>
                <td align="center"><p1>12</p1></td>
                <td align="center"><p1>13</p1></td>
                <td align="center"><p1>14</p1></td>
                <td align="center"><p1>15</p1></td>
                <td align="center"><p1>16</p1></td>
                <td align="center"><p1>17</p1></td>
                <td align="center"><p1>18</p1></td>
                <td align="center"><p1>19</p1></td>
                <td align="center"><p1>20</p1></td>
                <td align="center"><p1>21</p1></td>
                <td align="center"><p1>22</p1></td>
                <td align="center"><p1>23</p1></td>
                <td align="center"><p1>24</p1></td>
            </tr>
            <?php
            $ausfuhren = new wichtigsten_ausgabe_kabupaten();
            $ausfuhren->ausfuhren();
            ?>
        </table>
    </div>
</div><!--content-->