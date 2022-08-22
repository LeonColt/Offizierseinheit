<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 17/12/2015
 * Time: 10:35
 */
require_once '../../server_skript/base/globale_variable.php';
require_once standart_system_pfad.'server_skript/base/universal_methode.php';
require_once standart_system_pfad.'server_skript/base/url_kodierer.php';
?>
function satz_token(schlussel, token)
{
<?php
$url = new url_kodierer();
$url->hinzufugen(bestellung);
$url->hinzufugen(bestellung_erhalten_token);
?>
var json = JSON.parse(erhalten_json_von_url("<?php echo $url->erhalten(); ?>"));
schlussel.value = json.<?php echo json_csrf_schlussel; ?>;
token.value = json.<?php echo json_csrf_token; ?>;
}
