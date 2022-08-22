<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of excel_layers
 *
 * @author LC
 */
require_once 'server_skript/library/Excel/PHPExcel.php';
require_once 'server_skript/library/Excel/PHPExcel/Writer/Excel2007.php';
require_once 'server_skript/base/globale_variable.php';
require_once 'server_skript/ausgabe/wahle_allen_bentuk_koperasi_fur_ausgabe.php';
require_once 'server_skript/ausgabe/wahle_allen_model_koperasi_fur_ausgabe.php';
require_once 'server_skript/ausgabe/nationalen/ausgabe_satgas_pro_nationalen.php';
require_once 'server_skript/ausgabe/nationalen/Base_ausgabe_nationalen.php';
require_once 'server_skript/ausgabe/Interface_excel_schichten.php';
class excel_schichten_nationalen extends Base_ausgabe_nationalen implements Interface_excel_schichten {
    //put your code here
    private $header = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K",
        "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V"), $zeiger_zeile, $beginnen_zeile;
     
    public final function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Jakarta"); 
        error_reporting(E_ALL);
        $this->excel = new PHPExcel();
        $this->excel->getProperties()->setCreator("satgas");
        $this->excel->getProperties()->setTitle('REKAPITULASI USAHA SIMPAN PINJAM OLEH KOPERASI Tahun '.htmlentities(filter_input(INPUT_GET, ausgabe_jahr)).' Bulan '.htmlentities($this->ausgabe_erhalten_monat_fur_title(filter_input(INPUT_GET, ausgabe_monat))));
        $this->zeiger_zeile = 1;
    }
    public final function ausfuhren()
    {
        $this->vorbereiten_daten();
        $this->satz_header();
        $this->zeichnen_daten();
        $this->satz_auto_spalte_breite();
        $this->zeichnen_grenze();
        $writer = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');
        ob_end_clean();
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header('Content-Disposition: attachment;filename="REKAPITULASI USAHA SIMPAN PINJAM OLEH KOPERASI Tahun '.htmlentities(filter_input(INPUT_GET, ausgabe_jahr)).' Bulan '.htmlentities($this->ausgabe_erhalten_monat_fur_title(filter_input(INPUT_GET, ausgabe_monat))).'.xlsx"');
        header("Cache-Control: max-age=0");
        header("Content-Transfer-Encoding: binary ");
        $writer->save('php://output');
    }
    public final function satz_header()
    {
        $this->excel->setActiveSheetIndex(0);
        $this->excel->getActiveSheet()->SetCellValue('H'.$this->zeiger_zeile++, 'REKAPITULASI USAHA SIMPAN PINJAM OLEH KOPERASI');
        $this->excel->getActiveSheet()->SetCellValue('I'.$this->zeiger_zeile++, 'Tahun '.htmlentities(filter_input(INPUT_GET, ausgabe_jahr)).' Bulan '.htmlentities($this->ausgabe_erhalten_monat_fur_title(filter_input(INPUT_GET, ausgabe_monat))));
        $this->excel->getActiveSheet()->SetCellValue('I'.$this->zeiger_zeile++, 'Seluruh Indonesia');
        $this->zeiger_zeile++;
        $this->zeiger_zeile++;
        $this->beginnen_zeile = $this->zeiger_zeile;
        $this->excel->getActiveSheet()->SetCellValue($this->header[0].$this->zeiger_zeile, 'No');
        $this->excel->getActiveSheet()->SetCellValue($this->header[1].$this->zeiger_zeile, 'Kabupaten/Kota');
        $this->excel->getActiveSheet()->SetCellValue($this->header[2].$this->zeiger_zeile, 'Jumlah Koperasi');
        $this->excel->getActiveSheet()->SetCellValue($this->header[3].$this->zeiger_zeile, 'Jumlah Koperasi Aktif');
        $this->excel->getActiveSheet()->SetCellValue($this->header[4].$this->zeiger_zeile, 'Jumlah Anggota');
        $this->excel->getActiveSheet()->SetCellValue($this->header[5].$this->zeiger_zeile, 'Modal Sendiri');
        $this->excel->getActiveSheet()->SetCellValue($this->header[6].$this->zeiger_zeile, 'Modal Pinjaman');
        $this->excel->getActiveSheet()->SetCellValue($this->header[7].$this->zeiger_zeile, 'Modal Penyertaan');
        $this->excel->getActiveSheet()->SetCellValue($this->header[8].$this->zeiger_zeile, 'Nilai Aset');
        $this->excel->getActiveSheet()->SetCellValue($this->header[9].$this->zeiger_zeile, 'Simpanan Diterima');
        $this->excel->getActiveSheet()->SetCellValue($this->header[10].$this->zeiger_zeile, 'Pinjaman Diberikan');
        $this->excel->getActiveSheet()->SetCellValue($this->header[11].$this->zeiger_zeile, 'Volume Usaha');
        $this->excel->getActiveSheet()->SetCellValue($this->header[12].$this->zeiger_zeile, 'SHU');
        $this->excel->getActiveSheet()->SetCellValue($this->header[13].$this->zeiger_zeile, 'yang memiliki ijin usaha');
        $this->excel->getActiveSheet()->SetCellValue($this->header[14].$this->zeiger_zeile, 'Telah RAT');
        $this->excel->getActiveSheet()->SetCellValue($this->header[15].$this->zeiger_zeile, 'telah dinilai oleh dinas');
        $this->excel->getActiveSheet()->SetCellValue($this->header[21].$this->zeiger_zeile, 'Belum Dinilai');
        for($i = 0; $i<15; $i++)
        {
            $this->excel->getActiveSheet()->mergeCells($this->header[$i].$this->zeiger_zeile.':'.$this->header[$i].($this->zeiger_zeile+1));
        }
        $this->excel->getActiveSheet()->mergeCells($this->header[15].$this->zeiger_zeile.':'.$this->header[20].$this->zeiger_zeile);
        $this->excel->getActiveSheet()->mergeCells($this->header[21].$this->zeiger_zeile.':'.$this->header[21].($this->zeiger_zeile+1));
        $this->zeiger_zeile++;
        $this->excel->getActiveSheet()->SetCellValue($this->header[15].$this->zeiger_zeile, 'Sehat');
        $this->excel->getActiveSheet()->SetCellValue($this->header[16].$this->zeiger_zeile, 'Cukup Sehat');
        $this->excel->getActiveSheet()->SetCellValue($this->header[17].$this->zeiger_zeile, 'Kurang Sehat');
        $this->excel->getActiveSheet()->SetCellValue($this->header[18].$this->zeiger_zeile, 'Tidak Sehat');
        $this->excel->getActiveSheet()->SetCellValue($this->header[19].$this->zeiger_zeile, 'Sangat Tidak Sehat');
        $this->excel->getActiveSheet()->SetCellValue($this->header[20].$this->zeiger_zeile, 'Jumlah');
        $this->zeiger_zeile++;
    }
    public final function zeichnen_grenze()
    {
        $styleArray = array(
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN
                )
            )
        );
        $this->excel->getActiveSheet()->getStyle($this->header[0].$this->beginnen_zeile.':'.$this->header[21].($this->zeiger_zeile-1))->applyFromArray($styleArray);
        unset($styleArray);
    }

    public function satz_auto_spalte_breite()
    {
        $this->excel->getActiveSheet()->getColumnDimension($this->header[0])->setWidth(3);
        $this->excel->getActiveSheet()->getColumnDimension($this->header[1])->setWidth(35);
        $this->excel->getActiveSheet()->getColumnDimension($this->header[2])->setWidth(15);
        $this->excel->getActiveSheet()->getColumnDimension($this->header[3])->setWidth(15);
        $this->excel->getActiveSheet()->getColumnDimension($this->header[4])->setWidth(15);
        $this->excel->getActiveSheet()->getColumnDimension($this->header[5])->setWidth(15);
        $this->excel->getActiveSheet()->getColumnDimension($this->header[6])->setWidth(15);
        $this->excel->getActiveSheet()->getColumnDimension($this->header[7])->setWidth(15);
        $this->excel->getActiveSheet()->getColumnDimension($this->header[8])->setWidth(15);
        $this->excel->getActiveSheet()->getColumnDimension($this->header[9])->setWidth(15);
        $this->excel->getActiveSheet()->getColumnDimension($this->header[10])->setWidth(15);
        $this->excel->getActiveSheet()->getColumnDimension($this->header[11])->setWidth(15);
        $this->excel->getActiveSheet()->getColumnDimension($this->header[12])->setWidth(15);
        $this->excel->getActiveSheet()->getColumnDimension($this->header[13])->setWidth(15);
        $this->excel->getActiveSheet()->getColumnDimension($this->header[14])->setWidth(15);
        $this->excel->getActiveSheet()->getColumnDimension($this->header[15])->setWidth(15);
        $this->excel->getActiveSheet()->getColumnDimension($this->header[16])->setWidth(15);
        $this->excel->getActiveSheet()->getColumnDimension($this->header[17])->setWidth(15);
        $this->excel->getActiveSheet()->getColumnDimension($this->header[18])->setWidth(15);
        $this->excel->getActiveSheet()->getColumnDimension($this->header[19])->setWidth(15);
        $this->excel->getActiveSheet()->getColumnDimension($this->header[20])->setWidth(15);
        $this->excel->getActiveSheet()->getColumnDimension($this->header[21])->setWidth(15);
    }


    protected final function zeichnen_daten()
    {
        $daten_zeichnen = $this->zuordnung_daten();
        $daten_zeichnen_kspo = $this->zourdnung_daten_kspo();
        $daten_insgesamt_von_bentuk_zeichnen = $this->berechne_insgesamt_von_bentuk($daten_zeichnen);
        $daten_insgesamt_von_bentuk_primer_und_sekunder = $this->berechne_insgesamt_von_bentuk_primer_und_sekunder($daten_insgesamt_von_bentuk_zeichnen);
        $daten_insgesamt_von_insgesamt_primer_insgesamt_sekunder = $this->berechne_insgesamt_von_insgesamt_primer_insgesamt_sekunder();

        $zahler_bentuk = 0;

        $this->excel->getActiveSheet()->setCellValue('A3', $this->insgesamt_spalte);

        for($i = 0; $i<count($this->bentuk); $i++)
        {
            $this->excel->getActiveSheet()->setCellValue($this->header[0].$this->zeiger_zeile, ($zahler_bentuk+1));
            $this->excel->getActiveSheet()->setCellValue($this->header[1].$this->zeiger_zeile, $this->bentuk[$i][1]);
            for($j = 0; $j<$this->insgesamt_spalte; $j++)
            {
                $this->excel->getActiveSheet()->setCellValue($this->header[$j+2].$this->zeiger_zeile, $this->erhalten_wert($daten_insgesamt_von_bentuk_zeichnen[$this->bentuk[$i][0]][$j]));
            }
            $this->zeiger_zeile++;
            for($j = 0; $j<count($this->model); $j++)
            {
                $this->excel->getActiveSheet()->setCellValue($this->header[0].$this->zeiger_zeile, "  ");
                $this->excel->getActiveSheet()->setCellValue($this->header[1].$this->zeiger_zeile, $this->model[$j][2]);
                for($k = 0; $k<$this->insgesamt_spalte; $k++)
                {
                    $this->excel->getActiveSheet()->setCellValue($this->header[$k+2].$this->zeiger_zeile, $this->erhalten_wert($daten_zeichnen[$this->bentuk[$i][0]][$this->model[$j][0]][$k]));
                }
                $this->zeiger_zeile++;

                /*
                $this->excel->getActiveSheet()->setCellValue($this->header[0].$this->zeiger_zeile, "  ");
                $this->excel->getActiveSheet()->setCellValue($this->header[1].$this->zeiger_zeile, ("Data Individu ".$this->model[$j][2]));
                for($k = 0; $k<$this->insgesamt_spalte; $k++)
                {
                    $this->excel->getActiveSheet()->setCellValue($this->header[$k+2].$this->zeiger_zeile, $daten_zeichnen_kspo[$this->bentuk[$i][0]][$this->model[$j][0]][$k]);
                }
                $this->zeiger_zeile++;
                */
            }
            $zahler_bentuk++;
            if($i == (count($this->bentuk)/3) )
            {
                $this->excel->getActiveSheet()->setCellValue($this->header[0].$this->zeiger_zeile, "  ");
                $this->excel->getActiveSheet()->setCellValue($this->header[1].$this->zeiger_zeile, "Jumlah Primer");
                for($j = 0; $j < $this->insgesamt_spalte; $j++)
                {
                    $this->excel->getActiveSheet()->setCellValue($this->header[$j+2].$this->zeiger_zeile, $this->erhalten_wert($daten_insgesamt_von_bentuk_primer_und_sekunder[0][$j]));
                }
                $this->zeiger_zeile++;
                $zahler_bentuk = 0;
                continue;
            }
            else if($i === count($this->bentuk)-1)
            {
                $this->excel->getActiveSheet()->setCellValue($this->header[0].$this->zeiger_zeile, "  ");
                $this->excel->getActiveSheet()->setCellValue($this->header[1].$this->zeiger_zeile, "Jumlah Sekunder");
                for($j = 0; $j < $this->insgesamt_spalte; $j++)
                {
                    $this->excel->getActiveSheet()->setCellValue($this->header[$j+2].$this->zeiger_zeile, $this->erhalten_wert($daten_insgesamt_von_bentuk_primer_und_sekunder[1][$j]));
                }
                $this->zeiger_zeile++;
                $zahler_bentuk = 0;
                continue;
            }
        }
        $this->excel->getActiveSheet()->setCellValue($this->header[0].$this->zeiger_zeile, "  ");
        $this->excel->getActiveSheet()->setCellValue($this->header[1].$this->zeiger_zeile, "Jumlah Primer + Sekunder");
        for($j = 0; $j < $this->insgesamt_spalte; $j++)
        {
            $this->excel->getActiveSheet()->setCellValue($this->header[$j+2].$this->zeiger_zeile, $this->erhalten_wert(($daten_insgesamt_von_bentuk_primer_und_sekunder[0][$j] + $daten_insgesamt_von_bentuk_primer_und_sekunder[1][$j])));
        }
        $this->zeiger_zeile++;
        $zeiger = 0;
        foreach ($this->model as $model)
        {
            $this->excel->getActiveSheet()->setCellValue($this->header[0].$this->zeiger_zeile, $zeiger++);
            $this->excel->getActiveSheet()->setCellValue($this->header[1].$this->zeiger_zeile, $model[2]);
            for($j = 0; $j<$this->insgesamt_spalte; $j++)
            {
                $this->excel->getActiveSheet()->setCellValue($this->header[$j+2].$this->zeiger_zeile, $this->erhalten_wert($daten_insgesamt_von_insgesamt_primer_insgesamt_sekunder[$model[0]][$j]));
            }
            $this->zeiger_zeile++;
        }
    }
}
