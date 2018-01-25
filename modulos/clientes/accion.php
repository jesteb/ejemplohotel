<?php



	if($accion == 'nuevo'){
?>

    	<form name="clientes" method="post" action="index.php?pagina=<?php echo $pagina; ?>&accion=nuevo"  onsubmit="return validarForm()">
			<p>Nombre: <input type="text" name="nombre" id="nombre" /></p><br>
			<p>Apellidos: <input type="text" name="apellidos" id="apellidos" /></p><br>
			<p>DNI: <input type="text" name="dni"  id="dni" /></p><br>
			<p>Email: <input type="email" name="email"  id="email" /></p><br>
			<p>Password: <input type="password" name="password"  id="password" /></p><br>
			<span id="envio"><br> 
			<p>Telefono: <input type="text" name="telefono" id="telefono" /></p><br>
		  <input id="confirmar" name="confirmar"  value="Confirmar" type="submit"> 
		  <input id="anular" value="Anular" type="reset">
		</span> 

		</form>
	<?php
	}else{

			$sql ="SELECT * FROM clientes WHERE dni = '".$id."'";
			$res = mysql_query($sql);
			$row = mysql_fetch_array($res);
	?>
		  	<form name="clientes" method="post" action="index.php?pagina=<?php echo $pagina; ?>&accion=editar&id=<?php echo $id; ?>" onsubmit="return validarForm()">

		  	<p>Nombre: <input type="text" name="nombre" id="nombre"  value="<?php echo utf8_decode($row['nombre']) ?>" /></p><br>
			<p>Apellidos: <input type="text" name="apellidos" id="apellidos"  value="<?php echo utf8_decode($row['apellidos']) ?>"/></p><br>
			<p>DNI: <input type="text" name="dni"  id="dni"  value="<?php echo utf8_decode($row['dni']) ?>" /></p><br>
			<p>Email: <input type="email" name="email"  id="email"   value="<?php echo utf8_decode($row['email']) ?>"/></p><br>
			<p>Telefono: <input type="text" name="telefono" id="telefono"  value="<?php echo utf8_decode($row['telefono']) ?>" /></p><br>
				<p>Puedes cambiar tu contraseña: <input type="button" value="Cambiar " onclick="mostrar()"> 
					<div id="content" class="col-lg-1 col-sm-1"></div>
					<div id='oculto' style='display:none;'>
						Nueva contraseña:<input type="password" name="password"  id="password"   /></p><br>
					</div> 

					
		        <span id="envio"><br> 
				  <input id="confirmar" name="confirmar" value="Confirmar" type="submit"> 
				  <input id="anular" value="Anular" type="reset">
				  
				</span> 
		</form>

	<?php
	}
?>