/**
 * Created by LC on 06/02/2016.
 */
function refresh(url, name)
{
    wdw = window.open(url, name, 'height=200,width=150');
    window.setTimeout(function(){wdw.close();}, 3000);
    window.location.reload(true);
}