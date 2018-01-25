   <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-content">
         <h1>Gestión de Tarifas</h1>
      <p><a class="boton"  href="index.php?pagina=<?php echo $pagina; ?>&accion=nuevo" title="tarifas">Crear Tarifa</a></p>
      <table id="tabla" >
      <thead>

                                <tr>
                                 
                                    <th>Tarifa</th>
                                    <th>Importe</th>
                                    <th>Descripción</th>
                                    <th>Editar / Eliminar</th>  
                                </tr>

                            </thead>
 <tbody>
        <?php

      $lista =  mysql_query("SELECT * from tarifas");

      $resultado = mysql_num_rows($lista);

          if($resultado > 0){

            while ($fila = mysql_fetch_array($lista)) {

            ?>
                                <tr >
                                
                                    <td class="center"><?php echo $fila['id_tarifa']; ?></td>
                                    <td class="center"><?php echo $fila['valor']; ?></td>
                                    <td class="center"><?php echo $fila['descripcion']; ?></td>
                                    <td class="center">
                                      <a class="glyphicon glyphicon-cog"  href="index.php?pagina=<?php echo $pagina; ?>&accion=editar&id=<?php echo $fila['id_tarifa']; ?>"></a>
                                      <a class="glyphicon glyphicon-remove"  href="index.php?pagina=<?php echo $pagina; ?>&accion=borrar&id=<?php echo $fila['id_tarifa']; ?>"></a></td>

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