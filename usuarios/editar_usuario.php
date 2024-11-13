<?php
include "../adm/conexao.php";
include "../adm/topo.php";

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $sql = "SELECT * FROM usuario WHERE login = '$id'";
    $seleciona = mysqli_query($conexao, $sql); 
    $exibe = mysqli_fetch_array($seleciona); 

    $nome = $exibe['nome'];
    $senha = $exibe['senha']; 
    $email = $exibe['email'];
    $foto = $exibe['foto'];
    $nivel = $exibe['nivel'];
    $login = $exibe['login']; 
?>
<div class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="form-box p-5 shadow-lg rounded" style="max-width: 800px; width: 100%; background-color: #fff;">
        <h2 class="text-center text-primary mb-4">Editar Usuário</h2>

        <form name="cadastro" method="post" action="update_usuario.php" enctype="multipart/form-data" style="margin: -20px 0;">
        <input type="hidden" name="id" value="<?=$id?>"> 
        <input type="hidden" name="senha_antiga" value="<?=$senha?>"> 
        
            <div class="mb-4">
                <label for="login" class="form-label">Login</label>
                <input type="text" class="form-control border-primary" id="login" name="login" value="<?=$login?>" readonly placeholder="Login">

            </div>

            <div class="mb-4">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" class="form-control border-primary" id="senha" name="senha" value="<?=$senha?>"  required placeholder="Senha">
            </div>

            <div class="mb-4">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control border-primary" id="nome" name="nome" value="<?=$nome?>" required placeholder="Nome completo">
            </div>

            <div class="mb-4">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control border-primary" id="email" name="email" value="<?=$email?>" required placeholder="E-mail">
            </div> 

            <div class="mb-4">
                <label for="nivel" class="form-label">Nível</label>
                <input type="text" class="form-control border-primary" id="nivel" name="nivel" value="<?=$nivel?>" required>
            </div>

            <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-secondary" onclick="history.go(-1)">Voltar</button>
                <button type="submit" class="btn btn-primary">Editar</button>
            </div>
        </form>
    </div>
</div>

<?php
} else { // Tratamento de erro e redirecionamento
    echo "
        <p> Esta é uma página de tratamento de dados. </p>
        <p> Clique <a href='listar_usuarios.php'> aqui </a> para acessar a lista de usuários cadastrados. </p>
    ";
}
?>

<?php
include "../adm/rodape.php";
?>
