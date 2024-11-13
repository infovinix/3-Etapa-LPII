<?php
    include "../adm/conexao.php";

    if(isset($_POST['login'])){

        $login = trim($_POST['login']);
        $senha = trim($_POST['senha']);
        $nome = trim($_POST['nome']);
        $email = trim($_POST['email']);
        $nivel = "usu";
        $foto = $_POST['foto'];

        $senha_hash = password_hash($senha,PASSWORD_DEFAULT);

        $sql = "select * from usuario where login = '$login'";
        $teste_login = mysqli_query($conexao,$sql);
        $existe = mysqli_num_rows($teste_login);

        if($existe){
            echo "
                <script> 
                    alert('Login já cadastrado. Tente outro Login');
                    history.back();
                </script>
            ";
        }
        else{
           
            $sql = "insert into usuario(login,senha,nome,email,nivel,foto) values('$login','$senha_hash','$nome','$email','$nivel','$foto')";
            $cadastrar = mysqli_query($conexao,$sql);

            if($cadastrar){
                echo "
                    <script> 
                        alert('Usuario Cadastrado com Sucesso!');
                        window.location = 'listar_usuarios.php';
                    </script>
                ";
            }
            else{
                echo "
                    <p> Banco de dados Temporariamente fora do ar. Tente novamente em breve. Entre em contato com o adminitrador do site para solicitar ajuda.  </p>

                    <p> Clique <a href='usuarios.php'> aqui </a> para retornar ao formulário de cadastro </p>
                ";
                echo mysqli_error($conexao);
            }
        }
    }
    else{//tratamento de erro e redirecionamento
        echo "
            <p> Esta é uma página de tratamento de dados </p>
            <p> Clique <a href='usuarios.php'> aqui </a> para acessar o formulário de cadastro </p>
        ";
    }

?>