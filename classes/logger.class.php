<?php

function LoggerCarrinho($msg)
{
    $data = date("d-m-y");
    $hora = date("H:i:s");
    $ip = $_SERVER['REMOTE_ADDR'];

    //SE NÃO TIVER O DIRETÓRIO ELE CRIA
    if (!is_dir('logs')) {
        mkdir("logs");
    }

    //NOME DO ARQUIVO
    $arquivo = "logs/LoggerCarrinho_$data.txt";

    //TEXTO A SER IMPRESSO
    $texto = "[$hora][$ip]-> " . strtoupper($msg) . " \n";
    $manipular = fopen("$arquivo", "a+b");
    fwrite($manipular, $texto);
    fclose($manipular);
}

function Logger($msg)
{
    $data = date("d-m-y");
    $hora = date("H:i:s");
    $ip = $_SERVER['REMOTE_ADDR'];

    //SE NÃO TIVER O DIRETÓRIO ELE CRIA
    if (!is_dir('logs')) {
        mkdir("logs");
    }

    //NOME DO ARQUIVO
    $arquivo = "logs/Logger_$data.txt";

    //TEXTO A SER IMPRESSO
    $texto = "[$hora][$ip]-> " . strtoupper($msg) . " \n";
    $manipular = fopen("$arquivo", "a+b");
    fwrite($manipular, $texto);
    fclose($manipular);
}

function LoggerSQL($msg)
{
    $data = date("d-m-y");
    $hora = date("H:i:s");
    $ip = $_SERVER['REMOTE_ADDR'];

    //SE NÃO TIVER O DIRETÓRIO ELE CRIA
    if (!is_dir('logs')) {
        mkdir("logs");
    }

    //NOME DO ARQUIVO
    $arquivo = "logs/LoggerSQL_$data.txt";

    //TEXTO A SER IMPRESSO
    $texto = "[$hora][$ip]-> " . trim($msg) . " \n";
    $manipular = fopen("$arquivo", "a+b");
    fwrite($manipular, $texto);
    fclose($manipular);
}
