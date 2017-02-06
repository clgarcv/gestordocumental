<header> 
  <div class="row">           
          <div class="col-lg-4 col-xs-4">
              <?= $this->Html->image('ur.png', array('alt' => 'Universidad de La Rioja', 'class' => 'img-responsive'));?>       
          </div>                       
          <div class="titulo col-lg-8 col-xs-8">Gestor de Sesiones en Laboratorios</div>         
  </div>
</header>
<nav class="navbar navbar-default navbar-static-top">
  <div class="container-fluid">
  <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      <li><?= $this->Html->link('Realizar Consulta' ,
                    array('controller' => 'users', 'action' => 'buscador'), array('class' => 'nav navbar-nav'))?></li>

  <?php if ($role == 0): ?>    
    
    </ul>

  <?php endif; ?> 

  <?php if ($role == 1): ?>    
        <li><?= $this->Html->link('Añadir sesión práctica' ,
                    array('controller' => 'sessions', 'action' => 'add'), array('class' => 'nav navbar-nav'))?></li>
        <li><a href="#"> Modificar Sesión Práctica </a></li>
        <li><a href="#"> Eliminar Sesión Práctica </a></li>
        <li><?= $this->Html->link('Ver Todas' ,
                    array('controller' => 'sessions', 'action' => 'index'), array('class' => 'nav navbar-nav'))?></li>
      </ul>

  <?php endif; ?>

  <?php if ($role == 2): ?>    
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sesiones Prácticas <span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li><?= $this->Html->link('Añadir sesión práctica' ,
                    array('controller' => 'sessions', 'action' => 'add'), array('class' => 'nav navbar-nav'))?></li>
            <li><a href="#"> Modificar Sesión Práctica </a></li>
            <li><a href="#"> Eliminar Sesión Práctica </a></li>        
            <li role="separator" class="divider"></li>
            <li><?= $this->Html->link('Ver Todas' ,
                    array('controller' => 'sessions', 'action' => 'index'), array('class' => 'nav navbar-nav'))?></li>
          </ul>
        </li> 
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Asignaturas <span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li><?= $this->Html->link('Añadir Asignatura' ,
                    array('controller' => 'subjects', 'action' => 'add'), array('class' => 'nav navbar-nav'))?></li>
            <li><a href="#">Modificar Asignatura</a></li>
            <li><a href="#">Eliminar Asignatura</a></li>
            <li role="separator" class="divider"></li>
            <li><?= $this->Html->link('Ver Todas' ,
                    array('controller' => 'subjects', 'action' => 'index'), array('class' => 'nav navbar-nav'))?></li>
          </ul>
        </li> 
      </ul>

  <?php endif; ?>

  <?php if ($role == 3): ?>
    
        
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sesiones Prácticas <span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li><?= $this->Html->link('Añadir sesión práctica' ,
                    array('controller' => 'sessions', 'action' => 'add'), array('class' => 'nav navbar-nav'))?></li>
            <li><a href="#"> Modificar Sesión Práctica </a></li>
            <li><a href="#"> Eliminar Sesión Práctica </a></li>        
            <li role="separator" class="divider"></li>
            <li><?= $this->Html->link('Ver Todas' ,
                    array('controller' => 'sessions', 'action' => 'index'), array('class' => 'nav navbar-nav'))?></li>
          </ul>
        </li> 
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Asignaturas <span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li><?= $this->Html->link('Añadir Asignatura' ,
                    array('controller' => 'subjects', 'action' => 'add'), array('class' => 'nav navbar-nav'))?></li>
            <li><a href="#">Modificar Asignatura</a></li>
            <li><a href="#">Eliminar Asignatura</a></li>
            <li role="separator" class="divider"></li>
            <li><?= $this->Html->link('Ver Todas' ,
                    array('controller' => 'subjects', 'action' => 'index'), array('class' => 'nav navbar-nav'))?></li>
          </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Titulaciones <span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li><?= $this->Html->link('Añadir Titulación' ,
                    array('controller' => 'degrees', 'action' => 'add'), array('class' => 'nav navbar-nav'))?></li>
            <li><a href="#">Modificar Titulación</a></li>
            <li><a href="#">Eliminar Titulación</a></li>
            <li role="separator" class="divider"></li>
            <li><?= $this->Html->link('Ver Todas' ,
                    array('controller' => 'degrees', 'action' => 'index'), array('class' => 'nav navbar-nav'))?></li>
          </ul>
        </li>
      </ul>

  <?php endif; ?>

  
      <ul class="nav navbar-nav navbar-right">        
        <li><?= $this->Html->link('Modificar datos personales' ,
                    array('controller' => 'users', 'action' => 'edit', $current_user['id']), array('class' => 'nav navbar-nav'))?></li>
      
        <li><a class='nav navbar-nav'> <span class="glyphicon glyphicon-user"></span> Hola, <?= $current_user['username'] ?>
        <!-- 
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            -->
            <!-- <a class="navbar-brand" href="./logout">
                <span class="glyphicon glyphicon-off"></span> Cerrar Sesión
            </a> -->
        
        <?= $this->Html->link('Cerrar Sesión' ,
                        array('controller' => 'users', 'action' => 'logout'), array('class' => 'nav navbar-nav'))?> </li>
      </ul>
    </div>
  </div>
</nav>
