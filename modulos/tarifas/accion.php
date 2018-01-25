<?php



	if($accion == 'nuevo'){
?>

    	<form name="tarifas" method="post" action="index.php?pagina=<?php echo $pagina; ?>&accion=nuevo"  onsubmit="return validarForm()">
			  
		  <p>Importe: <input type="text" name="importe" id="importe" /></p><br>
		 <p>Descripcion: <input type="text" name="descripcion" id="descripcion" /></p><br>
            <span id="envio"><br> 
		  <input id="confirmar" name="confirmar" value="Confirmar" type="submit"> 
		  <input id="anular" value="Anular" type="reset">
		  </span> 
        

		</form>
	<?php
	}
	elseif($accion == 'editar'){

			$sql ="SELECT * FROM tarifas WHERE id_tarifa = ".$id;
			$res = mysql_query($sql);
			$row = mysql_fetch_array($res);
	?>
		  	<form name="tarifas" method="post" action="index.php?pagina=<?php echo $pagina; ?>&accion=editar&id=<?php echo $id; ?>" onsubmit="return validarForm()">

		  <p>Importe: <input type="text" name="importe" id="importe"  value="<?php echo utf8_decode($row['valor']) ?>" /></p><br>
		  <p>Descripcion: <input type="text" name="descripcion" id="descripcion" value="<?php echo utf8_decode($row['descripcion']) ?>"  /></p><br>
          <span id="envio"><br> 
		  <input id="confirmar" name="confirmar" value="Confirmar" type="submit"> 
		  <input id="anular" value="Anular" type="reset">
		  </span> 	
		</form>
	<?php
	} else {
			$sql ="SELECT * FROM tarifas WHERE id_tarifa = ".$id;
			$res = mysql_query($sql);
			$row = mysql_fetch_array($res); 
			?>	
		  <form name="tarifas" method="post" action="index.php?pagina=<?php echo $pagina; ?>&accion=borrar&id=<?php echo $id; ?>" onsubmit="return validarForm()">
		   <p>Importe: <?php echo utf8_decode($row['valor']) ?> </p><br>
		  <p>Descripcion: <?php echo utf8_decode($row['descripcion']) ?></p><br>
         
		  <span id="envio"><br> 
		  <input id="confirmar" name="confirmar" value="Borrar" type="submit"> 
		  </span> 	
		</form>

		
    <?php
	
	}
?>