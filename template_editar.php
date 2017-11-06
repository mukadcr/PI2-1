<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
</head>
	<body>
		<a href="/pi/menu">Voltar</a> 
		<b>Usuario</b> 
		Categoria 
		Produto 
		<a href="/?logout=1">Sair</a>
		<br><br>
		
		<form method="post">
			<input type="hidden" name="idCategoria" value="<?php echo $dados_usuario['idCategoria']; ?>">
			Categoria: <input type="text" 
					name="nomeCategoria"
					value="<?php echo $dados_usuario['nomeCategoria']; ?>"><br><br>
			Descricao: <input type="text" name="descCategoria"><br><br>
			
		
			<input type="submit" value="Atualizar" name="btnAtualizar">
		
		</form>
		
	</body>
</html>
		