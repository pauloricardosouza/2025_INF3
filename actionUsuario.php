<!-- Inclui o header.php -->
<?php include "header.php" ?>

    <div class="container mt-3 mb-3">

        <?php

            //Verifica o método de requisição do servidor
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                //Bloco para declaração de variáveis
                $fotoUsuario = $nomeUsuario = $dataNascimentoUsuario = $cidadeUsuario = $telefoneUsuario = $emailUsuario = $senhaUsuario = $confirmarSenhaUsuario = "";

                //Variável para controle de erros de preenchimento
                $erroPreenchimento = false;

                //Validação do campo nomeUsuario
                //Utiliza a função empty() para verificar se o campo está vazio
                if(empty($_POST["nomeUsuario"])){
                    echo "<div class='alert alert-warning text-center'>O campo <strong>NOME</strong> é obrigatório!</div>";
                    $erroPreenchimento = true;
                }
                else{
                    //Armazena valor do formulário na variável
                    $nomeUsuario = filtrar_entrada($_POST["nomeUsuario"]);
                }

                //Validação do campo dataNascimentoUsuario
                //Utiliza a função empty() para verificar se o campo está vazio
                if(empty($_POST["dataNascimentoUsuario"])){
                    echo "<div class='alert alert-warning text-center'>O campo <strong>DATA DE NASCIMENTO</strong> é obrigatório!</div>";
                    $erroPreenchimento = true;
                }
                else{
                    //Armazena valor do formulário na variável
                    $dataNascimentoUsuario = filtrar_entrada($_POST["dataNascimentoUsuario"]);
                }

                //Validação do campo cidadeUsuario
                //Utiliza a função empty() para verificar se o campo está vazio
                if(empty($_POST["cidadeUsuario"])){
                    echo "<div class='alert alert-warning text-center'>O campo <strong>CIDADE</strong> é obrigatório!</div>";
                    $erroPreenchimento = true;
                }
                else{
                    //Armazena valor do formulário na variável
                    $cidadeUsuario = filtrar_entrada($_POST["cidadeUsuario"]);
                }

                //Validação do campo telefoneUsuario
                //Utiliza a função empty() para verificar se o campo está vazio
                if(empty($_POST["telefoneUsuario"])){
                    echo "<div class='alert alert-warning text-center'>O campo <strong>TELEFONE</strong> é obrigatório!</div>";
                    $erroPreenchimento = true;
                }
                else{
                    //Armazena valor do formulário na variável
                    $telefoneUsuario = filtrar_entrada($_POST["telefoneUsuario"]);
                }

                //Validação do campo emailUsuario
                //Utiliza a função empty() para verificar se o campo está vazio
                if(empty($_POST["emailUsuario"])){
                    echo "<div class='alert alert-warning text-center'>O campo <strong>EMAIL</strong> é obrigatório!</div>";
                    $erroPreenchimento = true;
                }
                else{
                    //Armazena valor do formulário na variável
                    $emailUsuario = filtrar_entrada($_POST["emailUsuario"]);
                }

                //Validação do campo senhaUsuario
                //Utiliza a função empty() para verificar se o campo está vazio
                if(empty($_POST["senhaUsuario"])){
                    echo "<div class='alert alert-warning text-center'>O campo <strong>SENHA</strong> é obrigatório!</div>";
                    $erroPreenchimento = true;
                }
                else{
                    //Armazena valor do formulário na variável
                    $senhaUsuario = filtrar_entrada($_POST["senhaUsuario"]);
                }

                //Validação do campo confirmarSenhaUsuario
                //Utiliza a função empty() para verificar se o campo está vazio
                if(empty($_POST["confirmarSenhaUsuario"])){
                    echo "<div class='alert alert-warning text-center'>O campo <strong>CONFIRMAR SENHA</strong> é obrigatório!</div>";
                    $erroPreenchimento = true;
                }
                else{
                    //Armazena valor do formulário na variável
                    $confirmarSenhaUsuario = filtrar_entrada($_POST["confirmarSenhaUsuario"]);
                }

            }
            else{
                //Redireciona o usuário para o formUsuario.php
                header("location:formUsuario.php");
            }

            //Função para filtrar entrada de dados
            function filtrar_entrada($dado){
                $dado = trim($dado); //Remove espaços desnecessários
                $dado = stripslashes($dado); //Remove barras invertidas
                $dado = htmlspecialchars($dado); // Converte caracteres especiais em entidades HTML

                return($dado);
            }
        ?>

    </div>

<!-- Inclui o footer.php -->
<?php include "footer.php" ?>