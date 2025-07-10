<?php include "header.php" ?>

<div class="container text-center mt-5 mb-5">

    <div class="row text-center">

        <?php

            //Verifica se há recebimento de parâmetro via método GET
            if(isset($_GET['idProduto'])){
                $idProduto = $_GET['idProduto'];

                //Inclui o arquivo de conexão com o Banco de Dados
                include "conexaoBD.php";

                $exibirProduto = "SELECT * FROM Produtos WHERE idProduto = $idProduto";
                $res           = mysqli_query($conn, $exibirProduto); //Executa a QUERY
                $totalProdutos = mysqli_num_rows($res); //Retorna a quantidade de registros

                if($totalProdutos > 0){
                    if($registro = mysqli_fetch_assoc($res)){
                        $idProduto        = $registro['idProduto'];
                        $fotoProduto      = $registro['fotoProduto'];
                        $nomeProduto      = $registro['nomeProduto'];
                        $descricaoProduto = $registro['descricaoProduto'];
                        $valorProduto     = $registro['valorProduto'];
                        $statusProduto    = $registro['statusProduto'];

                        ?>

                        <div class="d-flex justify-content-center mb-3">

                            <div class="card" style="width:30%; border-style:none;">
                                            
                                <!-- Carousel -->
                                <div id="Produto" class="carousel slide" data-bs-ride="carousel" >

                                    <!-- Indicators/dots -->
                                    <div class="carousel-indicators">
                                        <button type="button" data-bs-target="#Produto" data-bs-slide-to="0" class="active"></button>
                                        <button type="button" data-bs-target="#Produto" data-bs-slide-to="1"></button>
                                        <button type="button" data-bs-target="#Produto" data-bs-slide-to="2"></button>
                                    </div>

                                    <!-- The slideshow/carousel -->
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <div class='position-relative'>
                                                <?php
                                                    if($statusProduto == 'esgotado'){
                                                        echo "
                                                            <div class='position-absolute top-50 start-50 translate-middle bg-danger text-white px-4 py-2 fs-6 fw-bold rounded shadow' style='z-index: 10; opacity: 0.85;'>
                                                                ESGOTADO
                                                            </div>
                                                        ";
                                                    }
                                                    echo "
                                                        <img class='d-block w-100' src='$fotoProduto' alt='Foto de $nomeProduto' ";
                                                            if($statusProduto == 'esgotado'){
                                                                echo "style='filter:grayscale(100%)' ";
                                                            }
                                                        echo ">";
                                                ?>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <div class='position-relative'>
                                                <?php
                                                    if($statusProduto == 'esgotado'){
                                                        echo "
                                                            <div class='position-absolute top-50 start-50 translate-middle bg-danger text-white px-4 py-2 fs-6 fw-bold rounded shadow' style='z-index: 10; opacity: 0.85;'>
                                                                ESGOTADO
                                                            </div>
                                                        ";
                                                    }
                                                    echo "
                                                        <img class='d-block w-100' src='$fotoProduto' alt='Foto de $nomeProduto' ";
                                                            if($statusProduto == 'esgotado'){
                                                                echo "style='filter:grayscale(100%)' ";
                                                            }
                                                        echo ">";
                                                ?>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <div class='position-relative'>
                                                <?php
                                                    if($statusProduto == 'esgotado'){
                                                        echo "
                                                            <div class='position-absolute top-50 start-50 translate-middle bg-danger text-white px-4 py-2 fs-6 fw-bold rounded shadow' style='z-index: 10; opacity: 0.85;'>
                                                                ESGOTADO
                                                            </div>
                                                        ";
                                                    }
                                                    echo "
                                                        <img class='d-block w-100' src='$fotoProduto' alt='Foto de $nomeProduto' ";
                                                            if($statusProduto == 'esgotado'){
                                                                echo "style='filter:grayscale(100%)' ";
                                                            }
                                                        echo ">";
                                                ?>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Left and right controls/icons -->
                                    <button class="carousel-control-prev" type="button" data-bs-target="#Produto" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon"></span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#Produto" data-bs-slide="next">
                                        <span class="carousel-control-next-icon"></span>
                                    </button>
                                </div>
                                
                                <div class="card-body">
                                    <h4 class="card-title"><b><?php echo $nomeProduto ?></b></h4>
                                    <p class="card-text"><?php echo $descricaoProduto ?></p>
                                    <p class="card-text">Valor: <b>R$ <?php echo $valorProduto ?></b></p>
                                    <div class="card bg-light">
                                        <div class="card-body">
                                            <?php
                                                if($statusProduto != 'esgotado'){
                                                    echo "
                                                        <a href='#' title='Comprar $nomeProduto'>
                                                            <button class='btn btn-outline-success'>
                                                                <i class='bi bi-bag-plus' style='font-size:16pt;'></i>
                                                                Comprar
                                                            </button>
                                                        </a>
                                                    ";
                                                }
                                                else{
                                                    echo "
                                                        <div class='alert alert-secondary'>
                                                            Produto Esgotado! <i class='bi bi-emoji-frown'></i>
                                                        </div>
                                                    ";
                                                }
                                            ?>
                                        </div>
                                        <br>
                                    </div>
                                </div>

                            </div>

                        </div>

                    <?php

                    }
                }
                else{
                    echo "<div class='alert alert-warning text-center'>Produto não localizado!</div>";
                }

            }
            else{
                echo "<div class='alert alert-warning text-center'>Não foi possível carregar o produto!</div>";
            }

        ?>

        

    </div>

</div>

<?php include "footer.php" ?>