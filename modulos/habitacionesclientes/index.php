   <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-content">
         <h1>Habitaciones</h1>
              <table id="tabla" >
      <thead>
                                <tr>
                                    <th>Habitación(*)</th>
                                    <th>Ocupación</th>
                                    <th>Descripción</th>
                                    <th>Tarifa</th>
                                    <th>Ver</th> 
                                </tr>
                            </thead>
                            <tbody>
        <?php
			$lista =  mysql_query("SELECT id_habitacion,ocupacion,h.descripcion,t.valor as tarifa from habitaciones h, tarifas t where h.tarifa=t.id_tarifa");
			$resultado = mysql_num_rows($lista);
   				if($resultado > 0){
    				while ($fila = mysql_fetch_array($lista)) {
						?>
                           
                                <tr >                         
                                  
                                    <td class="center"><?php echo $fila['id_habitacion']; ?></td>
                                    <td class="center"><?php echo $fila['ocupacion']; ?></td>
                                    <td class="center"><?php echo $fila['descripcion']; ?></td>
                                    <td class="center"><?php echo $fila['tarifa']; ?></td>
									<td class="center">
                  <a  class="glyphicon glyphicon-zoom-in" href="index.php?pagina=<?php echo $pagina; ?>&detalles=detalles&id=<?php echo $fila['id_habitacion']; ?>">   </a>

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