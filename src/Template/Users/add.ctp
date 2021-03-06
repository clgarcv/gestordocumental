<?php if (!isset($current_user)): ?>
<div class="cab">
  	<header>
	    <div class="row">
	          <div class="col-lg-4 col-xs-4">
	              <?= $this->Html->image('ur.png', array('alt' => 'Universidad de La Rioja', 'class' => 'img-responsive'));?>
	          </div>
	          <div class="titulo col-lg-8 col-xs-8">Gestor de Sesiones en Laboratorios</div>
	    </div>
	</header>
</div>

<?php endif;?>

<div class="col-md-9 col-md-offset-2 mb-2">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Añadir Usuario') ?></legend>
        <?php
            echo $this->Form->input('username', array('label' => 'Usuario'));
            echo $this->Form->input('password', array('label' => 'Contraseña'));
            echo $this->Form->input('role', array ('label' => 'Rol', 'options' => array('Usuario básico')));
            echo $this->Form->input('teacher_id', array ('label' => 'Profesor', 'options' => $teachers));
        ?>
    </fieldset>

    <?= $this->Form->button('Cancelar', array('type' => 'button','onclick' => 'location.href=\'../users/buscador\';')); ?>
    <?= $this->Form->button('Guardar') ?>
    <?= $this->Form->end() ?>
</div>
