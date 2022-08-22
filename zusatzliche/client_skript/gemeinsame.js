/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function erhalten_json_von_url(url)
{
    var http_abfrage = new XMLHttpRequest();
    http_abfrage.open("GET", url, false);
    http_abfrage.send(null);
    return http_abfrage.responseText; 
}
function entfernen_combobox(param)
{
    for(var i = param.options.length-1;i>-1; i--)
    {
        param.remove(i);
    }
}
function wann_senden_ist_leer()
{
    for(var i = 0; i < arguments.length; i++)
    {
        if(arguments[i].localeCompare('') === 0 || arguments[i] === null)
        {
            return true;
        }
    }
    return false;
}
function ist_eine_fullung()
{
    for(var i = 0; i < arguments.length; i++)
    {
        if(arguments[i] !== null && arguments[i].localeCompare('') !== 0)
        {
            return true;
        }
    }
    return false;
}

