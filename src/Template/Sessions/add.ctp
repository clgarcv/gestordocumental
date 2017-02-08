<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Sessions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Keywords'), ['controller' => 'Keywords', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Keyword'), ['controller' => 'Keywords', 'action' => 'add']) ?></li>
    </ul>
</nav>
-->

<div class="sessions form large-9 medium-8 columns content">
    <?= $this->Form->create($session) ?>
    <fieldset>
        <legend><?= __('Añadir nueva sesión') ?></legend>
        <?php
            echo $this->Form->input('codigo',  array('label' => 'Código'));
            echo $this->Form->input('nombre');
            echo $this->Form->input('descripcion', array('label' => 'Descripción'));
            echo $this->Form->input('subject_id',array('label' => 'Asignatura'), ['options' => $subjects]);
            echo $this->Form->input('keywords._ids',array('label' => 'Palabras clave'), ['options' => $keywords]);
        ?>
    </fieldset>
    <?= $this->Form->button('Cancelar', array('type' => 'button','onclick' => 'location.href=\'../buscador\';')); ?>
    <?= $this->Form->button('Guardar') ?>
    <?= $this->Form->end() ?>
</div>
