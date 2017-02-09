<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $keyword->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $keyword->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Keywords'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Sessions'), ['controller' => 'Sessions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Session'), ['controller' => 'Sessions', 'action' => 'add']) ?></li>
    </ul>
</nav>
-->
<div class="col-md-5 col-md-offset-3">
    <?= $this->Form->create($keyword) ?>
    <fieldset>
        <legend><?= __('Editar Palabra Clave') ?></legend>
        <?php
            echo $this->Form->input('nombre');
            echo $this->Form->input('sessions._ids', array('label' => 'Sesiones', 'style'=>'height: 300px'), ['options' => $sessions]);
        ?>
    </fieldset>
    <?= $this->Form->button('Cancelar', array('type' => 'button','onclick' => 'location.href=\'../../keywords/\';')); ?>
    <?= $this->Form->button(__('Guardar')) ?>
    <?= $this->Form->end() ?>
</div>
