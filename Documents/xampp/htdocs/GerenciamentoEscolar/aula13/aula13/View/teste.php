<?php 
    require_once('../Model/conexao.php');

    $conectar = new Conexao(); //Atribuição do objeto a uma variável
    $conectar->conectar();//Chamando método da classe conexão
?>