<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sistema INF3</title>

            <!-- CDNs (Content Delivery Network) -->
            <!-- Última versão compilada e minimizada do CSS -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
            <!-- Última versão compilada de JavaScript -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

            

    </head>
    <body>
        
        <!-- Container para abrigar o Logotipo -->
        <div class="container-fluid text-center p-3">
            <a href="index.php" title="Retornar para a página inicial">
                <img src="img/logotipo.png" style="width:150px;">
            </a>
        </div>

        <!-- Barra de Navegação do Sistema -->
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php">Página Inicial</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="formProduto.php">Cadastrar Produto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="formLogin.php">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Início do Container para abrigar os conteúdos das páginas do sistema -->
        <div class="container-fluid mt-5 mb-5">
