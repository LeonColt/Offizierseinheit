/**
 * Created by LC on 20/12/2015.
 */
function ist_passwort_korriegieren(id_neu_passwort, id_bestatigen_passwort)
{
    neu = document.getElementById(id_neu_passwort);
    bestatigen = document.getElementById(id_bestatigen_passwort);
    var regex = "^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$";
    if(regex.test(neu.value))
    {
        if(neu.value === bestatigen.value)
        {
        }
        else
        {

        }
    }
    return true;
}