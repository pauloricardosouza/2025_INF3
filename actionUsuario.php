<!-- Inclui o header.php -->
<?php include "header.php" ?>

    <div class="container mt-3 mb-3">

        <?php

            //Verifica o método de requisição do servidor
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                //Bloco para declaração de variáveis
                $fotoUsuario = $nomeUsuario = $dataNascimentoUsuario = $cidadeUsuario = $telefoneUsuario = $emailUsuario = $senhaUsuario = $confirmarSenhaUsuario = "";

                //Variável booleana para controle de erros de preenchimento
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
                    $senhaUsuario = md5(filtrar_entrada($_POST["senhaUsuario"]));
                }

                //Validação do campo confirmarSenhaUsuario
                //Utiliza a função empty() para verificar se o campo está vazio
                if(empty($_POST["confirmarSenhaUsuario"])){
                    echo "<div class='alert alert-warning text-center'>O campo <strong>CONFIRMAR SENHA</strong> é obrigatório!</div>";
                    $erroPreenchimento = true;
                }
                else{
                    //Armazena valor do formulário na variável
                    $confirmarSenhaUsuario = md5(filtrar_entrada($_POST["confirmarSenhaUsuario"]));
                    //Compara se as senhas são diferentes
                    if($senhaUsuario != $confirmarSenhaUsuario){
                        echo "<div class='alert alert-warning text-center'>As <strong>SENHAS</strong> informadas são diferentes!</div>";
                        $erroPreenchimento = true;
                    }
                }

                //Se não houver erro de preenchimento, exibe alerta de sucesso e uma tabela com os dados informados
                if(!$erroPreenchimento){
                    echo "<div class='alert alert-success text-center'><strong>Usuário</strong> cadastrado(a) com sucesso!</div>";
                    echo "
                        <div class='container mt-3'>
                            <div class='container mt-3 text-center'>
                                Aqui será exibida a foto do usuário
                            </div>
                            <table class='table'>
                                <tr>
                                    <th>NOME</th>
                                    <td>$nomeUsuario</td>
                                </tr>
                                <tr>
                                    <th>DATA DE NASCIMENTO</th>
                                    <td>$dataNascimentoUsuario</td>
                                </tr>
                                <tr>
                                    <th>CIDADE</th>
                                    <td>$cidadeUsuario</td>
                                </tr>
                                <tr>
                                    <th>TELEFONE</th>
                                    <td>$telefoneUsuario</td>
                                </tr>
                                <tr>
                                    <th>EMAIL</th>
                                    <td>$emailUsuario</td>
                                </tr>
                            </div>
                        </div>
                    ";
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

                //Retorna o dado após filtrado
                return($dado);
            }
        ?>

    </div>

<!-- Inclui o footer.php -->
<?php include "footer.php" ?>