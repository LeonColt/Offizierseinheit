/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function numerische(widget){var temp = widget.value;var temp1 = "";for(var i = 0; i<temp.length; i++){if(temp[i] === '0' || temp[i] === '1'|| temp[i] === '2'|| temp[i] === '3'|| temp[i] === '4'|| temp[i] === '5'|| temp[i] === '6'|| temp[i] === '7'|| temp[i] === '8'|| temp[i] === '9'){temp1 = temp1 + temp[i];}}widget.value = temp1;}function drei_punkt(widget){var temp = widget.value;var temp1 = "";var zahler = 0;for(var i = temp.length - 1; i>-1; i--){if(zahler < 3){temp1 = temp1 + temp[i];}else{temp1 = temp1 + ",";temp1 = temp1 + temp[i];zahler = 0;}zahler++;}temp = "";for(var i = temp1.length-1; i > -1; i--){temp = temp + temp1[i];}widget.value = temp;}
function entfernung_drei_punkt(value)
{
    var temp = "";
    for(var i = 0; i < value.length; i++)
    {
        if(value[i] !== '.')
        {
            temp += value[i];
        }
    }
    return temp;
}
function berechne_links_rechts(insgesamt, links, rechts)
{
    var i_links = 0, i_rechts = 0;
    if(links.value.length > 0)
    {
        i_links = parseInt(links.value);
    }
    if(rechts.value.length > 0)
    {
        i_rechts = parseInt(rechts.value);
    }
    var i_insgesamt = i_links+i_rechts;
    if(i_insgesamt.toString().length > 0)
    {
        insgesamt.value = i_insgesamt.toString();
    }
    else
    {
        insgesamt.value = "0";
    }
}


function berechne_weiblich_männchen(insgesamt, weiblich, männchen)
{
    if(weiblich.value.length > 0 && männchen.value.length > 0)
    {
        insgesamt.value = (parseInt(weiblich.value) + parseInt(männchen.value)).toString();
    }
    else if(weiblich.value.length === 0 && männchen.value.length > 0)
    {
        insgesamt.value = männchen.value;
    }
    else if(weiblich.value.length > 0 && männchen.value.length === 0)
    {
        insgesamt.value = weiblich.value;
    }
    else insgesamt.value = "0";
}

function subtrahieren_links_rechts(insgesamt, links, rechts)
{
    var i_links = 0, i_rechts = 0;
    if(links.value.length > 0)
    {
        i_links = parseInt(links.value);
    }
    if(rechts.value.length > 0)
    {
        i_rechts = parseInt(rechts.value);
    }
    var i_insgesamt = i_links-i_rechts;
    if(i_insgesamt.toString().length > 0)
    {
        insgesamt.value = i_insgesamt.toString();
    }
    else
    {
        insgesamt.value = "0";
    }
}

function berechne_gesund(insgesamt, feine, fein_genug, nicht_gut, krank, sehr_krank)
{
    var v_feine = 0, v_fein_genug = 0, v_nicht_gut = 0, v_krank = 0, v_sehr_krank = 0;
    if(feine.value.length > 0)
    {
        v_feine = parseInt(feine.value);
    }
    if(fein_genug.value.length > 0)
    {
        v_fein_genug = parseInt(fein_genug.value);
    }
    if(nicht_gut.value.length > 0)
    {
        v_nicht_gut = parseInt(nicht_gut.value);
    }
    if(krank.value.length > 0)
    {
        v_krank = parseInt(krank.value);
    }
    if(sehr_krank.value.length > 0)
    {
        v_sehr_krank = parseInt(sehr_krank.value);
    }
    var v_insgesamt = v_feine + v_fein_genug + v_nicht_gut + v_krank + v_sehr_krank;
    if(v_insgesamt > 0)
    {
        insgesamt.value = v_insgesamt.toString();
    }
    else
    {
        insgesamt.value = "";
    }
}

function numerische_berechne_weiblich(insgesamt, weiblich, männchen)
{
    numerische(document.getElementById(weiblich));
    berechne_weiblich_männchen(document.getElementById(insgesamt), document.getElementById(weiblich), document.getElementById(männchen));
}
function numerische_berechne_männchen(insgesamt, weiblich, männchen)
{
    numerische(document.getElementById(männchen));
    berechne_weiblich_männchen(document.getElementById(insgesamt), document.getElementById(weiblich), document.getElementById(männchen));
}

function berechne_gesund(insgesamt, feine, fein_genug, nicht_gut, krank, sehr_krank)
{
    var v_feine = 0, v_fein_genug = 0, v_nicht_gut = 0, v_krank = 0, v_sehr_krank = 0;
    if(feine.value.length > 0)
    {
        v_feine = parseInt(feine.value);
    }
    if(fein_genug.value.length > 0)
    {
        v_fein_genug = parseInt(fein_genug.value);
    }
    if(nicht_gut.value.length > 0)
    {
        v_nicht_gut = parseInt(nicht_gut.value);
    }
    if(krank.value.length > 0)
    {
        v_krank = parseInt(krank.value);
    }
    if(sehr_krank.value.length > 0)
    {
        v_sehr_krank = parseInt(sehr_krank.value);
    }
    var v_insgesamt = v_feine + v_fein_genug + v_nicht_gut + v_krank + v_sehr_krank;
    if(v_insgesamt > 0)
    {
        insgesamt.value = v_insgesamt.toString();
    }
    else
    {
        insgesamt.value = "";
    }
}

function berechne_feine_fein_genug_nicht_gut_krank_sehr_krank(insgesamt, feine, fein_genug, nicht_gut, krank, sehr_krank)
{
    var v_feine = 0, v_fein_genug = 0, v_nicht_gut = 0, v_krank = 0, v_sehr_krank = 0;
    if(feine.value.length > 0)
    {
        v_feine = parseInt(feine.value);
    }
    if(fein_genug.value.length > 0)
    {
        v_fein_genug = parseInt(fein_genug.value);
    }
    if(nicht_gut.value.length > 0)
    {
        v_nicht_gut = parseInt(nicht_gut.value);
    }
    if(krank.value.length > 0)
    {
        v_krank = parseInt(krank.value);
    }
    if(sehr_krank.value.length > 0)
    {
        v_sehr_krank = parseInt(sehr_krank.value);
    }
    var v_insgesamt = v_feine + v_fein_genug + v_nicht_gut + v_krank + v_sehr_krank;
    if(v_insgesamt > 0)
    {
        insgesamt.value = v_insgesamt.toString();
    }
    else
    {
        insgesamt.value = "";
    }
}


function numerische_berechne_feine(insgesamt, feine, fein_genug, nicht_gut, krank, sehr_krank)
{
    numerische(document.getElementById(feine));
    berechne_feine_fein_genug_nicht_gut_krank_sehr_krank(
            document.getElementById(insgesamt),
    document.getElementById(feine),
    document.getElementById(fein_genug),
    document.getElementById(nicht_gut),
    document.getElementById(krank),
    document.getElementById(sehr_krank)
            );
}
function numerische_berechne_fein_genug(insgesamt, feine, fein_genug, nicht_gut, krank, sehr_krank)
{
    numerische(document.getElementById(fein_genug));
    berechne_feine_fein_genug_nicht_gut_krank_sehr_krank(
            document.getElementById(insgesamt),
    document.getElementById(feine),
    document.getElementById(fein_genug),
    document.getElementById(nicht_gut),
    document.getElementById(krank),
    document.getElementById(sehr_krank)
            );
}
function numerische_berechne_nicht_gut(insgesamt, feine, fein_genug, nicht_gut, krank, sehr_krank)
{
    numerische(document.getElementById(nicht_gut));
    berechne_feine_fein_genug_nicht_gut_krank_sehr_krank(
            document.getElementById(insgesamt),
    document.getElementById(feine),
    document.getElementById(fein_genug),
    document.getElementById(nicht_gut),
    document.getElementById(krank),
    document.getElementById(sehr_krank)
            );
}
function numerische_berechne_krank(insgesamt, feine, fein_genug, nicht_gut, krank, sehr_krank)
{
    numerische(document.getElementById(krank));
    berechne_feine_fein_genug_nicht_gut_krank_sehr_krank(
            document.getElementById(insgesamt),
    document.getElementById(feine),
    document.getElementById(fein_genug),
    document.getElementById(nicht_gut),
    document.getElementById(krank),
    document.getElementById(sehr_krank)
            );
}
function numerische_berechne_sehr_krank(insgesamt, feine, fein_genug, nicht_gut, krank, sehr_krank)
{
    numerische(document.getElementById(sehr_krank));
    berechne_feine_fein_genug_nicht_gut_krank_sehr_krank(
            document.getElementById(insgesamt),
    document.getElementById(feine),
    document.getElementById(fein_genug),
    document.getElementById(nicht_gut),
    document.getElementById(krank),
    document.getElementById(sehr_krank)
            );
}
function ist_links_mehr_als_rechts(id_links, id_rechts)
{
    var links = document.getElementById(id_links).value;
    var rechts = document.getElementById(id_rechts).value;
    return links-rechts;
}


