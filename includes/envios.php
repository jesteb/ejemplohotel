	<?php
	if(isset($_POST['comprobar'])){
		if($accion == 'nuevo'){$id=0;}			
		if($pagina == 'reservas' || $pagina == 'reservasclientes'){
			$sql="SELECT * FROM reservas where id_habitacion='".$_POST['id_habitacion']."' and localizador <> ".$id."
			and ( (fecha_entrada  >= '".$_POST['fecha_entrada']."' and fecha_entrada <= date_add('".$_POST['fecha_salida']."',interval -1 day))
				or (date_add(fecha_salida,interval -1  day) >= '".$_POST['fecha_entrada']."' and date_add(fecha_salida,interval -1 day) <= '".$_POST['fecha_salida']."') )";		
				mysql_query($sql);
				$res = mysql_query($sql);
				$resultado = mysql_num_rows($res);
						
                 if($resultado > 0){
					echo "<h3>NO SE PUEDE RESERVAR EN ESA FECHA!</h3>";
                 }
                 else
                 	{
					echo "<h3>Enhorabuena. Puede reservar entre el '".$_POST['fecha_entrada']."' y el '".$_POST['fecha_salida']."'</h3>";
                 }

		}			
	}

	if(isset($_POST['confirmar'])){
		//--------------------------------------------------------------------------------	
		//-RESERVAS------------------------------------------------------------------------------
		if($pagina == 'reservas' || $pagina == 'reservasclientes'){
			if($accion == 'nuevo'){$id=0;}
			if($accion == 'borrar'){$resultado=0;}
			if ($accion == 'nuevo' || $accion == 'editar'){
				$sql="SELECT * FROM reservas where id_habitacion='".$_POST['id_habitacion']."' and localizador <> ".$id."
					and ( (fecha_entrada  >= '".$_POST['fecha_entrada']."' and fecha_entrada <= date_add('".$_POST['fecha_salida']."',interval -1 day))
					or (date_add(fecha_salida,interval -1  day) >= '".$_POST['fecha_entrada']."' and date_add(fecha_salida,interval -1 day) <= '".$_POST['fecha_salida']."') )";		
				mysql_query($sql);
				$res = mysql_query($sql);
				$resultado = mysql_num_rows($res);	 
			}
            if($resultado > 0){
					echo "<h3>NO SE PUEDE RESERVAR EN ESA FECHA!</h3>";
            }else{

				if($accion == 'nuevo'){

				 $sql = "INSERT INTO reservas(localizador,id_habitacion,fecha_entrada,fecha_salida,dni,observaciones) 
 					VALUES(
						 '',
						 '".$_POST['id_habitacion']."',
						 '".$_POST['fecha_entrada']."',
						 '".$_POST['fecha_salida']."',
						 '".$_POST['dni']."',
						  '".$_POST['observaciones']."'
						 		)
						 ";
					  mysql_query($sql);
				}elseif($accion == 'editar'){
					$sql="UPDATE reservas SET 
					id_habitacion='".$_POST['id_habitacion']."',
					fecha_entrada='".$_POST['fecha_entrada']."',
					fecha_salida='".$_POST['fecha_salida']."',
					dni='".$_POST['dni']."',
					observaciones='".$_POST['observaciones']."'
					WHERE localizador=".$id;
					mysql_query($sql);
						
				}
				else{
					$sql="DELETE FROM reservas WHERE localizador=".$id;
					mysql_query($sql);						
				}
			}
		}

		//--------------------------------------------------------------------------------	

		//-Detales incidencias-------------------------------------------------------------------------------
	if($pagina == 'detalle_incidencias'){
			if($accion == 'nuevo'){
				/*BUSCAMOS EL ÚLTIMO TÉCNICO DE LA INCIDENCIA*/
				$select ="SELECT tecnicos_id FROM detalle_incidencias 
				WHERE incidencias_id=".$id." ORDER BY id_detalle_incidencias DESC LIMIT 1" ;
				$res = mysql_query($select);
				$row_select = mysql_fetch_array($res);
				
				$update="UPDATE tecnicos SET ocupado =ocupado -1 WHERE id_tecnico=".$row_select['tecnicos_id'];
				mysql_query($update);
				/*------------------------------------------------------------------*/
				
				 $sql = "INSERT INTO detalle_incidencias(id_detalle_incidencias,detalle_incidencias,incidencias_id,tecnicos_id) 

 					VALUES(
						 '', 
						  '".$_POST['detalle_incidencias']."',
						 '".$id."',
						 '".$_POST['tecnicos_id']."'

						 		)
						 ";
						 
				/*ACTUALIZAMOS  EL  TÉCNICO A ocupado =1 */
				$update="UPDATE tecnicos SET ocupado =ocupado +1 WHERE id_tecnico=".$_POST['tecnicos_id'];
				mysql_query($update);
				/*-----------------------------------------------------*/
						 
			//	$detalle="SELECT tecnicos_id From detalle_incidencias Where incidencias_id=".$id;
			//			$res_detalle = mysql_query($detalle);
			//			$row_detalle = mysql_fetch_array($res_detalle);
			//	$tecnicos="UPDATE tecnicos SET ocupado='0' WHERE id_tecnico=".$row_detalle['tecnicos_id'];
					  mysql_query($sql);
					  $pagina = 'incidencias';
					  $detalles = 'detalles';
					  $accion = '';
			}else{
				
				/*BUSCAMOS EL TÉCNICO ANTERIOR Y LO DAMOS DE BAJA*/
				$select ="SELECT tecnicos_id FROM detalle_incidencias WHERE id_detalle_incidencias=".$id;
				$res = mysql_query($select);
				$row_select = mysql_fetch_array($res);
				
				$update="UPDATE tecnicos SET ocupado =ocupado -1 WHERE id_tecnico=".$row_select['tecnicos_id'];
				mysql_query($update);
				/*-----------------------------------------------------*/
				
				/*ACTUALIZAMOS CON EL NUEVO TÉCNICO  */
					$sql="UPDATE detalle_incidencias SET detalle_incidencias='".$_POST['detalle_incidencias']."'
					AND tecnicos_id = ".$_POST['tecnicos_id']." WHERE id_detalle_incidencias=".$id;

					mysql_query($sql);
					
				/*-----------------------------------------------------*/
				
				/*ACTUALIZAMOS  EL  TÉCNICO A ocupado =1 */
				$update="UPDATE tecnicos SET ocupado =ocupado +1 WHERE id_tecnico=".$_POST['tecnicos_id'];
				mysql_query($update);
				/*-----------------------------------------------------*/
						
			}
		}


		//--------------------------------------------------------------------------------	
		//-TARIFAS-------------------------------------------------------------
		if($pagina == 'tarifas'){
			if($accion == 'nuevo'){
				 $sql = "INSERT INTO tarifas(id_tarifa,valor,descripcion) 

 					VALUES(
						 '',
						  '".$_POST['importe']."',
						 '".$_POST['descripcion']."'
						 		)
						 ";

					  mysql_query($sql);
			}elseif($accion == 'editar'){

					$sql="UPDATE tarifas SET valor='".$_POST['importe']."',descripcion='".$_POST['descripcion']."' WHERE id_tarifa=".$id;

					mysql_query($sql);
						
			}

			else{
					$sql ="DELETE FROM tarifas WHERE id_tarifa = ".$id;
					$res = mysql_query($sql);
					if ($res != 1){echo "<h3>Primero debes borrar todas las habitaciones asociadas a esta tarifa</h3>";}
						
			}
		}



		//--------------------------------------------------------------------------------	
		//-CLIENTES-------------------------------------------------------------------------------
		if($pagina == 'clientes'){	
		$password = md5 ($_POST['password']);
			if($accion == 'nuevo'){
			
				 $sql = "INSERT INTO clientes(dni,nombre,apellidos,email,password,rol,telefono) 

 					VALUES(
						 '".$_POST['dni']."',
						 '".$_POST['nombre']."',
						 '".$_POST['apellidos']."',
						 '".$_POST['email']."',
						 '".$password."',
						 '2',
						  '".$_POST['telefono']."'
						 		)
						 ";

					  mysql_query($sql);
			}else{

					$sql="UPDATE clientes SET 
					nombre='".$_POST['nombre']."',
					apellidos='".$_POST['apellidos']."',
					dni='".$_POST['dni']."',
					email='".$_POST['email']."',
					password= '".$password."',
					telefono='".$_POST['telefono']."'
					 WHERE dni='".$id."'";
					mysql_query($sql);
				
			}
		}


		//--------------------------------------------------------------------------------
		//-HABITACIONES-------------------------------------------------------------------------------
		  if($pagina == 'habitaciones'){
		   if($accion == 'nuevo'){
		     $sql = "INSERT INTO habitaciones(id_habitacion,piso,descripcion,ocupacion,tarifa) 

		      VALUES(
		       '".$_POST['habitacion']."',
		       '".$_POST['piso']."',
		       '".$_POST['descripcion']."',
		       '".$_POST['ocupacion']."',
		       '".$_POST['tarifa']."'
		         )
		       ";
		       mysql_query($sql);
		   }else{

		     $sql="UPDATE habitaciones SET piso='".$_POST['piso']."', id_habitacion='".$_POST['habitacion']."', tarifa='".$_POST['tarifa']."', ocupacion='".$_POST['ocupacion']."', descripcion='".$_POST['descripcion']."' WHERE id_habitacion='".$id."'";
		     echo $sql;
		     mysql_query($sql);
		      
		   }
		  }
  //----- ---------------------------------------------------------------------------
	$accion = '';

$_POST = array();
	}
?>