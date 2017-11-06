<?php
include('../db/bancodedados.php');
include('../auth/controle.php');
//Funcionalidade Gravar Cadastro
if(isset($_POST['btnCat'])){
	unset($_GET['cadastrar']);
	
		
		$stmt = odbc_prepare($db, "	INSERT INTO Categoria
									(
									nomeCategoria,
									descCategoria)
									
									VALUES
									(?,?)");
		if(odbc_execute($stmt, array(	
										$_POST['nomeCategoria'],
										$_POST['descCategoria']))){
			$msg = 'Categoria adicionada!';			
		}else{
			$erro = 'Erro ao gravar categoria!';
		}								
							
	}
//FIM Funcionalidade Gravar Cadastro

	//Funcionalidade Editar Cadastro
if(isset($_POST['btnAtualizar'])){
	unset($_GET['editar']);
	if(	!empty($_POST['nomeCategoria'])){
		
		
		$_POST['nomeCategoria'] = utf8_decode($_POST['nomeCategoria']);
		$_POST['descCategoria'] = utf8_decode($_POST['descCategoria']);
		
		
		$stmt = odbc_prepare($db, "	UPDATE 
										Categoria
									SET 
										nomeCategoria = ?,
										descCategoria = ?
									WHERE
										idCategoria = ?");
									
		if(odbc_execute($stmt, array(	$_POST['nomeCategoria'],
										$_POST['descCategoria'],
										$_POST['idCategoria']))){
			$msg = 'Categoria atualizada com sucesso!';			
		}else{
			$erro = 'Erro ao atualizar a Categoria';
		}
	}
}

//Funcionalidade Excluir
if(isset($_GET['excluir'])){
	if(is_numeric($_GET['excluir'])){
		
		if(odbc_exec($db, "	DELETE FROM 
								Categoria 
							WHERE
								idCategoria = {$_GET['excluir']}")){
			$msg = 'Categoria removida com sucesso';						
		}else{
			$erro = 'Erro ao excluir a categoria';
		}
		
	}else{
		$erro = 'C&oacute;digo inv&aacute;lido';
	}
}
//FIM Funcionalidade Excluir

//Funcionalidade Listar
$q = odbc_exec($db, 'SELECT idCategoria, nomeCategoria, descCategoria FROM Categoria');

while($r = odbc_fetch_array($q)){
	
	$categoria[$r['idCategoria']] = $r;
	
}


//FIM Funcionalidade Listar

if(isset($_GET['cadastrar'])){//FORM Cadastrar
	include('template_cadastrar.php');
	
}elseif(isset($_GET['editar'])){//FORM Editar
	if(is_numeric($_GET['editar'])){
		$q = odbc_exec($db, "	SELECT 	idCategoria, nomeCategoria,
										descCategoria
								FROM Categoria 
								WHERE idCategoria = {$_GET['editar']}");
		$dados_usuario = odbc_fetch_array($q);
	}else{
		$erro = 'C&oacute;digo inv&aacute;lido';
	}
	include('template_editar.php');
	
}else{//FORM Listar
	include('template.php');

}
?>