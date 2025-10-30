<?php include "header.php" ?>

    <div class='container mt-3 mb-3'>

        <?php

            session_start(); //Iniciar uma sessão

            //Verifica se há sessão iniciada
            if(isset($_SESSION['logado']) && $_SESSION['logado'] === true) {

                //Verifica se há algum parâmetro sendo recebido por POST chamado idProduto
                if(isset($_POST['idProduto'])){
                    
                    //Cria variáveis para a efetuação da compra
                    $idUsuario   = $_SESSION['idUsuario']; //Captura o idUsuario pela sessão
                    $idProduto   = $_POST['idProduto']; //Recebe o idProduto via array POST
                    $fotoProduto = $_POST['fotoProduto']; //Recebe a fotoProduto via array POST
                    $nomeProduto = $_POST['nomeProduto']; //Recebe o nomeProduto via array POST
                    $valorCompra = $_POST['valorProduto']; //Recebe o valorCompra via array POST
                    $dataCompra  = date('Y-m-d'); //Captura a data atual no padrão do MySQL (2025-10-30)
                    $horaCompra  = date('H:i:s'); //Captura a hora atual (16:35:34)

                    //Query para inserir a compra na tabela Compras
                    $efetuarCompra = "INSERT INTO Compras (idUsuario, idProduto, valorCompra, dataCompra, horaCompra)
                                      VALUES ($idUsuario, $idProduto, $valorCompra, '$dataCompra', '$horaCompra')";
                    //Query para atualizar o status do Produto após a realização da Compra
                    $atualizarStatusProduto = "UPDATE Produtos
                                               SET statusProduto = 'esgotado'
                                               WHERE idProduto = $idProduto";

                    //Inclui o arquivo de conexão com o BD
                    include "conexaoBD.php";

                    //Executa a Query para efetuar a Compra
                    if(mysqli_query($conn, $efetuarCompra)){
                        //Executa a Query para atualizar o Status do Produto
                        if(mysqli_query($conn, $atualizarStatusProduto)){
                            //Exibir mensagem de compra efetuada com sucesso
                            echo "<div class='alert alert-success text-center'>
                                Você comprou $nomeProduto! <i class='bi bi-emoji-smile'></i>
                            </div>";

                            echo "
                                <div class='container mt-3'>
                                    <div class='mt-3 text-center'>
                                        <img src='$fotoProduto' style='width:300px' title='Foto de $nomeProduto'>
                                    </div>
                                </div>
                            ";
                        }
                        else{
                            echo "<div class='alert alert-danger text-center'>
                                Erro ao tentar efetuar a compra! <i class='bi bi-emoji-frown'></i>
                            </div>" . mysqli_error($conn) . $atualizarStatusProduto;
                        }
                    }
                    else{
                        echo "<div class='alert alert-danger text-center'>
                            Erro ao tentar efetuar a compra! <i class='bi bi-emoji-frown'></i>
                        </div>" . mysqli_error($conn) . $efetuarCompra;
                    }

                }
                else{
                    header('location:index.php');
                }
            }
            else{
                header('location:index.php');
            }

        ?>

    </div>

<?php include "footer.php" ?>