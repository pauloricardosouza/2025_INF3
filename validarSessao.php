<?php

    session_start(); //Inicia uma sessão

    //Se não tiver sessão iniciada, redireciona para o formLogin
    if(!isset($_SESSION['logado']) && $_SESSION['logado'] === false){
        header('location:formLogin.php?erroLogin=naoLogado');
    }
    else{
        $tipoUsuario = $_SESSION['tipoUsuario'];
        //Se o tipo de usuário logado não for administrador, redireciona para o formLogin
        if($_SESSION['tipoUsuario'] != 'administrador'){
            header('location:formLogin.php?erroLogin=acessoProibido');
        }
    }

?>