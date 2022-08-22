<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 09/01/2016
 * Time: 11:30
 */
require_once standart_system_pfad.'server_skript/base/Bergmann.php';
class wahle_provinz_von_kabupaten_kota extends Bergmann
{
    private $id_kabupaten_kota;
    public function satz_id_kabupaten_kota($id_kabupaten_kota)
    {
        $this->id_kabupaten_kota = $id_kabupaten_kota;
    }
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
        if(isset($this->id_kabupaten_kota) && !empty($this->id_kabupaten_kota))
        {
            return true;
        }
        return false;
    }

    protected function vorbereiten_abfrage_und_parameter()
    {
        // TODO: Implement vorbereiten_abfrage_und_parameter() method.
        $this->abfrage = "SELECT tblpropinsi.IdPropinsi, tblpropinsi.Propinsi FROM tblkabupaten JOIN tblpropinsi ON tblkabupaten.IdPropinsi = tblpropinsi.IdPropinsi WHERE tblkabupaten.IdKabupaten = ?";
        $this->parameter = array($this->id_kabupaten_kota);
    }
    protected function ist_token_korrigieren() {
        return true;
    }
}