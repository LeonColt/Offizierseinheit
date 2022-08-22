<?php
require('server_skript/library/PDF/fpdf.php');
require_once 'pdf_daten_bergmann_nationalen.php';
class Base_pdf_schichten_nationalen extends FPDF
{
    private $jahr, $monat, $daten;
    const center = 'C';
    const left = 'L';
    const right = 'R';
    const bold = 'B';
    public function __construct($jahr, $monat, $orientation, $unit, $size)
    {
        parent::__construct($orientation, $unit, $size);
        $this->jahr = $jahr;
        $this->monat = $monat;
    }

    // Page header
    function Header()
    {
        $this->daten = new pdf_daten_bergmann_nationalen();
        $this->Image('bilder/garuda.png',68,8,15);
        $this->SetFont('Times','B',12);
        $this->Cell(80);
        $this->Cell(112,7,'REKAPITULASI USAHA SIMPAN PINJAM OLEH KOPERASI',0,1,'C');
        $this->Cell(0,7,'TAHUN '.$this->jahr.' BULAN '.($this->daten->ausgabe_erhalten_monat_fur_title($this->monat)),0,1,'C');
        $this->Cell(0,7,'Seluruh Indonesia',0,1,'C');
        $this->Ln(3);
    }
    // Page footer
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Times','I',8);
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
    
    function table()
    {
        $this->setx(1);
        $this->SetFont('Times','B',5);
        
        $this->Cell(8,4,'','LTR',0,'C',0);  // NO
        $this->Cell(27,4,'','LTR',0,'C',0);//KABUPATEN
        $this->Cell(15,4,'JUMLAH','LTR',0,'C',0);//JUMLAH KOPERASI
        $this->Cell(15,4,'JUMLAH','LTR',0,'C',0);//JUMLAH KOPERASI AKTIF
        $this->Cell(15,4,'JUMLAH','LTR',0,'C',0);//JUMLAH ANGGOTA
        $this->Cell(15,4,'MODAL','LTR',0,'C',0);//MODAL SENDIRI
        $this->Cell(15,4,'MODAL','LTR',0,'C',0);//MODAL PINJAMAN
        $this->Cell(20,4,'MODAL','LTR',0,'C',0);//MODAL PENYERTAAN
        $this->Cell(16,4,'NILAI ASET','LTR',0,'C',0);//NILAI ASET
        $this->Cell(16,4,'SIMPANAN','LTR',0,'C',0);//SIMPANAN DITERIMA
        $this->Cell(16,4,'PINJAMAN','LTR',0,'C',0);//PINJAMAN DIBERIKAN
        $this->Cell(14,4,'VOLUME','LTR',0,'C',0);//VOLUME USAHA
        $this->Cell(12,4,'','LTR',0,'C',0);//SHU
        $this->Cell(16,4,'yang','LTR',0,'C',0);//yang memiliki ijin usaha
        $this->Cell(12,4,'Telah','LTR',0,'C',0);//TELAH RAT
        $this->Cell(51,4,'telah dinilai oleh dinas','LTRB',0,'C',0);//telah dinilai oleh dinas
        $this->Cell(11,4,'belum','LTR',0,'C',0);//belum dinilai
        
        $this-> ln();
        
        $this->setx(1);
        $this->SetFont('Times','B',5);
        
        $this->Cell(8,4,'No','LR',0,'C',0);  // NO
        $this->Cell(27,4,'Kabupaten/Kota','LR',0,'C',0);//KABUPATEN
        $this->Cell(15,4,'Koperasi','LR',0,'C',0);//JUMLAH KOPERASI
        $this->Cell(15,4,'Koperasi','LR',0,'C',0);//JUMLAH KOPERASI AKTIF
        $this->Cell(15,4,'Anggota','LR',0,'C',0);//JUMLAH ANGGOTA
        $this->Cell(15,4,'SENDIRI','LR',0,'C',0);//MODAL SENDIRI
        $this->Cell(15,4,'PINJAMAN','LR',0,'C',0);//MODAL PINJAMAN
        $this->Cell(20,4,'PENYERTAAN','LR',0,'C',0);//MODAL PENYERTAAN
        $this->Cell(16,4,'(Rp.000)','LR',0,'C',0);//NILAI ASET
        $this->Cell(16,4,'DITERIMA','LR',0,'C',0);//SIMPANAN DITERIMA
        $this->Cell(16,4,'DIBERIKAN','LR',0,'C',0);//PINJAMAN DIBERIKAN
        $this->Cell(14,4,'USAHA','LR',0,'C',0);//VOLUME USAHA
        $this->Cell(12,4,'SHU','LR',0,'C',0);//SHU
        $this->Cell(16,4,'memiliki ijin','LR',0,'C',0);//yang memiliki ijin usaha
        $this->Cell(12,4,'RAT','LR',0,'C',0);//TELAH RAT
        $this->Cell(8,4,'sehat','LR',0,'C',0);//sehat
        $this->Cell(8,4,'cukup','LR',0,'C',0);//cukup sehat
        $this->Cell(9,4,'kurang','LR',0,'C',0);//kurang sehat
        $this->Cell(8,4,'tidak','LR',0,'C',0);//tidak sehat
        $this->Cell(9,4,'sangat','LR',0,'C',0);//sangat tidak sehat
        $this->Cell(9,4,'jumlah','LR',0,'C',0);//sangat tidak sehat
         $this->Cell(11,4,'dinilai','LR',0,'C',0);//belum dinilai
        
        $this-> ln();
        
        $this->setx(1);
        $this->SetFont('Times','B',5);
        
        $this->Cell(8,4,'','LR',0,'C',0); // NO
        $this->Cell(27,4,'','LR',0,'C',0);//KABUPATEN
        $this->Cell(15,4,'','LR',0,'C',0);//JUMLAH KOPERASI
        $this->Cell(15,4,'Aktif','LR',0,'C',0);//JUMLAH KOPERASI AKTIF
        $this->Cell(15,4,'','LR',0,'C',0);//JUMLAH ANGGOTA
        $this->Cell(15,4,'(Rp.000)','LR',0,'C',0);//MODAL SENDIRI
        $this->Cell(15,4,'(Rp.000)','LR',0,'C',0);//MODAL PINJAMAN
        $this->Cell(20,4,'(Rp.000)','LR',0,'C',0);//MODAL PENYERTAAN
        $this->Cell(16,4,'','LR',0,'C',0);//NILAI ASET
        $this->Cell(16,4,'(Rp.000)','LR',0,'C',0);//SIMPANAN DITERIMA
        $this->Cell(16,4,'(Rp.000)','LR',0,'C',0);//PINJAMAN DIBERIKAN
        $this->Cell(14,4,'','LR',0,'C',0);//VOLUME USAHA
        $this->Cell(12,4,'','LR',0,'C',0);//SHU
        $this->Cell(16,4,'usaha','LR',0,'C',0);//yang memiliki ijin usaha
        $this->Cell(12,4,'','LR',0,'C',0);//TELAH RAT
        $this->Cell(8,4,'','LR',0,'C',0);//sehat
        $this->Cell(8,4,'sehat','LR',0,'C',0);//cukup sehat
        $this->Cell(9,4,'sehat','LR',0,'C',0);//kurang sehat
        $this->Cell(8,4,'sehat','LR',0,'C',0);//tidak sehat
        $this->Cell(9,4,'tidak','LR',0,'C',0);//sangat tidak sehat
        $this->Cell(9,4,'','LR',0,'C',0);//sangat tidak sehat
        $this->Cell(11,4,'','LR',0,'C',0);//belum dinilai

        $this-> ln();


        $this->daten = $this->daten->ausfuhren();

        foreach($this->daten as $temp)
        {
            $this->setx(1);
            $this->SetFont('Times','',3.5);

            $this->Cell(8,4,$temp[0],'LRBT',0,'C',0); // NO
            $this->Cell(27,4,$temp[1],'LRBT',0,'L',0);//KABUPATEN
            $this->Cell(15,4,$temp[2],'LRBT',0,'C',0);//JUMLAH KOPERASI
            $this->Cell(15,4,$temp[3],'LRBT',0,'C',0);//JUMLAH KOPERASI AKTIF
            $this->Cell(15,4,$temp[4],'LRBT',0,'C',0);//JUMLAH ANGGOTA
            $this->Cell(15,4,$temp[5],'LRBT',0,'C',0);//MODAL SENDIRI
            $this->Cell(15,4,$temp[6],'LRBT',0,'C',0);//MODAL PINJAMAN
            $this->Cell(20,4,$temp[7],'LRBT',0,'C',0);//MODAL PENYERTAAN
            $this->Cell(16,4,$temp[8],'LRBT',0,'C',0);//NILAI ASET
            $this->Cell(16,4,$temp[9],'LRBT',0,'C',0);//SIMPANAN DITERIMA
            $this->Cell(16,4,$temp[10],'LRBT',0,'C',0);//PINJAMAN DIBERIKAN
            $this->Cell(14,4,$temp[11],'LRBT',0,'C',0);//VOLUME USAHA
            $this->Cell(12,4,$temp[12],'LRBT',0,'C',0);//SHU
            $this->Cell(16,4,$temp[13],'LRBT',0,'C',0);//yang memiliki ijin usaha
            $this->Cell(12,4,$temp[14],'LRBT',0,'C',0);//TelahRAT
            $this->Cell(8,4,$temp[15],'LRBT',0,'C',0);//sehat
            $this->Cell(8,4,$temp[16],'LRBT',0,'C',0);//cukup sehat
            $this->Cell(9,4,$temp[17],'LRBT',0,'C',0);//kurang sehat
            $this->Cell(8,4,$temp[18],'LRBT',0,'C',0);//tidak sehat
            $this->Cell(9,4,$temp[19],'LRBT',0,'C',0);//sangat tidak sehat
            $this->Cell(9,4,$temp[20],'LRBT',0,'C',0);//sangat tidak sehat
            $this->Cell(11,4,$temp[21],'LRBT',0,'C',0);//belom dinilai

            $this->ln();
        }
    }
}