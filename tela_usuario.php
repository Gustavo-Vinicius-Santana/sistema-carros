<?php
    include('conteiner_funcoes.php');
    testadora_session();

    $dados_usuario = dados_usuario();
    $nome = $_SESSION['usuario'];
    $senha = $dados_usuario['senha'];

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tela de usuario</title>

    <link rel="stylesheet" href="estilos/estilo_geral.css">
    <link rel="stylesheet" href="estilos/estilo_tela_usuario.css">
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

    <!-- CORPO DO SITE -->
    <main>
        <div class="conteiner-usuario">
            <div class="conteiner-titulo">
                <h2 class="titulo">BEM-VINDO USUARIO</h2>
            </div>

            <div class="conteiner-dados-usuario">
                <div class="conteiner-dados">
                    <div class="conteiner-titulo">
                        <h2 class="titulo">DADOS PESSOAIS</h2>
                    </div>

                    <div class="dados">
                        <h3>NOME: <?php echo $nome; ?></h3>
                    </div>

                    <div class="dados">
                        <h3>SENHA: <?php echo $senha; ?></h3>
                    </div>

                    <a href="tela_edita.php">
                        <div class="div-btn">
                            <input class="btn btn-1" type="submit" value="EDITAR">
                        </div>
                    </a>

                    <form action="" method="get">
                        <div class="div-btn">
                            <input class="btn btn-1" type="submit" name="sair" value="SAIR">
                        </div>
                    </form>

                    <form action="" method="get">
                        <div class="div-btn">
                            <input class="btn btn-1" type="submit" name="deletar" value="DELETAR">
                        </div>
                    </form>

                    <?php
                        if(isset($_GET['sair'])){
                            sair_conta();
                        }else if(isset($_GET['deletar'])){
                            deletar_conta();
                        }
                    ?>
                </div>
            </div>

            <div class="conteiner-posses">
                <div class="conteiner-titulo">
                    <h2 class="titulo">SUAS POSSES</h3>
                </div>
                <div class="conteiner-carro">
                <?php
                    listar_posses_usuario();

                    if(isset($_GET['remover'])){
                        remover_posse();
                    }
                ?>

                </div>
            </div>
        </div>
    </main>

</body>
</html>