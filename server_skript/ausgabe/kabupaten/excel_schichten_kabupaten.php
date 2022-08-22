<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 13/12/2015
 * Time: 18:07
 */
require_once standart_system_pfad.'server_skript/ausgabe/kabupaten/Base_ausgabe_kabupaten.php';
require_once standart_system_pfad.'server_skript/ausgabe/Interface_excel_schichten.php';
require_once standart_system_pfad.'server_skript/library/Excel/PHPExcel.php';
class excel_schichten_kabupaten extends Base_ausgabe_kabupaten implements Interface_excel_schichten
{
    private $header = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K",
        "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X"), $zeiger_zeile, $beginnen_zeile;
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Jakarta");
        error_reporting(E_ALL);
        $this->excel = new PHPExcel();
        $this->excel->getProperties()->setCreator("satgas");
        $this->excel->getProperties()->setTitle('REKAPITULASI '.htmlentities(filter_input(INPUT_GET, ausgabe_parameter_model_zeichenfolge)).' PRIMER DAN SEKUNDER PROPINSI '.htmlentities(filter_input(INPUT_GET, ausgabe_parameter_provinz_zeichenfolge)).' BERDASARKAN KABUPATEN/KOTA POSISI TAHUN '.filter_input(INPUT_GET, ausgabe_jahr).' Bulan '.$this->ausgabe_erhalten_monat_fur_title(filter_input(INPUT_GET, ausgabe_monat)));
        $this->zeiger_zeile = 1;
        $this->beginnen_zeile = $this->zeiger_zeile;
    }

    protected function zeichnen_daten()
    {
        // TODO: Implement zeichnen_daten() method.
        $daten_zeichnen = $this->zuordnung_daten();
        $daten_insgesamt_von_kabupaten = $this->berechne_insgesamt_von_kabupaten($daten_zeichnen);
        $daten_insgesamt = $this->berechne_insgesamt($daten_insgesamt_von_kabupaten);
        $daten_insgesamt_von_bentuk = $this->berechne_insgesamt_von_bentuk($daten_zeichnen);
        $zeiger = 1;
        for($i = 0; $i<count($this->kabupaten); $i++)
        {
            $this->excel->getActiveSheet()->setCellValue($this->header[0].$this->zeiger_zeile, ($zeiger++));
            $this->excel->getActiveSheet()->setCellValue($this->header[1].$this->zeiger_zeile, $this->kabupaten[$i][2]);
            for($j = 0; $j<$this->insgesamt_spalte; $j++)
            {
                $this->excel->getActiveSheet()->setCellValue($this->header[$j+2].$this->zeiger_zeile, $this->erhalten_wert($daten_insgesamt_von_kabupaten[$this->kabupaten[$i][1]][$j]));
            }
            $this->zeiger_zeile++;
            for($j = 0; $j<count($this->bentuk); $j++)
            {
                $this->excel->getActiveSheet()->setCellValue($this->header[0].$this->zeiger_zeile, '  ');
                $this->excel->getActiveSheet()->setCellValue($this->header[1].$this->zeiger_zeile, $this->bentuk[$j][1]);
                for($k = 0; $k<$this->insgesamt_spalte; $k++)
                {
                    $this->excel->getActiveSheet()->setCellValue($this->header[$k+2].$this->zeiger_zeile, $this->erhalten_wert($daten_zeichnen[$this->kabupaten[$i][1]][$this->bentuk[$j][0]][$k]));
                }
                $this->zeiger_zeile++;
            }
        }
        $this->excel->getActiveSheet()->setCellValue($this->header[0].$this->zeiger_zeile, $zeiger);
        $this->excel->getActiveSheet()->setCellValue($this->header[1].$this->zeiger_zeile, 'Jumlah Total');
        for($k = 0; $k<$this->insgesamt_spalte; $k++)
        {
            $this->excel->getActiveSheet()->setCellValue($this->header[$k+2].$this->zeiger_zeile, $this->erhalten_wert($daten_insgesamt[$k]));
        }
        $this->zeiger_zeile++;
        for($i = 0; $i<count($this->bentuk); $i++)
        {
            $this->excel->getActiveSheet()->setCellValue($this->header[0].$this->zeiger_zeile, ' ');
            $this->excel->getActiveSheet()->setCellValue($this->header[1].$this->zeiger_zeile, $this->bentuk[$i][1]);
            for($k = 0; $k<$this->insgesamt_spalte; $k++)
            {
                $this->excel->getActiveSheet()->setCellValue($this->header[$k+2].$this->zeiger_zeile, $this->erhalten_wert($daten_insgesamt_von_bentuk[$this->bentuk[$i][0]][$k]));
            }
            $this->zeiger_zeile++;
        }
    }

    public function ausfuhren()
    {
        // TODO: Implement ausfuhren() method.
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
        header('Content-Disposition: attachment;filename="REKAPITULASI '.htmlentities(filter_input(INPUT_GET, ausgabe_parameter_model_zeichenfolge)).' PRIMER DAN SEKUNDER PROPINSI '.htmlentities(filter_input(INPUT_GET, ausgabe_parameter_provinz_zeichenfolge)).' BERDASARKAN KABUPATEN/KOTA POSISI TAHUN '.filter_input(INPUT_GET, ausgabe_jahr).' BULAN '.$this->ausgabe_erhalten_monat_fur_title(filter_input(INPUT_GET, ausgabe_monat)).'.xlsx"');
        header("Cache-Control: max-age=0");
        header("Content-Transfer-Encoding: binary ");
        $writer->save('php://output');
    }

    public function satz_header()
    {
        // TODO: Implement satz_header() method.
        $this->excel->setActiveSheetIndex(0);
        $this->excel->getActiveSheet()->SetCellValue('H'.$this->zeiger_zeile++, 'REKAPITULASI '.htmlentities(filter_input(INPUT_GET, ausgabe_parameter_model_zeichenfolge)));
        $this->excel->getActiveSheet()->setCellValue('I'.$this->zeiger_zeile++, 'PRIMER DAN SEKUNDER NASIONAL');
        $this->excel->getActiveSheet()->setCellValue('I'.$this->zeiger_zeile++, 'PROPINSI '.htmlentities(filter_input(INPUT_GET, ausgabe_parameter_provinz_zeichenfolge)));
        $this->excel->getActiveSheet()->setCellValue('I'.$this->zeiger_zeile++, 'BERDASARKAN KABUPATEN/KOTA');
        $this->excel->getActiveSheet()->SetCellValue('I'.$this->zeiger_zeile++, 'POSISI TAHUN '.filter_input(INPUT_GET, ausgabe_jahr).' BULAN '.$this->ausgabe_erhalten_monat_fur_title(filter_input(INPUT_GET, ausgabe_monat)));
        $this->zeiger_zeile++;
        $this->zeiger_zeile++;
        $this->beginnen_zeile = $this->zeiger_zeile;
        $this->excel->getActiveSheet()->SetCellValue($this->header[0].$this->zeiger_zeile, 'No');
        $this->excel->getActiveSheet()->SetCellValue($this->header[1].$this->zeiger_zeile, 'Kabupaten/Kota');
        $this->excel->getActiveSheet()->SetCellValue($this->header[2].$this->zeiger_zeile, 'Jumlah Koperasi');
        $this->excel->getActiveSheet()->SetCellValue($this->header[3].$this->zeiger_zeile, 'Jumlah Koperasi Aktif');
        $this->excel->getActiveSheet()->SetCellValue($this->header[4].$this->zeiger_zeile, 'Jumlah Anggota Pria');
        $this->excel->getActiveSheet()->SetCellValue($this->header[5].$this->zeiger_zeile, 'Jumlah Anggota Wanita');
        $this->excel->getActiveSheet()->SetCellValue($this->header[6].$this->zeiger_zeile, 'Total Jumlah Anggota');
        $this->excel->getActiveSheet()->SetCellValue($this->header[7].$this->zeiger_zeile, 'Modal Sendiri');
        $this->excel->getActiveSheet()->SetCellValue($this->header[8].$this->zeiger_zeile, 'Modal Pinjaman');
        $this->excel->getActiveSheet()->SetCellValue($this->header[9].$this->zeiger_zeile, 'Modal Penyertaan');
        $this->excel->getActiveSheet()->SetCellValue($this->header[10].$this->zeiger_zeile, 'Nilai Aset');
        $this->excel->getActiveSheet()->SetCellValue($this->header[11].$this->zeiger_zeile, 'Simpanan Diterima');
        $this->excel->getActiveSheet()->SetCellValue($this->header[12].$this->zeiger_zeile, 'Pinjaman Diberikan');
        $this->excel->getActiveSheet()->SetCellValue($this->header[13].$this->zeiger_zeile, 'Volume Usaha');
        $this->excel->getActiveSheet()->SetCellValue($this->header[14].$this->zeiger_zeile, 'SHU');
        $this->excel->getActiveSheet()->SetCellValue($this->header[15].$this->zeiger_zeile, 'yang memiliki ijin usaha');
        $this->excel->getActiveSheet()->SetCellValue($this->header[16].$this->zeiger_zeile, 'Telah RAT');
        $this->excel->getActiveSheet()->SetCellValue($this->header[17].$this->zeiger_zeile, 'telah dinilai oleh dinas');
        $this->excel->getActiveSheet()->SetCellValue($this->header[23].$this->zeiger_zeile, 'Belum Dinilai');
        for($i = 0; $i<17; $i++)
        {
            $this->excel->getActiveSheet()->mergeCells($this->header[$i].$this->zeiger_zeile.':'.$this->header[$i].($this->zeiger_zeile+1));
        }
        $this->excel->getActiveSheet()->mergeCells($this->header[17].$this->zeiger_zeile.':'.$this->header[22].$this->zeiger_zeile);
        $this->excel->getActiveSheet()->mergeCells($this->header[23].$this->zeiger_zeile.':'.$this->header[23].($this->zeiger_zeile+1));
        $this->zeiger_zeile++;
        $this->excel->getActiveSheet()->SetCellValue($this->header[17].$this->zeiger_zeile, 'Sehat');
        $this->excel->getActiveSheet()->SetCellValue($this->header[18].$this->zeiger_zeile, 'Cukup Sehat');
        $this->excel->getActiveSheet()->SetCellValue($this->header[19].$this->zeiger_zeile, 'Kurang Sehat');
        $this->excel->getActiveSheet()->SetCellValue($this->header[20].$this->zeiger_zeile, 'Tidak Sehat');
        $this->excel->getActiveSheet()->SetCellValue($this->header[21].$this->zeiger_zeile, 'Sangat Tidak Sehat');
        $this->excel->getActiveSheet()->SetCellValue($this->header[22].$this->zeiger_zeile, 'Jumlah');
        $this->zeiger_zeile++;
    }

    public function zeichnen_grenze()
    {
        // TODO: Implement zeichnen_grenze() method.
        $styleArray = array(
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN
                )
            )
        );
        $this->excel->getActiveSheet()->getStyle($this->header[0].$this->beginnen_zeile.':'.$this->header[23].($this->zeiger_zeile-1))->applyFromArray($styleArray);
        unset($styleArray);
    }

    public function satz_auto_spalte_breite()
    {
        // TODO: Implement satz_auto_spalte_breite() method.
        $this->excel->getActiveSheet()->getColumnDimension($this->header[0])->setWidth(3);
        $this->excel->getActiveSheet()->getColumnDimension($this->header[1])->setWidth(25);
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
        $this->excel->getActiveSheet()->getColumnDimension($this->header[22])->setWidth(15);
        $this->excel->getActiveSheet()->getColumnDimension($this->header[23])->setWidth(15);
    }
}