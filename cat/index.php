<?php
include('../db/bancodedados.php');
include('../auth/controle.php');
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
                <li class="ativo"><a href="../cat"><i class="fa fa-folder-o" aria-hidden="true"></i>Categoria</a></li>
                <li><a href="../product"><i class="fa fa-tag" aria-hidden="true"></i>Produtos</a></li>
                <li><a href="../user"><i class="fa fa-user-o" aria-hidden="true"></i>Usuários</a></li>
                <li><a href="#"><i class="fa fa-sliders" aria-hidden="true"></i>Configurações</a></li>
            </ul>
        </nav>
    </aside>
	<div class="conteudo">
        <header>
        	<div class="barra-superior">
            <p><i class="fa fa-folder-o" aria-hidden="true"></i>Categoria</p>
            <p>Olá, <?php echo $_SESSION['nomeUsuario'];?> <a href="/pi/?logout=1">[x] Sair</a></p>
            
            </div>
        </header>
        
        <section>
            <div class="container">

<?php 
//Funcionalidade Listar
$q = odbc_exec($db, 'SELECT idCategoria, nomeCategoria, descCategoria FROM Categoria');

while($r = odbc_fetch_array($q)){
    
	
	$categoria[$r['idCategoria']] = $r;
	
}
//FIM Funcionalidade Listar

?>

		<table>
			<tr>
				<th>ID</th>
				<th>Nome</th>
				<th>Descrição</th>
				<th>Editar</th>
				<th>Excluir</th>
			</tr>
			<?php
			if(is_array($categoria)){
				foreach($categoria as $idCategoria => $dadosCategoria){
					
					echo "	<tr>
								<td>{$dadosCategoria['idCategoria']}</td>
								<td>{$dadosCategoria['nomeCategoria']}</td>
								<td>{$dadosCategoria['descCategoria']}</td>
								<td><a class='editar' href='?editar=$idCategoria'><i class='fa fa-pencil' aria-hidden='true'></i></a></td>
								<td><a class='excluir' href='?excluir=$idCategoria'><i class='fa fa-trash-o' aria-hidden='true'></i></a></td>
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