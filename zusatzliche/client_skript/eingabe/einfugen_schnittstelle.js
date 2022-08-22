/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//dependency eingabe.php
function einfugen_berechne_gesund_vergleichen(id_numerische, id_insgesamt_koperasi, id_insgesamt_koperasi_aktif, id_insgesamt_telah_dinilai, id_insgesamt_belum_dinilai, id_feine,  id_fein_genug, id_nicht_gut, krank, sehr_krank, id_ziel)
{
    berechne_gesund_schnittstelle(id_numerische, id_insgesamt_koperasi, id_insgesamt_koperasi_aktif, id_insgesamt_telah_dinilai, id_insgesamt_belum_dinilai, id_feine,  id_fein_genug, id_nicht_gut, krank, sehr_krank);
    vergleichen_einfugen(document.getElementById(id_ziel), document.getElementById(id_numerische));
}
function einfugen_numerische_vergleichen(id_numerische, id_ziel)
{
    numerische(document.getElementById(id_numerische));
    vergleichen_einfugen(document.getElementById(id_ziel),  document.getElementById(id_numerische));
}
function einfugen_drei_punkt_vergleichen(id_numerische, id_ziel)
{
    numerische(document.getElementById(id_numerische));
    drei_punkt(document.getElementById(id_numerische));
    vergleichen_einfugen(document.getElementById(id_ziel),  document.getElementById(id_numerische));
}
function einfugen_berechne_links_rechts_vergleichen(id_numerische, id_insgesamt, id_links, id_rechts, id_ziel)
{
    numerische(document.getElementById(id_numerische));
    berechne_links_rechts(document.getElementById(id_insgesamt), document.getElementById(id_links), document.getElementById(id_rechts));
    vergleichen_einfugen(document.getElementById(id_ziel), document.getElementById(id_numerische));
}
function einfugen_berechne_arbeiter_vergleichen(id_numerische,id_insgesamt_arbeiter, id_insgesamt_mitarbeiter, id_insgesamt_manager, id_mitarbeiter_weiblich, id_mitarbeiter_mannchen, id_manager_weiblich, id_manager_mannchen, id_ziel)
{
    berechne_arbeiter(id_numerische,id_insgesamt_arbeiter, id_insgesamt_mitarbeiter, id_insgesamt_manager, id_mitarbeiter_weiblich, id_mitarbeiter_mannchen, id_manager_weiblich, id_manager_mannchen);
    vergleichen_einfugen(document.getElementById(id_ziel), document.getElementById(id_numerische));
}
function einfugen_andern_provinz(id_provinz, id_kabupaten)
{
    fullung_kab_kota(id_provinz, id_kabupaten);
}
function einfugen_andern_kabupaten()
{
}
function einfugen_andern_model()
{
}
function einfugen_andern_bentuk()
{
}
function einfugen_andern_jahr()
{
}
function einfugen_andern_monat()
{
}



function berechne_arbeiter(id_numerische,id_insgesamt_arbeiter, id_insgesamt_mitarbeiter, id_insgesamt_manager, id_mitarbeiter_weiblich, id_mitarbeiter_mannchen, id_manager_weiblich, id_manager_mannchen)
{
    numerische(document.getElementById(id_numerische));
    berechne_links_rechts(document.getElementById(id_insgesamt_mitarbeiter), document.getElementById(id_mitarbeiter_weiblich), document.getElementById(id_mitarbeiter_mannchen));
    berechne_links_rechts(document.getElementById(id_insgesamt_manager), document.getElementById(id_manager_weiblich), document.getElementById(id_manager_mannchen));
    berechne_links_rechts(document.getElementById(id_insgesamt_arbeiter), document.getElementById(id_insgesamt_mitarbeiter), document.getElementById(id_insgesamt_manager));
}
function berechne_gesund_schnittstelle(id_numerische, id_insgesamt_koperasi, id_insgesamt_koperasi_aktif, id_insgesamt_telah_dinilai, id_insgesamt_belum_dinilai, id_feine,  id_fein_genug, id_nicht_gut, krank, sehr_krank)
{
    numerische(document.getElementById(id_numerische));
    berechne_gesund(document.getElementById(id_insgesamt_telah_dinilai),
    document.getElementById(id_feine), 
    document.getElementById(id_fein_genug), 
    document.getElementById(id_nicht_gut), 
    document.getElementById(krank), 
    document.getElementById(sehr_krank));
    subtrahieren_links_rechts(document.getElementById(id_insgesamt_belum_dinilai), document.getElementById(id_insgesamt_koperasi), document.getElementById(id_insgesamt_telah_dinilai));
    if(ist_links_mehr_als_rechts(id_insgesamt_koperasi, id_insgesamt_koperasi_aktif) < 0)
    {
        alert("jumlah koperasi aktif melebihi jumlah koperasi");
    }
}
function satz_geld(widget)
{
    numerische(widget);
    drei_punkt(widget);
}
function mark_geben(id_numerische)
{
    numerische(document.getElementById(id_numerische));
}
