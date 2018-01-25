   <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-content">
      <h1>Gestión de reservas</h1>
      <a class="boton"  href="index.php?pagina=<?php echo $pagina; ?>&accion=nuevo" title="reserva">Nueva Reserva:</a>
        <table id="tabla" >
              <thead>
                  <tr>
                    
                      <th>Localizador</th>
                      <th>Habitación</th>
                      <th>Fecha Entrada</th>
                      <th>Fecha Salida</th>
                      <th>Importe</th>
                      <th>Nombre</th>
                      <th>Apellidos</th>
                      <th>Modificar / Cancelar</th> 
                  </tr>
              </thead>
              <tbody>  
            <?php
                $lista =  mysql_query("SELECT r.localizador,r.id_habitacion,fecha_entrada,fecha_salida,t.valor,c.nombre,c.apellidos from reservas r, clientes c, tarifas t, habitaciones h WHERE h.tarifa=t.id_tarifa and c.dni=r.dni and h.id_habitacion=r.id_habitacion order by 3");
                $resultado = mysql_num_rows($lista);
                    if($resultado > 0){
                        while ($fila = mysql_fetch_array($lista)) {
                            ?>
                              
                                    <tr >
                                       
                                        <td class="center"><?php echo $fila['localizador']; ?></td>
                                        <td class="center"><?php echo $fila['id_habitacion']; ?></td>
                                        <td class="center"><?php echo $fila['fecha_entrada']; ?></td>
                                        <td class="center"><?php echo $fila['fecha_salida']; ?></td>
                                        <td class="center"><?php echo $fila['valor']; ?> €</td>
                                        <td class="center"><?php echo $fila['nombre']; ?></td>
                                        <td class="center"><?php echo $fila['apellidos']; ?></td>
                                            <td class="center">
                                          <a  class="glyphicon glyphicon-cog" href="index.php?pagina=<?php echo $pagina; ?>&accion=editar&id=<?php echo $fila['localizador']; ?>"></a>
                                          <a  class="glyphicon glyphicon-remove" href="index.php?pagina=<?php echo $pagina; ?>&accion=borrar&id=<?php echo $fila['localizador']; ?>">   </a>
                                             </td>
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