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
                    array('controller' => 'users', 'action' => 'buscador'))?></li>

  <?php if ($role == 0): ?>
	<li><?= $this->Html->link('Sesiones' ,
    	array('controller' => 'sessions', 'action' => 'index'))?></li>
	<li><?= $this->Html->link('Palabras Clave' ,
	    array('controller' => 'keywords', 'action' => 'index'))?></li>

    </ul>

  <?php endif; ?>

  <?php if ($role == 1): ?>
  	<li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Palabras Clave <span class="caret"></span></a>
        <ul class="dropdown-menu">
	        <li><?= $this->Html->link('Añadir palabra clave' ,
	                array('controller' => 'keywords', 'action' => 'add'))?></li>
	        <li role="separator" class="divider"></li>
	        <li><?= $this->Html->link('Ver Todas' ,
	                array('controller' => 'keywords', 'action' => 'index'))?></li>
      	</ul>
    </li>

    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sesiones Prácticas <span class="caret"></span></a>
        <ul class="dropdown-menu">
	        <li><?= $this->Html->link('Añadir sesión práctica' ,
	                array('controller' => 'sessions', 'action' => 'add'))?></li>
	        <li><a href="#"> Modificar Sesión Práctica </a></li>
	        <li role="separator" class="divider"></li>
	        <li><?= $this->Html->link('Ver Todas' ,
	                array('controller' => 'sessions', 'action' => 'index'))?></li>
      	</ul>
    </li>
    </ul>

  <?php endif; ?>

  <?php if ($role == 2): ?>
	  	<li class="dropdown">
	  	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Palabras Clave <span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li><?= $this->Html->link('Añadir palabra clave' ,
                    array('controller' => 'keywords', 'action' => 'add'))?></li>
            <li role="separator" class="divider"></li>
            <li><?= $this->Html->link('Ver Todas' ,
                    array('controller' => 'keywords', 'action' => 'index'))?></li>
          </ul>
		</li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sesiones Prácticas <span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li><?= $this->Html->link('Añadir sesión práctica' ,
                    array('controller' => 'sessions', 'action' => 'add'))?></li>
            <li><a href="#"> Modificar Sesión Práctica </a></li>
            <li role="separator" class="divider"></li>
            <li><?= $this->Html->link('Ver Todas' ,
                    array('controller' => 'sessions', 'action' => 'index'))?></li>
          </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Asignaturas <span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li><?= $this->Html->link('Añadir Asignatura' ,
                    array('controller' => 'subjects', 'action' => 'add'))?></li>
            <li><a href="#">Modificar Asignatura</a></li>
            <li role="separator" class="divider"></li>
            <li><?= $this->Html->link('Ver Todas' ,
                    array('controller' => 'subjects', 'action' => 'index'))?></li>
          </ul>
        </li>
      </ul>

  <?php endif; ?>

  <?php if ($role == 3): ?>
	  	<li class="dropdown">
	  	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Palabras Clave <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><?= $this->Html->link('Añadir palabra clave' ,
                    array('controller' => 'keywords', 'action' => 'add'))?></li>
            <li><a href="#"> Modificar Palabra Clave </a></li>
            <li><a href="#"> Eliminar Palabra Clave </a></li>
            <li role="separator" class="divider"></li>
            <li><?= $this->Html->link('Ver Todas' ,
                    array('controller' => 'keywords', 'action' => 'index'))?></li>
          </ul>
		</li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sesiones Prácticas <span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li><?= $this->Html->link('Añadir sesión práctica' ,
                    array('controller' => 'sessions', 'action' => 'add'))?></li>
            <li><a href="#"> Modificar Sesión Práctica </a></li>
            <li><a href="#"> Eliminar Sesión Práctica </a></li>
            <li role="separator" class="divider"></li>
            <li><?= $this->Html->link('Ver Todas' ,
                    array('controller' => 'sessions', 'action' => 'index'))?></li>
          </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Asignaturas <span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li><?= $this->Html->link('Añadir Asignatura' ,
                    array('controller' => 'subjects', 'action' => 'add'))?></li>
            <li><a href="#">Modificar Asignatura</a></li>
            <li><a href="#">Eliminar Asignatura</a></li>
            <li role="separator" class="divider"></li>
            <li><?= $this->Html->link('Ver Todas' ,
                    array('controller' => 'subjects', 'action' => 'index'))?></li>
          </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Titulaciones <span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li><?= $this->Html->link('Añadir Titulación' ,
                    array('controller' => 'degrees', 'action' => 'add'))?></li>
            <li><a href="#">Modificar Titulación</a></li>
            <li><a href="#">Eliminar Titulación</a></li>
            <li role="separator" class="divider"></li>
            <li><?= $this->Html->link('Ver Todas' ,
                    array('controller' => 'degrees', 'action' => 'index'))?></li>
          </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Usuarios <span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li><?= $this->Html->link('Añadir Usuario' ,
                    array('controller' => 'users', 'action' => 'add'))?></li>
            <li><a href="#">Modificar Usuario</a></li>
            <li><a href="#">Eliminar Usuario</a></li>
            <li role="separator" class="divider"></li>
            <li><?= $this->Html->link('Ver Todos' ,
                    array('controller' => 'users', 'action' => 'index'))?></li>
          </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profesores <span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li><?= $this->Html->link('Añadir Profesor' ,
                    array('controller' => 'teachers', 'action' => 'add'))?></li>
            <li><a href="#">Modificar Profesor</a></li>
            <li><a href="#">Eliminar Profesor</a></li>
            <li role="separator" class="divider"></li>
            <li><?= $this->Html->link('Ver Todos' ,
                    array('controller' => 'teachers', 'action' => 'index'))?></li>
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
