<?php

/**
 * Created by PhpStorm.
 * User: LC
 * Date: 12/01/2016
 * Time: 14:32
 */
abstract class Base_tabelle_und_filter_anhanger
{
    protected $zeichenfolge, $max_seite;
    private $bestellung, $param_filter, $param_seite, $param_provinz, $param_kabupaten;
    private $alle_filter;
    private $ebene, $provinz, $kabupaten;
    public function __construct($bestellung, $param_filter, $alle_filter, $param_seite, $param_provinz, $param_kabupaten,
                                $ebene, $provinz, $kabupaten)
    {
        $this->bestellung = $bestellung;
        $this->param_filter = $param_filter;
        $this->alle_filter = $alle_filter;
        $this->param_seite = $param_seite;
        $this->param_provinz = $param_provinz;
        $this->param_kabupaten = $param_kabupaten;
        $this->ebene = $ebene;
        $this->provinz = $provinz;
        $this->kabupaten = $kabupaten;
        $this->zeichenfolge = simplexml_load_file(xml_lader(zeichenfolge));
        $this->max_seite = 0;
    }

    public function anhanger_tabelle_und_filter_ebene()
    {
        echo '&nbsp;&nbsp;<label id="ebene_titel" for="'.$this->ebene.'">';
        echo $this->zeichenfolge->anzaigen_einstellung_benutzer_ende;
        echo '</label>';
        echo '&nbsp;<select id="'.$this->ebene.'" onchange="verstecken_karte_provinz_und_kabupaten_mir_alle(this.id, '.$this->provinz.'.id, '.$this->kabupaten.'.id, \''.$this->alle_filter.'\', \''.$this->zeichenfolge->alle.'\');">';
        $typ = new wahle_allen_benutzer_typ();
        $typ->ausfuhren();
        $typ = $typ->erhalten_daten();
        echo '<option value="'.$this->alle_filter.'">'.$this->zeichenfolge->alle.'</option>';
        foreach($typ as $daten)
        {
            echo '<option value="'.$daten[0].'" '.(((int)filter_input(INPUT_GET, $this->param_filter) === (int)$daten[0])?(' selected="selected"'):('')).'>'.$daten[1].'</option>';
        }
        echo '</select>';
    }

    public function anhanger_tabelle_und_filter_provinz()
    {
        echo '&nbsp;&nbsp;<label id="provinz_titel" '.((!ist_null(filter_input(INPUT_GET, $this->param_provinz))) ? ('style="display: inline;"') : ('style="display: none;"')).' for="'.$this->provinz.'">';
        echo $this->zeichenfolge->anzaigen_einstellung_benutzer_provinz;
        echo '</label>';
        echo ' <select id="'.$this->provinz.'" onchange="fullung_kab_kota_anhanger_base_tabelle_und_filter('.$this->provinz.'.id, '.$this->kabupaten.'.id, \''.$this->alle_filter.'\', \''.$this->zeichenfolge->alle.'\');" '.((!ist_null(filter_input(INPUT_GET, $this->param_provinz))) ? ('style="display: inline;"') : ('style="display: none;"')).'>';
        $provinz = new wahle_allen_provinz(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
        $provinz->ausfuhren();
        $provinz = $provinz->erhalten_daten();
        echo '<option value="'.$this->alle_filter.'">'.$this->zeichenfolge->alle.'</option>';
        foreach($provinz as $daten)
        {
            echo '<option value="'.$daten[0].'" '.((!ist_null(filter_input(INPUT_GET, $this->param_provinz))) ? (((int)filter_input(INPUT_GET, $this->param_provinz, FILTER_VALIDATE_INT) === (int)$daten[0]) ? ('selected="selected"') : ('')) : ('')).'>'.$daten[1].'</option>';
        }
        echo '</select>';
    }

    public function anhanger_tabelle_und_filter_kabupaten()
    {
        echo '&nbsp;&nbsp;<label id="kabupaten_titel" '.((!ist_null(filter_input(INPUT_GET, $this->param_kabupaten))) ? ('style="display: inline;"') : ('style="display: none;"')).' for="'.$this->kabupaten.'">';
        echo $this->zeichenfolge->anzaigen_einstellung_benutzer_kabupaten;
        echo '</label>';
        echo ' <select id="'.$this->kabupaten.'" '.((!ist_null(filter_input(INPUT_GET, $this->param_kabupaten))) ? ('style="display: inline;"') : ('style="display: none;"')).'>';
        echo '<option value="'.$this->alle_filter.'">'.$this->zeichenfolge->alle.'</option>';
        if(!ist_null(filter_input(INPUT_GET, $this->param_provinz)))
        {
            if(strcasecmp(filter_input(INPUT_GET, $this->param_provinz), $this->alle_filter) !== 0)
            {
                if(!ist_null(filter_input(INPUT_GET, $this->param_kabupaten)))
                {
                    require_once standart_system_pfad.'server_skript/wahle/wahle_allen_kabupaten_kota.php';
                    $kabupaten_kota = new wahle_allen_kabupaten_kota(standard_pfad, standard_sprache, kspo_daten_bank_host, kspo_daten_bank_hafen, kspo_daten_bank_name, kspo_daten_bank_benutzername, kspo_daten_bank_passwort);
                    $kabupaten_kota->satz_id_provinz((!ist_null(filter_input(INPUT_GET, $this->param_provinz, FILTER_VALIDATE_INT))) ? (filter_input(INPUT_GET, $this->param_provinz, FILTER_VALIDATE_INT)) : (0));
                    $kabupaten_kota->ausfuhren();
                    $kabupaten_kota = $kabupaten_kota->erhalten_daten();
                    foreach($kabupaten_kota as $daten)
                    {
                        echo '<option value="'.$daten[1].'" '.((!ist_null(filter_input(INPUT_GET, $this->param_kabupaten))) ? (((int)filter_input(INPUT_GET, $this->param_kabupaten, FILTER_VALIDATE_INT) === (int)$daten[1]) ? ('selected="selected"') : ('')) : ('')).'>'.$daten[2].'</option>';
                    }
                }
            }

        }
        echo '</select>';
    }

    public function anhanger_tabelle_und_filter_vorschau($margin_left)
    {
        $seite = filter_input(INPUT_GET, $this->param_seite, FILTER_VALIDATE_INT);
        if($seite === false || $seite === null)
        {
            $url = new url_kodierer();
            $url->hinzufugen(bestellung);
            $url->hinzufugen($this->bestellung);
            $url->hinzufugen($this->param_filter);
            $url->hinzufugen(
                (
                ((strcasecmp(filter_input(INPUT_GET, $this->param_filter), $this->alle_filter) === 0)) ?
                    ($this->alle_filter)
                    :
                    (
                    ((filter_input(INPUT_GET, $this->param_filter, FILTER_VALIDATE_INT) === false || filter_input(INPUT_GET, $this->param_filter, FILTER_VALIDATE_INT) === null)) ?
                        ($this->alle_filter)
                        :
                        (filter_input(INPUT_GET, $this->param_filter, FILTER_VALIDATE_INT))
                    )
                )
            );
            $url->hinzufugen($this->param_seite);
            $url->hinzufugen(1);
            hinzufugen_url_sprache($url);
            echo '<a href="'.$url->erhalten().'">';
            echo '<img src="bilder/vorschau.png"style="margin-left:'.$margin_left.'px;" width="40px">';
            echo '</a>';
        }
        else
        {
            if(((int)$seite - 1) > 0 )
            {
                $url = new url_kodierer();
                $url->hinzufugen(bestellung);
                $url->hinzufugen($this->bestellung);
                $url->hinzufugen($this->param_filter);
                $url->hinzufugen(
                    (
                    ((strcasecmp(filter_input(INPUT_GET, $this->param_filter), $this->alle_filter) === 0)) ?
                        ($this->alle_filter)
                        :
                        (
                        ((filter_input(INPUT_GET, $this->param_filter, FILTER_VALIDATE_INT) === false || filter_input(INPUT_GET, $this->param_filter, FILTER_VALIDATE_INT) === null)) ?
                            ($this->alle_filter)
                            :
                            (filter_input(INPUT_GET, $this->param_filter, FILTER_VALIDATE_INT))
                        )
                    )
                );
                $url->hinzufugen($this->param_seite);
                $url->hinzufugen(--$seite);
                hinzufugen_url_sprache($url);
                echo '<a href="'.$url->erhalten().'">';
                echo '<img src="bilder/vorschau.png"style="margin-left:'.$margin_left.'px;" width="40px">';
                echo '</a>';
            }
        }
    }

    public function anhanger_tabelle_und_filter_nachste($margin_left)
    {
        $seite = filter_input(INPUT_GET, $this->param_seite, FILTER_VALIDATE_INT);
        if($seite === false || $seite === null)
        {
            $url = new url_kodierer();
            $url->hinzufugen(bestellung);
            $url->hinzufugen($this->bestellung);
            $url->hinzufugen($this->param_filter);
            $url->hinzufugen(
                (
                ((strcasecmp(filter_input(INPUT_GET, $this->param_filter), $this->alle_filter) === 0)) ?
                    ($this->alle_filter)
                    :
                    (
                    ((filter_input(INPUT_GET, $this->param_filter, FILTER_VALIDATE_INT) === false || filter_input(INPUT_GET, $this->param_filter, FILTER_VALIDATE_INT) === null)) ?
                        ($this->alle_filter)
                        :
                        (filter_input(INPUT_GET, $this->param_filter, FILTER_VALIDATE_INT))
                    )
                )
            );
            $url->hinzufugen($this->param_seite);
            $url->hinzufugen(1);
            hinzufugen_url_sprache($url);
            echo '<a href="'.$url->erhalten().'">';
            echo '<img src="bilder/nachste.png"style="margin-left:'.$margin_left.'px;" width="40px">';
            echo '</a>';
        }
        else
        {
            if(((int)$seite + 1) < ($this->max_seite + 1) )
            {
                $url = new url_kodierer();
                $url->hinzufugen(bestellung);
                $url->hinzufugen($this->bestellung);
                $url->hinzufugen($this->param_filter);
                $url->hinzufugen(
                    (
                    ((strcasecmp(filter_input(INPUT_GET, $this->param_filter), $this->alle_filter) === 0)) ?
                        ($this->alle_filter)
                        :
                        (
                        ((filter_input(INPUT_GET, $this->param_filter, FILTER_VALIDATE_INT) === false || filter_input(INPUT_GET, $this->param_filter, FILTER_VALIDATE_INT) === null)) ?
                            ($this->alle_filter)
                            :
                            (filter_input(INPUT_GET, $this->param_filter, FILTER_VALIDATE_INT))
                        )
                    )
                );
                $url->hinzufugen($this->param_seite);
                $url->hinzufugen($seite + 1);
                hinzufugen_url_sprache($url);
                echo '<a href="'.$url->erhalten().'">';
                echo '<img src="bilder/nachste.png"style="margin-left:'.$margin_left.'px;" width="40px">';
                echo '</a>';
            }
        }
    }

    abstract function anhanger_tabelle_und_filter_tabelle();
}