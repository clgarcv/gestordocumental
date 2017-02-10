<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $session->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $session->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Sessions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Keywords'), ['controller' => 'Keywords', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Keyword'), ['controller' => 'Keywords', 'action' => 'add']) ?></li>
    </ul>
</nav>
-->
<div class="col-md-5 col-md-offset-3">
    <?= $this->Form->create($session) ?>
    <fieldset>
        <legend><?= __('Editar Sesión') ?></legend>
        <?php
            echo $this->Form->input('codigo', array('label' => 'Código','disabled' => 'true'));
            echo $this->Form->input('nombre');
            echo $this->Form->input('descripcion', array('label' => 'Descripción'));
            echo $this->Form->input('subject_id', array('label' => 'Asignatura'), ['options' => $subjects]);
            echo $this->Form->input('keywords._ids', array('label' => 'Palabras Clave', 'style'=>'height: 300px'), ['options' => $keywords]);
        ?>
    </fieldset>
   	<?= $this->Form->button('Cancelar', array('type' => 'button','onclick' => 'location.href=\'../../sessions/\';')); ?>
    <?= $this->Form->button(__('Guardar')) ?>
    <?= $this->Form->end() ?>
</div>

