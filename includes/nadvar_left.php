       <!-- Es el menú lateral en el que aparece un menú o los dos dependiendo el rol del usuario logueado--> 
        <div class="col-sm-2 col-lg-2">
                <div class="sidebar-nav">
                <div class="nav-canvas">
                  <div class="nav-sm nav nav-stacked">
                    </div>
                      <?php
                             if($rol == 1){
                          
                                  ?>
                                  <ul class="nav nav-pills nav-stacked main-menu">
                                    <legend class="nav-header">Administrador</legend>
                                        <ul class="nav nav-pills nav-stacked main-menu" >
                                          <li><a href='index.php?pagina=clientes'>Clientes</a></li> 
                                          <li><a href='index.php?pagina=habitaciones'>Habitaciones</a></li>
                                          <li><a href='index.php?pagina=tarifas'>Tarifas</a></li>
                                          <li><a href='index.php?pagina=reservas'>Reservas</a></li>
                                        </ul>
                                    <legend class="nav-header">Clientes</legend>
                                        <ul class="nav nav-pills nav-stacked main-menu" >
                                            <li><a href='index.php?pagina=habitacionesclientes'>Ver Habitaciones</a></li>
                                             <li><a href='index.php?pagina=reservasclientes'>Hacer Reserva</a></li>
                                          <!--/   <li><a href='index.php?pagina=detalle_incidencias'>Detalle Incidencias</a></li>
                                           <li><a href='index.php?pagina=espacio_tecnicos_incidencias'>Espacio Tecnicos Incidencias</a></li>-->
                                        </ul>
                                    </ul>  
                                <?php  
                              }else{
                                ?>
                                <ul class="nav nav-pills nav-stacked main-menu">
                                 <legend class="nav-header">Clientes</legend>
                                  <ul class="nav nav-pills nav-stacked main-menu" >
                                    <li><a href='index.php?pagina=habitacionesclientes'>Ver Habitaciones</a></li>
                                    <li><a href='index.php?pagina=reservasclientes'>Hacer Reserva</a></li>
                                  </ul>
                                </ul>  
                                <?php

                            }

                      ?>

                </div>

            </div>

        </div>
