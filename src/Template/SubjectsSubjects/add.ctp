<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Subjects Subjects'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="subjectsSubjects form large-9 medium-8 columns content">
    <?= $this->Form->create($subjectsSubject) ?>
    <fieldset>
        <legend><?= __('Add Subjects Subject') ?></legend>
        <?php
            echo $this->Form->input('id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
