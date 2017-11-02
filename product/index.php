<?php
include('../db/bancodedados.php');
include('../auth/controle.php');

//Funcionalidade Gravar Cadastro
if(isset($_POST['btnProduct'])){
	unset($_GET['cadastrar']);
	
		
		$stmt = odbc_prepare($db, "	INSERT INTO produto
									(nomeProduto,
									descProduto)
									
									VALUES
									(?,?)");
		if(odbc_execute($stmt, array(	
										$_POST['nomeProduto'],
										$_POST['descProduto']))){
			$msg = 'Categoria adicionada!';			
		}else{
			$erro = 'Erro ao gravar categoria!';
		}								
							
	}
//FIM Funcionalidade Gravar Cadastro

//Funcionalidade Excluir
if(isset($_GET['excluir'])){
	if(is_numeric($_GET['excluir'])){
		
		if(odbc_exec($db, "	DELETE FROM 
								Produto 
							WHERE
								idProduto = {$_GET['excluir']}")){
			$msg = 'produto removido com sucesso';						
		}else{
			$erro = 'Erro ao excluir o produto';
		}
		
	}else{
		$erro = 'C&oacute;digo inv&aacute;lido';
	}
}
//FIM Funcionalidade Excluir
//Funcionalidade Listar
$q = odbc_exec($db, 'SELECT idProduto, nomeProduto, descProduto, 
								precProduto,
								descontoPromocao,
								idCategoria,
								ativoProduto,
								idproduto,
								QTDMINESTOQUE 
			FROM Produto');

while($r = odbc_fetch_array($q)){
	
	$r['nomeProduto'] = utf8_encode($r['nomeProduto']);
	$r['descProduto'] = utf8_encode($r['descProduto']);

	$produto[$r['idProduto']] = $r;
	
}
//FIM Funcionalidade Listar

?>
<html>
<head>
<meta charset="UTF-8">
</head>
	<body>
	
		<a href="/pi/menu">Voltar</a> 
		<a href ="/pi/user">Usuario</a>

		<a href ="/pi/cat">Categoria</a>
		<a href ="/pi/product">Produto</a>
		<a href="/?logout=1">Sair</a>
		<br><br>
		<a href="?cadastrar=1">+ Categoria</a>
		<br>
		<br>
		<table>
			<tr>
				<th>Nome</th>
				<th>Descrição</th>
				<th>Preço</th>
				<th>Desconto</th>
				<th>Categoria</th>
				<th>Ativo</th>
				<th>Idproduto</th>
				<th>Quantidade</th>
				<th>Editar</th>
				<th>Excluir</th>
			</tr>
			<?php
			if(is_array($produto)){
				foreach($produto as $idProduto => $dadosProduto){
					
					
					echo "	<tr>
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

			

			include('cadastrar.php');

			?>
		</table>
	</body>
</html>