<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 05/01/2016
 * Time: 14:11
 */
require_once standart_system_pfad.'anhanger/anhanger_gemeinsame.php';
abstract class Base_anzaigen
{
    private $titel = "";
    private $stil, $client_skript;
    private $icon_pfad = "";
    private $korper = "";
    protected $sprache = standard_sprache;
    private $form, $tabelle, $informationen, $kontakt;
    public function __construct($informationen = true, $kontankt = true)
    {
        $this->stil = array();
        $this->client_skript = array();
        $this->form = false;
        $this->tabelle = false;
        $this->informationen = $informationen;
        $this->kontakt = $kontankt;
        $this->satz_icon("bilder/garuda.png");
    }

    public function ausfuhren()
    {
        echo '<html>';
        $this->kopf();
        echo '<body>';
        echo '<div id="pagewrap">';
        if($this->informationen) anhanger_erhalten_informationen();
        $this->korper();
        echo $this->korper;
        if($this->form)
        {
            throw new Exception("ende_form funktion wird nicht aufgerufen");
        }
        if($this->tabelle)
        {
            throw new Exception("ende_tabelle funktion wird nicht aufgerufen");
        }
        $this->fuß();
        echo '</div> <!--#pagewrap -->';
        echo '</body>';
        echo '</html>';
    }
    private function kopf()
    {
        echo '<head>';
        echo '<meta charset="UTF-8">';
        echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
        echo '<title>';
        echo $this->titel;
        echo '</title>';
        $this->stil();
        $this->client_skript();
        foreach($this->stil as $stil)
            echo $stil;
        foreach($this->client_skript as $cs)
            echo $cs;
        echo '<link rel="icon" href="'.$this->icon_pfad.'" type="image/x-icon">';
        echo '</head>';
    }
    private function fuß()
    {
        if($this->kontakt)anhanger_erhalten_kontakt_und_hilfe();
        echo '<div id="footer">';
        echo '<p align="center"> Copyright (c) 2015 - Kementerian Koperasi dan Usaha Kecil dan Menengah - Deputi Pembiayaan</p>';
        echo '</div>';
    }
    public function satz_titel($titel)
    {
        $this->titel = $titel;
    }
    public function satz_stil()
    {
        for($i = 0; $i<func_num_args(); $i++)
        {
            array_push($this->stil, func_get_arg($i));
        }
    }
    public function satz_client_skript()
    {
        for($i = 0; $i<func_num_args(); $i++)
        {
            array_push($this->client_skript, func_get_arg($i));
        }
    }
    public function satz_korper($korper)
    {
        $this->korper = $korper;
    }
    public function satz_icon($pfad)
    {
        $this->icon_pfad = $pfad;
    }
    public function hinzufugen($text)
    {
        $this->korper .= $text;
    }
    public function hinzufugen_div($content = null, $id = null, $name = null, $style = null, $event = null, $etc = null)
    {
        $this->korper .= '<div';
        if($id !== null)
        {
            $this->korper .= ' id="'.$id.'"';
        }
        if($name !== null)
        {
            $this->korper .= ' name = "'.$name.'"';
        }
        if($style !== null)
        {
            $this->korper .= ' style = "'.$style.'"';
        }
        $this->hinzufugen_ereignis($event);
        $this->hinzufugen_etc($etc);
        $this->korper .= '>';
        if($content !== null)
        {
            $this->korper .= $content;
        }
        $this->korper .= '</div>';
    }
    public function hinzufugen_input($type, $id = null, $name = null, $value = null, $style = null, $event = null, $etc = null)
    {
        $this->korper .= '<input';
        if($type !== null)
        {
            $this->korper .= ' type="'.$type.'"';
        }
        if($id !== null)
        {
            $this->korper .= ' id="'.$id.'"';
        }
        if($name !== null)
        {
            $this->korper .= ' name="'.$name.'"';
        }
        if($value !== null)
        {
            $this->korper .= ' value="'.$value.'"';
        }
        if($style !== null)
        {
            $this->korper .= ' style = "'.$style.'"';
        }
        $this->hinzufugen_ereignis($event);
        $this->hinzufugen_etc($etc);
        $this->korper .= '>';
    }
    public function beginnen_div($id = null, $name = null, $style = null, $event = null, $etc = null)
    {
        $this->korper .= '<div';
        if($id !== null)
        {
            $this->korper .= ' id="'.$id.'"';
        }
        if($name !== null)
        {
            $this->korper .= ' name = "'.$name.'"';
        }
        if($style !== null)
        {
            $this->korper .= ' style = "'.$style.'"';
        }
        $this->hinzufugen_ereignis($event);
        $this->hinzufugen_etc($etc);
        $this->korper .= '>';
    }
    public function ende_div()
    {
        $this->korper .= '</div>';
    }
    public function beginnen_form($method, $action, $event = null, $etc = null)
    {
        $this->korper .= '<form';
        $this->korper .= ' method="'.$method.'"';
        $this->korper .= ' action="'.$action.'"';
        $this->hinzufugen_ereignis($event);
        $this->hinzufugen_etc($etc);
        $this->korper .= '>';
        $this->form = true;
    }
    public function ende_form()
    {
        $this->korper .= '</form>';
        $this->form = false;
    }
    public function beginnen_tabelle($etc = null, $event = null, $sortable = null, $border = 0)
    {
        $this->korper .= '<table';
        $this->korper .= ' border="'.$border.'"';
        if($sortable !== null)
        {
            $this->korper .= ' sortable = "'.$sortable.'"';
        }
        $this->hinzufugen_ereignis($event);
        $this->hinzufugen_etc($etc);
        $this->korper .= '>';
        $this->tabelle = true;
    }
    public function ende_tabelle()
    {
        $this->korper .= '</table>';
        $this->tabelle = false;
    }
    public function beginnen_tr()
    {
        $this->korper .= '<tr>';
    }
    public function ende_tr()
    {
        $this->korper .= '</tr>';
    }
    public function hinzufugen_td($content = null, $etc = null, $event = null, $headers = null, $colspan = 0, $rowspan = 0)
    {
        $this->korper .= '<td';
        if($colspan > 0)
        {
            $this->korper .= ' colspan="'.$colspan.'"';
        }
        if($rowspan > 0)
        {
            $this->korper .= ' rowspan="'.$rowspan.'"';
        }
        if($headers !== null)
        {
            if(is_array($headers))
            {
                $this->korper .= ' headers="';
                foreach($headers as $header)
                {
                    $this->korper .= ' '.$header;
                }
                $this->korper .= '"';
            }
            else
            {
                $this->korper .= ' headers="'.$headers.'"';
            }
        }
        $this->hinzufugen_ereignis($event);
        $this->hinzufugen_etc($etc);
        $this->korper .= '>';
        if($content !== null)
        {
            $this->korper .= $content;
        }
        $this->korper .= '</td>';
    }
    public function beginnen_td($etc = null, $event = null, $headers = null, $colspan = 0, $rowspan = 0)
    {
        $this->korper .= '<td';
        if($colspan > 0)
        {
            $this->korper .= ' colspan="'.$colspan.'"';
        }
        if($rowspan > 0)
        {
            $this->korper .= ' rowspan="'.$rowspan.'"';
        }
        if($headers !== null)
        {
            if(is_array($headers))
            {
                $this->korper .= ' headers="';
                foreach($headers as $header)
                {
                    $this->korper .= ' '.$header;
                }
                $this->korper .= '"';
            }
            else
            {
                $this->korper .= ' headers="'.$headers.'"';
            }
        }
        $this->hinzufugen_ereignis($event);
        $this->hinzufugen_etc($etc);
        $this->korper .= '>';
    }
    public function ende_td()
    {
        $this->korper .= '</td>';
    }
    public function hinzufugen_img($src, $alt, $etc = null, $width = null, $height = null, $event = null)
    {
        $this->korper .= '<img src="'.$src.'" alt="'.$alt.'"';
        if($width !== null)
        {
            $this->korper .= ' width="'.$width.'"';
        }
        if($height !== null)
        {
            $this->korper .= ' height="'.$height.'"';
        }
        $this->hinzufugen_ereignis($event);
        $this->hinzufugen_etc($etc);
        $this->korper .= '>';
    }
    protected abstract function stil();
    protected abstract function client_skript();
    protected abstract function korper();
    private function hinzufugen_ereignis($event)
    {
        if($event !== null)
        {
            if(is_array($event))
            {
                for($i = 0; $i < count($event); $i++)
                {
                    $this->korper .= ' '.$event[$i][0];
                    $this->korper .= '="';
                    $this->korper .= $event[$i][1];
                    $this->korper .= '"';
                }
            }
            else
            {
                $this->korper .= ' '.$event;
            }
        }
    }
    private function hinzufugen_etc($etc)
    {
        if($etc !== null)
        {
            if(is_array($etc))
            {
                for($i = 0; $i < count($etc); $i++)
                {
                    $this->korper .= ' '.$etc[$i];
                }
            }
            else
            {
                $this->korper .= ' '.$etc;
            }
        }
    }
}