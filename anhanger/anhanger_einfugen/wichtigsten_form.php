<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of wichtigsten_forn
 *
 * @author LC
 */
require_once 'form.php';
class wichtigsten_form {
    //put your code here
    private $form, $zeiger, $schlussel;
    public final function __construct($schlussel) {
        $this->form = new form();
        $this->zeiger = 0;
        $this->form->hinzufugen_zeile();
        $this->form->hinzufugen_zeile();
        $this->form->hinzufugen_zeile();
        $this->form->hinzufugen_zeile();
        $this->form->hinzufugen_zeile();
        $this->form->hinzufugen_zeile();
        $this->form->hinzufugen_zeile();
        $this->form->hinzufugen_zeile();
        $this->form->hinzufugen_zeile();
        $this->form->hinzufugen_zeile();
        $this->form->hinzufugen_zeile();
        $this->form->hinzufugen_zeile();
        $this->form->hinzufugen_zeile();
        $this->form->hinzufugen_zeile();
        $this->form->hinzufugen_zeile();
        $this->form->hinzufugen_zeile();
        $this->form->hinzufugen_zeile();
        $this->form->hinzufugen_zeile();
        $this->form->hinzufugen_zeile();
        $this->form->hinzufugen_zeile();
        $this->schlussel = $schlussel;
    }
    public final function karte()
    {
        echo '<div>';
        $this->zelie_eine();
        $this->zelie_zwei();
        $this->zelie_drei();
        $this->zelie_vier();
        $this->zelie_funf();
        $this->zelie_sechs();
        $this->zelie_sieben();
        $this->zelie_acht();
        $this->zelie_neun();
        $this->zelie_zehn();
        $this->form->karte();
        echo '</div>';
    }
    private final function zelie_eine()
    {
        $this->form->satz_zeiger($this->zeiger);
        $this->form->hizufuten_spalte(array('Jumlah Koperasi', '<input type="text" name="'.$this->schlussel.jumlah_koperasi.'" id="'.$this->schlussel.jumlah_koperasi.'"
                                    oninput="einfugen_berechne_gesund_vergleichen
                                    ('.$this->schlussel.jumlah_koperasi.'.id, '
                                        .$this->schlussel.jumlah_koperasi.'.id, '
                                        .$this->schlussel.jumlah_koperasi_aktif.'.id, '
                                        .$this->schlussel.telah_dinilai_kesehatannya.'.id, '
                                        .$this->schlussel.belum_dinilai.'.id, '
                                        .$this->schlussel.sehat.'.id , '
                                        .$this->schlussel.cukup_sehat.'.id, '
                                        .$this->schlussel.kurang_sehat.'.id, '
                                        .$this->schlussel.tidak_sehat.'.id, '
                                        .$this->schlussel.sangat_tidak_sehat.'.id, '
                                        .$this->schlussel.einfugen_ziel.jumlah_koperasi.'.id);" onfocus="satz_aktive_ziel(\''.bestellung_vergleichen_einfugen_insgesamt_koperasi.'\');">'));
        $this->form->satz_zeiger($this->zeiger);
        $this->form->hizufuten_spalte(array('Modal Sendiri', '<input type="text" name="'.$this->schlussel.modal_sendiri.'" id="'.$this->schlussel.modal_sendiri.'" oninput="einfugen_drei_punkt_vergleichen(this.id, '.$this->schlussel.einfugen_ziel.modal_sendiri.'.id);" onfocus="satz_aktive_ziel(\''.bestellung_vergleichen_einfugen_modal_sendiri.'\');">'));
        $this->form->satz_zeiger($this->zeiger);
        $this->form->hizufuten_spalte(array('Telah dinilai Kesehatanya', '<input type="text" name="'.$this->schlussel.telah_dinilai_kesehatannya.'" id="'.$this->schlussel.telah_dinilai_kesehatannya.'" readonly="readonly">'));
        
        $this->zeiger++;
        
        $this->form->satz_zeiger($this->zeiger);
        $this->form->hizufuten_spalte(array('&nbsp;', '<div id="'.$this->schlussel.einfugen_ziel.jumlah_koperasi.'">&nbsp;</div>'));
        $this->form->satz_zeiger($this->zeiger);
        $this->form->hizufuten_spalte(array('&nbsp;', '<div id="'.$this->schlussel.einfugen_ziel.modal_sendiri.'">&nbsp;</div>'));
        $this->form->satz_zeiger($this->zeiger);
        $this->form->hizufuten_spalte(array('&nbsp;', '<div id="'.$this->schlussel.einfugen_ziel.telah_dinilai_kesehatannya.'">&nbsp;</div>'));
        
        
        $this->zeiger++;
    }
    private final function zelie_zwei()
    {
        $this->form->satz_zeiger($this->zeiger);
        $this->form->hizufuten_spalte(array('Jumlah Koperasi Aktif', '<input type="text" name="'.$this->schlussel.jumlah_koperasi_aktif.'" id="'.$this->schlussel.jumlah_koperasi_aktif.'" oninput="einfugen_numerische_vergleichen(this.id, '.$this->schlussel.einfugen_ziel.jumlah_koperasi_aktif.'.id);" onfocus="satz_aktive_ziel(\''.bestellung_vergleichen_einfugen_insgesamt_koperasi_aktive.'\');">'));
        $this->form->satz_zeiger($this->zeiger);
        $this->form->hizufuten_spalte(array('Modal Pinjaman', '<input type="text" name="'.$this->schlussel.modal_pinjaman.'" id="'.$this->schlussel.modal_pinjaman.'"  oninput="einfugen_drei_punkt_vergleichen(this.id, '.$this->schlussel.einfugen_ziel.modal_pinjaman.'.id);" onfocus="satz_aktive_ziel(\''.bestellung_vergleichen_einfugen_modal_pinjaman.'\');">'));
        $this->form->satz_zeiger($this->zeiger);
        $this->form->hizufuten_spalte(array('Sehat', '<input type="text" name="'.$this->schlussel.sehat.'" id="'.$this->schlussel.sehat.'" 
                                                oninput="einfugen_berechne_gesund_vergleichen
                                    ('.$this->schlussel.sehat.'.id, '
                                        .$this->schlussel.jumlah_koperasi.'.id, '
                                        .$this->schlussel.jumlah_koperasi_aktif.'.id, '
                                        .$this->schlussel.telah_dinilai_kesehatannya.'.id, '
                                        .$this->schlussel.belum_dinilai.'.id, '
                                        .$this->schlussel.sehat.'.id , '
                                        .$this->schlussel.cukup_sehat.'.id, '
                                        .$this->schlussel.kurang_sehat.'.id, '
                                        .$this->schlussel.tidak_sehat.'.id, '
                                        .$this->schlussel.sangat_tidak_sehat.'.id, '
                                        .$this->schlussel.einfugen_ziel.sehat.'.id);" onfocus="satz_aktive_ziel(\''.bestellung_vergleichen_einfugen_sehat.'\')">'));
        
        $this->zeiger++;
        
        $this->form->satz_zeiger($this->zeiger);
        $this->form->hizufuten_spalte(array('&nbsp;', '<div id="'.$this->schlussel.einfugen_ziel.jumlah_koperasi_aktif.'">&nbsp;</div>'));
        $this->form->satz_zeiger($this->zeiger);
        $this->form->hizufuten_spalte(array('&nbsp;', '<div id="'.$this->schlussel.einfugen_ziel.modal_pinjaman.'">&nbsp;</div>'));
        $this->form->satz_zeiger($this->zeiger);
        $this->form->hizufuten_spalte(array('&nbsp;', '<div id="'.$this->schlussel.einfugen_ziel.sehat.'">&nbsp;</div>'));
        
        $this->zeiger++;
    }
    private final function zelie_drei()
    {
        $this->form->satz_zeiger($this->zeiger);
        $this->form->hizufuten_spalte(array('&nbsp;', '&nbsp;'));
        $this->form->satz_zeiger($this->zeiger);
        $this->form->hizufuten_spalte(array('Modal Penyertaan', '<input type="text" name="'.$this->schlussel.modal_penyertaan.'" id="'.$this->schlussel.modal_penyertaan.'" oninput="einfugen_drei_punkt_vergleichen(this.id, '.$this->schlussel.einfugen_ziel.modal_penyertaan.'.id);" onfocus="satz_aktive_ziel(\''.bestellung_vergleichen_einfugen_modal_penyertaan.'\');">'));
        $this->form->satz_zeiger($this->zeiger);
        $this->form->hizufuten_spalte(array('Cukup Sehat', '<input type="text" name="'.$this->schlussel.cukup_sehat.'" id="'.$this->schlussel.cukup_sehat.'" 
                                oninput="einfugen_berechne_gesund_vergleichen
                                    ('.$this->schlussel.cukup_sehat.'.id, '
                                        .$this->schlussel.jumlah_koperasi.'.id, '
                                        .$this->schlussel.jumlah_koperasi_aktif.'.id, '
                                        .$this->schlussel.telah_dinilai_kesehatannya.'.id, '
                                        .$this->schlussel.belum_dinilai.'.id, '
                                        .$this->schlussel.sehat.'.id , '
                                        .$this->schlussel.cukup_sehat.'.id, '
                                        .$this->schlussel.kurang_sehat.'.id, '
                                        .$this->schlussel.tidak_sehat.'.id, '
                                        .$this->schlussel.sangat_tidak_sehat.'.id, '
                                        .$this->schlussel.einfugen_ziel.cukup_sehat.'.id);" onfocus="satz_aktive_ziel(\''.bestellung_vergleichen_einfugen_cukup_sehat.'\');">'));
        
        $this->zeiger++;
        
        $this->form->satz_zeiger($this->zeiger);
        $this->form->hizufuten_spalte(array('&nbsp;', '&nbsp;'));
        $this->form->satz_zeiger($this->zeiger);
        $this->form->hizufuten_spalte(array('&nbsp;', '<div id="'.$this->schlussel.einfugen_ziel.modal_penyertaan.'">&nbsp;</div>'));
        $this->form->satz_zeiger($this->zeiger);
        $this->form->hizufuten_spalte(array('&nbsp;', '<div id="'.$this->schlussel.einfugen_ziel.cukup_sehat.'">&nbsp;</div>'));
        
        
        $this->zeiger++;
    }
    private final function zelie_vier()
    {
        $this->form->satz_zeiger($this->zeiger);
        $this->form->hizufuten_spalte(array('Jumlah Anggota Pria', '<input type="text" name="'.$this->schlussel.jumlah_anggota_pria.'" id="'.$this->schlussel.jumlah_anggota_pria.'" 
                                oninput="einfugen_berechne_links_rechts_vergleichen( '
                                                    .$this->schlussel.jumlah_anggota_pria.'.id, '
                                                    .$this->schlussel.total_jumlah_anggota.'.id, '
                                                    .$this->schlussel.jumlah_anggota_wanita.'.id, '
                                                    .$this->schlussel.jumlah_anggota_pria.'.id, '
                                                    .$this->schlussel.einfugen_ziel.jumlah_anggota_pria.'.id);" onfocus="satz_aktive_ziel(\''.bestellung_vergleichen_einfugen_jumlah_anggota_pria.'\');">'));
        $this->form->satz_zeiger($this->zeiger);
        $this->form->hizufuten_spalte(array('Aset', '<input type="text" name="'.$this->schlussel.asset.'" id="'.$this->schlussel.asset.'"  oninput="einfugen_drei_punkt_vergleichen(this.id, '.$this->schlussel.einfugen_ziel.asset.'.id);" onfocus="satz_aktive_ziel(\''.bestellung_vergleichen_einfugen_asset.'\');">'));
        $this->form->satz_zeiger($this->zeiger);
        $this->form->hizufuten_spalte(array('Kurang Sehat', '<input type="text" name="'.$this->schlussel.kurang_sehat.'" id="'.$this->schlussel.kurang_sehat.'" 
                                oninput="einfugen_berechne_gesund_vergleichen
                                    ('.$this->schlussel.kurang_sehat.'.id, '
                                        .$this->schlussel.jumlah_koperasi.'.id, '
                                        .$this->schlussel.jumlah_koperasi_aktif.'.id, '
                                        .$this->schlussel.telah_dinilai_kesehatannya.'.id, '
                                        .$this->schlussel.belum_dinilai.'.id, '
                                        .$this->schlussel.sehat.'.id , '
                                        .$this->schlussel.cukup_sehat.'.id, '
                                        .$this->schlussel.kurang_sehat.'.id, '
                                        .$this->schlussel.tidak_sehat.'.id, '
                                        .$this->schlussel.sangat_tidak_sehat.'.id, '
                                        .$this->schlussel.einfugen_ziel.kurang_sehat.'.id);" onfocus="satz_aktive_ziel(\''.bestellung_vergleichen_einfugen_kurang_sehat.'\');">'));
        
        $this->zeiger++;
        
        $this->form->satz_zeiger($this->zeiger);
        $this->form->hizufuten_spalte(array('&nbsp;', '<div id="'.$this->schlussel.einfugen_ziel.jumlah_anggota_pria.'">&nbsp;</div>'));
        $this->form->satz_zeiger($this->zeiger);
        $this->form->hizufuten_spalte(array('&nbsp;', '<div id="'.$this->schlussel.einfugen_ziel.asset.'">&nbsp;</div>'));
        $this->form->satz_zeiger($this->zeiger);
        $this->form->hizufuten_spalte(array('&nbsp;', '<div id="'.$this->schlussel.einfugen_ziel.kurang_sehat.'">&nbsp;</div>'));
        
        
        $this->zeiger++;
    }
    private final function zelie_funf()
    {
        $this->form->satz_zeiger($this->zeiger);
        $this->form->hizufuten_spalte(array('Jumlah Anggota Wanita', 
            '<input type="text" name="'.$this->schlussel.jumlah_anggota_wanita.'" id="'.$this->schlussel.jumlah_anggota_wanita.'" '
            . 'oninput="einfugen_berechne_links_rechts_vergleichen('
                                                    .$this->schlussel.jumlah_anggota_wanita.'.id, '
                                                    .$this->schlussel.total_jumlah_anggota.'.id, '
                                                    .$this->schlussel.jumlah_anggota_wanita.'.id, '
                                                    .$this->schlussel.jumlah_anggota_pria.'.id, '
                                                    .$this->schlussel.einfugen_ziel.jumlah_anggota_wanita.'.id);" onfocus="satz_aktive_ziel(\''.bestellung_vergleichen_einfugen_jumlah_anggota_wanita.'\');">'));
        $this->form->satz_zeiger($this->zeiger);
        $this->form->hizufuten_spalte(array('Simpanan Diterima', '<input type="text" name="'.$this->schlussel.simpanan_diterima.'" id="'.$this->schlussel.simpanan_diterima.'" oninput="einfugen_drei_punkt_vergleichen(this.id, '.$this->schlussel.einfugen_ziel.simpanan_diterima.'.id);" onfocus="satz_aktive_ziel(\''.bestellung_vergleichen_einfugen_simpanan_diterima.'\');">'));
        $this->form->satz_zeiger($this->zeiger);
        $this->form->hizufuten_spalte(array('Tidak Sehat', '<input type="text" name="'.$this->schlussel.tidak_sehat.'" id="'.$this->schlussel.tidak_sehat.'"
                                oninput="einfugen_berechne_gesund_vergleichen
                                    ('.$this->schlussel.tidak_sehat.'.id, '
                                        .$this->schlussel.jumlah_koperasi.'.id, '
                                        .$this->schlussel.jumlah_koperasi_aktif.'.id, '
                                        .$this->schlussel.telah_dinilai_kesehatannya.'.id, '
                                        .$this->schlussel.belum_dinilai.'.id, '
                                        .$this->schlussel.sehat.'.id, '
                                        .$this->schlussel.cukup_sehat.'.id, '
                                        .$this->schlussel.kurang_sehat.'.id, '
                                        .$this->schlussel.tidak_sehat.'.id, '
                                        .$this->schlussel.sangat_tidak_sehat.'.id, '
                                        .$this->schlussel.einfugen_ziel.tidak_sehat.'.id);" onfocus="satz_aktive_ziel(\''.bestellung_vergleichen_einfugen_tidak_sehat.'\');">'));
        
        $this->zeiger++;
        
        $this->form->satz_zeiger($this->zeiger);
        $this->form->hizufuten_spalte(array('&nbsp;', '<div id="'.$this->schlussel.einfugen_ziel.jumlah_anggota_wanita.'">&nbsp;</div>'));
        $this->form->satz_zeiger($this->zeiger);
        $this->form->hizufuten_spalte(array('&nbsp;', '<div id="'.$this->schlussel.einfugen_ziel.simpanan_diterima.'">&nbsp;</div>'));
        $this->form->satz_zeiger($this->zeiger);
        $this->form->hizufuten_spalte(array('&nbsp;', '<div id="'.$this->schlussel.einfugen_ziel.tidak_sehat.'">&nbsp;</div>'));
        
        
        $this->zeiger++;
    }
    private final function zelie_sechs()
    {
        $this->form->satz_zeiger($this->zeiger);
        $this->form->hizufuten_spalte(array('Total Jumlah Anggota', '<input type="text" name="'.$this->schlussel.total_jumlah_anggota.'" id="'.$this->schlussel.total_jumlah_anggota.'" readonly="readonly">'));
        $this->form->satz_zeiger($this->zeiger);
        $this->form->hizufuten_spalte(array('Pinjaman Diberikan', '<input type="text" name="'.$this->schlussel.pinjaman_diberikan.'" id="'.$this->schlussel.pinjaman_diberikan.'" oninput="einfugen_drei_punkt_vergleichen(this.id, '.$this->schlussel.einfugen_ziel.pinjaman_diberikan.'.id);" onfocus="satz_aktive_ziel(\''.bestellung_vergleichen_einfugen_pinjaman_diberikan.'\');">'));
        $this->form->satz_zeiger($this->zeiger);
        $this->form->hizufuten_spalte(array('Sangat Tidak Sehat', '<input type="text" name="'.$this->schlussel.sangat_tidak_sehat.'" id="'.$this->schlussel.sangat_tidak_sehat.'" 
                                oninput="einfugen_berechne_gesund_vergleichen
                                    ('.$this->schlussel.sangat_tidak_sehat.'.id, '
                                        .$this->schlussel.jumlah_koperasi.'.id, '
                                        .$this->schlussel.jumlah_koperasi_aktif.'.id, '
                                        .$this->schlussel.telah_dinilai_kesehatannya.'.id, '
                                        .$this->schlussel.belum_dinilai.'.id, '
                                        .$this->schlussel.sehat.'.id , '
                                        .$this->schlussel.cukup_sehat.'.id, '
                                        .$this->schlussel.kurang_sehat.'.id, '
                                        .$this->schlussel.tidak_sehat.'.id, '
                                        .$this->schlussel.sangat_tidak_sehat.'.id, '
                                        .$this->schlussel.einfugen_ziel.sangat_tidak_sehat.'.id);" onfocus="satz_aktive_ziel(\''.bestellung_vergleichen_einfugen_sangat_tidak_sehat.'\');">'));
        
        $this->zeiger++;
        
        $this->form->satz_zeiger($this->zeiger);
        $this->form->hizufuten_spalte(array('&nbsp;', '<div id="'.$this->schlussel.einfugen_ziel.total_jumlah_anggota.'">&nbsp;</div>'));
        $this->form->satz_zeiger($this->zeiger);
        $this->form->hizufuten_spalte(array('&nbsp;', '<div id="'.$this->schlussel.einfugen_ziel.pinjaman_diberikan.'">&nbsp;</div>'));
        $this->form->satz_zeiger($this->zeiger);
        $this->form->hizufuten_spalte(array('&nbsp;', '<div id="'.$this->schlussel.einfugen_ziel.sangat_tidak_sehat.'">&nbsp;</div>'));
        
        
        $this->zeiger++;
    }
    private final function zelie_sieben()
    {
        $this->form->satz_zeiger($this->zeiger);
        $this->form->hizufuten_spalte(array('&nbsp;', '&nbsp;'));
        $this->form->satz_zeiger($this->zeiger);
        $this->form->hizufuten_spalte(array('Volume Usaha', '<input type="text" name="'.$this->schlussel.volume_usaha.'" id="'.$this->schlussel.volume_usaha.'"  oninput="einfugen_drei_punkt_vergleichen(this.id, '.$this->schlussel.einfugen_ziel.volume_usaha.'.id);" onfocus="satz_aktive_ziel(\''.bestellung_vergleichen_einfugen_volume_usaha.'\');">'));
        $this->form->satz_zeiger($this->zeiger);
        $this->form->hizufuten_spalte(array('Tidak Dapat Dinilai', '<input type="text" name="'.$this->schlussel.tidak_dapat_dinilai.'" id="'.$this->schlussel.tidak_dapat_dinilai.'"  oninput="einfugen_numerische_vergleichen(this.id, '.$this->schlussel.einfugen_ziel.tidak_dapat_dinilai.'.id);" onfocus="satz_aktive_ziel(\''.bestellung_vergleichen_einfugen_tidak_dapat_dinilai.'\');">'));
        
        $this->zeiger++;
        
        $this->form->satz_zeiger($this->zeiger);
        $this->form->hizufuten_spalte(array('&nbsp;', '&nbsp;'));
        $this->form->satz_zeiger($this->zeiger);
        $this->form->hizufuten_spalte(array('&nbsp;', '<div id="'.$this->schlussel.einfugen_ziel.volume_usaha.'">&nbsp;</div>'));
        $this->form->satz_zeiger($this->zeiger);
        $this->form->hizufuten_spalte(array('&nbsp;', '<div id="'.$this->schlussel.einfugen_ziel.tidak_dapat_dinilai.'">&nbsp;</div>'));
        
        
        $this->zeiger++;
    }
    private final function zelie_acht()
    {
        $this->form->satz_zeiger($this->zeiger);
        $this->form->hizufuten_spalte(array('Jumlah Calon Anggota Pria', 
            '<input type="text" name="'.$this->schlussel.jumlah_calon_anggota_pria.'" id="'.$this->schlussel.jumlah_calon_anggota_pria.'" 
                                oninput="einfugen_berechne_links_rechts_vergleichen
                                                    ('.$this->schlussel.jumlah_calon_anggota_pria.'.id, '
                                                    .$this->schlussel.total_jumlah_calon_anggota.'.id, '
                                                    .$this->schlussel.jumlah_calon_anggota_wanita.'.id, '
                                                    .$this->schlussel.jumlah_calon_anggota_pria.'.id, '
                                                    .$this->schlussel.einfugen_ziel.jumlah_calon_anggota_pria.'.id);" onfocus="satz_aktive_ziel(\''.bestellung_vergleichen_einfugen_jumlah_calon_anggota_pria.'\');">'));
        $this->form->satz_zeiger($this->zeiger);
        $this->form->hizufuten_spalte(array('SHU', '<input type="text" name="'.$this->schlussel.shu.'" id="'.$this->schlussel.shu.'" oninput="einfugen_drei_punkt_vergleichen(this.id, '.$this->schlussel.einfugen_ziel.shu.'.id);" onfocus="satz_aktive_ziel(\''.bestellung_vergleichen_einfugen_shu.'\');">'));
        $this->form->satz_zeiger($this->zeiger);
        $this->form->hizufuten_spalte(array('Belum Dinilai', '<input type="text" id="'.$this->schlussel.belum_dinilai.'" readonly="readonly">'));
        
        $this->zeiger++;
        
        $this->form->satz_zeiger($this->zeiger);
        $this->form->hizufuten_spalte(array('&nbsp;', '<div id="'.$this->schlussel.einfugen_ziel.jumlah_calon_anggota_pria.'">&nbsp;</div>'));
        $this->form->satz_zeiger($this->zeiger);
        $this->form->hizufuten_spalte(array('&nbsp;', '<div id="'.$this->schlussel.einfugen_ziel.shu.'">&nbsp;</div>'));
        $this->form->satz_zeiger($this->zeiger);
        $this->form->hizufuten_spalte(array('&nbsp;', '<div id="'.$this->schlussel.einfugen_ziel.belum_dinilai.'">&nbsp;</div>'));
        
        
        $this->zeiger++;
    }
    private final function zelie_neun()
    {
        $this->form->satz_zeiger($this->zeiger);
        $this->form->hizufuten_spalte(array('Jumlah Calon Anggota Wanita', 
            '<input type="text" '
            . 'name="'.$this->schlussel.jumlah_calon_anggota_wanita.'" '
            . 'id="'.$this->schlussel.jumlah_calon_anggota_wanita.'" 
                oninput="einfugen_berechne_links_rechts_vergleichen
                ('.$this->schlussel.jumlah_calon_anggota_wanita.'.id, '
            .$this->schlussel.total_jumlah_calon_anggota.'.id, '
            .$this->schlussel.jumlah_calon_anggota_wanita.'.id, '
            .$this->schlussel.jumlah_calon_anggota_pria.'.id, '
            .$this->schlussel.einfugen_ziel.jumlah_calon_anggota_wanita.'.id);" onfocus="satz_aktive_ziel(\''.bestellung_vergleichen_einfugen_jumlah_calon_anggota_wanita.'\');">'));
        $this->form->satz_zeiger($this->zeiger);
        $this->form->hizufuten_spalte(array('Yang Memiliki Ijin Usaha', '<input type="text" name="'.$this->schlussel.yang_memiliki_ijin_usaha.'" id="'.$this->schlussel.yang_memiliki_ijin_usaha.'" oninput="einfugen_numerische_vergleichen(this.id, '.$this->schlussel.einfugen_ziel.yang_memiliki_ijin_usaha.'.id);" onfocus="satz_aktive_ziel(\''.bestellung_vergleichen_einfugen_yang_memiliki_ijin_usaha.'\');">'));
        $this->form->satz_zeiger($this->zeiger);
        $this->form->hizufuten_spalte(array('&nbsp;', '&nbsp;'));
        
        $this->zeiger++;
        
        $this->form->satz_zeiger($this->zeiger);
        $this->form->hizufuten_spalte(array('&nbsp;', '<div id="'.$this->schlussel.einfugen_ziel.jumlah_calon_anggota_wanita.'">&nbsp;</div>'));
        $this->form->satz_zeiger($this->zeiger);
        $this->form->hizufuten_spalte(array('&nbsp;', '<div id="'.$this->schlussel.einfugen_ziel.yang_memiliki_ijin_usaha.'">&nbsp;</div>'));
        $this->form->satz_zeiger($this->zeiger);
        $this->form->hizufuten_spalte(array('&nbsp;', '&nbsp;'));
        
        
        $this->zeiger++;
    }
    private final function zelie_zehn()
    {
        $this->form->satz_zeiger($this->zeiger);
        $this->form->hizufuten_spalte(array('Total Jumlah Calon Anggota', 
            '<input type="text" id="'.$this->schlussel.total_jumlah_calon_anggota.'" readonly="readonly">'));
        $this->form->satz_zeiger($this->zeiger);
        $this->form->hizufuten_spalte(array('Jumlah Yang telah RAT', '<input type="text" name="'.$this->schlussel.jumlah_yg_telah_rat.'" id="'.$this->schlussel.jumlah_yg_telah_rat.'" oninput="einfugen_numerische_vergleichen(this.id, '.$this->schlussel.einfugen_ziel.jumlah_yg_telah_rat.'.id);" onfocus="satz_aktive_ziel(\''.bestellung_vergleichen_einfugen_jumlah_yg_telah_rat.'\');">'));
        $this->form->satz_zeiger($this->zeiger);
        $this->form->hizufuten_spalte(array('&nbsp;', '&nbsp;'));
        
        $this->zeiger++;
        
        $this->form->satz_zeiger($this->zeiger);
        $this->form->hizufuten_spalte(array('&nbsp;', '<div id="'.$this->schlussel.einfugen_ziel.total_jumlah_calon_anggota.'">&nbsp;</div>'));
        $this->form->satz_zeiger($this->zeiger);
        $this->form->hizufuten_spalte(array('&nbsp;', '<div id="'.$this->schlussel.einfugen_ziel.jumlah_yg_telah_rat.'">&nbsp;</div>'));
        $this->form->satz_zeiger($this->zeiger);
        $this->form->hizufuten_spalte(array('&nbsp;', '&nbsp;'));
        
        
        $this->zeiger++;
    }
}
