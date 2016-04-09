<?
session_start();
session_destroy();

$cookie_name = "remember";
$cookie_value = NULL;
setcookie($cookie_name, $cookie_value, time() + (86400 * 30*7), "/");

?>
<script langquage='javascript'>
window.location= history.back();
</script>