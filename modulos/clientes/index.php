   <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-content">
         <h1>Gestión de Clientes</h1>
      <a class="boton"  href="index.php?pagina=<?php echo $pagina; ?>&accion=nuevo" title="cliente">Crear un Cliente</a>
      <table id="tabla"  >
      <thead>
                                <tr>
                                  
                                    <th>Nombre</th>
                                    <th>Apellidos</th>
                                    <th>DNI</th>
                                    <th>Correo electrónico</th> 
                                    <th>Teléfono</th>                                       
                                    <th>Editar</th>                                   
                                </tr>
                            </thead>  
        <tbody>
           
        <?php
			$lista =  mysql_query("SELECT * from clientes");
			$resultado = mysql_num_rows($lista);
   				if($resultado > 0){
    				while ($fila = mysql_fetch_array($lista)) {
						?>
                          <tr >
                                   
                                    <td class="center"><?php echo $fila['nombre']; ?></td>
                                    <td class="center"><?php echo $fila['apellidos']; ?></td>
                                    <td class="center"><?php echo $fila['dni']; ?></td>
                                    <td class="center"><?php echo $fila['email']; ?></td>
                                    <td class="center"><?php echo $fila['telefono']; ?></td>                    
                                    <td class="center">
                                    <a class="glyphicon glyphicon-cog"  href="index.php?pagina=<?php echo $pagina; ?>&accion=editar&id=<?php echo $fila['dni']; ?>"></a></td>
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