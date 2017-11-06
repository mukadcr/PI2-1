<?php
include('../db/bancodedados.php');
include('../auth/controle.php');
?>
<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Usuários | Hippo</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">
    <script src="https://use.fontawesome.com/1defc9531d.js"></script>
    <link rel="stylesheet" href="../css/estilo.css">
</head>

<body>
<div class="all">
    <aside class="lateral">
    <div class="logo">
    <img src="../img/logo.jpg" alt="Logo Hippo"/>
    </div>
        <nav>
            <ul>
                <li><a href="../menu"><i class="fa fa-tachometer" aria-hidden="true"></i>Dashboard</a></li>
                <li><a href="../cat"><i class="fa fa-folder" aria-hidden="true"></i>Categoria</a></li>
                <li><a href="../product"><i class="fa fa-tag" aria-hidden="true"></i>Produtos</a></li>
                <li class="ativo"><a href="../user"><i class="fa fa-user" aria-hidden="true"></i>Usuários</a></li>
                <li><a href="#"><i class="fa fa-cog" aria-hidden="true"></i>Configurações</a></li>
            </ul>
        </nav>
    </aside>
	<div class="conteudo">
        <header>
        	<div class="barra-superior">
            <p><i class="fa fa-user" aria-hidden="true"></i>Usuários > </p>
            <p>Olá, <?php echo $_SESSION['nomeUsuario'];?> <a href="/pi/?logout=1">[x] Sair</a></p>
            
            </div>
        </header>
        
        <section>
            <div class="container">
		
		<form method="post">
		
			Login: <input type="text" 
					name="loginUsuario"
					value="<?php echo $dados_usuario['loginUsuario']; ?>"><br><br>
			Senha: <input type="password" name="senhaUsuario"><br><br>
			Nome: <input type="text" 
					name="nomeUsuario"
					value="<?php echo $dados_usuario['nomeUsuario']; ?>"><br><br>
			Perfil: <select name="perfilUsuario">
						<option value="">Escolha</option>
						<option value="A" 
						<?php if($dados_usuario['tipoPerfil'] == 'A') echo "selected"; ?>>Administrador</option>
						<option value="C"
						<?php if($dados_usuario['tipoPerfil'] == 'C') echo "selected"; ?>>Colaborador</option>
					</select><br><br>
			Ativo: <input type="checkbox" name="usuarioAtivo" 
					<?php if($dados_usuario['usuarioAtivo'] == 1) echo "checked"; ?>><br><br>
			<input type="hidden" name="idUsuario" 
				value="<?php echo $dados_usuario['idUsuario']; ?>">		
			<input type="submit" value="Atualizar" name="btnAtualizar">
		
		</form>
		
                </div><!-- FIM CONTAINER SECTION -->
        </section>
	</div><!-- FIM CONTEUDO -->
</div>



</body>
</html>