<?php

if (empty($_SESSION['active'])) {
  header('location: ../');
}

?>

<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <center><img src="img/ICONO11.png" alt=""></center> 
            
            
            
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                     
                     
                    <p class="form-text "  style="color: white;padding: 5px;"><i class="bi bi-person"></i> Usuario : </p> 
                    <p class="form-text "  style="color: #d15959;padding: 5px;background-color: black;border-radius: 8px;">
                        <?php 
                            if ($_SESSION['rol'] == 1) {
                                $tipo = 'Administrador';
                                echo $_SESSION['nombre'].' - ('.$tipo.')'; 
                            }else{
                                $tipo = 'Trabajador';
                                echo $_SESSION['nombre'].' - ('.$tipo.')';
                            }   
                        ?>
                                                
                    </p>    
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <?php
                                                    if ($_SESSION['iduser'] == 1 ) {
                                                    echo '<img style="width:35px; height:35px;" src="../img/ale.png" >';
                                                        //echo $_SESSION['iduser'];
                                                    }
                                                    elseif ($_SESSION['iduser'] == 12 ) {
                                                        echo '<img style="width:35px; height:35px;" src="../img/nicol.png" >';
                                                            //echo $_SESSION['iduser'];
                                                        }
                                                        elseif ($_SESSION['iduser'] == 28 ) {
                                                            echo '<img style="width:35px; height:35px;" src="../img/mavel.png" >';
                                                                //echo $_SESSION['iduser'];
                                                            }
                                                            elseif ($_SESSION['iduser'] == 29 ) {
                                                                echo '<img style="width:35px; height:35px;" src="../img/jazmin.png" >';
                                                                    //echo $_SESSION['iduser'];
                                                                } elseif ($_SESSION['iduser'] == 32 ) {
                                                                    echo '<img style="width:35px; height:35px;" src="../img/edwin.png" >';
                                                                        //echo $_SESSION['iduser'];
                                                                    } elseif ($_SESSION['iduser'] == 33 ) {
                                                                        echo '<img style="width:35px; height:35px;" src="../img/usuario.png" >';
                                                                            //echo $_SESSION['iduser'];
                                                                        }elseif ($_SESSION['iduser'] == 30 ) {
                                                                            echo '<img style="width:35px; height:35px;" src="../img/alberto.png" >';
                                                                                //echo $_SESSION['iduser'];
                                                                            }
                                                
                                                ?> </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="../sub-asistencias/"> <i class="fa-solid fa-id-card"></i> Registrar Asistencia</a></li>
                        <li><a class="dropdown-item" href="../sub-salidas/"> <i class="fa-solid fa-id-card"></i> Registrar Salidas</a></li>
                        <li><a class="btn btn-light " id="bdark" style="border-radius: 50px;"> <i class="fa-solid fa-moon"></i> Modo Oscuro </a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="../salir.php"><i class="fa-solid fa-circle-xmark"></i> Salir del Sistema</a></li>
                    </ul>
                </li>
            </ul>
            
            
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            
                            
                            <a class="nav-link" href="../index.php" style="background-color: #ff5050;color: white;font-weight: 300;">
                                <div class="sb-nav-link-icon"><i style="color:#FFffff" class="fa-solid fa-house"></i></div>
                                Inicio
                            </a>

                            <?php
                        if ($_SESSION['rol'] == 1 or $_SESSION['iduser'] == 12 or $_SESSION['iduser'] == 28 or $_SESSION['iduser'] == 29 or $_SESSION['iduser'] == 30 or $_SESSION['iduser'] == 32 ) {
                            
                        
                        ?> 

                            

                            

                            <div class="sb-sidenav-menu-heading " style="color: #ff5050; font-size: medium; text-transform: none; background-color: #38383869;"><i class="fa-solid fa-object-ungroup"></i> General</div>

                            

                            <!-- lista de menu 1 -->
                 
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapsedoc" aria-expanded="false" aria-controls="pagesCollapseError">
                            <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                                Documentos
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapsedoc" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                <nav class="sb-sidenav-menu-nested nav"> 
                                    <a class="nav-link" href="../documentos.php"> Documentos de la empresa</a> 
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapserec" aria-expanded="false" aria-controls="pagesCollapseError">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-receipt"></i></div>
                                Recibos
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapserec" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                <nav class="sb-sidenav-menu-nested nav"> 
                                    <a class="nav-link" href="../recibos.php"> Nuevo Recibo</a> 
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseclaves" aria-expanded="false" aria-controls="pagesCollapseError">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-key"></i></div>
                                Claves
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapseclaves" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="../claves.php">Credenciales de la Empresa</a> 
                                </nav>
                            </div>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseH" aria-expanded="false" aria-controls="pagesCollapseError">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-gear"></i></div>
                                Herramientas
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapseH" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="../calComer.php">Calculadora Experiencia</a> 
                                </nav>
                            </div>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapsei" aria-expanded="false" aria-controls="pagesCollapseError">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-boxes-stacked"></i></div>
                                Inventario Mercaderia
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapsei" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <!--<a class="nav-link" href="categorias_i.php">Categorias mercaderia</a> 
                                    <a class="nav-link" href="inventario_i.php">Gestor Inventario</a>-->
                                    <a class="nav-link" href="../inventario_i.php">Gestor Inventario</a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseie" aria-expanded="false" aria-controls="pagesCollapseError">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-box-open"></i></div>
                                Activos Empresa
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapseie" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="../categorias_a.php">Categorias Activos </a> 
                                    <a class="nav-link" href="../activos.php">Gestor Activos</a> 
                                </nav>
                            </div>

                            



                                
                            <div class="sb-sidenav-menu-heading " style="color:#ff5050; font-size: medium;  text-transform: none; background-color: #38383869;" >
                            <i class="fa-solid fa-cart-shopping"></i> Comercializadora</div>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#cajachica2" aria-expanded="false" aria-controls="collapsePages">
                                            <div class="sb-nav-link-icon"><i class="fa-solid fa-sack-dollar"></i></div>
                                            Caja Chica  
                                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                        </a>

                                        <div class="collapse" id="cajachica2" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">

                                                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth2" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                                            <div class="sb-nav-link-icon"><i class="fas fa-file-circle-plus"></i></div>
                                                                CAJAS
                                                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                                            </a>

                                                            <div class="collapse" id="pagesCollapseAuth2" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                                                <nav class="sb-sidenav-menu-nested nav">
                                                                    <a class="nav-link" href="../proyectos_c.php">Gestor CAJAS</a>
                                                                </nav>
                                                            </div>
                                                            
                                                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                                            <div class="sb-nav-link-icon"><i class="fas fa-file-circle-plus"></i></div>
                                                                Ingresos
                                                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                                            </a>

                                                            <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                                                <nav class="sb-sidenav-menu-nested nav">
                                                                    <a class="nav-link" href="../ingresos_c.php">Gestor Ingresos</a>
                                                                </nav>
                                                            </div>

                                                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapse_e" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                                            <div class="sb-nav-link-icon"><i class="fas fa-file-circle-minus"></i></div>
                                                                Gastos
                                                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                                            </a>

                                                            <div class="collapse" id="pagesCollapse_e" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                                                <nav class="sb-sidenav-menu-nested nav">
                                                                    <a class="nav-link" href="../gastos_c.php">Gestor Gastos</a>
                                                                    
                                                                </nav>
                                                            </div>

                                                        </nav>
                                                    </div>

                            

                            
                            <!-- CAJA CHICA MAVEL 

                            <?php
                            }
                        if ($_SESSION['rol'] == 1 or $_SESSION['iduser'] == 28 ) {
                            
                        
                        ?>  

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#cajachica" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-sack-dollar"></i></div>
                                Caja Chica
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>

                            <div class="collapse" id="cajachica" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                                
                                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                                <div class="sb-nav-link-icon"><i class="fas fa-file-circle-plus"></i></div>
                                                    Ingresos
                                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                                </a>

                                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                                    <nav class="sb-sidenav-menu-nested nav">
                                                        <a class="nav-link" href="../ingresos.php">Gestor Ingresos</a>
                                                    </nav>
                                                </div>

                                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapse_e" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                                <div class="sb-nav-link-icon"><i class="fas fa-file-circle-minus"></i></div>
                                                    Gastos
                                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                                </a>

                                                <div class="collapse" id="pagesCollapse_e" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                                    <nav class="sb-sidenav-menu-nested nav">
                                                        <a class="nav-link" href="../gastos.php">Gestor Gastos</a>
                                                        
                                                    </nav>
                                                </div>

                                            </nav>
                                        </div>  -->
                                        
                                        <?php
                               
                               }  
                            ?>
                            
                            <?php
                        if ($_SESSION['rol'] == 1 or $_SESSION['iduser'] == 12 or $_SESSION['iduser'] == 28 or $_SESSION['iduser'] == 29 or $_SESSION['iduser'] == 30 or $_SESSION['iduser'] == 32 ) {
                            
                        
                        ?>
                            
                            <!-- lista de menu 3 -->

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseexp" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-briefcase"></i></div>
                                Experiencias 
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>

                            <div class="collapse" id="collapseexp" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                                
                                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                                <div class="sb-nav-link-icon"><i class="fas fa-file-circle-plus"></i></div>
                                                    Experiencia General
                                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                                </a>

                                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                                    <nav class="sb-sidenav-menu-nested nav">
                                                        <a class="nav-link" href="../sub-exp-comer/">Gestor Exp. General</a>
                                                    </nav>
                                                </div>

                                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapse_e" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                                <div class="sb-nav-link-icon"><i class="fas fa-file-circle-minus"></i></div>
                                                    Experiencia Especifica
                                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                                </a>

                                                <div class="collapse" id="pagesCollapse_e" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                                    <nav class="sb-sidenav-menu-nested nav">
                                                        <a class="nav-link" href="../lista_exp_e.php">Listar Exp. Especifica</a>
                                                        
                                                    </nav>
                                                </div>

                                            </nav>
                                        </div>


                                        

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseclie" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Clientes
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>

                            <div class="collapse" id="collapseclie" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                                
                                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                                <div class="sb-nav-link-icon"><i class="fas fa-file-circle-plus"></i></div>
                                                    Gestor Clientes
                                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                                </a>

                                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                                    <nav class="sb-sidenav-menu-nested nav">
                                                        <a class="nav-link" href="../registro_cliente.php">Registrar Cliente</a>
                                                        <a class="nav-link" href="../lista_clientes.php">Lista de Clientes</a>
                                                    </nav>
                                                </div>

                                                

                                            </nav>
                                        </div>
                            


                            <!-- lista de menu 4 -->

                            

                                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapse1" aria-expanded="false" aria-controls="pagesCollapseError">
                                                <div class="sb-nav-link-icon"><i class="fas fa-box"></i></div>
                                                    Productos BD Principal <span class="pf pf-mastercard-securecode"></span>
                                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                                </a>

                                                <div class="collapse" id="pagesCollapse1" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                                    <nav class="sb-sidenav-menu-nested nav">
                                                        <a class="nav-link" href="../sub-productos">Gestor Productos</a>
                                                    
                                                        
                                                    </nav>
                                                </div>

                                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapse12" aria-expanded="false" aria-controls="pagesCollapseError">
                                                <div class="sb-nav-link-icon"><i class="fas fa-box"></i></div>
                                                    Productos BD Secundario
                                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                                </a>

                                                <div class="collapse" id="pagesCollapse12" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                                    <nav class="sb-sidenav-menu-nested nav">
                                                        <a class="nav-link" href="#">Gestor Productos</a>
                                                    
                                                        
                                                    </nav>
                                                </div>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-comments-dollar"></i></div>
                                Cotizaciones
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>

                                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                                
                                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapse2" aria-expanded="false" aria-controls="pagesCollapseError">
                                                <div class="sb-nav-link-icon"><i class="fas fa-file-invoice-dollar"></i></div>
                                                    Sacar Cotización
                                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                                </a>

                                                <div class="collapse" id="pagesCollapse2" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                                    <nav class="sb-sidenav-menu-nested nav">
                                                        <a class="nav-link" href="../sub-cotizador/">Gestor Cotizaciones</a>
                                                        
                                                        
                                                    </nav>
                                                </div>

                                                


                                            </nav>
                                        </div>

                                        

                                        <!-- lista de menu seguimiento -->

                                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsepro" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-chart-simple"></i></div>
                                Seguimiento Proyectos
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>

                            <div class="collapse" id="collapsepro" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                                
                                                <a class="nav-link " href="../sub-proyectos/" >
                                                <i class="fas fa-file-circle-plus"></i>- Gestor Proyectos 
                                                    
                                                </a>

                                                

                                                

                                            </nav>
                                        </div>


                                <div class="sb-sidenav-menu-heading" style="color: #ff5050; font-size: medium; text-transform: none; background-color: #38383869;"><i class="fa-solid fa-wrench"></i> Constructora</div>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseexp2" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-briefcase"></i></div>
                                Experiencias 
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>

                            <div class="collapse" id="collapseexp2" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                                
                                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                                <div class="sb-nav-link-icon"><i class="fas fa-file-circle-plus"></i></div>
                                                    Experiencia General
                                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                                </a>

                                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                                    <nav class="sb-sidenav-menu-nested nav">
                                                        <a class="nav-link" href="../registro_exp_c.php">Registrar Experiencia</a>
                                                        <a class="nav-link" href="../lista_exp_c.php">Ver Experiencia G.</a>
                                                    </nav>
                                                </div>

                                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapse_e" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                                <div class="sb-nav-link-icon"><i class="fas fa-file-circle-minus"></i></div>
                                                    Experiencia Especifica
                                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                                </a>

                                                <div class="collapse" id="pagesCollapse_e" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                                    <nav class="sb-sidenav-menu-nested nav">
                                                        <a class="nav-link" href="../lista_exp_e_c.php">Listar Exp. Especifica</a>
                                                        
                                                    </nav>
                                                </div>

                                            </nav>
                                        </div>

                                        
                                                    
                                                    


                                        


                        <?php
                        }
                        if ($_SESSION['rol'] == 1) {
                            # code..
                        
                        ?>      
                        
                        

                            


                            <div class="sb-sidenav-menu-heading" style="color:white; font-size: medium; text-transform: none; background-color: #38383869; " ><i class="fa-solid fa-lock"></i> Administrador</div>
                            
                                              
                            <a  class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapse3" aria-expanded="false" aria-controls="pagesCollapseError">
                            <div class="sb-nav-link-icon" ><i class="fas fa-user-plus"></i></div>
                                Usuarios
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>

                            <div class="collapse" id="pagesCollapse3" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="../registro_usuario.php">Nuevo Usuario</a>
                                    <a class="nav-link" href="../lista_usuarios.php">Lista de Usuarios</a>
                                </nav>
                            </div>
                            <?php
                               
                               } 
                            ?>
                        </div>
                    </div>
                
                    
                    <div class="sb-sidenav-footer">
                        
                        <div> <i class="fa-solid fa-clipboard-user"></i> Usuario:</div> <span style="font-size: 12px;"><?php echo $_SESSION['nombre'] ?></span>
                        
                        
                    </div>
                </nav>
            </div>



            
            