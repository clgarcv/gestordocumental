<!--
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
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
<div class="subjects form large-9 medium-8 columns content">
    <?= $this->Form->create($subject) ?>
    <fieldset>
        <legend><?= __('Añadir Nueva Asignatura') ?></legend>
        <?php
            echo $this->Form->input('codigo');
            echo $this->Form->input('nombre');
            echo $this->Form->input('modulo');
            echo $this->Form->input('curso');
            echo $this->Form->input('semestre');
            echo $this->Form->input('materia');
            //php foreach ($reservations as $reservation)
            //echo $this->Form->input('degrees._ids', ['options' => $degrees]);
            //echo $this->Form->input('subjects._ids', ['options' => $subjects]);
            //echo $this->Form->input('teachers._ids', ['options' => $teachers]);
        ?>
        <label> Titulación </label> <br>
        <?php foreach($degrees as $d): ?>
        <?php echo $this->Form->checkbox($d);
                echo ' ' . $d;?>
        <?php endforeach; ?>

        <br><label> Asignaturas Relacionadas </label> <br>
        <?php foreach($subjects as $s): ?>
        <?php echo $this->Form->checkbox($s);
                echo ' ' . $s;?>
        <?php endforeach; ?>

        <br><label> Profesores </label> <br>
        <?php foreach($teachers as $t): ?>
        <?php echo $this->Form->checkbox($t); 
                echo ' ' . $t ?>
        <?php endforeach; ?>


    </fieldset>
    <?= $this->Form->button('Cancelar', array('type' => 'button','onclick' => 'location.href=\'../subjects/index\';')); ?>
    <?= $this->Form->button('Guardar') ?>
    <?= $this->Form->end() ?>
</div>
