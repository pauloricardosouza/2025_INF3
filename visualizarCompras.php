<?php include "header.php" ?>

    <div class='container mt-3 mb-3'>
    
        <?php

            //Inicia sessão
            session_start();

            //Verifica se há sessão iniciada
            if(isset($_SESSION['logado']) && $_SESSION['logado'] === true){
                $idUsuario   = $_SESSION['idUsuario'];
                $tipoUsuario = $_SESSION['tipoUsuario'];

                if($tipoUsuario == 'cliente'){
                    //Exibir as Compras Registradas no Sistema
                    //Query pra listar TODAS as Compras
                    $listarCompras = "
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
                        WHERE Compras.idUsuario = $idUsuario
                        ORDER BY Compras.dataCompra DESC, Compras.horaCompra DESC
                    ";

                    //Incluir o arquivo de conexão com o Banco de Dados
                    include "conexaoBD.php";

                    $res = mysqli_query($conn, $listarCompras) or die("<div class='alert alert-danger text-center'>Erro ao tentar listar compras!</div>");
                    $totalCompras = mysqli_num_rows($res); //Captura a quantidade de registros de Compras encontradas pela Query

                    if($totalCompras > 1){
                        echo "<div class='alert alert-info text-center'>Você possui <strong>$totalCompras</strong> compras registradas!</div>";
                    }
                    elseif($totalCompras == 1){
                        echo "<div class='alert alert-info text-center'>Você possui <strong>$totalCompras</strong> compra registrada!</div>";
                    }
                    else{
                        echo "<div class='alert alert-info text-center'>Você <strong>ainda não possui</strong> compras registradas!</div>";
                    }

                    //Montar o cabeçalho da tabela para exibição das Compras
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
                                </tr>
                            </thead>
                            <tbody>
                    ";

                    while($registro = mysqli_fetch_assoc($res)){
                        //Armazena nas  variáveis os registros encontrados no banco de dados
                        $idCompra     = $registro['idCompra'];
                        $fotoProduto = $registro['fotoProduto'];
                        $nomeProduto = $registro['nomeProduto'];
                        $dataCompra   = $registro['dataCompra'];
                        //Usa a função substr para segmentar a data e colocar no padrão BR
                        $diaCompra    = substr($dataCompra, 8, 2);
                        $mesCompra    = substr($dataCompra, 5, 2);
                        $anoCompra    = substr($dataCompra, 0, 4);
                        $horaCompra   = $registro['horaCompra'];
                        $valorCompra  = $registro['valorCompra'];
                        $nomeCliente = $registro['nomeUsuario'];

                        //Exibe os valores armazenados nas variáveis
                        echo "
                            <tr>
                                <td>$idCompra</td>
                                <td><img src='$fotoProduto' title='Foto de $nomeProduto' style='width:50px'></td>
                                <td>$nomeProduto</td>
                                <td>$diaCompra/$mesCompra/$anoCompra</td>
                                <td>$horaCompra</td>
                                <td>$valorCompra</td>
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