<?php



	if($accion == 'nuevo'){
?>

    	<form name="habitaciones" method="post" action="index.php?pagina=<?php echo $pagina; ?>&accion=nuevo"  onsubmit="return validarForm()">
		 
		 <p>Num. Habitación(*): <input type="text" name="habitacion" id="habitacion" /></p><br>
		 <p>Piso: <input type="text" name="piso" id="piso" /></p><br>
		 <p>Ocupación: 
				<select name="ocupacion">
        			 <option value="individual" > Individual </option>
        			 <option value="doble" > Doble </option>
					 <option value="triple" > Triple </option>
					 <option value="familiar" > Familiar </option>
           </select></p><br>          
		 <p>Descripción: <textarea rows="2" cols="70" name="descripcion" id="descripcion"></textarea></p><br>
         <p>Tarifa:<select id="tarifa" name="tarifa">
                            <?php
                                $lista =  mysql_query("SELECT * from tarifas");
                                $resultado = mysql_num_rows($lista);
                                    if($resultado > 0){
                                        while ($fila = mysql_fetch_array($lista)) {
                                            $id_tarifa = $fila['id_tarifa'];
                                            $descripcion = $fila['descripcion'];
                                            ?>
                                            <option value="<?php echo $id_tarifa; ?>" > <?php echo $descripcion; ?> </option>

                                            <?php
                                        }
                                    }
                                ?>
                    </select></p><br>     
               <span id="envio"><br> 
              <input id="confirmar" name="confirmar" value="Confirmar" type="submit"> 
              <input id="anular" value="Anular" type="reset">
		  </span> 
		</form>
	<?php
	}else{

			$sql ="SELECT * FROM habitaciones WHERE id_habitacion = '".$id."'";

			$res = mysql_query($sql);
			$row = mysql_fetch_array($res);
 //$pagina = $row['edificio'];
 	$ocupacion = $row['ocupacion'];
  	$tarifa = $row['tarifa'];
	?>

		  	<form name="habitaciones" method="post" action="index.php?pagina=<?php echo $pagina; ?>&accion=editar&id=<?php echo $id; ?>" onsubmit="return validarForm()">
					<p>Num Habitación(*): <input type="text" name="habitacion" id="habitacion" value="<?php echo utf8_decode($row['id_habitacion']) ?>"/></p><br>
					<p>Piso: <input type="text" name="piso" id="piso" value="<?php echo utf8_decode($row['piso']) ?>"/></p><br>
					<p>Ocupación: 
							<select name="ocupacion" value="<?php echo utf8_decode($row['ocupacion']) ?>">
			        			 <option value="individual" <?php  if ($ocupacion == 'individual') { ?> selected <?php } ?> /> Individual </option>
			        			 <option value="doble" <?php  if ($ocupacion == 'doble') { ?> selected <?php } ?>/>  Doble </option>
								 <option value="triple" <?php  if ($ocupacion == 'triple') { ?> selected <?php } ?> /> Triple </option>
								 <option value="familiar" <?php  if ($ocupacion == 'familiar') { ?> selected <?php } ?> /> Familiar </option>
			           </select></p><br>
				    <p>Descripción: <input type="text" name="descripcion" id="descripcion" size="120" value="<?php echo utf8_decode($row['descripcion']) ?>" /></p><br>
			  		<p>Tarifa:<select id="tarifa" name="tarifa" value="<?php echo utf8_decode($row['tarifa']) ?>">
                            <?php
                                $lista =  mysql_query("SELECT * from tarifas");
                                $resultado = mysql_num_rows($lista);
                                    if($resultado > 0){
                                        while ($fila = mysql_fetch_array($lista)) {
                                            $id_tarifa = $fila['id_tarifa'];
                                            $descripcion = $fila['descripcion'];
                                            ?>
                                            <option value="<?php echo $id_tarifa; ?>" <?php  if ($id_tarifa == $tarifa) { ?> selected <?php } ?>/>  <?php echo $descripcion; ?> </option>

                                            <?php
                                        }
                                    }
                                ?>
                    </select></p><br>            <span id="envio"><br> 
                      <input id="confirmar" name="confirmar" value="Confirmar" type="submit"> 
                      <input id="anular" value="Anular" type="reset">
                  </span>                 
		</form>
	<?php
	}
?>