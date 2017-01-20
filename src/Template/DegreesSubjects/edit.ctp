<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $degreesSubject->degree_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $degreesSubject->degree_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Degrees Subjects'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Degrees'), ['controller' => 'Degrees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Degree'), ['controller' => 'Degrees', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Subjects'), ['controller' => 'Subjects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Subject'), ['controller' => 'Subjects', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="degreesSubjects form large-9 medium-8 columns content">
    <?= $this->Form->create($degreesSubject) ?>
    <fieldset>
        <legend><?= __('Edit Degrees Subject') ?></legend>
        <?php
            echo $this->Form->input('id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
