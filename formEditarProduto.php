<?php include "header.php" ?>

<div class="container text-center">

    <?php
        //Verifica se há algum parâmetro sendo recebido via método GET
        if(isset($_GET["idProduto"])){
            $idProduto = $_GET["idProduto"]; //Armazena o parâmetro em uma variável PHP

            if(isset($_GET["statusEdicao"])){
                $statusEdicao = $_GET["statusEdicao"];
                switch($statusEdicao){
                    case "sucesso" : echo "<div class='alert alert-success text-center'>Os dados do Produto foram alterados com sucesso!</div>";
                    break;
                    case "erro" : echo "<div class='alert alert-danger text-center'>Erro ao tentar editar os dados do Produto!</div>";
                    break;
                    default : header('location:index.php');
                }
            }

            include "conexaoBD.php"; //Inclui o arquivo de conexão com o Banco de Dados

            $buscarProduto = "SELECT * FROM Produtos WHERE idProduto = $idProduto"; //Seleciona os campos do produto
            $res           = mysqli_query($conn, $buscarProduto); //Executa o comando SQL armazenado na variável $buscarProduto
            $totalProdutos = mysqli_num_rows($res); //Retorna a quantidade de registros encontradas pela QUERY

            if($totalProdutos > 0){
                //Se houverem dados relacionados ao ID recebido, armazena em variáveis PHP os registros do array $registro[]
                if($registro = mysqli_fetch_assoc($res)){
                    $idProduto        = $registro["idProduto"];
                    $fotoProduto      = $registro["fotoProduto"];
                    $nomeProduto      = $registro["nomeProduto"];
                    $descricaoProduto = $registro["descricaoProduto"];
                    $valorProduto     = $registro["valorProduto"];

                    //Exibe o formulário para editar produto
                    echo "
                        <h2>Editar Produto:</h2>
                        <div class='d-flex justify-content-center mb-3'>
                            <div class='row'>
                                <div class='col-12'>
                                    <form action='actionEditarProduto.php' method='POST' class='was-validated' enctype='multipart/form-data'>
                                        <div class='form-floating mb-3 mt-3'>
                                            <input type='text' class='form-control' id='idProduto' placeholder='ID' name='idProduto' value='$idProduto' readonly required>
                                            <label for='idProduto'>ID do Produto</label>
                                        </div>
                                        <div class='form-group'>
                                            <img src='$fotoProduto' title='Foto atual de $nomeProduto' style='width:100px'>
                                            <input type='hidden' name='fotoAtual' value='$fotoProduto'>
                                            <input type='file' class='btn btn-link' id='fotoProduto' name='fotoProduto'>
                                        </div>
                                        <div class='form-floating mb-3 mt-3'>
                                            <input type='text' class='form-control' id='nomeProduto' placeholder='Nome' name='nomeProduto' value='$nomeProduto' required>
                                            <label for='nomeProduto'>Nome do Produto</label>
                                            <div class='valid-feedback'></div>
                                            <div class='invalid-feedback'></div>
                                        </div>
                                        <div class='form-floating mb-3 mt-3'>
                                            <textarea class='form-control' id='descricaoProduto' placeholder='Informe uma breve descrição sobre o Produto' name='descricaoProduto' required>$descricaoProduto</textarea>
                                            <label for='descricaoProduto'>Descrição do Produto</label>
                                            <div class='valid-feedback'></div>
                                            <div class='invalid-feedback'></div>
                                        </div>
                                        <div class='form-floating mt-3 mb-3'>
                                            <input type='text' class='form-control' id='valorProduto' placeholder='Valor do Produto' name='valorProduto' value='$valorProduto' required>
                                            <label for='valorProduto'>Valor do Produto (R$):</label>
                                            <div class='valid-feedback'></div>
                                            <div class='invalid-feedback'></div>
                                        </div>
                                        <button type='submit' class='btn btn-success'>Salvar Alterações</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <br>
                    ";
                }
            }
            else{ //Exibe mensagem de alerta caso não seja encontrado um produto com o ID recebido
                echo "<div class='alert alert-warning text-center'>Não foi possível carregar os dados do produto!</div>";
            }
        }
        else{ //Exibe mensagem de alerta caso não haja recebimento de parâmetro
            echo "<div class='alert alert-warning text-center'>Não foi possível carregar os dados do produto!</div>";
        }
    ?>

</div>

<?php include "footer.php" ?>