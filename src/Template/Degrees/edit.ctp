<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $degree->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $degree->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Degrees'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Subjects'), ['controller' => 'Subjects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Subject'), ['controller' => 'Subjects', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="degrees form large-9 medium-8 columns content">
    <?= $this->Form->create($degree) ?>
    <fieldset>
        <legend><?= __('Edit Degree') ?></legend>
        <?php
            echo $this->Form->input('codigo');
            echo $this->Form->input('nombre');
            echo $this->Form->input('subjects._ids', ['options' => $subjects]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
