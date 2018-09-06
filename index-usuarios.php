<?php

    ini_set('display_errors', 1);
    ini_set('log_errors', 1);
    ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
    error_reporting(E_ALL);

    //require 'usuarios.php';
    require 'usuario.php';

    //$u = new Usuarios();
    //$u = new Usuario("");
    //$u->setEmail("marcos@terra.com");
    //$u->setNome("Carlos");
    //$u->setSenha("123");
    //$u->salvar();

    //$u = new Usuario(9);
    //$u->setNome('Miguel');
    //$u->salvar();

    $u = new Usuario(9);
    $u->excluir();

    echo "ok";



    //$u->inserir("Marcos", "marcos@uol.com.br",  "123");
    //$u->atualizar("Marcio", "marcos@ig.com", "123", 10);
    //$u->excluir(10);

    //$res = $u->selecionar(3);
    //print_r($res);

?>
