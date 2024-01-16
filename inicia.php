<?php
/**Contantes com as informaçoes para acesso ao banco MYSQL **/
define ('DB_HOST', 'localhost');
define ('DB_NAME', 'FirstCrud');
define ('DB_USER', 'root');
define ('DB_PASS', '');

/**Habilita mensagens de erro */
ini_set ('dysplay_errors', true);
error_reporting(E_ALL);

/**Inclui o arquivo e funçoes */
require_once 'funcoes.php';
?>