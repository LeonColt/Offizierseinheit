<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once standart_system_pfad.'server_skript/base/globale_variable.php';
require_once standart_system_pfad.'server_skript/base/globale_variable_fur_datei.php';
require_once standart_system_pfad.'server_skript/base/sitzung_starter.php';
require_once standart_system_pfad.'server_skript/base/pfad_kodierer.php';
require_once standart_system_pfad.'server_skript/base/url_kodierer.php';
function ist_null()
{
    for($i = 0; $i<func_num_args(); $i++)
    {
        if(func_get_arg($i) == NULL)
        {
            return true;
        }
    }
    return false;
}
function ist_leer_ermoglichen_null()
{
    for($i = 0; $i<func_num_args(); $i++)
    {
        if(strcmp(func_get_arg($i), '') === 0) {return true;}
        if((int)func_get_arg($i) === 0) {continue;}
        else if((float)func_get_arg($i) === 0) {continue;}
        else if((double)func_get_arg($i) === 0) {continue;}
        else
        {
            if(empty(func_get_arg($i)))
            {
                return true;
            }
        }
    }
    return false;
}
function ist_leer()
{
    for($i = 0; $i<func_num_args(); $i++)
    {
        if(empty(func_get_arg($i)))
        {
            return true;
        }
    }
    return false;
}
function ist_globale_variable_vorhanden()
{
    for($i = 0; $i<func_num_args(); $i++)
    {
        if(!defined(func_get_arg($i)))
        {
            return false;
        }
    }
    return true;
}
function ist_sitzung_zeit_heraus($key)
{
    if(time() > $_SESSION[$key])
    {
        return true;
    }
    return false;
}
function ist_sitzung_korrigieren()
{
    if(session_status() === PHP_SESSION_ACTIVE)
    {
        if(isset($_SESSION[benutzername]) && !empty($_SESSION[benutzername]) && !ist_sitzung_zeit_heraus(fertig_zeit))
        {
            $_SESSION[fertig_zeit] = time() + anmeldung_zeit;
            return true;
        }
        else
        {
            unset($_SESSION[id_benutzername]);
            unset($_SESSION[benutzername]);
            unset($_SESSION[admin]);
            unset($_SESSION[nationalen]);
            unset($_SESSION[provinz]);
            unset($_SESSION[kabupaten]);
            unset($_SESSION[zeit]);
            unset($_SESSION[fertig_zeit]);
        }
    }
    return false;
}
function ist_token_korrigieren()
{
    if(!ist_null(filter_input(INPUT_POST, csrf_schlussel), filter_input(INPUT_POST, csrf_token)))
    {
        if(isset($_SESSION[filter_input(INPUT_POST, csrf_schlussel)]))
        {
            if(!ist_sitzung_zeit_heraus(csrf_zeit_schlussel) && filter_input(INPUT_POST, csrf_token) === $_SESSION[filter_input(INPUT_POST, csrf_schlussel)])
            {
                unset($_SESSION[filter_input(INPUT_POST, csrf_schlussel)]);
                unset($_SESSION[csrf_zeit_schlussel]);
                return true;
            }
        }
    }
    else if(!ist_null(filter_input(INPUT_GET, csrf_schlussel), filter_input(INPUT_GET, csrf_token)))
    {
        if(isset($_SESSION[filter_input(INPUT_GET, csrf_schlussel)]))
        {
            if(!ist_sitzung_zeit_heraus(csrf_zeit_schlussel) && filter_input(INPUT_GET, csrf_token) === $_SESSION[filter_input(INPUT_GET, csrf_schlussel)])
            {
                unset($_SESSION[filter_input(INPUT_GET, csrf_schlussel)]);
                unset($_SESSION[csrf_zeit_schlussel]);
                return true;
            }
        }
    }
    return false;
}
function ist_token_korrigieren_post()
{
    if(!ist_null($_POST[csrf_schlussel], $_POST[csrf_token]))
    {
        if(!ist_sitzung_zeit_heraus(csrf_zeit_schlussel) && $_POST[csrf_token] === $_SESSION[$_POST[csrf_schlussel]])
        {
            unset($_SESSION[$_POST[csrf_schlussel]]);
            unset($_SESSION[csrf_zeit_schlussel]);
            return true;
        }
    }
    else if(!ist_null($_GET[csrf_schlussel], $_GET[csrf_token]))
    {
        if(!ist_sitzung_zeit_heraus(csrf_zeit_schlussel) && $_GET[csrf_token] === $_SESSION[$_GET[csrf_schlussel]])
        {
            unset($_SESSION[$_GET[csrf_schlussel]]);
            unset($_SESSION[csrf_zeit_schlussel]);
            return true;
        }
    }
    return false;
}
function erhalten_base_uri()
{
    return sprintf(
    "%s://%s%s",
    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
    $_SERVER['SERVER_NAME'],""
  )."/satgas/";
}
function erhalten_uri()
{
    return sprintf(
    "%s://%s%s",
    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
    $_SERVER['SERVER_NAME'],
    $_SERVER['REQUEST_URI']
  );
}
function erhalten_jahr($input)
{
    $temp = explode("-", $input);
    return $temp[0];
}
function umleitung($url)
{
    header('Location:'.$url);
    session_write_close();
    session_regenerate_id();
    exit();
}
function umleitung_mit_nachricht($url, $message)
{
    karte_prozess();
    echo '<script type="text/javascript">window.alert("'.$message.'");window.location.href ="'.$url.'"</script>';
    session_write_close();
    session_regenerate_id();
    exit();
}
function umleitung_fehler($titel, $nachricht)
{
    $kodierer = new url_kodierer();
    $kodierer->hinzufugen(bestellung);
    $kodierer->hinzufugen(bestellung_fehler);
    $kodierer->hinzufugen(titel);
    $kodierer->hinzufugen($titel);
    $kodierer->hinzufugen(nachricht);
    $kodierer->hinzufugen($nachricht);
    hinzufugen_url_sprache($kodierer);
    header('Location:'.$kodierer->erhalten());
    if(session_status() === PHP_SESSION_ACTIVE)
    {
        session_write_close();
        session_regenerate_id();
        exit();
    }
}
function xml_lader($file)
{
    $pfad = new pfad_kodierer();
    $pfad->hinzufugen(standart_system_pfad);
    $pfad->hinzufugen(standard_pfad);
    if(!ist_null(filter_input(INPUT_GET, parameter_sprache)))
        $pfad->hinzufugen(filter_input(INPUT_GET, parameter_sprache));
    else $pfad->hinzufugen(standard_sprache);
    $pfad->hinzufugen($file);
    return $pfad->erhalten();
}
function hinzufugen_url_sprache(url_kodierer &$url, $default = false)
{
    $url->hinzufugen(parameter_sprache);
    if(!ist_null(filter_input(INPUT_GET, parameter_sprache)) && !$default)
        $url->hinzufugen(filter_input(INPUT_GET, parameter_sprache));
    else $url->hinzufugen(standard_sprache);
    return $url;
}
function ist_benutzer_admin()
{
    if($_SESSION[admin] !== false)
    {;
        return true;
    }
    return false;
}
function ist_benutzer_nationalen()
{
    if($_SESSION[nationalen] !== false)
    {
        return true;
    }
    return false;
}
function ist_benutzer_provinz()
{
    if($_SESSION[provinz] !== false)
    {
        return true;
    }
    return false;
}
function ist_benutzer_kabupaten()
{
    if($_SESSION[kabupaten] !== false)
    {
        return true;
    }
    return false;
}
function ist_bestellung_korriegieren($bestellung)
{
    if(strcasecmp($bestellung, bestellung_json_sitzung_aktive_nicht_aktive) === 0) return true;
    else if(ist_sitzung_korrigieren())
    {
        switch($bestellung)
        {
            case bestellung_logout:
            case bestellung_einfugen:
            case bestellung_andern_passwort:
            case bestellung_wahle_allen_kabupaten_kota_json:
            case bestellung_vergleichen: case bestellung_erhalten_token:
            case bestellung_update_benutzer_perfil:
            case bestellung_einfugen_datei_upload:
            case bestellung_einfugen_datei_download:
            case bestellung_einfugen_datei_mulleimer:
            return true; break;
            case bestellung_anmeldung: return false; break;
            case bestellung_hinzufugen_benutzer: case bestellung_einstellung_nachricht_und_kontakt: {if(ist_benutzer_admin()) return true; else return false;} break;
            case bestellung_ausgabe_excel:
            {
                switch(filter_input(INPUT_GET, sub_bestellung))
                {
                    case bestellung_ausgabe_excel_nationalen: case bestellung_ausgabe_excel_provinz:
                    {
                        if(ist_benutzer_admin() || ist_benutzer_nationalen()) return true;
                    } break;
                    case bestellung_ausgabe_excel_kabupaten:
                    {
                        if(ist_benutzer_admin() || ist_benutzer_nationalen())
                        {
                            return true;
                        }
                        else if((int)filter_input(INPUT_GET, ausgabe_parameter_provinz) === (int)$_SESSION[provinz][0]) return true;
                    } break;
                }
            } break;
            case bestellung_ausgabe_pdf:
            {
                switch(filter_input(INPUT_GET, sub_bestellung))
                {
                    case bestellung_ausgabe_pdf_nationalen: case bestellung_ausgabe_pdf_provinz:
                    {
                        if(ist_benutzer_admin() || ist_benutzer_nationalen()) return true;
                    } break;
                    case bestellung_ausgabe_pdf_kabupaten:
                    {
                        if(ist_benutzer_admin() || ist_benutzer_nationalen())
                        {
                            return true;
                        }
                        else if((int)filter_input(INPUT_GET, ausgabe_parameter_provinz) === (int)$_SESSION[provinz][0]) return true;
                    } break;
                }
            } break;
            case bestellung_diagramme:
            {
                switch(filter_input(INPUT_GET, sub_bestellung))
                {
                    case bestellung_diagramme_wahle_allen_koperasi_von_propinsi:
                    {
                        if(ist_benutzer_admin() || ist_benutzer_nationalen()) return true;
                    } break;
                    case bestellung_diagramme_wahle_allen_koperasi_von_kabupaten:
                    {
                        if(ist_benutzer_admin() || ist_benutzer_nationalen())
                        {
                            return true;
                        }
                        else if((int)filter_input(INPUT_GET, ausgabe_parameter_provinz) === (int)$_SESSION[provinz][0]) return true;
                    } break;
                    case bestellung_diagramme_wahle_allen_insgesamt_koperasi_von_datum_bentuk_provinz_kabupaten:
                    {
                        return true;
                    } break;

                    default: return true;
                }
            } break;

            case bestellung_einstellung_benutzer_benutzer_mulleimer:
            {
                if(ist_benutzer_admin()) return true; else return false;
            } break;

            case bestellung_einstellung_benutzer_benutzer_wiederherstellen:
            {
                if(ist_benutzer_admin()) return true; else return false;
            } break;
        }
    }
    else
    {
        if(strcasecmp($bestellung, bestellung_anmeldung) === 0) return true;
        if(strcasecmp($bestellung, bestellung_logout) === 0) return true;
        if(strcasecmp($bestellung, bestellung_vergessen_passwort) === 0) return true;
    }
    return false;
}
function karte_prozess()
{
    echo '<html>
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="zusatzliche/css/styleI.css" rel="stylesheet" type="text/css" />
        <link href="zusatzliche/css/mediaqueriesD.css" rel="stylesheet" type="text/css" />
        <link type="text/css" rel="stylesheet" href="zusatzliche/css/sliding_box.css">
        <link rel="icon" href="bilder/garuda.png" type="image/x-icon">
        
    </head>
    <body>
     <div id="pagewrap">
    <div id="header" ></div>
    <div id ="info" >
        <marquee direction="left" scrollamount="5" text-align="center">
            <p >Berisi tentang informasi-informasi dari database</p></marquee>
    </div>
    <div id="content" >
        <div id="insidecontent">
            <img class="monitoring" src="bilder/tagline.png">
        </div>
        <div id="back">
            <center></center>
            <h1 align="center">
             <br>
            <br>
            <!-- google chart disini-->
          
            <br>
            <br>
            Terima Kasih atas Kerjasamanya.
        </div>
    </div>
           <input type="checkbox"  id="cek">
			<label id="tombol" for="cek">
				<span id="buka">Help</span>
				<span id="tutup">Help</span>
			</label>
			
			<div id="box">
				<div id="konten">
					Ini adalah konten dari sliding box. Di sini dapat diisi fasilitas chating, form kontak, dan sebagainya. 
				</div>				
			</div>	
  
         
 
    
    <div id="footer">
      <p > Copyright (c) 2015 - Kementerian Koperasi dan Usaha Kecil dan Menengah - Deputi Pembiayaan</p>
    </div>
 
    </div> <!--#pagewrap -->
    </body>
   
</html>';
}