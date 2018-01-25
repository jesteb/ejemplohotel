<?php
	function comillas_inteligentes($valor) 
	{ 
	   // Retirar las barras 
	   if (get_magic_quotes_gpc()) { 
		   $valor = stripslashes($valor); 
	   } 
	
	   // Colocar comillas si no es entero 
	   if (!is_numeric($valor)) { 
		   $valor = "'" . mysql_real_escape_string($valor) . "'"; 
	   } 
	   return $valor; 
	} 
?>