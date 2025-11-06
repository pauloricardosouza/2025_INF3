<?php include "header.php" ?>

    <div class='container mt-3 mb-3'>
    
        <?php

            //Inicia sessão
            session_start();

            //Verifica se há sessão iniciada
            if(isset($_SESSION['logado']) && $_SESSION['logado'] === true){
                $idUsuario   = $_SESSION['idUsuario'];
                $tipoUsuario = $_SESSION['tipoUsuario'];

                if($tipoUsuario == 'administrador'){
                    //Exibir as Vendas Registradas no Sistema
                    //Query pra listar TODAS as vendas
                    $listarVendas = "
                        SELECT
                            Compras.idCompra,
                            Compras.dataCompra,
                            Compras.horaCompra,
                            Compras.valorCompra,
                            Produtos.nomeProduto,
                            Produtos.descricaoProduto,
                            Produtos.fotoProduto,
                            Usuarios.idUsuario,
                            Usuarios.nomeUsuario
                        FROM Compras
                        INNER JOIN Produtos
                            ON Compras.idProduto = Produtos.idProduto
                        INNER JOIN Usuarios
                            ON Compras.idUsuario = Usuarios.idUsuario
                        ORDER BY Compras.dataCompra DESC, Compras.horaCompra DESC
                    ";

                    //Incluir o arquivo de conexão com o Banco de Dados
                    include "conexaoBD.php";

                    $res = mysqli_query($conn, $listarVendas) or die("<div class='alert alert-danger text-center'>Erro ao tentar listar compras!</div>");
                    $totalVendas = mysqli_num_rows($res); //Captura a quantidade de registros de vendas encontradas pela Query

                    echo "<div class='alert alert-info text-center'>O sistema possui <strong>$totalVendas</strong> vendas registradas!</div>";

                    //Montar o cabeçalho da tabela para exibição das vendas
                    echo "
                        <table class='table'>
                            <thead class='table-dark'>
                                <tr>
                                    <th>ID</th>
                                    <th>FOTO DO PRODUTO</th>
                                    <th>NOME DO PRODUTO</th>
                                    <th>DATA</th>
                                    <th>HORA</th>
                                    <th>VALOR</th>
                                    <th>CLIENTE</th>
                                </tr>
                            </thead>
                            <tbody>
                    ";

                    while($registro = mysqli_fetch_assoc($res)){
                        //Armazena nas  variáveis os registros encontrados no banco de dados
                        $idVenda     = $registro['idCompra'];
                        $fotoProduto = $registro['fotoProduto'];
                        $nomeProduto = $registro['nomeProduto'];
                        $dataVenda   = $registro['dataCompra'];
                        //Usa a função substr para segmentar a data e colocar no padrão BR
                        $diaVenda    = substr($dataVenda, 8, 2);
                        $mesVenda    = substr($dataVenda, 5, 2);
                        $anoVenda    = substr($dataVenda, 0, 4);
                        $horaVenda   = $registro['horaCompra'];
                        $valorVenda  = $registro['valorCompra'];
                        $nomeCliente = $registro['nomeUsuario'];

                        //Exibe os valores armazenados nas variáveis
                        echo "
                            <tr>
                                <td>$idVenda</td>
                                <td><img src='$fotoProduto' title='Foto de $nomeProduto' style='width:50px'></td>
                                <td>$nomeProduto</td>
                                <td>$diaVenda/$mesVenda/$anoVenda</td>
                                <td>$horaVenda</td>
                                <td>$valorVenda</td>
                                <td>$nomeCliente</td>
                            </tr>
                        ";
                    }
                    echo "</tbody>";
                    echo "</table>";
                    mysqli_close($conn); //Encerra a conexão com o Banco de Dados
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