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
    <title>tela carros</title>

    <link rel="stylesheet" href="estilos/estilo_geral.css">
    <link rel="stylesheet" href="estilos/estilo_carros.css">
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

    <!-- TOPO DO SITE -->
    <main>
        <div class="conteiner-carros">
            <div class="conteiner-titulo">
                <h2 class="titulo">CARROS</h2>
            </div>

            <div class="conteiner-posses">
                <div class="conteiner-titulo">
                    <h2 class="titulo">LISTA DE CARROS</h3>
                </div>
                <div class="conteiner-carro">
                    <?php
                        listar_carros();
                    ?>
                </div>
                <?php
                    if(isset($_GET['adicionar'])){
                        adicionar_carro();
                    }
                ?>
            </div>

            <div class="conteiner-formulario">
                <div class="formulario">
                    <div class="conteiner_titulo">
                        <h3 class="titulo">ADICIONAR CARRO</h3>
                    </div>

                    <form action="" method="get">
                        <div class="conteiner-input-1">
                            <div class="div-input-1">
                                <div class="float-caixa">
                                    <input class="input float-input" type="text" name="nome" placeholder="   "  maxlength="30" required>
                                    <label class="label float-label" for="usuario">nome carro</label>
                                </div>
                            </div>

                            <div class="div-input-1">
                                <div class="float-caixa">
                                    <input class="input float-input" type="text" name="marca" placeholder="   "  maxlength="10" required>
                                    <label class="label float-label" for="senha">marca</label>
                                </div>
                            </div>

                            <div class="div-input-1">
                                <div class="float-caixa">
                                    <input class="input float-input" type="text" name="modelo" placeholder="   "  maxlength="10" required>
                                    <label class="label float-label" for="senha">modelo</label>
                                </div>
                            </div>

                            <div class="div-input-1">
                                <div class="float-caixa">
                                    <input class="input float-input" type="number" name="preco" placeholder="   "  maxlength="10" required>
                                    <label class="label float-label" for="senha">preço</label>
                                </div>
                            </div>
                        </div>

                        <div class="div-btn">
                            <input class="btn btn-1" type="submit" name="cadastro" value="CADASTRAR">
                        </div>
                    </form>

                    <?php
                        if(isset($_GET['cadastro'])){
                            cadastrar_carro();
                        }
                    ?>
                </div>
            </div>

        </div>

    </main>
</body>
</html>