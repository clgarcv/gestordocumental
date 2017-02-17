<div class="col-md-9 col-md-offset-2 mb-2">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Editar Usuario') ?></legend>
        <?php
            echo $this->Form->input('username', array('label' => 'Usuario'));
            echo $this->Form->input('password', array('label' => 'Contraseña'));
            if ($current_user['role'] == 3):
            echo $this->Form->input('role',array('label' => 'Rol'), ['options' => $roles, 'empty' => true]);
        	//el profesor asignado a un usuario no se puede modificar
            //echo $this->Form->input('teacher_id',['options' => $teachers, 'disabled' => true]);
            endif;

        ?>
    </fieldset>
    <?= $this->Form->button('Cancelar', array('type' => 'button','onclick' => 'location.href=\'../../users/\';')); ?>
    <?= $this->Form->button(__('Guardar')) ?>
    <?= $this->Form->end() ?>
</div>
