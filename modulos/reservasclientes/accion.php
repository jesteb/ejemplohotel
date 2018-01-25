<?php



	if($accion == 'nuevo'){
?>
    	<form name="reservas" method="post" action="index.php?pagina=<?php echo $pagina; ?>&accion=nuevo"  onsubmit="return validarForm()">
          <p>Fecha Entrada: <input type="date" name="fecha_entrada" id="fecha_entrada" value="<?php $result = mysql_query("SELECT CURDATE()");
                                            while($row=mysql_fetch_array($result)){ 
                                              echo $row['CURDATE()'] ;
                                            }?>" /></p>
          <p>Fecha Salida: <input type="date" name="fecha_salida" id="fecha_salida" value="<?php $result = mysql_query("SELECT CURDATE()");
                                            while($row=mysql_fetch_array($result)){ 
                                              echo $row['CURDATE()'] ;
                                            }?>" /></p>
          
           <p>Habitación:<select name="id_habitacion">
                            <?php
                                $lista =  mysql_query("SELECT * from habitaciones");
                                $resultado = mysql_num_rows($lista);
                                    if($resultado > 0){
                                        while ($fila = mysql_fetch_array($lista)) {
                                            $id_habitacion = $fila['id_habitacion'];
                                            $descripcion = $fila['ocupacion']. " ".$fila['id_habitacion'];

                                            ?>
                                            <option value="<?php echo $id_habitacion; ?>" > <?php echo $descripcion; ?> </option>

                                            <?php
                                        }
                                    }
                                ?>
                    </select></p><br>
          <p>Cliente:<select name="dni"  id="dni">
                            <?php
                                $lista =  mysql_query("SELECT * from clientes where dni ='".$id_usuario."'");
                                $resultado = mysql_num_rows($lista);
                                    if($resultado > 0){
                                        while ($fila = mysql_fetch_array($lista)) {
                                            $dni = $fila['dni'];
                                            $nombre = $fila['apellidos']." ".$fila['nombre'];
                                            ?>
                                            <option value="<?php echo $dni; ?>" > <?php echo $nombre; ?> </option>

                                            <?php
                                        }
                                    }
                                ?>
                    </select></p><br>
             <p>Observaciones <br> <textarea rows="2" cols="70" name="observaciones" id="observaciones"></textarea><br>
              <span id="envio"><br> 
            <input id="confirmar" name="confirmar" value="Confirmar" type="submit"> 
            <input id="comprobar" name="comprobar" value="Comprueba disponibilidad" type="submit"> 
            <!--/<input id="anular" value="Anular" type="reset">-->
            </span> 
		</form>
	<?php
	}elseif($accion == 'editar'){

            $sql ="SELECT * FROM reservas WHERE localizador = ".$id;
            $res = mysql_query($sql);
            $row = mysql_fetch_array($res);
    ?>
         <form name="reservas" method="post" action="index.php?pagina=<?php echo $pagina; ?>&accion=editar&id=<?php echo $id; ?>" onsubmit="return validarForm()">  
            <p>Fecha Entrada: <input type="date" name="fecha_entrada" id="fecha_entrada"value="<?php echo utf8_decode($row['fecha_entrada']) ?>"/></p>                          
            <p>Fecha Salida: <input type="date" name="fecha_salida" id="fecha_salida"value="<?php echo utf8_decode($row['fecha_salida']) ?>"/></p>                          
            <p>Cliente:<select name="dni" value="<?php echo utf8_decode($row['dni']) ?>">
                        <?php
                                $lista =  mysql_query("SELECT * from clientes where dni ='".$id_usuario."'");
                                $resultado = mysql_num_rows($lista);
                                    if($resultado > 0){
                                        while ($fila = mysql_fetch_array($lista)) {
                                            $dni = $fila['dni'];
                                            $nombre = $fila['apellidos']." ".$fila['nombre'];
                                             if($row['dni'] == $fila['dni']){
                                            ?>
                                              <option selected value="<?php echo $dni; ?>" > <?php echo $nombre; ?> </option>
                                            <?php
                                            }else{
                                            ?>
                                            <option  value="<?php echo $dni; ?>" > <?php echo $nombre; ?> </option>

                                            <?php

                                            }
                                        }
                                    }
                                ?>
                    </select>
            <p>Habitación:
                           <select name="id_habitacion" value="<?php echo utf8_decode($row['id_habitacion']) ?>">
                        <?php
                                $lista =  mysql_query("SELECT * from habitaciones");
                                $resultado = mysql_num_rows($lista);
                                    if($resultado > 0){
                                        while ($fila = mysql_fetch_array($lista)) {
                                            $id_habitacion = $fila['id_habitacion'];
                                            $descripcion = $fila['ocupacion']. " ".$fila['id_habitacion'];
                                             if($row['id_habitacion'] == $fila['id_habitacion']){
                                            ?>
                                              <option selected value="<?php echo $id_habitacion; ?>" > <?php echo $descripcion; ?> </option>
                                            <?php
                                            }else{
                                            ?>
                                            <option  value="<?php echo $id_habitacion; ?>" > <?php echo $descripcion; ?> </option>

                                            <?php

                                            }
                                        }
                                    }
                                ?>
                    </select>
            <p>Observaciones: <br> <textarea rows="2" cols="70"  name="observaciones" id="observaciones"><?php echo utf8_decode($row['observaciones']) ?></textarea><br>
            <span id="envio"><br> 
            <input id="confirmar" name="confirmar" value="Confirmar" type="submit"> 
            <input id="comprobar" name="comprobar" value="Comprueba disponibilidad" type="submit"> 
          </span>               
        </form>
        <?php
    } else {
            $sql ="SELECT * FROM reservas WHERE localizador = ".$id;
            $res = mysql_query($sql);
            $row = mysql_fetch_array($res); 
            ?>  
          <form name="reservas" method="post" action="index.php?pagina=<?php echo $pagina; ?>&accion=borrar&id=<?php echo $id; ?>" onsubmit="return validarForm()">
            <p>Localizador: <?php echo utf8_decode($id) ?></p>
            <p>Fecha Entrada: <?php echo utf8_decode($row['fecha_entrada']) ?></p>                          
            <p>Fecha Salida: <?php echo utf8_decode($row['fecha_salida']) ?></p>                          
            <p>DNI Cliente: <?php echo utf8_decode($row['dni']) ?></p>
            <p>Habitación: <?php echo utf8_decode($row['id_habitacion']) ?></p>
            <p>Observaciones: <?php echo utf8_decode($row['observaciones']) ?></p>
 
          <span id="envio"><br> 
          <input id="confirmar" name="confirmar" value="Cancelar Reserva" type="submit"> 
          </span>   
        </form>
    <?php
    }
?>