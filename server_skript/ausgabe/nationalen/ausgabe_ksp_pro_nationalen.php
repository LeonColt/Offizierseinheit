<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 26/12/2015
 * Time: 19:24
 */
class ausgabe_ksp_pro_nationalen extends Bergmann
{
    public function erhalten_daten()
    {
        // TODO: Implement erhalten_daten() method.
        return $this->ergebnis;
    }

    protected function daten_leere()
    {
        // TODO: Implement daten_leere() method.
    }

    protected function daten_uberprufen()
    {
        // TODO: Implement daten_uberprufen() method.
        if(!$this->ist_null(filter_input(INPUT_GET, ausgabe_jahr), filter_input(INPUT_GET, ausgabe_monat)))
        {
            return true;
        }
        return false;
    }

    protected function vorbereiten_abfrage_und_parameter()
    {
        // TODO: Implement vorbereiten_abfrage_und_parameter() method.
        $this->abfrage = 'SELECT
IdBentukKoperasi,
BentukKoperasi,
IdModelKoperasi,
ModelKoperasi,
jumlah_koperasi,
jumlah_koperasi_aktif,
jumlah_anggota,
modal_sendiri,
modal_pinjaman,
modal_penyertaan,
aset,
simpanan_diterima,
pinjaman_diberikan,
volume_usaha,
shu,
yang_memiliki_ijin_usaha,
jumlah_yang_telah_rat,
sehat,
cukup_sehat,
kurang_sehat,
tidak_sehat,
sangat_tidak_sehat,
sehat+cukup_sehat+kurang_sehat+tidak_sehat+sangat_tidak_sehat AS jumlah_kesehatan,
(CAST(jumlah_koperasi AS SIGNED)-CAST((sehat+cukup_sehat+kurang_sehat+tidak_sehat+sangat_tidak_sehat) AS SIGNED)) as belum_dinilai
FROM

(SELECT DISTINCT
'.kspo_daten_bank_name.'.tbllistbentukkoperasi.IdBentukKoperasi,
'.kspo_daten_bank_name.'.tbllistbentukkoperasi.BentukKoperasi,
'.kspo_daten_bank_name.'.tbllistmodelkoperasi.IdModelKoperasi,
'.kspo_daten_bank_name.'.tbllistmodelkoperasi.ModelKoperasi,


IFNULL((SELECT COUNT(IdKoperasi) FROM tblkoperasi WHERE tblkoperasi.CreatedDate < ?
AND tblkoperasi.IdModelKoperasi = '.kspo_daten_bank_name.'.tbllistmodelkoperasi.IdModelKoperasi
AND tblkoperasi.IdBentukKoperasi = '.kspo_daten_bank_name.'.tbllistbentukkoperasi.IdBentukKoperasi), 0) AS jumlah_koperasi,


 IFNULL((SELECT COUNT(IdKoperasi) FROM tblkoperasi WHERE tblkoperasi.CreatedDate < ?
 AND tblkoperasi.IdModelKoperasi = '.kspo_daten_bank_name.'.tbllistmodelkoperasi.IdModelKoperasi
 AND tblkoperasi.IdBentukKoperasi = '.kspo_daten_bank_name.'.tbllistbentukkoperasi.IdBentukKoperasi
 AND tblkoperasi.Aktif = 1), 0) AS jumlah_koperasi_aktif,


IFNULL((SELECT SUM('.kspo_daten_bank_name.'.tblindikatorkelembagaan.AnggotaP) + SUM('.kspo_daten_bank_name.'.tblindikatorkelembagaan.AnggotaL)
FROM tblkoperasi JOIN '.kspo_daten_bank_name.'.tblindikatorkelembagaan
ON tblkoperasi.IdKoperasi = '.kspo_daten_bank_name.'.tblindikatorkelembagaan.IdKoperasi
AND '.kspo_daten_bank_name.'.tblindikatorkelembagaan.Tahun = ?
WHERE tblkoperasi.IdModelKoperasi = '.kspo_daten_bank_name.'.tbllistmodelkoperasi.IdModelKoperasi
AND tblkoperasi.IdBentukKoperasi = '.kspo_daten_bank_name.'.tbllistbentukkoperasi.IdBentukKoperasi),0) AS jumlah_anggota,


 IFNULL((SELECT SUM(tblindikatorusahadetail.ModalSendiri) FROM tblkoperasi JOIN tblindikatorusahadetail
 ON tblkoperasi.IdKoperasi = tblindikatorusahadetail.IdKoperasi
 AND tblindikatorusahadetail.Tahun = ?
 WHERE tblkoperasi.IdModelKoperasi = '.kspo_daten_bank_name.'.tbllistmodelkoperasi.IdModelKoperasi
 AND tblkoperasi.IdBentukKoperasi = '.kspo_daten_bank_name.'.tbllistbentukkoperasi.IdBentukKoperasi), 0) AS modal_sendiri,


 IFNULL((SELECT SUM(tblindikatorusahadetail.ModalLuar) FROM tblkoperasi JOIN tblindikatorusahadetail
 ON tblkoperasi.IdKoperasi = tblindikatorusahadetail.IdKoperasi AND tblindikatorusahadetail.Tahun = ?
 WHERE tblkoperasi.IdModelKoperasi = '.kspo_daten_bank_name.'.tbllistmodelkoperasi.IdModelKoperasi
 AND tblkoperasi.IdBentukKoperasi = '.kspo_daten_bank_name.'.tbllistbentukkoperasi.IdBentukKoperasi),0) AS modal_pinjaman,

 IFNULL((SELECT SUM(tblindikatorusahadetail.ModalPenyertaan) FROM tblkoperasi JOIN tblindikatorusahadetail
 ON tblkoperasi.IdKoperasi = tblindikatorusahadetail.IdKoperasi AND tblindikatorusahadetail.Tahun = ?
 WHERE tblkoperasi.IdModelKoperasi = '.kspo_daten_bank_name.'.tbllistmodelkoperasi.IdModelKoperasi
 AND tblkoperasi.IdBentukKoperasi = '.kspo_daten_bank_name.'.tbllistbentukkoperasi.IdBentukKoperasi),0) AS modal_penyertaan,

 IFNULL((SELECT SUM(tblindikatorusahadetail.Asset) FROM tblkoperasi JOIN tblindikatorusahadetail
 ON tblkoperasi.IdKoperasi = tblindikatorusahadetail.IdKoperasi AND tblindikatorusahadetail.Tahun = ?
 WHERE tblkoperasi.IdModelKoperasi = '.kspo_daten_bank_name.'.tbllistmodelkoperasi.IdModelKoperasi
 AND tblkoperasi.IdBentukKoperasi = '.kspo_daten_bank_name.'.tbllistbentukkoperasi.IdBentukKoperasi), 0) AS aset,


 IFNULL((SELECT SUM(tblindikatorsimpanan.SimpananAnggota) + SUM(tblindikatorsimpanan.SimpananBukanAnggota)
 FROM tblkoperasi JOIN tblindikatorsimpanan ON tblkoperasi.IdKoperasi = tblindikatorsimpanan.IdKoperasi
 AND tblindikatorsimpanan.Tahun = ? WHERE tblkoperasi.IdModelKoperasi =
 '.kspo_daten_bank_name.'.tbllistmodelkoperasi.IdModelKoperasi
 AND tblkoperasi.IdBentukKoperasi = '.kspo_daten_bank_name.'.tbllistbentukkoperasi.IdBentukKoperasi),0) AS simpanan_diterima,

 IFNULL((SELECT SUM(tblindikatorpinjaman.PinjamanLancar) + SUM(tblindikatorpinjaman.PinjamanKurangLancar) +
 SUM(tblindikatorpinjaman.PinjamanDiragukan) + SUM(tblindikatorpinjaman.PinjamanMacet)
 FROM tblkoperasi JOIN tblindikatorpinjaman ON tblkoperasi.IdKoperasi = tblindikatorpinjaman.IdKoperasi
 AND tblindikatorpinjaman.Tahun = ? WHERE tblkoperasi.IdModelKoperasi =
 '.kspo_daten_bank_name.'.tbllistmodelkoperasi.IdModelKoperasi AND tblkoperasi.IdBentukKoperasi =
 '.kspo_daten_bank_name.'.tbllistbentukkoperasi.IdBentukKoperasi),0) AS pinjaman_diberikan,

 IFNULL((SELECT SUM(tblindikatorusahadetail.VolumeUsaha)
 FROM tblkoperasi JOIN tblindikatorusahadetail ON tblkoperasi.IdKoperasi = tblindikatorusahadetail.IdKoperasi
 AND tblindikatorusahadetail.Tahun = ? WHERE tblkoperasi.IdModelKoperasi =
 '.kspo_daten_bank_name.'.tbllistmodelkoperasi.IdModelKoperasi
 AND tblkoperasi.IdBentukKoperasi = '.kspo_daten_bank_name.'.tbllistbentukkoperasi.IdBentukKoperasi),0) AS volume_usaha,

 IFNULL((SELECT SUM(tblindikatorusahadetail.SisaHasilUsaha) FROM tblkoperasi JOIN tblindikatorusahadetail
 ON tblkoperasi.IdKoperasi = tblindikatorusahadetail.IdKoperasi AND tblindikatorusahadetail.Tahun = ?
 WHERE tblkoperasi.IdModelKoperasi = '.kspo_daten_bank_name.'.tbllistmodelkoperasi.IdModelKoperasi
 AND tblkoperasi.IdBentukKoperasi = '.kspo_daten_bank_name.'.tbllistbentukkoperasi.IdBentukKoperasi),0) AS shu,


 IFNULL((SELECT COUNT(IdKoperasi) FROM tblkoperasi WHERE CreatedDate < ?
 AND tblkoperasi.IdModelKoperasi = '.kspo_daten_bank_name.'.tbllistmodelkoperasi.IdModelKoperasi
 AND tblkoperasi.IdBentukKoperasi = '.kspo_daten_bank_name.'.tbllistbentukkoperasi.IdBentukKoperasi),0)
 AS yang_memiliki_ijin_usaha,

 IFNULL((SELECT COUNT(tblindikatorkelembagaan.IdKoperasi) FROM tblkoperasi JOIN tblindikatorkelembagaan
 ON tblkoperasi.IdKoperasi = tblindikatorkelembagaan.IdKoperasi AND tblindikatorkelembagaan.Tahun = ?
 WHERE tblkoperasi.IdModelKoperasi = '.kspo_daten_bank_name.'.tbllistmodelkoperasi.IdModelKoperasi
 AND tblkoperasi.IdBentukKoperasi = '.kspo_daten_bank_name.'.tbllistbentukkoperasi.IdBentukKoperasi
 AND TanggalRat IS NOT NULL AND TanggalRat != \'0000-00-00 00:00:00\'),0) AS jumlah_yang_telah_rat,


 IFNULL((SELECT COUNT(tblindikatorpemeringkatan.IdKoperasi) FROM tblkoperasi JOIN tblindikatorpemeringkatan
 ON tblkoperasi.IdKoperasi = tblindikatorpemeringkatan.IdKoperasi AND Tahun = ?
 WHERE tblkoperasi.IdModelKoperasi = '.kspo_daten_bank_name.'.tbllistmodelkoperasi.IdModelKoperasi
 AND tblkoperasi.IdBentukKoperasi = '.kspo_daten_bank_name.'.tbllistbentukkoperasi.IdBentukKoperasi
 AND IdKesehatanKoperasi = 1),0) AS sehat,

 IFNULL((SELECT COUNT(tblindikatorpemeringkatan.IdKoperasi) FROM tblkoperasi JOIN tblindikatorpemeringkatan
 ON tblkoperasi.IdKoperasi = tblindikatorpemeringkatan.IdKoperasi AND Tahun = ?
 WHERE tblkoperasi.IdModelKoperasi = '.kspo_daten_bank_name.'.tbllistmodelkoperasi.IdModelKoperasi
 AND tblkoperasi.IdBentukKoperasi = '.kspo_daten_bank_name.'.tbllistbentukkoperasi.IdBentukKoperasi
 AND IdKesehatanKoperasi = 2),0) AS cukup_sehat,

 IFNULL((SELECT COUNT(tblindikatorpemeringkatan.IdKoperasi) FROM tblkoperasi JOIN tblindikatorpemeringkatan
 ON tblkoperasi.IdKoperasi = tblindikatorpemeringkatan.IdKoperasi AND Tahun = ?
 WHERE tblkoperasi.IdModelKoperasi = '.kspo_daten_bank_name.'.tbllistmodelkoperasi.IdModelKoperasi
 AND tblkoperasi.IdBentukKoperasi = '.kspo_daten_bank_name.'.tbllistbentukkoperasi.IdBentukKoperasi
 AND IdKesehatanKoperasi = 3),0) AS kurang_sehat,

 IFNULL((SELECT COUNT(tblindikatorpemeringkatan.IdKoperasi) FROM tblkoperasi JOIN tblindikatorpemeringkatan
 ON tblkoperasi.IdKoperasi = tblindikatorpemeringkatan.IdKoperasi AND Tahun = ?
 WHERE tblkoperasi.IdModelKoperasi = '.kspo_daten_bank_name.'.tbllistmodelkoperasi.IdModelKoperasi
 AND tblkoperasi.IdBentukKoperasi = '.kspo_daten_bank_name.'.tbllistbentukkoperasi.IdBentukKoperasi
 AND IdKesehatanKoperasi = 4),0) AS tidak_sehat,

 IFNULL((SELECT COUNT(tblindikatorpemeringkatan.IdKoperasi) FROM tblkoperasi JOIN tblindikatorpemeringkatan
 ON tblkoperasi.IdKoperasi = tblindikatorpemeringkatan.IdKoperasi AND Tahun = ?
 WHERE tblkoperasi.IdModelKoperasi = '.kspo_daten_bank_name.'.tbllistmodelkoperasi.IdModelKoperasi
 AND tblkoperasi.IdBentukKoperasi = '.kspo_daten_bank_name.'.tbllistbentukkoperasi.IdBentukKoperasi
 AND IdKesehatanKoperasi = 5),0) AS sangat_tidak_sehat


FROM tblkoperasi
RIGHT JOIN '.kspo_daten_bank_name.'.tbllistmodelkoperasi
ON tblkoperasi.IdModelKoperasi = '.kspo_daten_bank_name.'.tbllistmodelkoperasi.IdModelKoperasi
RIGHT JOIN '.kspo_daten_bank_name.'.tbllistbentukkoperasi
ON tblkoperasi.IdBentukKoperasi = '.kspo_daten_bank_name.'.tbllistbentukkoperasi.IdBentukKoperasi
ORDER BY '.kspo_daten_bank_name.'.tbllistbentukkoperasi.IdBentukKoperasi,
'.kspo_daten_bank_name.'.tbllistmodelkoperasi.IdModelKoperasi) AS ausgabe_nasional';
        $temp = array(filter_input(INPUT_GET, ausgabe_jahr), filter_input(INPUT_GET, ausgabe_monat), "00");
        $temp = implode("-", $temp);
        $jahr = filter_input(INPUT_GET, ausgabe_jahr);
        $this->parameter = array($temp, $temp, $jahr, $jahr, $jahr, $jahr,
            $jahr, $jahr, $jahr, $jahr, $jahr, $temp, $jahr, $jahr, $jahr, $jahr, $jahr, $jahr);
    }
    protected function ist_token_korrigieren()
    {
        return true;
    }
}