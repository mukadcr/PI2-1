
<html>
	<body>
		<a href="/pi/menu">Voltar</a> 
		Usuario
		<b>Categoria</b> 
		Produto 
		<a href="/?logout=1">Sair</a>
		<br><br>
		<a href="?cadastrar=1">+ Categoria</a>
		
		<br>
		<?php
		if(isset($msg))
			echo "	<br><center><b><font color='green'>
					$msg</font></b></center><br>";
		if(isset($erro))
			echo "	<br><center><b><font color='red'>
					$erro</font></b></center><br>";
		?>
		<br>
		
			<table>
			<tr>
				<td>ID</td>
				<td>Categoria</td>
				<td>Descricao</td>
				<td>Editar</td>
				<td>Excluir</td>
			</tr>


			<?php
			foreach($categoria as $idCategoria => $dadosCategoria){
				
				echo "	<tr>
							
							<td>{$dadosCategoria['idCategoria']}</td>
							<td>{$dadosCategoria['nomeCategoria']}</td>
							<td>{$dadosCategoria['descCategoria']}</td>
							<td><a href='?editar=$idCategoria'>e</a></td>
							<td><a href='?excluir=$idCategoria'>x</a></td>
						</tr>";
				
			}
			?>
		</table>
	</body>
</html>