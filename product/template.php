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
				<td>Nome</td>
				<td>Desconto</td>
				<td>Preço</td>
				<td>Categoria</td>
				<td>Ativo</td>
				<td>Editar</td>
				<td>Excluir</td>
			</tr>
			<?php
			foreach($produto as $idProduto => $dadosProduto){
				
				echo "	<tr>
								<td>{$dadosProduto['produto']}</td>
								<td>{$dadosProduto['nomeProduto']}</td>
								<td>{$dadosProduto['descProduto']}</td>
								<td>{$dadosProduto['precProduto']}</td>
								<td>{$dadosProduto['descontoPromocao']}</td>
								<td>{$dadosProduto['idCategoria']}</td>
								<td>{$dadosProduto['ativoProduto']}</td>
								<td>{$dadosProduto['idProduto']}</td>
								<td>{$dadosProduto['QTDMINESTOQUE']}</td>
								<td><a href='?editar={$dadosProduto['idProduto']}'>e</a></td>
								<td><a href='?excluir={$dadosProduto['idProduto']}'>x</a></td>
							</tr>";
					
				}
			}else{
				echo "	<tr>
								<td colspan='6'>N&atilde;o h&aacute; registros</td>
							</tr>";
				
			}
			?>
		</table>
	</body>
</html>