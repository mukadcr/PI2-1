<html>
<head>
    <meta charset="utf-8">
</head>
	<body>
		
		<form method="post" enctype="multipart/form-data">
					
			Produto: <input type="text" name="nomeProduto"><br><br>
			Descrição: <input type="text" name="descProduto"><br><br>
			Preço: <input type="text" name="precProduto"><br><br>
			Categoria: 	<select name="idCategoria">
						<?php

						foreach ($categorias as $idCategoria => $categoria) {
							echo "<option value='$idCategoria'> {$categoria['nomeCategoria']} </option> ";
						}

						?>
						</select><br><br>

			Ativo: <input type="checkbox" name="usuarioAtivo"><br><br>
			
			Imagem: <input type="file" name="file_image">

			

		 <input type="submit" value="Gravar" name="btnProd">

		</form>
		
	</body>
</html>