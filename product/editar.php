<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
</head>
	<body>
		<a href="/pi/menu">Voltar</a> 
		<a href="/pi/user">Usuario</a> 
		<a href="/pi/cat">Categoria</a> 
		<a href="/pi/product">Produto</a>  
		<a href="/?logout=1">Sair</a>
		<br><br>
		<a href="?cadastrar=1">+ Usu&aacute;rio</a>
		<br>
		
		<form method="post">
		
			
			Nome: <input type="text" 
					name="nomeUsuario"
					value="<?php echo $dados_usuario['nomeUsuario']; ?>"><br><br>
					
			Nome: <input type="text" 
					name="nomeUsuario"
					value="<?php echo $dados_usuario['nomeUsuario']; ?>"><br><br>

			Nome: <input type="text" 
					name="nomeUsuario"
					value="<?php echo $dados_usuario['nomeUsuario']; ?>"><br><br>
			
			Ativo: <input type="checkbox" name="usuarioAtivo" 
					<?php if($dados_usuario['usuarioAtivo'] == 1) echo "checked"; ?>><br><br>
			<input type="hidden" name="idUsuario" 
				value="<?php echo $dados_usuario['idUsuario']; ?>">		
			<input type="submit" value="Atualizar" name="btnAtualizar">
		
		</form>
		
	</body>
</html>