<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Keywords'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Sessions'), ['controller' => 'Sessions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Session'), ['controller' => 'Sessions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="keywords form large-9 medium-8 columns content">
    <?= $this->Form->create($keyword) ?>
    <fieldset>
        <legend><?= __('Add Keyword') ?></legend>
        <?php
            echo $this->Form->input('nombre');
            echo $this->Form->input('sessions._ids', ['options' => $sessions]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
