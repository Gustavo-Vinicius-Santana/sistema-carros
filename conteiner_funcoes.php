<?php
    /*FUNCTIONS USUARIO*/
        function testadora_session(){
            include('session_start.php');

            $check = $_SESSION['ativo'] ?? 'nao';

            if($check == 'nao'){
                echo '
                <script type="text/JavaScript">
                    window.location.replace("tela_login.php");
                </script>
                ';
            }
        }
        function dados_usuario(){
            include('session_start.php');
            include('conecta.php');


            $usuario = $_SESSION['usuario'];

            $comando_dados_usuario = "select * from usuario where NOME_USUARIO = '$usuario'";
            $exec_comando_dados_usuario = mysqli_query($con, $comando_dados_usuario);

            while($dados = $exec_comando_dados_usuario ->fetch_assoc()){
                $senha = $dados['SENHA'];
                $id_usuario = $dados['ID_USUARIO'];
            }

            $array_dados_usuario = array(
                "senha" => $senha, "id" => $id_usuario,
            );

            return $array_dados_usuario;
        }
        function cadastro(){
            include('conecta.php');


            $nome_usuario = $_GET['usuario'];
            $senha_usuario = $_GET['senha'];


            $comando_check_cadastro = "select * from usuario where NOME_USUARIO = '$nome_usuario'";
            $exec_check = mysqli_query($con, $comando_check_cadastro);
            $check = mysqli_num_rows($exec_check);


            if($check > 0){
                echo
                "
                <script type='text/JavaScript'>
                    window.alert('já existe um usuario com esse nome')
                </script>
                ";
            }else{
                $comando_insert_usuario = "insert into usuario(NOME_USUARIO, SENHA) values('$nome_usuario','$senha_usuario')";
                mysqli_query($con, $comando_insert_usuario);

                echo
                "
                <script type='text/JavaScript'>
                    window.alert('usuario cadastrado')
                </script>
                ";

                echo '
                <script type="text/JavaScript">
                    window.location.replace("tela_login.php");
                </script>
                ';
            }
        }
        function login(){
            include('conecta.php');

            $nome_usuario = $_GET['usuario'];
            $senha_usuario = $_GET['senha'];

            $comando_check_login = "select * from usuario where NOME_USUARIO = '$nome_usuario' and SENHA = '$senha_usuario'";
            $exec_check = mysqli_query($con, $comando_check_login);
            $check = mysqli_num_rows($exec_check);

            if($check > 0){
                include('session_start.php');

                $_SESSION['ativo'] = 'sim';
                $_SESSION['usuario'] = $nome_usuario;

                echo '
                <script type="text/JavaScript">
                    window.location.replace("tela_usuario.php");
                </script>
                ';
            }else{
                echo
                "
                <script type='text/JavaScript'>
                    window.alert('senha ou usuario incorreto.')
                </script>
                ";
            }
        }
        function edita_usuario(){
            include('conecta.php');
            $dados_usuario = dados_usuario();

            $id_usuario = $dados_usuario['id'];
            $nome_usuario = $_GET['usuario'];
            $senha_usuario = $_GET['senha'];


            $comando_check_cadastro = "select * from usuario where NOME_USUARIO = '$nome_usuario'";
            $exec_check = mysqli_query($con, $comando_check_cadastro);
            $check = mysqli_num_rows($exec_check);


            if($check > 0){
                echo
                "
                <script type='text/JavaScript'>
                    window.alert('já existe um usuario com esse nome')
                </script>
                ";
            }else{
                $comando_edit_usuario = "update usuario set NOME_USUARIO = '$nome_usuario', SENHA = '$senha_usuario' where ID_USUARIO = $id_usuario";
                mysqli_query($con, $comando_edit_usuario);

                include('session_start.php');

                $_SESSION['ativo'] = 'sim';
                $_SESSION['usuario'] = $nome_usuario;

                echo
                "
                <script type='text/JavaScript'>
                    window.alert('usuario editado')
                </script>
                ";

                echo '
                <script type="text/JavaScript">
                    window.location.replace("tela_usuario.php");
                </script>
                ';
            }
        }
        function sair_conta(){
            include('session_start.php');

            session_destroy();

            echo '
            <script type="text/JavaScript">
                window.location.replace("tela_login.php");
            </script>
            ';
        }
        function deletar_conta(){
            include('session_start.php');
            $dados_usuario = dados_usuario();

            $usuario = $_SESSION['usuario'];
            $id_usuario = $dados_usuario['id'];

            include('conecta.php');

            $comando_delete_posse = "delete from posse where ID_USUARIO_PK = $id_usuario";
            mysqli_query($con, $comando_delete_posse);

            $comando_delete_usuario = "delete from usuario where NOME_USUARIO = '$usuario'";
            mysqli_query($con, $comando_delete_usuario);

            echo
            "
            <script type='text/JavaScript'>
                window.alert('usuario delatado com sucesso.')
            </script>
            ";

            sair_conta();
        }

    /*FUNCTIONS CARRO*/
        function cadastrar_carro(){
            $nome_carro = $_GET['nome'];
            $modelo_carro =$_GET['modelo'];
            $marca_carro = $_GET['marca'];
            $preco_carro = $_GET['preco'];

            include('conecta.php');

            $comando_check_cadastro = "select * from carro where NOME_CARRO = '$nome_carro' and MODELO = '$modelo_carro'";
            $exec_check = mysqli_query($con, $comando_check_cadastro);
            $check = mysqli_num_rows($exec_check);

            if($check > 0){
                echo
                "
                <script type='text/JavaScript'>
                    window.alert('já existe um carro com esse nome e modelo')
                </script>
                ";
            }else{
                $comando_insert_carro = "insert into carro (NOME_CARRO, MODELO, MARCA, PRECO) values ('$nome_carro', '$modelo_carro', '$marca_carro', '$preco_carro')";
                mysqli_query($con, $comando_insert_carro);

                echo
                "
                <script type='text/JavaScript'>
                    window.alert('carro cadastrado com sucesso!')
                </script>
                ";

                echo '
                <script type="text/JavaScript">
                    window.location.replace("tela_usuario.php");
                </script>
                ';
            }
        }
        function listar_carros(){
            include('conecta.php');

            $comando_listar_carros = "select * from carro";
            $exec_comando_listar_carros = mysqli_query($con, $comando_listar_carros);

            while($dados_carro = $exec_comando_listar_carros ->fetch_assoc()){
                $id_carro = $dados_carro['ID_CARRO'];
                $nome_carro = $dados_carro['NOME_CARRO'];
                $modelo_carro = $dados_carro['MODELO'];
                $marca_carro = $dados_carro['MARCA'];
                $preco_carro = $dados_carro['PRECO'];

                echo"
                    <div class='carro'>
                        <div class='conteiner-titulo'>
                            <h2 class='titulo'> $nome_carro</h2>
                        </div>

                        <div class='dados'>
                            <h4>MARCA: $marca_carro</h4>
                        </div>

                        <div class='dados'>
                            <h4>MODELO: $modelo_carro</h4>
                        </div>

                        <div class='dados'>
                            <h4>PREÇO: $preco_carro</h4>
                        </div>

                        <form action='' method='get'>
                            <input type='hidden' name='id_carro' value='$id_carro'>
                            <div class='div-btn'>
                                <input class='btn btn-1-edit' type='submit' name='adicionar' value='ADICIONAR'>
                            </div>
                        </form>
                    </div>
                ";

            }
        }
        function adicionar_carro(){
            include('session_start.php');

            $nome_usuario = $_SESSION['usuario'];
            $id_carro = $_GET['id_carro'];

            include('conecta.php');

            $comando_busca_id_usuario = "select * from usuario where NOME_USUARIO = '$nome_usuario'";
            $exec_busca_id_usuario = mysqli_query($con, $comando_busca_id_usuario);
            $busc_id_usuario = mysqli_fetch_assoc($exec_busca_id_usuario);
            $id_usuario = $busc_id_usuario['ID_USUARIO'];

            $insert_posse_usuario = "insert into posse (ID_CARRO_PK, ID_USUARIO_PK) values ($id_carro, $id_usuario)";
            mysqli_query($con, $insert_posse_usuario);

            echo
            "
            <script type='text/JavaScript'>
                window.alert('carro adicionado as posses com sucesso!')
            </script>
            ";
        }

    /*FUNCTION POSSES*/
        function listar_posses_usuario(){
            include('conecta.php');
            include('session_start.php');

            $dados_usuario = dados_usuario();
            $id_usuario = $dados_usuario['id'];

            $comando_posse_usuario = "select distinct
            carro.ID_CARRO, carro.NOME_CARRO, carro.MODELO, carro.MARCA, carro.PRECO
            FROM posse
            INNER JOIN
                carro ON carro.ID_CARRO = posse.ID_CARRO_pk
            where posse.ID_USUARIO_PK = $id_usuario";
            $exec_list_posse = mysqli_query($con, $comando_posse_usuario);

            while($dados_posse = $exec_list_posse ->fetch_assoc()){
                $id_carro = $dados_posse['ID_CARRO'];
                $nome_carro = $dados_posse['NOME_CARRO'];
                $modelo_carro = $dados_posse['MODELO'];
                $marca_carro = $dados_posse['MARCA'];
                $preco_carro = $dados_posse['PRECO'];

                echo"
                <div class='carro'>
                    <div class='conteiner-titulo'>
                        <h2 class='titulo'> $nome_carro</h2>
                    </div>

                    <div class='dados'>
                        <h4>MARCA: $marca_carro</h4>
                    </div>

                    <div class='dados'>
                        <h4>MODELO: $modelo_carro</h4>
                    </div>

                    <div class='dados'>
                        <h4>PREÇO: $preco_carro</h4>
                    </div>

                    <form action='' method='get'>
                        <input type='hidden' name='id_carro' value='$id_carro'>
                        <div class='div-btn'>
                            <input class='btn btn-1' type='submit' name='remover' value='REMOVER'>
                        </div>
                    </form>
                </div>
            ";
            }
        }
        function remover_posse(){
            include('conecta.php');
            $dados_usuario = dados_usuario();

            $id_carro = $_GET['id_carro'];
            $id_usuario = $dados_usuario['id'];

            $comando_busca_posse = "delete from posse where ID_CARRO_PK = $id_carro and ID_USUARIO_PK = $id_usuario LIMIT 1";
            mysqli_query($con, $comando_busca_posse);

            echo '
            <script type="text/JavaScript">
                window.location.replace("tela_usuario.php");
            </script>
            ';
        }
        function listar_todas_posses(){
            include('conecta.php');

            $comando_listar_usuarios = "select * from usuario";
            $exec_listar_usuario = mysqli_query($con, $comando_listar_usuarios);

            while($dados_usuario = $exec_listar_usuario -> fetch_assoc()){
                $id_usuario = $dados_usuario['ID_USUARIO'];
                $nome_usuario = $dados_usuario['NOME_USUARIO'];

                echo "
                <div class='conteiner-posses'>
                <div class='conteiner-titulo'>
                    <h2 class='titulo'>POSSES DE $nome_usuario</h3>
                </div>


                <div class='conteiner-carro'>
                ";

                $comando_listar_posses = "select distinct
                carro.ID_CARRO, carro.NOME_CARRO, carro.MODELO, carro.MARCA, carro.PRECO
                FROM posse
                INNER JOIN
                    carro ON carro.ID_CARRO = posse.ID_CARRO_pk
                where posse.ID_USUARIO_PK = $id_usuario";
                $exec_listar_posses = mysqli_query($con, $comando_listar_posses);
                while($dados_posses = $exec_listar_posses -> fetch_assoc()){
                    $id_carro = $dados_posses['ID_CARRO'];
                    $nome_carro = $dados_posses['NOME_CARRO'];
                    $modelo_carro = $dados_posses['MODELO'];
                    $marca_carro = $dados_posses['MARCA'];
                    $preco_carro = $dados_posses['PRECO'];

                    echo"
                        <div class='carro'>
                            <div class='conteiner-titulo'>
                                <h3 class='titulo'>$nome_carro</h3>
                            </div>

                            <div class='dados'>
                                <h3>MARCA: $marca_carro</h3>
                            </div>

                            <div class='dados'>
                                <h3>MODELO: $modelo_carro</h3>
                            </div>

                            <div class='dados'>
                                <h3>PREÇO: $preco_carro</h3>
                            </div>
                        </div>
                    ";
                }

                echo"
                    </div>
                </div>
                ";
            }

        }
?>