<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor Prácticas en Laboratorios</title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['bootstrap.min', 'menu', 'estiloweb']) ?>
    <?= $this->Html->script(['jquery-3.1.1.min', 'bootstrap.min', 'menuppal']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <!--
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><a href=""><?= $this->fetch('title') ?></a></h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="right">
                <li><a target="_blank" href="http://book.cakephp.org/3.0/">Documentation</a></li>
                <li><a target="_blank" href="http://api.cakephp.org/3.0/">API</a></li>
            </ul>
        </div>
    </nav>
    -->
    <header> 
        <div class="row">           
                <div class="col-lg-4 col-xs-4">
                    <?= $this->Html->image('ur.png', array('alt' => 'Universidad de La Rioja', 'class' => 'img-responsive'));?>                    
                </div>                       
                <div class="titulo col-lg-8 col-xs-8">Gestor Prácticas en Laboratorios</div>         
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
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <?= $this->Flash->render() ?>
    
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
   
    <footer>
    </footer>
</body>
</html>
