<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'form.php';
class arbeiter_form {
    private $form, $schlussel, $zeiger;
    public final function __construct($schlussel) {
        $this->form = new form();
        $this->form->hinzufugen_zeile();
        $this->form->hinzufugen_zeile();
        $this->form->hinzufugen_zeile();
        $this->form->hinzufugen_zeile();
        $this->form->hinzufugen_zeile();
        $this->form->hinzufugen_zeile();
        $this->schlussel = $schlussel;
        $this->zeiger = 0;
    }
    public final function karte()
    {
        $this->wichtigsten_arbeiten_titel();
        echo '<div style="margin-bottom: 5%;">';
        $this->zeile_eine();
        $this->zeile_zwei();
        $this->zeile_drei();
        $this->form->karte();
        $this->senden();
        echo '</div>';
    }
    private final function zeile_eine()
    {
        $this->form->satz_zeiger($this->zeiger);
        $this->form->hizufuten_spalte(array('Jumlah Karyawan Pria', 
            '<input type="text" '
            . 'name="'.$this->schlussel.jumlah_karyawan_pria.'" '
            . 'id="'.$this->schlussel.jumlah_karyawan_pria.'" '
            . 'oninput="einfugen_berechne_arbeiter_vergleichen('
            .$this->schlussel.jumlah_karyawan_pria.'.id, '
            .$this->schlussel.total_jumlah_tenaga_kerja.'.id, '
            .$this->schlussel.total_jumlah_karyawan.'.id, '
            .$this->schlussel.total_jumlah_manager.'.id, '
            .$this->schlussel.jumlah_karyawan_wanita.'.id, '
            .$this->schlussel.jumlah_karyawan_pria.'.id, '
            .$this->schlussel.jumlah_manager_wanita.'.id, '
            .$this->schlussel.jumlah_manager_pria.'.id, '
            .$this->schlussel.einfugen_ziel.jumlah_karyawan_pria.'.id);" onfocus="satz_aktive_ziel(\''.bestellung_vergleichen_einfugen_jumlah_karyawan_pria.'\');">'));
        $this->form->satz_zeiger($this->zeiger);
        $this->form->hizufuten_spalte(array('Jumlah Manager Pria', 
            '<input type="text" '
            . 'name="'.$this->schlussel.jumlah_manager_pria.'" '
            . 'id="'.$this->schlussel.jumlah_manager_pria.'" '
            . 'oninput="einfugen_berechne_arbeiter_vergleichen('
            .$this->schlussel.jumlah_manager_pria.'.id, '
            .$this->schlussel.total_jumlah_tenaga_kerja.'.id, '
            .$this->schlussel.total_jumlah_karyawan.'.id, '
            .$this->schlussel.total_jumlah_manager.'.id, '
            .$this->schlussel.jumlah_karyawan_wanita.'.id, '
            .$this->schlussel.jumlah_karyawan_pria.'.id, '
            .$this->schlussel.jumlah_manager_wanita.'.id, '
            .$this->schlussel.jumlah_manager_pria.'.id, '
            .$this->schlussel.einfugen_ziel.jumlah_manager_pria.'.id);" onfocus="satz_aktive_ziel(\''.bestellung_vergleichen_einfugen_jumlah_manager_pria.'\');">'));
        $this->form->satz_zeiger($this->zeiger);
        $this->form->hizufuten_spalte(array('Total Jumlah Tenaga Kerja', 
            '<input type="text" '
            . 'name="'.$this->schlussel.total_jumlah_tenaga_kerja.'" '
            . 'id="'.$this->schlussel.total_jumlah_tenaga_kerja.'" readonly="readonly">'));
        
        $this->zeiger++;
        
        $this->form->satz_zeiger($this->zeiger);
        $this->form->hizufuten_spalte(array('&nbsp;', '<div id="'.$this->schlussel.einfugen_ziel.jumlah_karyawan_pria.'">&nbsp;</div>'));
        $this->form->satz_zeiger($this->zeiger);
        $this->form->hizufuten_spalte(array('&nbsp;', '<div id="'.$this->schlussel.einfugen_ziel.jumlah_manager_pria.'">&nbsp;</div>'));
        $this->form->satz_zeiger($this->zeiger);
        $this->form->hizufuten_spalte(array('&nbsp;', '<div id="'.$this->schlussel.einfugen_ziel.total_jumlah_tenaga_kerja.'">&nbsp;</div>'));
        
        $this->zeiger++;
    }
    private final function zeile_zwei()
    {
        $this->form->satz_zeiger($this->zeiger);
    $this->form->hizufuten_spalte(array('Jumlah Karyawan Wanita', 
        '<input type="text" '
        . 'name="'.$this->schlussel.jumlah_karyawan_wanita.'" '
        . 'id="'.$this->schlussel.jumlah_karyawan_wanita.'" '
        . 'oninput="einfugen_berechne_arbeiter_vergleichen('
        .$this->schlussel.jumlah_karyawan_wanita.'.id, '
        .$this->schlussel.total_jumlah_tenaga_kerja.'.id, '
        .$this->schlussel.total_jumlah_karyawan.'.id, '
        .$this->schlussel.total_jumlah_manager.'.id, '
        .$this->schlussel.jumlah_karyawan_wanita.'.id, '
        .$this->schlussel.jumlah_karyawan_pria.'.id, '
        .$this->schlussel.jumlah_manager_wanita.'.id, '
        .$this->schlussel.jumlah_manager_pria.'.id, '
        .$this->schlussel.einfugen_ziel.jumlah_karyawan_wanita.'.id);" onfocus="satz_aktive_ziel(\''.bestellung_vergleichen_einfugen_jumlah_karyawan_wanita.'\');">'));
    $this->form->satz_zeiger($this->zeiger);
    $this->form->hizufuten_spalte(array('Jumlah Manager Wanita', 
        '<input type="text" '
        . 'name="'.$this->schlussel.jumlah_manager_wanita.'" '
        . 'id="'.$this->schlussel.jumlah_manager_wanita.'" '
        . 'oninput="einfugen_berechne_arbeiter_vergleichen('
        .$this->schlussel.jumlah_karyawan_wanita.'.id, '
        .$this->schlussel.total_jumlah_tenaga_kerja.'.id, '
        .$this->schlussel.total_jumlah_karyawan.'.id, '
        .$this->schlussel.total_jumlah_manager.'.id, '
        .$this->schlussel.jumlah_karyawan_wanita.'.id, '
        .$this->schlussel.jumlah_karyawan_pria.'.id, '
        .$this->schlussel.jumlah_manager_wanita.'.id, '
        .$this->schlussel.jumlah_manager_pria.'.id, '
        .$this->schlussel.einfugen_ziel.jumlah_manager_wanita.'.id);" onfocus="satz_aktive_ziel(\''.bestellung_vergleichen_einfugen_jumlah_manager_wanita.'\');">'));
    $this->form->satz_zeiger($this->zeiger);
    $this->form->hizufuten_spalte(array('&nbsp;', '&nbsp;'));
    
    $this->zeiger++;
    
    $this->form->satz_zeiger($this->zeiger);
    $this->form->hizufuten_spalte(array('&nbsp;', '<div id="'.$this->schlussel.einfugen_ziel.jumlah_karyawan_wanita.'">&nbsp;</div>'));
    $this->form->satz_zeiger($this->zeiger);
    $this->form->hizufuten_spalte(array('&nbsp;', '<div id="'.$this->schlussel.einfugen_ziel.jumlah_manager_wanita.'">&nbsp;</div>'));
    $this->form->satz_zeiger($this->zeiger);
    $this->form->hizufuten_spalte(array('&nbsp;', '&nbsp;'));
    
    $this->zeiger++;
    }
    private final function zeile_drei()
    {
        $this->form->satz_zeiger($this->zeiger);
        $this->form->hizufuten_spalte(array('Total Jumlah Karyawan',
            '<input type="text" id="'.$this->schlussel.total_jumlah_karyawan.'" '
            . 'readonly="readonly">'));
    $this->form->satz_zeiger($this->zeiger);
    $this->form->hizufuten_spalte(array('Total Jumlah Manager', 
        '<input type="text" id="'.$this->schlussel.total_jumlah_manager.'" readonly="readonly">'));
    $this->form->satz_zeiger($this->zeiger);
    $this->form->hizufuten_spalte(array('&nbsp;', '&nbsp;'));
    
    $this->zeiger++;
    
    $this->form->satz_zeiger($this->zeiger);
    $this->form->hizufuten_spalte(array('&nbsp;', '<div id="'.$this->schlussel.einfugen_ziel.total_jumlah_karyawan.'">&nbsp;</div>'));
    $this->form->satz_zeiger($this->zeiger);
    $this->form->hizufuten_spalte(array('&nbsp;', '<div id="'.$this->schlussel.einfugen_ziel.total_jumlah_manager.'">&nbsp;</div>'));
    $this->form->satz_zeiger($this->zeiger);
    $this->form->hizufuten_spalte(array('&nbsp;', '&nbsp;'));
    }
    private final function wichtigsten_arbeiten_titel()
    {
        echo '<div style=" clear: both; background-color: #a4dffe; text-align: center;width: 100%; height:30px; padding-top: 1%;  margin-top: 3%;">Tenaga Kerja</div>';
    }
    private final function senden()
    {
        echo '<div class="subkontainer_inside">
                            <div class="clabel_inside"><input type="submit" value="simpan"></div>
                            <div class="cinput_inside"><input type="reset"></div>
                        </div>';
    }

}
