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
                <li class="ativo"><a href="../menu"><i class="fa fa-tachometer" aria-hidden="true"></i>Dashboard</a></li>
                <li><a href="../cat"><i class="fa fa-folder" aria-hidden="true"></i>Categoria</a></li>
                <li><a href="../product"><i class="fa fa-tag" aria-hidden="true"></i>Produtos</a></li>
                <li><a href="../user"><i class="fa fa-user" aria-hidden="true"></i>Usuários</a></li>
                <li><a href="#"><i class="fa fa-cog" aria-hidden="true"></i>Configurações</a></li>
            </ul>
        </nav>
    </aside>
	<div class="conteudo">
        <header>
        	<div class="barra-superior">
            <p><i class="fa fa-tachometer" aria-hidden="true"></i>Dashboard</p>
            <p>Olá, <?php echo $_SESSION['nomeUsuario'];?> <a href="/pi/?logout=1">[x] Sair</a></p>
            
            </div>
        </header>
        
        <section>
            <div class="container">
            <div class="blocos">
            	<div class="bloco1">
                    <div class="tag1"><i class="fa fa-tag" aria-hidden="true"></i></div>
                        <div class="bloco-info">
                            <h3>Produtos Cadastrados</h3>
                            <div class="retornoBanco">
                            <?php 
                            $q = odbc_exec($db, 'SELECT COUNT(*) as total FROM produto');
                            $totalProd = odbc_fetch_array ($q);
                            echo $totalProd['total'];			
                            ?>  
                            </div>                          
                        </div>
                        <div class="bloco-link">
                            <a href="../product/?cadastrar=1"><i class="fa fa-plus produto" aria-hidden="true"></i>Cadastrar Produtos</a>
                        </div><!-- FIM BLOCO 1 -->
                    </div>
                    
                	
                    <div class="bloco2">
                		<div class="tag2"><i class="fa fa-folder" aria-hidden="true"></i></div>
                        <div class="bloco-info">
                        	<h3>Categorias Cadastradas</h3>
                            <div class="retornoBanco">
                			<?php
							$q        = odbc_exec($db, 'SELECT COUNT(*) as total FROM Categoria');
							$totalCat = odbc_fetch_array ($q);
							echo $totalCat['total'];
							?>
                            </div>
                         	</div><!-- FIM BLOCO INFO CATEGORIA -->
                            <div class="bloco-link">
                        	<a href="../cat/?cadastrar=1"><i class="fa fa-plus categoria" aria-hidden="true"></i> Cadastrar Categoria</a>
                   			</div><!-- FIM BLOCO LINK CATEGORIA -->
                            </div><!-- FIM BLOCO 2 -->
                            
                		<div class="bloco3">
               				<div class="tag3"><i class="fa fa-user" aria-hidden="true"></i></div>
                            <div class="bloco-info">
                            <h3>Usuários Cadastrados</h3>
                            <div class="retornoBanco">
                				<?php
                				$q         = odbc_exec($db, 'SELECT COUNT(*) as total FROM Usuario');
								$totalUser = odbc_fetch_array ($q);
								echo $totalUser['total'];
								?>
                                </div>
                                </div>
                                <div class="bloco-link">
                        			
                       			<a href="../user/?cadastrar=1"><i class="fa fa-plus usuario" aria-hidden="true"></i>Cadastrar Usuário</a>
                                </div><!-- FIM BLOCO LINK -->
                        </div> <!-- FIM BLOCO 3 -->
                </div><!-- FIM BLOCOS -->
                </div><!-- FIM CONTAINER SECTION -->
        </section>
	</div><!-- FIM CONTEUDO -->
</div>



</body>
</html>
