

<div class="wrapper d-flex align-items-stretch">
	  <nav id="sidebar">
				<div class="p-4 pt-5">
		  		<!-- <a href="#" class="img logo" style="background-image: url(images/logo2.png);"></a> -->
                <img src="images/logo.png" class="logo_menu">
           
                  <ul class="list-unstyled components mb-5">
                <li>
                    <a href="#perfilSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-user"></i> Perfil </a>
                    <ul class="collapse list-unstyled" id="perfilSubmenu">
                        <li>
                            <a href="perfil.php">Ver perfil</a>
                        </li>
                        <li>
                            <a href="alterar_perfil.php">Alterar perfil</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#viagensSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-suitcase"></i> Viagens</a>
                    <ul class="collapse list-unstyled" id="viagensSubmenu">
                        <li>
                            <a href="viagens.php">Viagens não-concluídas</a>
                        </li>
                        <li>
                            <a href="viagens_concluidas.php">Viagens concluídas</a>
                        </li>
                        <li>
                            <a href="cad_viagens.php">Cadastrar viagens</a>
                        </li>
                    </ul> 
                </li>

                <?php

                    if($_SESSION['tipo'] == 1){


                ?>


                <li>
                    <a href="#caminhoesSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-truck"></i> Caminhões</a>
                    <ul class="collapse list-unstyled" id="caminhoesSubmenu">
                        <li>
                            <a href="caminhao.php">Ver automotores e carretas </a>
                        </li>
                        <li>
                            <a href="cad_automotor.php">Cadastrar automotor</a>
                        </li>
                        <li>
                            <a href="cad_carreta.php">Cadastrar carreta</a>
                        </li>
                        <li>
                            <a href="conjuntos.php">Cadastrar conjuntos</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#funcSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-user-friends"></i> Funcionários</a>
                    <ul class="collapse list-unstyled" id="funcSubmenu">
                        <li>
                            <a href="funcionarios.php">Ver funcionários</a>
                        </li>
                        <li>
                            <a href="cad_funcionario.php">Cadastrar funcionários</a>
                        </li>
                    </ul>
                </li>

                <?php
                
                 } // fecha o if

                ?>
                
            </ul>
	      </div> <!-- Fecha div class p-a pt-5 -->
    </nav> <!-- Fecha nav id sidebar-->

      <!-- conteúdo da página  -->
    <div id="content" class="p-4 p-md-5">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
              <div class="container-fluid">
                  <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <i class="fa fa-bars"></i>
                  </button>

                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="nav navbar-nav ml-auto">
                          <li class="nav-link expanded dropdown">
                              <a href class="nav-item" data-toggle="dropdown">Perfil  
                              <i class="fas fa-caret-down"></i>  
                              </a>
                              <ul class="menu dropdown-menu">
                                <li class="item"><a href="perfil.php" style="color: #495057;">Ver perfil</a></li>
                                <li class="item"><a href="alterar_perfil.php" style="color: #495057;">Alterar perfil</a></li>
                              </ul>
                          </li>
                          <li class="nav-link expanded dropdown">
                              <a href class="nav-item" data-toggle="dropdown">Viagens  
                              <i class="fas fa-caret-down"></i>  
                              </a>
                              <ul class="menu dropdown-menu">
                                <li class="item"><a href="viagens.php" style="color: #495057;">Viagens não-concluídas</a></li>
                                <li class="item"><a href="viagens_concluidas.php" style="color: #495057;">Viagens concluídas</a></li>
                                <li class="item"><a href="cad_viagens.php" style="color: #495057;">Cadastrar viagens</a></li>
                                </ul>
                          </li>
                        <?php
                        
                        if($_SESSION['tipo'] == 1){

                        ?>

                        <li class="nav-link expanded dropdown">
                              <a href class="nav-item" data-toggle="dropdown">Caminhões  
                              <i class="fas fa-caret-down"></i>  
                              </a>
                              <ul class="menu dropdown-menu">
                                <li class="item"><a href="caminhao.php" style="color: #495057;">Automotores e carretas</a></li>
                                <li class="item"><a href="cad_automotor.php" style="color: #495057;">Cadastrar automotor</a></li>
                                <li class="item"><a href="cad_carreta.php" style="color: #495057;">Cadastrar carreta</a></li>
                                <li class="item"><a href="conjuntos.php" style="color: #495057;">Cadastrar conjuntos</a></li>
                            </ul>
                        </li>
                        <li class="nav-link expanded dropdown">
                              <a href class="nav-item" data-toggle="dropdown">Funcionários  
                              <i class="fas fa-caret-down"></i>  
                              </a>
                              <ul class="menu dropdown-menu">
                                <li class="item"><a href="funcionarios.php" style="color: #495057;">Ver funcionários</a></li>
                                <li class="item"><a href="cad_funcionario.php" style="color: #495057;">Cadastrar funcionários</a></li>
                              </ul>
                          </li>

                          <?php
                            
                            }//fecha o if
                                            
                            ?>
                          <li class="nav-item">
                            <a class="nav-link" href="logout.php">Sair</a>
                          </li>

                      </ul>
                  </div> <!-- Fecha div colapse navbar -->
              </div> <!-- Fecha div container fluid -->
        </nav>
     
      

   
