<header> 
        <div class="row">           
                <div class="col-lg-4 col-xs-4">
                    <?= $this->Html->image('ur.png', array('alt' => 'Universidad de La Rioja', 'class' => 'img-responsive'));?>       
                </div>                       
                <div class="titulo col-lg-8 col-xs-8">Gestor Sesiones en Laboratorios</div>         
        </div>
    </header>

    <!-- Este menu sera modificado en funcion del rol de cada usuario -->
    <nav class="navbar navbar-default navbar-static-top">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">
          <img alt="JCR" src=""></a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Opt1 Level 1 <span class="caret"></span></a>
              <ul class="dropdown-menu">

                <li class="dropdown-submenu">
                    <a tabindex="-1" href="#">Opt1-1 Level 2</a>
                    <ul class="dropdown-menu">
                      <li><a tabindex="-1" href="#">Op1-1 1</a></li>
                      
                      <li><a href="#">Opt1-1 2 </a></li>
                      <li><a href="#">Opt1-1 3 </a></li>
                    </ul>
                  </li>
                <li><a href="#">Opt1-2</a></li>
                <li><a href="#">Opt1-3</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">Opt1-last</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Opt2 Level 1 <span class="caret"></span></a>
              <ul class="dropdown-menu ">
                <li><a href="#">Opt2-1</a></li>
                <li><a href="#">Opt2-2</a></li>
                <li><a href="#">Opt2-3</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">Opt2-last</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Opt3 Level 1 <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Op3-1</a></li>
                <li><a href="#">Op3-2</a></li>
                <li><a href="#">Op3-3</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">Op3-last</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Opt3 Level 1 <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Op3-1</a></li>
                <li><a href="#">Op3-2</a></li>
                <li><a href="#">Op3-3</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">Op3-last</a></li>
              </ul>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
        <!-- 
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            -->
            <a class="navbar-brand" href="./logout">
                <span class="glyphicon glyphicon-off"></span> Cerrar Sesión
            </a>
        </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <?= $this->Flash->render() ?>