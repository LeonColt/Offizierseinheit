<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 12/01/2016
 * Time: 11:19
 */
require_once standart_system_pfad.'server_skript/benutzer/wahle_allen_benutzer.php';
class wahle_allen_benutzer_von_kabupaten extends wahle_allen_benutzer
{
    private $kabupaten;
    protected function vorbereiten_abfrage_und_parameter()
    {
        // TODO: Implement vorbereiten_abfrage_und_parameter() method.
        $this->abfrage =  'SELECT
sg_user.id,
sg_user.username,
detail_sg_user.email,
jenis_user.jenis,
jenis_user.id_jenis,
CASE WHEN jenis_user.id_jenis = 3 THEN
(SELECT '.kspo_daten_bank_name.'.tblpropinsi.Propinsi FROM '.daten_bank_name.'.user_tingkat_provinsi JOIN '.kspo_daten_bank_name.'.tblpropinsi
 ON '.kspo_daten_bank_name.'.tblpropinsi.IdPropinsi = '.daten_bank_name.'.user_tingkat_provinsi.id_provinsi WHERE '.daten_bank_name.'.user_tingkat_provinsi.id = sg_user.id)
 ELSE
 (SELECT
'.kspo_daten_bank_name.'.tblpropinsi.Propinsi
  FROM '.daten_bank_name.'.user_tingkat_kabupaten_kota
  LEFT JOIN '.kspo_daten_bank_name.'.tblkabupaten ON  '.kspo_daten_bank_name.'.tblkabupaten.IdKabupaten = '.daten_bank_name.'.user_tingkat_kabupaten_kota.id_kabupaten_kota
  LEFT JOIN '.kspo_daten_bank_name.'.tblpropinsi ON  '.kspo_daten_bank_name.'.tblpropinsi.IdPropinsi = '.kspo_daten_bank_name.'.tblkabupaten.IdPropinsi
  WHERE '.daten_bank_name.'.user_tingkat_kabupaten_kota.id = sg_user.id)
 END AS provinsi,


(SELECT '.kspo_daten_bank_name.'.tblkabupaten.Kabupaten FROM '.daten_bank_name.'.user_tingkat_kabupaten_kota JOIN '.kspo_daten_bank_name.'.tblkabupaten ON  '.kspo_daten_bank_name.'.tblkabupaten.IdKabupaten = '.daten_bank_name.'.user_tingkat_kabupaten_kota.id_kabupaten_kota WHERE '.daten_bank_name.'.user_tingkat_kabupaten_kota.id = sg_user.id) AS kabupaten,
detail_sg_user.alamat,
detail_sg_user.no_telp,
detail_sg_user.no_fax,
detail_sg_user.path_picture,
CASE WHEN jenis_user.id_jenis = 3 THEN
(SELECT '.kspo_daten_bank_name.'.tblpropinsi.IdPropinsi FROM '.daten_bank_name.'.user_tingkat_provinsi JOIN '.kspo_daten_bank_name.'.tblpropinsi
 ON '.kspo_daten_bank_name.'.tblpropinsi.IdPropinsi = '.daten_bank_name.'.user_tingkat_provinsi.id_provinsi WHERE '.daten_bank_name.'.user_tingkat_provinsi.id = sg_user.id)
 ELSE
 (SELECT
'.kspo_daten_bank_name.'.tblpropinsi.IdPropinsi
  FROM '.daten_bank_name.'.user_tingkat_kabupaten_kota
  LEFT JOIN '.kspo_daten_bank_name.'.tblkabupaten ON  '.kspo_daten_bank_name.'.tblkabupaten.IdKabupaten = '.daten_bank_name.'.user_tingkat_kabupaten_kota.id_kabupaten_kota
  LEFT JOIN '.kspo_daten_bank_name.'.tblpropinsi ON  '.kspo_daten_bank_name.'.tblpropinsi.IdPropinsi = '.kspo_daten_bank_name.'.tblkabupaten.IdPropinsi
  WHERE '.daten_bank_name.'.user_tingkat_kabupaten_kota.id = sg_user.id)
 END AS id_provinsi,
 (SELECT '.kspo_daten_bank_name.'.tblkabupaten.IdKabupaten FROM '.daten_bank_name.'.user_tingkat_kabupaten_kota JOIN '.kspo_daten_bank_name.'.tblkabupaten ON  '.kspo_daten_bank_name.'.tblkabupaten.IdKabupaten = '.daten_bank_name.'.user_tingkat_kabupaten_kota.id_kabupaten_kota WHERE '.daten_bank_name.'.user_tingkat_kabupaten_kota.id = sg_user.id) AS id_kabupaten
FROM sg_user
LEFT JOIN jenis_user ON sg_user.id_jenis = jenis_user.id_jenis
LEFT JOIN detail_sg_user ON sg_user.id = detail_sg_user.id
JOIN user_tingkat_kabupaten_kota ON sg_user.id = user_tingkat_kabupaten_kota.id AND user_tingkat_kabupaten_kota.id_kabupaten_kota = ?
WHERE sg_user.id_jenis = 4  AND sg_user.active = 1
ORDER BY sg_user.id LIMIT '.$this->seite.', '.anzaigen_enstellung_benutzer_seite_max_zeile;
        $this->parameter = array($this->kabupaten);
    }
    public function satz_kabupaten($kabupaten)
    {
        $this->kabupaten = $kabupaten;
    }
}