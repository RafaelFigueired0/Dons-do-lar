<?php

$sock_cliente = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
$resultado = socket_connect($sock_cliente, "127.0.0.1", 9000);

do{ //ciclo para ler várias linhas

    $msg = socket_read($sock_cliente, 2048, PHP_NORMAL_READ);
    echo $msg; //para escrever no ecrã o que capturou através do socket

} while($msg!="Mensagem terminada.\n"); //condição de paragem Socket_shutdown($sock_cliente,2);

socket_close($sock_cliente);

?>