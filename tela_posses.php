<?php
    include('conteiner_funcoes.php');

    testadora_session();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tela de posses</title>

    <link rel="stylesheet" href="estilos/estilo_geral.css">
    <link rel="stylesheet" href="estilos/estilo_posses.css">
</head>
<body>
    <!-- TOPO DO SITE -->
    <header>
        <div class="conteiner-titulo">
            <h1 class="titulo">SISTEMA CARROS</h1>
        </div>

        <nav class="conteiner-lista">
            <ul class="menu-lista">
                <li class="item-lista">
                    <a href="index.html">
                        <h3>HOME</h3>
                    </a>
                </li>

                <li class="item-lista">
                    <a href="tela_usuario.php">
                        <h3>USUARIO</h3>
                    </a>
                </li>

                <li class="item-lista">
                    <a href="tela_carros.php">
                        <h3>CARROS</h3>
                    </a>
                </li>

                <li class="item-lista">
                    <a href="tela_posses.php">
                        <h3>POSSES</h3>
                    </a>
                </li>
            </ul>
        </nav>
    </header>

    <!-- SORPO DO SITE -->
    <main>
        <div class="conteiner-titulo">
            <h2 class="titulo">POSSES DOS USARIOS</h3>
        </div>
        <div class="conteiner-posses-usuarios">
            <?php
                listar_todas_posses();
            ?>


        </div>

    </main>
</body>
</html>