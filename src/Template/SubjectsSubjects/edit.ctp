<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $subjectsSubject->subject_id1],
                ['confirm' => __('Are you sure you want to delete # {0}?', $subjectsSubject->subject_id1)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Subjects Subjects'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="subjectsSubjects form large-9 medium-8 columns content">
    <?= $this->Form->create($subjectsSubject) ?>
    <fieldset>
        <legend><?= __('Edit Subjects Subject') ?></legend>
        <?php
            echo $this->Form->input('id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
