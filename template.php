    <!doctype html>
    <html lang="pt-BR">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <title>Hippo | Produtos</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">
        <script src="https://use.fontawesome.com/1defc9531d.js"></script>
        <link rel="stylesheet" href="../css/estilo.css">
    </head>

    <body>
        <div class="all">
            <aside class="lateral">
                <div class="logo">
                    <img src="../img/logo.jpg" alt="Logo Hippo" />
                </div>
                <nav>
                    <ul>
                        <li><a href="../menu"><i class="fa fa-th-large" aria-hidden="true"></i>Dashboard</a></li>
                        <li><a href="../cat"><i class="fa fa-folder-o" aria-hidden="true"></i>Categoria</a></li>
                        <li class="ativo"><a href="../product"><i class="fa fa-tag" aria-hidden="true"></i>Produtos</a></li>
                        <li><a href="../user"><i class="fa fa-user-o" aria-hidden="true"></i>Usuários</a></li>
                        <li><a href="#"><i class="fa fa-sliders" aria-hidden="true"></i>Configurações</a></li>
                        <li><a href="../upgrade"><i class="fa fa-money" aria-hidden="true"></i>Upgrade</a></li>
                    </ul>
                </nav>
            </aside>
            <div class="conteudo">
                <header>
                    <div class="barra-superior">
                        <p><i class="fa fa-tag" aria-hidden="true"></i>Produtos</p>
                        <p>Olá,
                            <?php echo $_SESSION['nomeUsuario'];?> <a href="/pi/?logout=1"><i class="fa fa-sign-out" aria-hidden="true"></i> Sair</a></p>

                    </div>
                </header>

                <section>
                    <div class="container">
                        <form name="frmBusca" action="<?php echo $_SERVER['PHP_SELF']?>?a=buscar" method="post">
                            <input type="search" name="palavra" />
                            <input type="submit" value="Pesquisar" />                  
                        </form>
                        
                        <?php
                        if(isset($_POST['Pesquisar'])){
                            echo "Entrou";
                        }
                        ?>
                        
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
                                <th>Imagem</th>
                                <th>Editar</th>
                                <th>Excluir</th>
                            </tr>
                            <?php
			if(is_array($produto)){
				foreach($produto as $idProduto => $dadosProduto){
					
					
					echo "	<tr>
								<td>{$dadosProduto['nomeProduto']}</td>
								<td>{$dadosProduto['descProduto']}</td>
								<td>R$ {$dadosProduto['precProduto']}</td>
								<td>R$ {$dadosProduto['descontoPromocao']}</td>
								<td>{$dadosProduto['idCategoria']}</td>
								<td>{$dadosProduto['ativoProduto']}</td>
								<td>{$dadosProduto['idProduto']}</td>
								<td>{$dadosProduto['qtdMinEstoque']}</td>
                                <td><img width='100%' src='data:image/jpeg;base64,".base64_encode($dadosProduto['imagem'])."' /></td>
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
                    </div>
                    <!-- FIM CONTAINER SECTION -->
                </section>
            </div>
            <!-- FIM CONTEUDO -->
        </div>



    </body>

    </html>