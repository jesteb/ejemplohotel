   <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-content">
         <h1>Gestión de Habitaciones</h1>
      <a class="boton"  href="index.php?pagina=<?php echo $pagina; ?>&accion=nuevo" title="habitaciones">Dar de alta una Habitación</a>
              <table id="tabla" >
      <thead>
                                <tr>
                                    <th>Habitación(*)</th>
                                    <th>Piso</th>
                                    <th>Ocupación</th>
                                    <th>Descripción</th>
                                    <th>Tarifa</th>
                                    <th>Editar</th> 
                                </tr>
                            </thead>
                            <tbody>
        <?php
			$lista =  mysql_query("SELECT id_habitacion,piso,ocupacion,h.descripcion,t.valor as tarifa from habitaciones h, tarifas t where h.tarifa=t.id_tarifa");
			$resultado = mysql_num_rows($lista);
   				if($resultado > 0){
    				while ($fila = mysql_fetch_array($lista)) {
						?>
                           
                                <tr >                         
                                  
                                    <td class="center"><?php echo $fila['id_habitacion']; ?></td>
                                    <td class="center"><?php echo $fila['piso']; ?></td>
                                    <td class="center"><?php echo $fila['ocupacion']; ?></td>
                                    <td class="center"><?php echo $fila['descripcion']; ?></td>
                                    <td class="center"><?php echo $fila['tarifa']; ?></td>
									<td class="center">
                    <a class="glyphicon glyphicon-cog"  href="index.php?pagina=<?php echo $pagina; ?>&accion=editar&id=<?php echo $fila['id_habitacion']; ?>"></a></td>
                                </tr> 
                         
            <?php
    				}
   				}
			?>
      </tbody> 
     </table>
    </div>
    </div>
    </div>
    </div><!--/row-->