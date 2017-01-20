<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Degrees'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Subjects'), ['controller' => 'Subjects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Subject'), ['controller' => 'Subjects', 'action' => 'add']) ?></li>
    </ul>
</nav>
--> 

<div class="degrees form large-9 medium-8 columns content">
    <?= $this->Form->create($degree) ?>
    <fieldset>
        <legend><?= __('Añadir nueva titulacón') ?></legend>
        <?php
            echo $this->Form->input('codigo');
            echo $this->Form->input('nombre');
            //echo $this->Form->input('subjects._ids', ['options' => $subjects]);
        ?>
        <br><label> Asignaturas de la titulación</label> <br>
        <?php foreach($subjects as $s): ?>
        <?php echo $this->Form->checkbox($s);
                echo ' ' . $s;?>
        <?php endforeach; ?>
    </fieldset>
    <?= $this->Form->button('Cancelar', array('type' => 'button','onclick' => 'location.href=\'../users/index\';')); ?>
    <?= $this->Form->button('Guardar') ?>
    <?= $this->Form->end() ?>
</div>
