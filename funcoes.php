<?php
/**  O codigo abaixo faz a conexao com o MYSQL atraves do PDO**/
function conecta_bd(){
    $PDO = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
    return $PDO;
}
?>