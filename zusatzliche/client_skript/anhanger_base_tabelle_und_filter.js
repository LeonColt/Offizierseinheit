/**
 * Created by LC on 10/01/2016.
 */

function verstecken_karte_provinz_und_kabupaten_mir_alle(id_typ, id_provinz, id_kabupaten, alle_id, alle_value)
{
    var typ = document.getElementById(id_typ);
    var provinz = document.getElementById(id_provinz);
    var provinz_titel = document.getElementById("provinz_titel");
    var kabupaten = document.getElementById(id_kabupaten);
    var kabupaten_titel = document.getElementById("kabupaten_titel");
    if(parseInt(typ.value) === 3)
    {
        provinz.style.display = "inline";
        provinz_titel.style.display = "inline";
        kabupaten.style.display = "none";
        kabupaten_titel.style.display = "none";
        kabupaten.selectedIndex = 0;
    }
    else if(parseInt(typ.value) === 4)
    {
        provinz.style.display = "inline";
        provinz_titel.style.display = "inline";
        kabupaten.style.display = "inline";
        kabupaten_titel.style.display = "inline";
    }
    else
    {
        provinz.style.display = "none";
        provinz_titel.style.display = "none";
        kabupaten.style.display = "none";
        kabupaten_titel.style.display = "none";
        provinz.selectedIndex = 0;
        kabupaten.selectedIndex = 0;
        entfernen_combobox(kabupaten);
        var moglichkeit = document.createElement("option");
        moglichkeit.value = alle_id;
        moglichkeit.innerHTML = alle_value;
        kabupaten.appendChild(moglichkeit);
    }
}
function fullung_kab_kota_anhanger_base_tabelle_und_filter(id_provinz, id_kabupaten, alle_id, alle_value)
{
    if(document.getElementById(id_provinz).value.localeCompare(alle_id) === 0)
    {
        entfernen_combobox(document.getElementById(id_kabupaten));
    }
    else
    {
        fullung_kab_kota(id_provinz, id_kabupaten);
    }
    var kabupaten = document.getElementById(id_kabupaten);
    var moglichkeit = document.createElement("option");
    moglichkeit.value = alle_id;
    moglichkeit.innerHTML = alle_value;
    kabupaten.appendChild(moglichkeit);
}
