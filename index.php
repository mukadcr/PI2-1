<?php

ini_set('odbc.defaultlrl', 9000000);//muda configuração do PHP para trabalhar com imagens no DB

include('../db/bancodedados.php');
include('../auth/controle.php');

//Funcionalidade Gravar Cadastro
if(isset($_POST['btnProd'])){
    unset($_GET['cadastrar']);

    //Imagem

    if(is_file($_FILES['file_image']['tmp_name'])){

        $file = fopen($_FILES['file_image']['tmp_name'], 'rb');
        $imagem = fread($file, filesize($_FILES['file_image']['tmp_name']));
        fclose($file);

    }else{

        $imagem = '';
    }

    //Fim imagem
    
    $_POST['ativoProduto'] = isset($_POST['ativoProduto']) ? 1 : 0;
    
    $_POST['ativoProduto'] = (int) $_POST['ativoProduto'];
    
    $_POST['nomeProduto'] = utf8_decode($_POST['nomeProduto']);
    $_POST['descProduto'] = utf8_decode($_POST['descProduto']);
    
    $stmt = odbc_prepare($db, " INSERT INTO Produto
                                (nomeProduto,
                                descProduto,
                                precProduto,
                                idCategoria,
                                imagem,
                                ativoProduto)
                                VALUES
                                (?,?,?,?,?,?)");
    if(odbc_execute($stmt, array(   $_POST['nomeProduto'],
                                    $_POST['descProduto'],
                                    $_POST['precProduto'],
                                    $_POST['idCategoria'],
                                    $imagem,
                                    $_POST['ativoProduto']))){
        $msg = 'Produto cadastrado com sucesso!';           
    }else{
        $erro = 'Erro ao gravar o produto!';
    }                               
             
}
//FIM Funcionalidade Gravar Cadastro

//Funcionalidade Editar Cadastro
if(isset($_POST['btnAtualizar'])){
	unset($_GET['editar']);
	if(	!empty($_POST['nomeProduto'])){		
		
		$_POST['ativoProduto'] = 
			isset($_POST['ativoProduto']) ? 1 : 0;
		
		$_POST['ativoProduto'] = (int) $_POST['ativoProduto'];

	$_POST['nomeProduto'] = utf8_decode($_POST['nomeProduto']);
	$_POST['descProduto'] = utf8_decode($_POST['descProduto']);
	$_POST['precProduto'] = utf8_decode($_POST['precProduto']);
	
	$arquivo = $_FILES['imagem']['tmp_name'];
	$image = @fopen($arquivo, 'r');
	$conteudo = @fread($image, filesize($arquivo));
	//exit();

	if(empty($arquivo)){

	$stmt = odbc_prepare($db, "	UPDATE 
									Produto
								SET 
									nomeProduto = ?,
									descProduto = ?,
									precProduto = ?,
									ativoProduto = ?	
								WHERE
									idProduto = ?");
	if(odbc_execute($stmt, array(	$_POST['nomeProduto'],
									$_POST['descProduto'],
									$_POST['precProduto'],
									$_POST['ativoProduto'],
									$_POST['idProduto']))){
		$msg = 'Produto atualizado com sucesso!';			
	}else{
		$erro = 'Erro ao atualizar o Produto';
	}
}else{
	$stmt = odbc_prepare($db, "	UPDATE 
									Produto
								SET 
									nomeProduto = ?,
									descProduto = ?,
									precProduto = ?,
									ativoProduto = ?,
									imagem = ?
									
								WHERE
									idProduto = ?");
	if(odbc_execute($stmt, array(	$_POST['nomeProduto'],
									$_POST['descProduto'],
									$_POST['precProduto'],
									$_POST['ativoProduto'],
									$conteudo,
									$_POST['idProduto']))){
		$msg = 'Produto atualizado com sucesso!';			
	}else{
		$erro = 'Erro ao atualizar o Produto';
	}
}
								
}}
		
//FIM funcionalidade editar 
		
//Funcionalidade Excluir
if(isset($_GET['excluir'])){
    if(is_numeric($_GET['excluir'])){
        
        if(odbc_exec($db, " DELETE FROM 
                                Produto 
                            WHERE
                                idProduto = {$_GET['excluir']}")){
            $msg = 'Produto removido com sucesso';                       
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
								qtdMinEstoque,
                                imagem 
			         FROM Produto');

while($r = odbc_fetch_array($q)){
	
	$r['nomeProduto'] = utf8_encode($r['nomeProduto']);
	$r['descProduto'] = utf8_encode($r['descProduto']);

	$produto[$r['idProduto']] = $r;
	//print_r(array_keys($r));
	//print_r($r['ativoProduto']);

}
//FIM Funcionalidade Listar
$q = odbc_exec($db, 'SELECT idCategoria, nomeCategoria, descCategoria FROM Categoria');

while($r = odbc_fetch_array($q)){
	
	$r['nomeCategoria'] = utf8_encode($r['nomeCategoria']);
	$r['descCategoria'] = utf8_encode($r['descCategoria']);
	
	$categorias[$r['idCategoria']] = $r;
	
}

//
if(isset($_GET['cadastrar'])){//FORM Cadastrar
	include('template_cadastrar.php');
	
}elseif(isset($_GET['editar'])){//FORM Editar
	if(is_numeric($_GET['editar'])){
		$q = odbc_exec($db, "	SELECT 	idProduto, nomeProduto,
										descProduto, precProduto, ativoProduto,
										imagem
										
								FROM Produto 
								WHERE idProduto = {$_GET['editar']}");
		$dadosProduto = odbc_fetch_array($q);
	}else{
		$erro = 'C&oacute;digo inv&aacute;lido';
	}
	include('template_editar.php');
	
}else{//FORM Listar
	include('template.php');
}
?>
