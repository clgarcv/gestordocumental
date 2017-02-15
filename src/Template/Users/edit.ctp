<!--
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Are you sure you want to deleteeeeee # {0}?', $user->username)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Teachers'), ['controller' => 'Teachers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Teacher'), ['controller' => 'Teachers', 'action' => 'add']) ?></li>
    </ul>
</nav>
-->

<div class="col-md-9 col-md-offset-2">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Editar Usuario') ?></legend>
        <?php
            echo $this->Form->input('username');
            echo $this->Form->input('password');
            if ($current_user['role'] == 3):
            echo $this->Form->input('role',array('label' => 'Rol'), ['options' => $roles, 'empty' => true]);
        	//echo $this->Form->input('teacher_id', ['options' => $teachers, 'empty' => true]);
        	//el profesor asignado a un usuario no se puede modificar
            //echo $this->Form->input('teacher_id',['options' => $teachers, 'disabled' => true]);
            endif;

        ?>
    </fieldset>
    <?= $this->Form->button('Cancelar', array('type' => 'button','onclick' => 'location.href=\'../../users/\';')); ?>
    <?= $this->Form->button(__('Guardar')) ?>
    <?= $this->Form->end() ?>
</div>
