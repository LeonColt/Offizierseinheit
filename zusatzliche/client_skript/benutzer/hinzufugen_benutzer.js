/**
 * Created by LC on 16/12/2015.
 */
function vorschau_bilder(bilderer, bilder)
{
    var vorschau = document.getElementById(bilder);
    var v_bilder = document.getElementById(bilderer);
    if (v_bilder.files && v_bilder.files[0]) {
        var lesen = new FileReader();
        lesen.onload = function (e) {
            vorschau.setAttribute('src', e.target.result);
        }
        lesen.readAsDataURL(v_bilder.files[0]);
    } else {
        vorschau.setAttribute('src', 'bilder/org.png');
    }
}
function zurucksetzen(bilder)
{
    var vorschau = document.getElementById(bilder);
    vorschau.setAttribute('src', 'bilder/org.png');
}
function verstecken_karte_provinz_und_kabupaten(id_typ, id_provinz, id_kabupaten)
{
    var typ = document.getElementById(id_typ);
    var provinz = document.getElementById(id_provinz);
    var provinz_titel = document.getElementById("p_titel");
    var provinz_korper = document.getElementById("p_korper");
    var kabupaten = document.getElementById(id_kabupaten);
    var kabupaten_titel = document.getElementById("k_titel");
    var kabupaten_korper = document.getElementById("k_korper");
    if(parseInt(typ.value) === 3)
    {
        provinz.style.visibility = "visible";
        provinz_titel.style.visibility = "visible";
        provinz_korper.style.visibility = "visible";
        kabupaten.style.visibility = "hidden";
        kabupaten_titel.style.visibility = "hidden";
        kabupaten_korper.style.visibility = "hidden";
        kabupaten.value = "-1";
    }
    else if(parseInt(typ.value) === 4)
    {
        provinz.style.visibility = "visible";
        provinz_titel.style.visibility = "visible";
        provinz_korper.style.visibility = "visible";
        kabupaten.style.visibility = "visible";
        kabupaten_titel.style.visibility = "visible";
        kabupaten_korper.style.visibility = "visible";
    }
    else
    {
        provinz.style.visibility = "hidden";
        provinz_titel.style.visibility = "hidden";
        provinz_korper.style.visibility = "hidden";
        kabupaten.style.visibility = "hidden";
        kabupaten_titel.style.visibility = "hidden";
        kabupaten_korper.style.visibility = "hidden";
        provinz.value = "-1";
        kabupaten.value = "-1";
    }
}