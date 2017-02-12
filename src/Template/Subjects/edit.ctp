<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $subject->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $subject->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Subjects'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Degrees'), ['controller' => 'Degrees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Degree'), ['controller' => 'Degrees', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Subjects'), ['controller' => 'Subjects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Subject'), ['controller' => 'Subjects', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Teachers'), ['controller' => 'Teachers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Teacher'), ['controller' => 'Teachers', 'action' => 'add']) ?></li>
    </ul>
</nav>
-->
<div class="col-md-9 col-md-offset-2">
    <?= $this->Form->create($subject) ?>
    <fieldset>
        <legend><?= __('Editar Asignaturas') ?></legend>
        <?php
            echo $this->Form->input('codigo', array('label' => 'Código', 'disabled' => 'true'));
            echo $this->Form->input('nombre', ['style' => 'text-transform:uppercase', 'onchange'=>'this.value = this.value.toUpperCase();']);
            echo $this->Form->input('modulo', array('label' => 'Módulo'));
            echo $this->Form->input('curso');
            echo $this->Form->input('semestre', ['style' => 'text-transform:uppercase', 'onchange'=>'this.value = this.value.toUpperCase();']);
            echo $this->Form->input('materia', ['style' => 'text-transform:uppercase', 'onchange'=>'this.value = this.value.toUpperCase();']);
            echo $this->Form->input('teacher_id', array('label' => 'Profesor responsable'));
            echo $this->Form->input('teachers._ids', array('label' => 'Profesores', 'style'=>'height: 300px'), ['options' => $teachers]);
            echo $this->Form->input('degrees._ids', array('label' => 'Titulaciones'), ['options' => $degrees]);

        ?>
    </fieldset>
    <?= $this->Form->button('Cancelar', array('type' => 'button','onclick' => 'location.href=\'../../subjects/\';')); ?>
    <?= $this->Form->button(__('Guardar')) ?>
    <?= $this->Form->end() ?>
</div>
