<html>
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
		
			
			Nome: <input type="text" name="nomeUsuario"><br><br>
			Categoria: <input type="text" name="nomeProduto"><br><br>
			Preço: <input type="number" name="precProduto"><br><br>
			
			Ativo: <input type="checkbox" name="ativoProduto"><br><br>
			<input type="submit" value="Gravar" name="btnProduct">
		
		</form>
		
	</body>
</html>