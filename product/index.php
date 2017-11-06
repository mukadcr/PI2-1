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


<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Dashboard</title>
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
                <li><a href="../menu"><i class="fa fa-th-large" aria-hidden="true"></i>Dashboard</a></li>
                <li><a href="../cat"><i class="fa fa-folder-o" aria-hidden="true"></i>Categoria</a></li>
                <li class="ativo"><a href="../product"><i class="fa fa-tag" aria-hidden="true"></i>Produtos</a></li>
                <li><a href="../user"><i class="fa fa-user-o" aria-hidden="true"></i>Usuários</a></li>
                <li><a href="#"><i class="fa fa-sliders" aria-hidden="true"></i>Configurações</a></li>
            </ul>
        </nav>
    </aside>
	<div class="conteudo">
        <header>
        	<div class="barra-superior">
            <p><i class="fa fa-tag" aria-hidden="true"></i>Produtos</p>
            <p>Olá, <?php echo $_SESSION['nomeUsuario'];?> <a href="/pi/?logout=1">[x] Sair</a></p>
            
            </div>
        </header>
        
        <section>
            <div class="container">
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
								<td><a class='editar' href='?editar={$dadosProduto['idProduto']}'><i class='fa fa-pencil' aria-hidden='true'></i></a></td>
								<td><a class='excluir' href='?excluir={$dadosProduto['idProduto']}'><i class='fa fa-trash-o' aria-hidden='true'></i></a></td>
							</tr>";
					
				}
			}else{
				echo "	<tr>
								<td colspan='6'>N&atilde;o h&aacute; registros</td>
							</tr>";
			}

			?>
		</table>
	 </div><!-- FIM CONTAINER SECTION -->
        </section>
	</div><!-- FIM CONTEUDO -->
</div>



</body>
</html>