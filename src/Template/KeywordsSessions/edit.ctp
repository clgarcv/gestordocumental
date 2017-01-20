<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $keywordsSession->keyword_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $keywordsSession->keyword_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Keywords Sessions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Sessions'), ['controller' => 'Sessions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Session'), ['controller' => 'Sessions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Keywords'), ['controller' => 'Keywords', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Keyword'), ['controller' => 'Keywords', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="keywordsSessions form large-9 medium-8 columns content">
    <?= $this->Form->create($keywordsSession) ?>
    <fieldset>
        <legend><?= __('Edit Keywords Session') ?></legend>
        <?php
            echo $this->Form->input('id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
