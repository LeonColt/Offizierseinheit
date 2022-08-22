<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 12/01/2016
 * Time: 13:55
 */
require_once standart_system_pfad.'anhanger/Base_tabelle_und_filter_anhanger.php';
require_once standart_system_pfad.'server_skript/einfugen/datei/allen_datei_lesegerat.php';
class anhanger_einfugen_datei extends Base_tabelle_und_filter_anhanger
{
    private $datein, $benutzer, $csrf;
    public function __construct()
    {
        parent::__construct(bestellung_anzaigen_einfugen_datei,
            parameter_anzaigen_einfugen_datei_optionen_filter,
            anzaigen_einfugen_datei_optionen_alle,
            parameter_anzaigen_einfugen_datei_numerische_seite,
            parameter_anzaigen_einfugen_datei_optionen_provinz,
            parameter_anzaigen_einfugen_datei_optionen_kabupaten,
            anzaigen_einfugen_datei_benutzer_typ,
            anzaigen_einfugen_datei_benutzer_provinz,
            anzaigen_einfugen_datei_benutzer_kabupaten);
        $this->datein = new allen_datei_lesegerat();
        $this->datein = $this->datein->ausfuhren();
        if(strcasecmp(filter_input(INPUT_GET, parameter_anzaigen_einfugen_datei_optionen_filter), anzaigen_einfugen_datei_optionen_alle) === 0)
        {
            require_once standart_system_pfad.'server_skript/benutzer/wahle_allen_benutzer.php';
            $this->benutzer = new wahle_allen_benutzer();
            $this->benutzer->ausfuhren();
            $this->benutzer = $this->benutzer->erhalten_daten();
        }
        else
        {
            $filter = filter_input(INPUT_GET, parameter_anzaigen_einfugen_datei_optionen_filter, FILTER_VALIDATE_INT);
            if($filter === false || $filter === null) $filter = -1;
            if($filter === 1)
            {
                require_once standart_system_pfad.'server_skript/benutzer/wahle_allen_benutzer_von_admin.php';
                $this->benutzer = new wahle_allen_benutzer_von_admin();
                $this->benutzer->ausfuhren();
                $this->benutzer = $this->benutzer->erhalten_daten();
            }
            else if($filter === 2)
            {
                require_once standart_system_pfad.'server_skript/benutzer/wahle_allen_benutzer_von_nationalen.php';
                $this->benutzer = new wahle_allen_benutzer_von_nationalen();
                $this->benutzer->ausfuhren();
                $this->benutzer = $this->benutzer->erhalten_daten();
            }
            else if($filter === 3)
            {
                if(strcasecmp(filter_input(INPUT_GET, parameter_anzaigen_einfugen_datei_optionen_provinz), anzaigen_einfugen_datei_optionen_alle) === 0)
                {
                    require_once standart_system_pfad.'server_skript/benutzer/wahle_allen_benutzer_von_allen_provinz.php';
                    $this->benutzer = new wahle_allen_benutzer_von_allen_provinz();
                    $this->benutzer->ausfuhren();
                    $this->benutzer = $this->benutzer->erhalten_daten();
                }
                else
                {
                    $filter = filter_input(INPUT_GET, parameter_anzaigen_einfugen_datei_optionen_provinz, FILTER_VALIDATE_INT);
                    if($filter === false || $filter === null) $filter = -1;
                    if($filter !== -1)
                    {
                        require_once standart_system_pfad.'server_skript/benutzer/wahle_allen_benutzer_von_provinz.php';
                        $this->benutzer = new wahle_allen_benutzer_von_provinz();
                        $this->benutzer->satz_provinz($filter);
                        $this->benutzer->ausfuhren();
                        $this->benutzer = $this->benutzer->erhalten_daten();
                    }
                    else $this->benutzer = array();
                }
            }
            else if($filter === 4)
            {
                if(strcasecmp(filter_input(INPUT_GET, parameter_anzaigen_einfugen_datei_optionen_kabupaten), anzaigen_einfugen_datei_optionen_alle) === 0)
                {
                    require_once standart_system_pfad.'server_skript/benutzer/wahle_allen_benutzer_von_allen_kabupaten.php';
                    $this->benutzer = new wahle_allen_benutzer_von_allen_kabupaten();
                    $this->benutzer->ausfuhren();
                    $this->benutzer = $this->benutzer->erhalten_daten();
                }
                else
                {
                    $filter = filter_input(INPUT_GET, parameter_anzaigen_einstellung_benutzer_optionen_kabupaten, FILTER_VALIDATE_INT);
                    if($filter === false || $filter === null) $filter = -1;
                    if($filter !== -1)
                    {
                        require_once standart_system_pfad.'server_skript/benutzer/wahle_allen_benutzer_von_kabupaten.php';
                        $this->benutzer = new wahle_allen_benutzer_von_kabupaten();
                        $this->benutzer->satz_kabupaten($filter);
                        $this->benutzer->ausfuhren();
                        $this->benutzer = $this->benutzer->erhalten_daten();
                    }
                    else $this->benutzer = array();
                }
            }
            else $this->benutzer = array();
        }
        $this->entfernen_von_id_benutzer();
        $this->entfernen_von_datum();
        $this->entfernen_von_benutzer_typ();
        $this->entfernen_von_benutzer_provinz();
        $this->entfernen_von_benutzer_kabupaten();
        $this->max_seite = count($this->datein)/anzaigen_einfugen_datei_seite_max_zeile;
    }

    public function satz_csrf(csrf_sicherheit $csrf)
    {
        $this->csrf = $csrf;
    }

    public function anhanger_einfugen_datei_datum()
    {
        echo '<label id="ebene_titel" for="'.anzaigen_einfugen_datei_benutzer_datum.'">';
        echo $this->zeichenfolge->datum;
        echo '</label>';
        if(ist_null(filter_input(INPUT_GET, parameter_anzaigen_einfugen_datei_datum))) $datum = "";
        else
        {
            $datum = explode('-', filter_input(INPUT_GET, parameter_anzaigen_einfugen_datei_datum));
            $datum[0] = $this->numerische_monat($datum[0]);
            $datum = implode(' ', $datum);
        }
        echo '<input name="myDate" class="monthPicker" id="'.anzaigen_einfugen_datei_benutzer_datum.'" value="'.$datum.'">';
        echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.0/jquery.min.js"></script>';
        echo '<script src="zusatzliche/client_skript/jquery-ui-1.11.4.custom/jquery-ui.js"></script>';
        echo '<script>
    $(function() {
        $(\'.monthPicker\').datepicker({
                                changeMonth: true,
                                changeYear: true,
                                showButtonPanel: true,
                                dateFormat: \'MM yy\'
                            }).focus(function() {
            var thisCalendar = $(this);
            $(\'.ui-datepicker-calendar\').detach();
            $(\'.ui-datepicker-close\').click(function() {
                var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
                var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                thisCalendar.datepicker(\'setDate\', new Date(year, month, 1));
            });
        });
                        });
                    </script>';
    }
    function anhanger_tabelle_und_filter_tabelle()
    {
        // TODO: Implement anhanger_tabelle_und_filter_tabelle() method.
        $lange = count($this->datein);
        $zahler = filter_input(INPUT_GET, parameter_anzaigen_einfugen_datei_numerische_seite, FILTER_VALIDATE_INT);
        if($zahler === null || $zahler === false) $zahler = 1; else $zahler= --$zahler*anzaigen_einfugen_datei_seite_max_zeile;
        for($i = 0; $i < anzaigen_einfugen_datei_seite_max_zeile; $i++)
        {
            if($lange - ($zahler + 1) === -1) break;
            $id = $this->datein[$lange - ($zahler + 1)]->erhalten_id();
            $id = explode('-', $id);
            $id = ($id[0].'nmlf'.$id[2]);
            echo '<tr>';
            echo '<td>'.($zahler + 1).'</td>';
            echo '<td>'.$id.'</td>';
            echo '<td >'.$this->datum_konverter($this->datein[$lange - ($zahler + 1)]->erhalten_datum()).'</td>';
            echo '<td >'.$this->datein[$lange - ($zahler + 1)]->erhalten_name().'</td>';
            echo '<td >'.$this->datein[$lange - ($zahler + 1)]->erhalten_benutzername().'</td>';
            if(ist_benutzer_admin())
            {
                if(strcasecmp($_SESSION[id_benutzername], super_admin) === 0)
                {
                    $url = new url_kodierer();
                    $url->hinzufugen(bestellung);
                    $url->hinzufugen(bestellung_einfugen_datei_download);
                    $url->hinzufugen(parameter_anzaigen_einfugen_datei_datei_name_fur_download);
                    $url->hinzufugen($id);
                    $url->hinzufugen(csrf_schlussel);
                    $url->hinzufugen($this->csrf->erhalten_schlussel());
                    $url->hinzufugen(csrf_token);
                    $url->hinzufugen($this->csrf->erhalten_token());
                    hinzufugen_url_sprache($url);
                    echo '<td height="2px">
                        <a title="download" href="#" onclick="refresh(\''.$url->erhalten().'\', \''.$this->datein[$lange - ($zahler + 1)]->erhalten_name().'\');"><img src="bilder/download.jpg"width="30px" > </a>
                    </td>';
                    $url = new url_kodierer();
                    $url->hinzufugen(bestellung);
                    $url->hinzufugen(bestellung_einfugen_datei_mulleimer);
                    $url->hinzufugen(parameter_anzaigen_einfugen_datei_datei_name_fur_mulleimer);
                    $url->hinzufugen($id);
                    $url->hinzufugen(csrf_schlussel);
                    $url->hinzufugen($this->csrf->erhalten_schlussel());
                    $url->hinzufugen(csrf_token);
                    $url->hinzufugen($this->csrf->erhalten_token());
                    hinzufugen_url_sprache($url);
                    echo ' <td ><a title="hapus" href="'.$url->erhalten().'" onclick="refresh();"> <img src="bilder/mulleimer.png"width="30px"> </a></td>';
                }
                else
                {
                    if(strcasecmp(super_admin, $this->datein[$lange - ($zahler + 1)]->erhalten_benutzer_id()) === 0)
                    {
                        $url = new url_kodierer();
                        $url->hinzufugen(bestellung);
                        $url->hinzufugen(bestellung_einfugen_datei_download);
                        $url->hinzufugen(parameter_anzaigen_einfugen_datei_datei_name_fur_download);
                        $url->hinzufugen($id);
                        $url->hinzufugen(csrf_schlussel);
                        $url->hinzufugen($this->csrf->erhalten_schlussel());
                        $url->hinzufugen(csrf_token);
                        $url->hinzufugen($this->csrf->erhalten_token());
                        hinzufugen_url_sprache($url);
                        echo '<td height="2px" colspan="2" style="text-align: center;">
                        <a title="download" href="#" onclick="refresh(\''.$url->erhalten().'\', \''.$this->datein[$lange - ($zahler + 1)]->erhalten_name().'\');"><img src="bilder/download.jpg"width="30px" > </a>
                    </td>';
                    }
                    else if(strcasecmp($_SESSION[id_benutzername], $this->datein[$lange - ($zahler + 1)]->erhalten_benutzer_id()) === 0)
                    {
                        $url = new url_kodierer();
                        $url->hinzufugen(bestellung);
                        $url->hinzufugen(bestellung_einfugen_datei_download);
                        $url->hinzufugen(parameter_anzaigen_einfugen_datei_datei_name_fur_download);
                        $url->hinzufugen($id);
                        $url->hinzufugen(csrf_schlussel);
                        $url->hinzufugen($this->csrf->erhalten_schlussel());
                        $url->hinzufugen(csrf_token);
                        $url->hinzufugen($this->csrf->erhalten_token());
                        hinzufugen_url_sprache($url);
                        echo '<td height="2px">
                        <a title="download" href="#" onclick="refresh(\''.$url->erhalten().'\', \''.$this->datein[$lange - ($zahler + 1)]->erhalten_name().'\');"><img src="bilder/download.jpg"width="30px" > </a>
                    </td>';
                        $url = new url_kodierer();
                        $url->hinzufugen(bestellung);
                        $url->hinzufugen(bestellung_einfugen_datei_mulleimer);
                        $url->hinzufugen(parameter_anzaigen_einfugen_datei_datei_name_fur_mulleimer);
                        $url->hinzufugen($id);
                        $url->hinzufugen(csrf_schlussel);
                        $url->hinzufugen($this->csrf->erhalten_schlussel());
                        $url->hinzufugen(csrf_token);
                        $url->hinzufugen($this->csrf->erhalten_token());
                        hinzufugen_url_sprache($url);
                        echo ' <td ><a title="hapus" href="'.$url->erhalten().'" onclick="refresh();"> <img src="bilder/mulleimer.png"width="30px"> </a></td>';
                    }
                    else
                    {
                        $url = new url_kodierer();
                        $url->hinzufugen(bestellung);
                        $url->hinzufugen(bestellung_einfugen_datei_download);
                        $url->hinzufugen(parameter_anzaigen_einfugen_datei_datei_name_fur_download);
                        $url->hinzufugen($id);
                        $url->hinzufugen(csrf_schlussel);
                        $url->hinzufugen($this->csrf->erhalten_schlussel());
                        $url->hinzufugen(csrf_token);
                        $url->hinzufugen($this->csrf->erhalten_token());
                        hinzufugen_url_sprache($url);
                        echo '<td height="2px">
                        <a title="download" href="#" onclick="refresh(\''.$url->erhalten().'\', \''.$this->datein[$lange - ($zahler + 1)]->erhalten_name().'\');"><img src="bilder/download.jpg"width="30px" > </a>
                    </td>';
                    }
                }
            }
            else
            {
                if(strcasecmp($_SESSION[id_benutzername], $this->datein[$lange - ($zahler + 1)]->erhalten_benutzer_id()) === 0)
                {
                    $url = new url_kodierer();
                    $url->hinzufugen(bestellung);
                    $url->hinzufugen(bestellung_einfugen_datei_download);
                    $url->hinzufugen(parameter_anzaigen_einfugen_datei_datei_name_fur_download);
                    $url->hinzufugen($id);
                    $url->hinzufugen(csrf_schlussel);
                    $url->hinzufugen($this->csrf->erhalten_schlussel());
                    $url->hinzufugen(csrf_token);
                    $url->hinzufugen($this->csrf->erhalten_token());
                    hinzufugen_url_sprache($url);
                    echo '<td height="2px">
                        <a title="download" href="#" onclick="refresh(\''.$url->erhalten().'\', \''.$this->datein[$lange - ($zahler + 1)]->erhalten_name().'\');"><img src="bilder/download.jpg"width="30px" > </a>
                    </td>';
                    $url = new url_kodierer();
                    $url->hinzufugen(bestellung);
                    $url->hinzufugen(bestellung_einfugen_datei_mulleimer);
                    $url->hinzufugen(parameter_anzaigen_einfugen_datei_datei_name_fur_mulleimer);
                    $url->hinzufugen($id);
                    $url->hinzufugen(csrf_schlussel);
                    $url->hinzufugen($this->csrf->erhalten_schlussel());
                    $url->hinzufugen(csrf_token);
                    $url->hinzufugen($this->csrf->erhalten_token());
                    hinzufugen_url_sprache($url);
                    echo ' <td ><a title="hapus" href="'.$url->erhalten().'" onclick="refresh();"> <img src="bilder/mulleimer.png"width="30px"> </a></td>';
                }
                else
                {
                    $url = new url_kodierer();
                    $url->hinzufugen(bestellung);
                    $url->hinzufugen(bestellung_einfugen_datei_download);
                    $url->hinzufugen(parameter_anzaigen_einfugen_datei_datei_name_fur_download);
                    $url->hinzufugen($id);
                    $url->hinzufugen(csrf_schlussel);
                    $url->hinzufugen($this->csrf->erhalten_schlussel());
                    $url->hinzufugen(csrf_token);
                    $url->hinzufugen($this->csrf->erhalten_token());
                    hinzufugen_url_sprache($url);
                    echo '<td height="2px" colspan="2" style="text-align: center;">
                        <a title="download" href="#" onclick="refresh(\''.$url->erhalten().'\', \''.$this->datein[$lange - ($zahler + 1)]->erhalten_name().'\');"><img src="bilder/download.jpg"width="30px" > </a>
                    </td>';
                }
            }
            echo '</tr>';
            $zahler++;
        }
    }
    private final function entfernen_von_benutzer_kabupaten()
    {
        if(!ist_null(filter_input(INPUT_GET, parameter_anzaigen_einfugen_datei_optionen_kabupaten)))
        {
            if(!ist_null(filter_input(INPUT_GET, parameter_anzaigen_einfugen_datei_optionen_provinz)))
            {
                if(strcasecmp(filter_input(INPUT_GET, parameter_anzaigen_einfugen_datei_optionen_kabupaten), anzaigen_einfugen_datei_optionen_alle) !== 0)
                {
                    $filter = filter_input(INPUT_GET, parameter_anzaigen_einfugen_datei_optionen_kabupaten);
                    for($i = 0; $i< count($this->datein); $i++)
                    {
                        for($j = 0; $j < count($this->benutzer); $j++)
                        {
                            if((int)$this->datein[$i]->erhalten_benutzer_id() === (int)$this->benutzer[$i][0])
                            {
                                if((int)$this->benutzer[$i][4] === 3)
                                {
                                    if((int)$this->benutzer[$i][11] === (int)filter_input(INPUT_GET, parameter_anzaigen_einfugen_datei_optionen_provinz))
                                    {
                                        if((int)$this->benutzer[$i][12] !== (int)$filter)
                                        {
                                            unset($this->datein[$i]);
                                            $i--;
                                            break;
                                        }
                                    }
                                    else
                                    {
                                        unset($this->datein[$i]);
                                        $i--;
                                        break;
                                    }
                                }
                                else
                                {
                                    unset($this->datein[$i]);
                                    $i--;
                                    break;
                                }
                            }
                            else
                            {
                                unset($this->datein[$i]);
                                $i--;
                                break;
                            }
                        }
                    }
                }
            }
            else return;
        }
    }
    private final function entfernen_von_benutzer_provinz()
    {
        if(!ist_null(filter_input(INPUT_GET, parameter_anzaigen_einfugen_datei_optionen_provinz)))
        {
            if(strcasecmp(filter_input(INPUT_GET, parameter_anzaigen_einfugen_datei_optionen_provinz), anzaigen_einfugen_datei_optionen_alle) !== 0)
            {
                $filter = filter_input(INPUT_GET, parameter_anzaigen_einfugen_datei_optionen_provinz);
                for($i = 0; $i< count($this->datein); $i++)
                {
                    for($j = 0; $j < count($this->benutzer); $j++)
                    {
                        if((int)$this->datein[$i]->erhalten_benutzer_id() === (int)$this->benutzer[$i][0])
                        {
                            if((int)$this->benutzer[$i][4] === 3)
                            {
                                if((int)$this->benutzer[$i][11] !== (int)$filter)
                                {
                                    unset($this->datein[$i]);
                                    $i--;
                                    break;
                                }
                            }
                            else
                            {
                                unset($this->datein[$i]);
                                $i--;
                                break;
                            }
                        }
                        else
                        {
                            unset($this->datein[$i]);
                            $i--;
                            break;
                        }
                    }
                }
            }
        }
    }
    private final function entfernen_von_benutzer_typ()
    {
        if(!ist_null(filter_input(INPUT_GET, parameter_anzaigen_einfugen_datei_optionen_filter)))
        {
            if(strcasecmp(filter_input(INPUT_GET, parameter_anzaigen_einfugen_datei_optionen_filter), anzaigen_einfugen_datei_optionen_alle) !== 0)
            {
                $filter = filter_input(INPUT_GET, parameter_anzaigen_einfugen_datei_optionen_filter);
                for($i = 0; $i< count($this->datein); $i++)
                {
                    for($j = 0; $j < count($this->benutzer); $j++)
                    {
                        if(strcasecmp($this->datein[$i]->erhalten_benutzer_id(), $this->benutzer[$j][0]) === 0)
                        {
                            if((int)$this->benutzer[$j][4] !== (int)$filter)
                            {
                                unset($this->datein[$i]);
                                $i--;
                                break;
                            }
                        }
                    }
                }
            }
        }
        else
        {
            $this->datein = array();
        }
    }
    private final function entfernen_von_datum()
    {
        if(!ist_null(filter_input(INPUT_GET, parameter_anzaigen_einfugen_datei_datum)))
        {
            $datum = explode('-', filter_input(INPUT_GET, parameter_anzaigen_einfugen_datei_datum));
            for($i = 0; $i < count($this->datein); $i++)
            {
                $datein_datum = explode(',', $this->datein[$i]->erhalten_datum());
                if((int)$datein_datum[4] !== (int)$datum[0] || (int)$datein_datum[5] !== (int)$datum[1])
                    unset($this->datein[$i]);
            }
        }
    }
    private final function entfernen_von_id_benutzer()
    {
        for($i = 0; $i< count($this->datein); $i++)
        {
            $vorhanden = false;
            for($j = 0; $j < count($this->benutzer); $j++)
            {
                if(strcasecmp($this->datein[$i]->erhalten_benutzer_id(), $this->benutzer[$j][0]) === 0)
                {
                    $vorhanden = true;
                }
            }
            if(!$vorhanden)
            {
                unset($this->datein[$i]);
                $i--;
                break;
            }
        }
    }
    private final function monat_numerische($monat)
    {
        if(strcasecmp($monat,"January") === 0) return 1;
        else if(strcasecmp($monat, "February") === 0) return 2;
        else if(strcasecmp($monat, "March") === 0) return 3;
        else if(strcasecmp($monat, "April") === 0) return 4;
        else if(strcasecmp($monat, "May") === 0) return 5;
        else if(strcasecmp($monat, "June") === 0) return 6;
        else if(strcasecmp($monat, "July") === 0) return 7;
        else if(strcasecmp($monat, "August") === 0) return 8;
        else if(strcasecmp($monat, "September") === 0) return 9;
        else if(strcasecmp($monat, "October") === 0) return 10;
        else if(strcasecmp($monat, "November") === 0) return 11;
        else if(strcasecmp($monat, "December") === 0) return 12;
        return -1;
    }
    private final function numerische_monat($monat)
    {
        if((int)$monat === 1) return "January";
        else if((int)$monat === 2) return "February";
        else if((int)$monat === 3) return "March";
        else if((int)$monat === 4) return "April";
        else if((int)$monat === 5) return "May";
        else if((int)$monat === 6) return "June";
        else if((int)$monat === 7) return "July";
        else if((int)$monat === 8) return "August";
        else if((int)$monat === 9) return "September";
        else if((int)$monat === 10) return "October";
        else if((int)$monat === 11) return "November";
        else if((int)$monat === 12) return "December";
        return null;
    }
    private final function datum_konverter($datum)
    {
        $datum = explode(',', $datum);
        $temp = array();
        array_push($temp, ($this->zeichenfolge->sekunde." : ".$datum[0]));
        array_push($temp, ($this->zeichenfolge->minute." : ".$datum[1]));
        array_push($temp, ($this->zeichenfolge->stunde." : ".$datum[2]));
        array_push($temp, ($this->zeichenfolge->tag." : ".$datum[3]));
        array_push($temp, ($this->zeichenfolge->monat." : ".$datum[4]));
        array_push($temp, ($this->zeichenfolge->jahr." : ".$datum[5]));
        return implode("<br>", $temp);
    }
}