   <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-content"> 
  <h2>Reservas realizadas de la Habitación</h2>
 <table border="2"  class="table  table-bordered responsive" >
              <thead>
                  <tr>
                      <th>Habitación</th>
                      <th>Tipo de Habitación</th>
                      <th>Descripción</th>
                      <th>Tarifa</th>
                      <th>Fecha Entrada</th>
                      <th>Fecha Salida</th>
                  </tr>
              </thead>
            <?php
                $sql="SELECT h.id_habitacion,h.ocupacion,h.descripcion,t.valor,r.fecha_entrada,r.fecha_salida from habitaciones h, tarifas t,reservas r 
                where r.id_habitacion=h.id_habitacion and t.id_tarifa=h.tarifa  and (fecha_entrada > CURDATE() or fecha_salida > CURDATE()) and h.id_habitacion = '".$id."' ";
                $lista =  mysql_query($sql);
                $resultado = mysql_num_rows($lista);
                    if($resultado > 0){
                        while ($fila = mysql_fetch_array($lista)) {
                            ?>
                                <tbody>
                                    <tr>
                                        <td class="center"><?php echo $fila['id_habitacion']; ?></td>
                                        <td class="center"><?php echo $fila['ocupacion']; ?></td>
                                        <td class="center"><?php echo $fila['descripcion']; ?></td>
                                        <td class="center"><?php echo $fila['valor']; ?></td>
                                        <td class="center"><?php echo $fila['fecha_entrada']; ?></td>
                                        <td class="center"><?php echo $fila['fecha_salida']; ?></td>                                  
                                    </tr> 
                              </tbody>
                  
                            <?php
                        }
                    }
                    else{
                      echo "<h4>No hay reservas en el futuro para esta habitación</h4>";
                    }
                ?>
         </table>
 
    </div>
    </div>
    </div>
    </div><!--/row-->