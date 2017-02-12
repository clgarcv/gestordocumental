<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Teachers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Subjects'), ['controller' => 'Subjects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Subject'), ['controller' => 'Subjects', 'action' => 'add']) ?></li>
    </ul>
</nav>
-->
<div class="col-md-9 col-md-offset-2">
    <?= $this->Form->create($teacher) ?>
    <fieldset>
        <legend><?= __('Añadir Profesor') ?></legend>
        <?php
            echo $this->Form->input('nombre', ['style' => 'text-transform:uppercase', 'onchange'=>'this.value = this.value.toUpperCase();']);
            echo $this->Form->input('apellidos', ['style' => 'text-transform:uppercase', 'onchange'=>'this.value = this.value.toUpperCase();']);
            echo $this->Form->input('email');
            echo $this->Form->input('subjects._ids', array('label' => 'Asignaturas'), ['options' => $subjects]);
        ?>
    </fieldset>
    <?= $this->Form->button('Cancelar', array('type' => 'button','onclick' => 'location.href=\'../users/buscador\';')); ?>
    <?= $this->Form->button('Guardar') ?>
    <?= $this->Form->end() ?>
</div>
