<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if(!defined("standart_system_pfad"))
{
    define("standart_system_pfad", $_SERVER['DOCUMENT_ROOT'].'/satgas/');
}

const sitzung_aktive = "sz233533435465";
const sitzung_nicht_aktive = "sz2995495840";

const super_admin = "0000000001";

const standard_pfad = "server_skript/xml/";
const standard_sprache = "id";

//ordner
const ordner_server_skript = "server_skript";
const ordner_xml = "xml";
const ordner_tabellen_kalkulation = "tabellen_kalkulation";
const base = "base";

const sprache = "sz23244543436";


//data type
const PHP = "php";
const XML = "xml";
const JPEG = "jpeg";

//sitzung
//1000xx
const sitzung_name = "sz114040331";
const id_benutzername = "sz100000";
const benutzername = "sz100001";
const passwort = "sz100002";
const c_passwort = "sz100003";
const btt_anmeldung = "sz100004";
const admin = "sz100005";
const nationalen = "sz100006";
const provinz = "sz100007";
const kabupaten = "sz100008";


//gemeinsame
const anmeldung_zeit = 3600;
const zeit = "sz00000";
const titel = "sz00001";
const nachricht = "sz00002";
const code = "sz00003";
const fertig_zeit = "sz00004";
const methode_post = "sz00005";
const methode_get = "sz00006";


const parameter_sprache = "nmlf-spr-04920700";

//bestellung nmlf049207xx(nmlf-x...x-049207xx)
const bestellung = "nmlf04920700";
const sub_bestellung = "nmlf04920701";
//bestellung anzaigen
//nmlf-a-049207xx
const bestellung_bindestricht_brett = "nmlf-a-04920700";
const bestellung_anzaigen_anmeldung = "nmlf-a-04920701";
const bestellung_anzaigen_einfugen = "nmlf-a-04920702";
const bestellung_bericht_nationalen = "nmlf-a-04920703";
const bestellung_bericht_provinz = "nmlf-a-04920704";
const bestellung_bericht_kabupaten = "nmlf-a-04920705";
const bestellung_anzaigen_andern_passwort = "nmlf-a-04920706";
const bestellung_hinzufugen_benutzer_anzaigen = "nmlf-a-04920707";
const bestellung_fehler = "nmlf-a-04920708";
const bestellung_anzaigen_einstellung_nachricht_und_kontakt = "nmlf-a-04920709";
const bestellung_anzaigen_perfil = "nmlf-a-04920710";
const bestellung_anzaigen_einstellung_benutzer = "nmlf-a-04920711";
const bestellung_anzaigen_einfugen_datei = 'nmlf-a-04920712';

//bestellung post nmlf-mp-049207xx
const bestellung_anmeldung = "nmlf-mp-04920700";
const bestellung_logout = "nmlf-mp-04920701";
const bestellung_einfugen = "nmlf-mp-04920702";
const bestellung_hinzufugen_benutzer = "nmlf-mp-04920703";
const bestellung_andern_passwort = "nmlf-mp-04920704";
const bestellung_einstellung_nachricht_und_kontakt = "nmlf-mp-04920705";
const bestellung_update_benutzer_perfil ="nmlf-mp-04920706";
const bestellung_einfugen_datei_upload = "nmlf-mp-04920707";

//bestellung get nmlf-mg-049207xx
const bestellung_wahle_allen_kabupaten_kota_json = "nmlf-mg-04920700";
const bestellung_ausgabe_excel = "nmlf-mg-04920701";
const bestellung_ausgabe_pdf = "nmlf-mg-04920702";
const bestellung_diagramme = "nmlf-mg-04920703";
const bestellung_vergleichen = "nmlf-mg-04920704";
const bestellung_erhalten_token = "nmlf-mg-04920705";
const bestellung_einfugen_datei_download = "nmlf-mg-04920706";
const bestellung_einfugen_datei_mulleimer = "nmlf-mg-04920707";
const bestellung_einstellung_benutzer_benutzer_mulleimer = "nmlf-mg-04920708";
const bestellung_einstellung_benutzer_benutzer_wiederherstellen = "nmlf-mg-04920709";
const bestellung_vergessen_passwort = "nmlf-mg-04920710";
const bestellung_json_sitzung_aktive_nicht_aktive = "nmlf-mg-04920711";

//bestellung sub bestellung nmlf-sb-049207xx
const bestellung_ausgabe_excel_nationalen = "nmlf-sb-04920700";
const bestellung_ausgabe_excel_provinz = "nmlf-sb-04920701";
const bestellung_ausgabe_excel_kabupaten = "nmlf-sb-04920702";
const bestellung_ausgabe_pdf_nationalen = "nmlf-sb-04920703";
const bestellung_ausgabe_pdf_provinz = "nmlf-sb-04920704";
const bestellung_ausgabe_pdf_kabupaten = "nmlf-sb-04920705";
const bestellung_diagramme_wahle_allen_koperasi_von_propinsi = "nmlf-sb-04920706";
const bestellung_diagramme_wahle_allen_koperasi_von_kabupaten = "nmlf-sb-04920707";
const bestellung_diagramme_wahle_allen_insgesamt_koperasi_von_datum_bentuk_provinz_kabupaten = "nmlf-sb-04920708";
const parameter_provinz_bestellung_diagramme_wahle_allen_insgesamt_koperasi_von_datum_bentuk_provinz_kabupaten = "nmlf-sb-04920709";
const bestellung_vergleichen_einfugen_insgesamt_koperasi = "nmlf-sb-04920710";
const bestellung_vergleichen_einfugen_insgesamt_koperasi_aktive = "nmlf-sb-04920711";
const bestellung_vergleichen_einfugen_jumlah_anggota_wanita = "nmlf-sb-04920712";
const bestellung_vergleichen_einfugen_jumlah_anggota_pria = "nmlf-sb-04920713";
const bestellung_vergleichen_einfugen_total_jumlah_anggota = "nmlf-sb-04920714";
const bestellung_vergleichen_einfugen_jumlah_calon_anggota_wanita = "nmlf-sb-04920715";
const bestellung_vergleichen_einfugen_jumlah_calon_anggota_pria = "nmlf-sb-04920716";
const bestellung_vergleichen_einfugen_total_jumlah_calon_anggota = "nmlf-sb-04920717";
const bestellung_vergleichen_einfugen_modal_sendiri = "nmlf-sb-04920718";
const bestellung_vergleichen_einfugen_modal_pinjaman = "nmlf-sb-04920719";
const bestellung_vergleichen_einfugen_modal_penyertaan = "nmlf-sb-04920720";
const bestellung_vergleichen_einfugen_asset = "nmlf-sb-04920721";
const bestellung_vergleichen_einfugen_simpanan_diterima = "nmlf-sb-04920722";
const bestellung_vergleichen_einfugen_pinjaman_diberikan = "nmlf-sb-04920723";
const bestellung_vergleichen_einfugen_volume_usaha = "nmlf-sb-04920724";
const bestellung_vergleichen_einfugen_shu = "nmlf-sb-04920725";
const bestellung_vergleichen_einfugen_yang_memiliki_ijin_usaha = "nmlf-sb-04920726";
const bestellung_vergleichen_einfugen_jumlah_yg_telah_rat = "nmlf-sb-04920727";
const bestellung_vergleichen_einfugen_telah_dinilai_kesehatannya = "nmlf-sb-04920728";
const bestellung_vergleichen_einfugen_sehat = "nmlf-sb-04920729";
const bestellung_vergleichen_einfugen_cukup_sehat = "nmlf-sb-04920730";
const bestellung_vergleichen_einfugen_kurang_sehat = "nmlf-sb-04920731";
const bestellung_vergleichen_einfugen_tidak_sehat = "nmlf-sb-04920732";
const bestellung_vergleichen_einfugen_sangat_tidak_sehat = "nmlf-sb-04920733";
const bestellung_vergleichen_einfugen_tidak_dapat_dinilai = "nmlf-sb-04920734";
const bestellung_vergleichen_einfugen_belum_dinilai = "nmlf-sb-04920735";
const bestellung_vergleichen_einfugen_jumlah_karyawan_pria = "nmlf-sb-04920736";
const bestellung_vergleichen_einfugen_jumlah_karyawan_wanita = "nmlf-sb-04920737";
const bestellung_vergleichen_einfugen_total_jumlah_karyawan = "nmlf-sb-04920738";
const bestellung_vergleichen_einfugen_jumlah_manager_wanita = "nmlf-sb-04920739";
const bestellung_vergleichen_einfugen_jumlah_manager_pria = "nmlf-sb-04920740";
const bestellung_vergleichen_einfugen_total_jumlah_manager = "nmlf-sb-04920741";
const bestellung_vergleichen_einfugen_total_jumlah_tenaga_kerja = "nmlf-sb-04920742";

//isi_btt
if(!defined("btt_anmeldung_inhalt"))
{
    define("btt_anmeldung_inhalt", "Login");
}


//csrf schlussel token
//104-1xx
const csrf_token_length = 50;
const csrf_zeit = 100000;
const csrf_zeit_schlussel = "sz104-10-1";
const csrf_schlussel = "sz104-100";
const csrf_token = "sz10400-0";

//eingabe/einfugen
//sz1041xx
const jumlah_koperasi = "sz104100";
const jumlah_koperasi_aktif = "sz104101";
const jumlah_anggota_wanita = "sz104102";
const jumlah_anggota_pria = "sz104103";
const total_jumlah_anggota = "sz104104";
const jumlah_calon_anggota_wanita = "sz104105";
const jumlah_calon_anggota_pria = "sz104106";
const total_jumlah_calon_anggota = "sz104107";
const modal_sendiri = "sz104108";
const modal_pinjaman = "sz104109";
const modal_penyertaan = "sz104110";
const asset = "sz104111";
const simpanan_diterima = "sz104112";
const pinjaman_diberikan = "sz104113";
const volume_usaha = "sz104114";
const shu = "sz104115";
const yang_memiliki_ijin_usaha = "sz104116";
const jumlah_yg_telah_rat = "sz104117";
const telah_dinilai_kesehatannya = "sz104118";
const sehat = "sz104119";
const cukup_sehat = "sz104120";
const kurang_sehat = "sz104121";
const tidak_sehat = "sz104122";
const sangat_tidak_sehat = "sz104123";
const tidak_dapat_dinilai = "sz104125";
const belum_dinilai = "sz104126";
const jumlah_karyawan_pria = "sz104127";
const jumlah_karyawan_wanita = "sz104128";
const total_jumlah_karyawan = "sz104129";
const jumlah_manager_wanita = "sz104130";
const jumlah_manager_pria = "sz104131";
const total_jumlah_manager = "sz104132";
const total_jumlah_tenaga_kerja = "sz104133";
const einfugen_ziel = "sz104134";
const einfugen_aktive_model = "sz104135";
const einfugen_aktive_ziel = "sz104136";


const einfugen_jahr = "sz104137";
const einfugen_monat = "sz104138";
const einfugen_model = "sz104139";
const einfugen_bentuk = "sz104140";
const einfugen_provinz = "sz104141";
const einfugen_kabupaten = "sz104142";
const einfugen_schlussel = "sz104143";


//diagramme
//sz1042xx
const diagramme1 = "sz104200";
const diagramme2 = "sz104201";
const diagramme3 = "sz104202";
const diagramme4 = "sz104203";
const diagramme_jahr = "sz104204";
const diagramme_monat = "sz104205";
//diagramme_key
//sz104206xx
const diagramme_optionen_key = array(
    "sz10420600",
    "sz10420601",
    "sz10420602",
    "sz10420603",
    "sz10420604",
    "sz10420605",
    "sz10420606",
    "sz10420607",
    "sz10420608",
    "sz10420609",
    "sz10420610",
    "sz10420611",
    "sz10420612",
    "sz10420613",
    "sz10420614",
    "sz10420615",
    "sz10420616",
    "sz10420617",
    "sz10420618",
    "sz10420619",
    );
//end diagramme_key
//diagramme_string_key
const diagramme_optionen_string_key = array(
    "jumlah koperasi",
    "jumlah koperasi aktif",
    "jumlah anggota",
    "modal sendiri",
    "modal pinjaman",
    "modal penyertaan",
    "nilai asset",
    "simpanan diterima",
    "pinjaman diberikan",
    "volume usaha",
    "shu",
    "yang memiliki ijin usaha",
    "rat",
    "sehat",
    "cukup sehat",
    "kurang sehat",
    "tidak sehat",
    "sangat tidak sehat",
    "jumlah kesehatan",
    "belum dinilai",
    );
//end diagramme_string_key
const diagramme_parameter_propinsi = "sz104207";
const diagramme_chart3_propinsi = "sz104208";
const diagramme_parameter_kabupaten = "sz104209";
const diagramme_parameter_bentuk = "sz104210";
const diagramme_json_key_result = "sz104211";
const diagramme_parameter_diagramme1_kategorie = "sz104212";


//chart key html
//sz1043xx
const char1 = "sz104300";
const char2 = "sz104301";
const char3 = "sz104302";
const char4 = "sz104303";

//ausgabe
//amwly049330xx
const ausgabe_jahr = "amwly04933000";
const ausgabe_monat = "amwly04933001";
const ausgabe_parameter_model = "amwly04933002";
const ausgabe_parameter_model_alle = "amwly04933003";
const ausgabe_parameter_model_zeichenfolge = "amwly04933004";
const ausgabe_parameter_provinz = "amwly04933005";
const ausgabe_parameter_provinz_zeichenfolge = "amwly04933006";
const ausgabe_parameter_provinz_alle = "amwly04933007";


//json schlussel zuordnung
//sz1045xx
//beginnen wahle_allen_insgesamt_koperasi_von_datum_bentuk_provinz_kabupaten
const json_fehler = "sz104500";
const json_id_model = "sz104501";
const json_model = "sz104502";
const json_nama_pendek_model = "sz104503";
const json_insgesamt_koperasi_satgas = "sz104504";
const json_insgesamt_koperasi_data_individual = "sz104505";
const json_kabupaten = "sz104506";
const json_id_kabupaten = "sz104507";
const json_name_kabupaten = "sz104508";
const json_csrf_schlussel = "sz104509";
const json_csrf_token = "sz104510";
const json_einfugen_vergleichen = "sz104511";
const json_sitzung_aktive_nicht_aktive = "sz104512";
const json_sitzung_aktive_nicht_aktive_aktive = "sz104513";
const json_sitzung_aktive_nicht_aktive_nicht_aktive = "sz104514";

//hinzufugen benutzer
//sz1046xx
const hinzufugen_benutzer_vorschau_bilder_bilder = "sz104600";
const hinzufugen_benutzer_vorschau_bilder_einfugen = "sz104601";
const hinzufugen_Benutzer_benutzer = "sz104602";
const hinzufugen_benutzer_adresse = "sz104603";
const hinzufugen_benutzer_email = "sz104604";
const hinzufugen_benutzer_telefon = "sz104605";
const hinzufugen_benutzer_telefax = "sz104606";
const hinzufugen_benutzer_id = "sz104607";
const hinzufugen_benutzer_typ = "sz104608";
const hinzufugen_benutzer_provinz = "sz104609";
const hinzufugen_benutzer_kabupaten = "sz104610";

//andern passwort
//sz1199xx
const andern_passwort_id = "sz119900";
const andern_passwort_benutzername = "sz119901";
const andern_passwort_aktuelle_passwort = "sz119902";
const andern_passwort_neu_passwort = "sz119903";
const andern_passwort_bestatigen_neu_passwort = "sz119904";

//still
const stil_jquery_ui = '<link href="zusatzliche/css/jquery-ui.css" rel="stylesheet" type="text/css">';
const stil_cssscroll = '<link href="zusatzliche/css/cssscroll.css" rel="stylesheet" type="text/css"/>';
const stil_font_kecil = '<link href="zusatzliche/css/font-kecil.css" rel="stylesheet" type="text/css"/>';;
const stil_generic = '<link href="zusatzliche/css/generic.css" rel="stylesheet" type="text/css"/>';
const stil_input = '<link href="zusatzliche/css/input.css" rel="stylesheet" type="text/css"/>';
const stil_input_style = '<link href="zusatzliche/css/input_style.css" rel="stylesheet" type="text/css"/>';
const stil_js_image_slider = '<link href="zusatzliche/css/js-image-slider.css" rel="stylesheet" type="text/css"/>';
//const stil_mediaqueries = '<link href="zusatzliche/css/mediaqueries.css" rel="stylesheet" type="text/css"/>';
const stil_mediaqueries = '';
//const stil_mediaqueriesD = '<link href="zusatzliche/css/mediaqueriesD.css" rel="stylesheet" type="text/css"/>';
const stil_mediaqueriesD = '';
const stil_menudalam = '<link href="zusatzliche/css/menudalam.css" rel="stylesheet" type="text/css"/>';
const stil_sliding_box = '<link href="zusatzliche/css/sliding_box.css" rel="stylesheet" type="text/css"/>';
const stil_stil_anzaigen_hinzufugen_benutzer = '<link href="zusatzliche/css/stil_anzaigen_hinzufugen_benutzer.css" rel="stylesheet" type="text/css"/>';
const stil_style = '<link href="zusatzliche/css/style.css" rel="stylesheet" type="text/css"/>';
const stil_styleD = '<link href="zusatzliche/css/styleD.css" rel="stylesheet" type="text/css"/>';
const stil_styleI = '<link href="zusatzliche/css/styleI.css" rel="stylesheet" type="text/css"/>';

//client_skript
const client_skript_jquery = '<script src="zusatzliche/client_skript/jquery-2.1.4.min.js"></script>';
const client_skript_jquery_c = '<script src="zusatzliche/client_skript/jquery.js"></script>';
const client_skript_google_jquery = '<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.0/jquery.min.js"></script>';
const client_skript_menudalamA = '<script src="zusatzliche/client_skript/menudalamA.js"></script>';
const client_skript_js_image_slider = '<script src="zusatzliche/client_skript/js-image-slider.js"></script>';
const client_skript_gemeinsame = '<script src="zusatzliche/client_skript/gemeinsame.js"></script>';
const client_skript_fullung_kab_kota = '<script src="zusatzliche/client_skript/fullung_kab_kota.php"></script>';
const client_skript_google_api = '<script src="https://www.google.com/jsapi" type="text/javascript"></script>';
const client_skript_anhanger_base_tabelle_und_filter = '<script src="zusatzliche/client_skript/anhanger_base_tabelle_und_filter.js" type="text/javascript"></script>';
const client_skript_ist_sitzung_korriegieren = '<script src="zusatzliche/client_skript/ist_sitzung_korrigieren.php" type="text/javascript"></script>';

const client_skript_bindestricht_brett_chart1 = '<script src="zusatzliche/client_skript/index/diagramme/chart1.php" type="text/javascript"></script>';
const client_skript_bindestricht_brett_chart4 = '<script src="zusatzliche/client_skript/index/diagramme/chart4.php" type="text/javascript"></script>';
const client_skript_bindestricht_diagramme_2_und_3 = '<script src="zusatzliche/client_skript/index/diagramme/diagramme_2_und_3.php" type="text/javascript"></script>';
//<script src="zusatzliche/client_skript/index/diagramme_fullung_kab_kota.php" type="text/javascript"></script>

const client_skript_eingabe_eingabe = '<script src="zusatzliche/client_skript/eingabe/eingabe.js"></script>';
const client_skript_eigabe_einfugen_schnittstelle = '<script src="zusatzliche/client_skript/eingabe/einfugen_schnittstelle.js"></script>';
const client_skript_vergleichen_einfugen = '<script src="zusatzliche/client_skript/eingabe/vergleichen_einfugen.php"></script>';
const client_skript_wann_senden = '<script src="zusatzliche/client_skript/eingabe/wann_senden.php"></script>';;

const client_skript_pdf = '<script src="zusatzliche/client_skript/ausgabe/pdf.js"></script>';
const client_skript_ausgabe_nationalen = '<script src="zusatzliche/client_skript/ausgabe/ausgabe_nationalen.php"></script>';
const client_skript_ausgabe_provinz = '<script src="zusatzliche/client_skript/ausgabe/ausgabe_provinz.php"></script>';
const client_skript_ausgabe_kabupaten = '<script src="zusatzliche/client_skript/ausgabe/ausgabe_kabupaten.php" ></script>';

const client_skript_andern_password = '<script src="zusatzliche/client_skript/benutzer/andern_passwort.js" type="text/javascript"></script>';
const client_skript_hinzufugen_benutzer = '<script src="zusatzliche/client_skript/benutzer/hinzufugen_benutzer.js" type="text/javascript"></script>';
const client_skript_benutzer_anzaigen_einstellung_benutzer = '<script src="zusatzliche/client_skript/benutzer/client_skript_anzaigen_einstellung_benutzer.php"></script>';

const client_skript_einfugen_datei = '<script src="zusatzliche/client_skript/eingabe/file/client_skript_einfugen_datei.php"></script>';
const client_skript_eingabe_daten_refresh = '<script src="zusatzliche/client_skript/eingabe/file/eingabe_daten_refresh.js"></script>';


//einstellung_nachricht_und_kontakt
//sz1191xx
const einstellung_nachricht_und_kontakt_nachricht = "sz119101";
const einstellung_nachricht_und_kontakt_kontakt = "sz119110";


//anzaigen_einstellung_bentuzer
//uss1991xx
const anzaigen_enstellung_benutzer_seite_max_zeile = 5;
const anzaigen_einstellung_benutzer_optionen_alle = "uss199100";
const anzaigen_einstellung_benutzer_optionen_ebene = "uss199101";
const anzaigen_einstellung_benutzer_optionen_provinz = "uss199102";
const anzaigen_einstellung_benutzer_optionen_kabupaten = "uss199103";
//parameter uss-prmt-1991xx
const parameter_anzaigen_einstellung_benutzer_optionen_filter = "uss-prmt-199100";
const parameter_anzaigen_einstellung_benutzer_optionen_provinz = "uss-prmt-199101";
const parameter_anzaigen_einstellung_benutzer_optionen_kabupaten = "uss-prmt-199102";
const parameter_anzaigen_einstellung_benutzer_numerische_seite = "uss-prmt-199103";
const parameter_einstellung_benutzer_benutzer_mulleimer_id = "uss-prmt-199103";
const parameter_einstellung_benutzer_benutzer_wiederherstellen_id = "uss-prmt-199104";

//anzaigen_einfugen_datei
//rss1888xx
const anzaigen_einfugen_datei_seite_max_zeile = 10;
const einfugen_datei_datei_id_lange = 10;
const einfugen_datei_datei_id_salz_lange = 10;
const anzaigen_einfugen_datei_optionen_alle = "rss188800";
const anzaigen_einfugen_datei_benutzer_typ = 'rss188801';
const anzaigen_einfugen_datei_benutzer_provinz = 'rss188802';
const anzaigen_einfugen_datei_benutzer_kabupaten = 'rss188803';
const anzaigen_einfugen_datei_benutzer_datum = "rss188804";
//parameter rss-prmt-1888xx
const parameter_anzaigen_einfugen_datei_datum = "rss-prmt-188800";
const parameter_anzaigen_einfugen_datei_optionen_filter = "rss-prmt-188801";
const parameter_anzaigen_einfugen_datei_optionen_provinz = "rss-prmt-188802";
const parameter_anzaigen_einfugen_datei_optionen_kabupaten = "rss-prmt-188803";
const parameter_anzaigen_einfugen_datei_numerische_seite = "rss-prmt-188804";
const parameter_anzaigen_einfugen_datei_datei_name_fur_download = "rss-prmt-188805";
const parameter_anzaigen_einfugen_datei_datei_name_fur_mulleimer = "rss-prmt-188806";
const parameter_anzaigen_einfugen_datei_datei_fur_upload = "rss-prmt-188807";

//vergessen_passwort
//css1404xx
const vergessen_passwort_passwort_lange = 4;
const parameter_vergessen_passwort_email = "css140400";
const schlussel_vergessen_passwort_id = "css140401";
const schlussel_vergessen_passwort_username = "css140402";
const schlussel_vergessen_passwort_passwort = "css140403";