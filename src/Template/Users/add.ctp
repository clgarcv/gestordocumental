<!--
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Teachers'), ['controller' => 'Teachers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Teacher'), ['controller' => 'Teachers', 'action' => 'add']) ?></li>
    </ul>
</nav>
-->

<?php if (!isset($current_user)): ?>
  <header> 
    <div class="row">           
          <div class="col-lg-4 col-xs-4">
              <?= $this->Html->image('ur.png', array('alt' => 'Universidad de La Rioja', 'class' => 'img-responsive'));?>       
          </div>                       
          <div class="titulo col-lg-8 col-xs-8">Gestor de Sesiones en Laboratorios</div>         
    </div>
</header>
    
<?php endif;?>

<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Añadir nuevo usuario') ?></legend>
        <?php
            echo $this->Form->input('username');
            echo $this->Form->input('password');
            echo $this->Form->input('role', ['options' => array('Usuario básico', 'Usuario avanzado', 'Administrador', 'Súper administrador')]);
            echo $this->Form->input('teacher_id', ['options' => $teachers]);
        ?>
    </fieldset>
    <!--
    //$this->Form->button('Home', array('onclick' => "location.href='".$this->Html->url($url)."'"));  
        //$this->Html->link($this->Form->button('Button'), array('action' => 'viewSomethin',$id), array('escape'=>false,'title' => "Click to view somethin"));
        //$this->Html->link("Cancelar", array('controller' => 'Users','action'=> 'index'), array( 'class' => 'button'));  
        //$this->Form->button('Cancelar', array('onclick' => "location.href='".$this->Html->url($url)."'")); ?>-->
    <?= $this->Form->button('Cancelar', array('type' => 'button','onclick' => 'location.href=\'../users/index\';')); ?>
    <?= $this->Form->button('Guardar') ?>
    <?= $this->Form->end() ?>
</div>
