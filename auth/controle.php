<?php
if(!isset($_SESSION))
{
    session_start();
}

if(!isset($_SESSION['idUsuario'])){
	
	
	header('Location: /pi');
	
}


?>