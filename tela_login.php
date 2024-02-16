<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de login</title>

    <link rel="stylesheet" href="estilos/estilo_tela_login_cadastro.css">
    <link rel="stylesheet" href="estilos/estilo_geral.css">
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
    <main class="corpo-principal">
        <section>
            <div class="conteiner-formulario">
                <div class="formulario">
                    <div class="conteiner_titulo">
                        <h3 class="titulo">TELA DE LOGIN</h3>
                    </div>

                    <form action="" method="get">
                        <div class="conteiner-input-1">
                            <div class="div-input-1">
                                <div class="float-caixa">
                                    <input class="input float-input" type="text" name="usuario" placeholder="   "  maxlength="30" required>
                                    <label class="label float-label" for="usuario">usuario</label>
                                </div>
                            </div>

                            <div class="div-input-1">
                                <div class="float-caixa">
                                    <input class="input float-input" type="password" name="senha" placeholder="   "  maxlength="10" required>
                                    <label class="label float-label" for="senha">senha</label>
                                </div>
                            </div>
                        </div>

                        <div class="div-btn">
                            <input class="btn btn-1" type="submit" name="entrar" value="ENTRAR">
                        </div>
                    </form>
                    <a href="tela_cadastro.php">
                        <div class="div-btn">
                            <input class="btn btn-1" type="submit" name="cadastrar" value="CADASTRAR">
                        </div>
                    </a>

                    <?php
                        include('conteiner_funcoes.php');

                        if(isset($_GET['entrar'])){
                            login();
                        }
                    ?>

                </div>

            </div>
        </section>
    </main>
</body>
</html>