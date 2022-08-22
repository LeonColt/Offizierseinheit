<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 10/01/2016
 * Time: 10:46
 */
require_once standart_system_pfad.'anhanger/Base_tabelle_und_filter_anhanger.php';
class anhanger_einstellung_benutzer extends Base_tabelle_und_filter_anhanger
{
    private $benutzer;
    public function __construct()
    {
        parent::__construct(bestellung_anzaigen_einstellung_benutzer,
            parameter_anzaigen_einstellung_benutzer_optionen_filter,
            anzaigen_einstellung_benutzer_optionen_alle,
            parameter_anzaigen_einstellung_benutzer_numerische_seite,
            parameter_anzaigen_einstellung_benutzer_optionen_provinz,
            parameter_anzaigen_einstellung_benutzer_optionen_kabupaten,
            anzaigen_einstellung_benutzer_optionen_ebene,
            anzaigen_einstellung_benutzer_optionen_provinz,
            anzaigen_einstellung_benutzer_optionen_kabupaten
            );
        $this->max_seite = new wahle_max_seite_benutzer();
        $this->max_seite->ausfuhren();
        $this->max_seite = (int)$this->max_seite->erhalten_daten();
        if(strcasecmp(filter_input(INPUT_GET, parameter_anzaigen_einstellung_benutzer_optionen_filter), anzaigen_einstellung_benutzer_optionen_alle) === 0)
        {
            require_once standart_system_pfad.'server_skript/benutzer/wahle_allen_benutzer.php';
            $this->benutzer = new wahle_allen_benutzer();
            $this->benutzer->ausfuhren();
            $this->benutzer = $this->benutzer->erhalten_daten();
        }
        else
        {
            $filter = filter_input(INPUT_GET, parameter_anzaigen_einstellung_benutzer_optionen_filter, FILTER_VALIDATE_INT);
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
                if(strcasecmp(filter_input(INPUT_GET, parameter_anzaigen_einstellung_benutzer_optionen_provinz), anzaigen_einstellung_benutzer_optionen_alle) === 0)
                {
                    require_once standart_system_pfad.'server_skript/benutzer/wahle_allen_benutzer_von_allen_provinz.php';
                    $this->benutzer = new wahle_allen_benutzer_von_allen_provinz();
                    $this->benutzer->ausfuhren();
                    $this->benutzer = $this->benutzer->erhalten_daten();
                }
                else
                {
                    $filter = filter_input(INPUT_GET, parameter_anzaigen_einstellung_benutzer_optionen_provinz, FILTER_VALIDATE_INT);
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
                if(strcasecmp(filter_input(INPUT_GET, parameter_anzaigen_einstellung_benutzer_optionen_kabupaten), anzaigen_einstellung_benutzer_optionen_alle) === 0)
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
    }
    function anhanger_tabelle_und_filter_tabelle()
    {
        // TODO: Implement anhager_einstellung_benutzer_tabelle() method.
        $token = new csrf_sicherheit();
        $token->ausfuhren();
        $zeiler = filter_input(INPUT_GET, parameter_anzaigen_einstellung_benutzer_numerische_seite, FILTER_VALIDATE_INT);
        if($zeiler === false || $zeiler === null) $zeiler  = 1; else $zeiler = --$zeiler * anzaigen_enstellung_benutzer_seite_max_zeile;
        for ($i = 0; $i < count($this->benutzer); $i++)
        {
            echo '<tr>';
            echo '<td>'.(++$zeiler).'</td>'; //number
            echo '<td>'.$this->benutzer[$i][0].'</td>'; //id
            echo '<td>'.$this->benutzer[$i][1].'</td>'; //username
            echo '<td>'.$this->benutzer[$i][2].'</td>'; //email
            //beginnen level
            if(strcasecmp($this->benutzer[$i][0], super_admin) === 0)
            {
                echo '<td>'.$this->zeichenfolge->super_admin.'</td>';
            }
            else if((int)$this->benutzer[$i][4] === 3)
            {
                echo '<td>';
                echo $this->benutzer[$i][3].' ';
                echo ' '.$this->zeichenfolge->provinz.' ';
                echo $this->benutzer[$i][5];
                echo '</td>';
            }
            else if((int)$this->benutzer[$i][4] === 4)
            {
                echo '<td>';
                echo $this->benutzer[$i][3].' ';
                echo ' '.$this->zeichenfolge->provinz.' ';
                echo $this->benutzer[$i][5];
                echo ' '.$this->zeichenfolge->regenschaft.' ';
                echo $this->benutzer[$i][6];
                echo '</td>';
            }
            else
            {
                echo '<td>'.$this->benutzer[$i][3].'</td>';
            }
            //ende beginnen level
            echo '<td width="350">'.$this->benutzer[$i][7].'</td>'; //alamat
            echo '<td>'.$this->benutzer[$i][8].'</td>'; //no telp
            echo '<td>'.$this->benutzer[$i][9].'</td>'; //no fax
            echo '<td><img src="'.$this->benutzer[$i][10].'" width="50px" height="60px"></td>';
            require_once standart_system_pfad.'server_skript/base/csrf_sicherheit.php';
            $url = new url_kodierer();
            $url->hinzufugen(bestellung);
            $url->hinzufugen(bestellung_einstellung_benutzer_benutzer_mulleimer);
            $url->hinzufugen(parameter_einstellung_benutzer_benutzer_mulleimer_id);
            $url->hinzufugen($this->benutzer[$i][0]);
            $url->hinzufugen(csrf_schlussel);
            $url->hinzufugen($token->erhalten_schlussel());
            $url->hinzufugen(csrf_token);
            $url->hinzufugen($token->erhalten_token());
            hinzufugen_url_sprache($url);
            //if($this->benutzer[$i][11] === )
            if(strcasecmp($_SESSION[id_benutzername], super_admin) === 0)
            {
                if(strcasecmp($this->benutzer[$i][0], super_admin) === 0)
                    echo '<td valign="middle">'.$this->zeichenfolge->du.'</td>';
                else echo '<td valign="middle"><a class="texthover" href="'.$url->erhalten().'" title="hapus" style="text-decoration:none">
                            <img src="bilder/mulleimer.png"width="20px"> </a></td>';
            }
            else
            {
                if((int)$this->benutzer[$i][4] === 1)
                    echo '<td>'.$this->benutzer[$i][3].'</td>';
                else echo '<td valign="middle"><a class="texthover" href="'.$url->erhalten().'" title="hapus" style="text-decoration:none">
                            <img src="bilder/mulleimer.png"width="20px"> </a></td>';
            }
            echo '</tr>';
        }
    }
}