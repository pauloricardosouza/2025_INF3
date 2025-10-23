<?php

    include "conexaoBD.php";
    session_start(); //Inicia uma sessão

    $emailUsuario = mysqli_real_escape_string($conn, $_POST['emailUsuario']);
    $senhaUsuario = mysqli_real_escape_string($conn, $_POST['senhaUsuario']);
    $quantidadeLogin = 0; //Contabilizar os logins encontrados pela QUERY

    $buscarLogin = "SELECT *
                    FROM Usuarios
                    WHERE emailUsuario = '{$emailUsuario}'
                    AND senhaUsuario   = md5('{$senhaUsuario}')
                    ";

    $efetuarLogin = mysqli_query($conn, $buscarLogin);

    if($registro = mysqli_fetch_assoc($efetuarLogin)){
        $quantidadeLogin = mysqli_num_rows($efetuarLogin);

        //Cria variáveis PHP para armazenar registros encontrados no BD
        $idUsuario    = $registro['idUsuario'];
        $tipoUsuario  = $registro['tipoUsuario'];
        $nomeUsuario  = $registro['nomeUsuario'];
        $emailUsuario = $registro['emailUsuario'];

        //Cria variáveis de SESSÃO para armazenar valores das variáveis PHP
        $_SESSION['idUsuario']    = $idUsuario;
        $_SESSION['tipoUsuario']  = $tipoUsuario;
        $_SESSION['nomeUsuario']  = $nomeUsuario;
        $_SESSION['emailUsuario'] = $emailUsuario;
        

        $_SESSION['logado'] = true; //Variável para controle de sessão

        header('location:index.php'); //Redireciona para a página inicial
    }
    elseif(empty($_POST['emailUsuario']) || empty($_POST['senhaUsuario']) || $quantidadeLogin == 0){
        header('location:formLogin.php?erroLogin=dadosInvalidos');
    }

?>