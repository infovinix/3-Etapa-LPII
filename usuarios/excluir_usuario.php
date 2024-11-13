<?php

    include "../adm/conexao.php";
    include "../adm/topo.php";
    

    if(isset($_GET['id'])){

        $id = $_GET['id']; 

        $sql = "delete from usuario where login = '$id'";
        $excluir = mysqli_query($conexao,$sql);

        if($excluir){
            echo "
                <script> 
                    alert('Registro Excluído com Sucesso!');
                    window.location = 'listar_usuarios.php';
                </script>
            ";

        }
        else{
            echo "
                <p> Banco de Dados Temporariamente fora do ar. Tente novamente em breve. </p>
                <p> Entre em contato com o administrador do Site para solicitar ajuda... </p>
            ";
            echo mysqli_error($conexao);
        }
    }
    else{
        echo "
            <p> Esta é uma página de tratamento de dados </p>
            <p> Clique <a href='listar_usuarios.php'> aqui </a> para a acessar a lista de usuários cadastrados. </p>
        ";
    }

    include "../adm/rodape.php";
?>