<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Keywords Session'), ['action' => 'edit', $keywordsSession->keyword_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Keywords Session'), ['action' => 'delete', $keywordsSession->keyword_id], ['confirm' => __('Are you sure you want to delete # {0}?', $keywordsSession->keyword_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Keywords Sessions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Keywords Session'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sessions'), ['controller' => 'Sessions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Session'), ['controller' => 'Sessions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Keywords'), ['controller' => 'Keywords', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Keyword'), ['controller' => 'Keywords', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="keywordsSessions view large-9 medium-8 columns content">
    <h3><?= h($keywordsSession->keyword_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Session') ?></th>
            <td><?= $keywordsSession->has('session') ? $this->Html->link($keywordsSession->session->id, ['controller' => 'Sessions', 'action' => 'view', $keywordsSession->session->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Keyword') ?></th>
            <td><?= $keywordsSession->has('keyword') ? $this->Html->link($keywordsSession->keyword->id, ['controller' => 'Keywords', 'action' => 'view', $keywordsSession->keyword->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($keywordsSession->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($keywordsSession->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($keywordsSession->modified) ?></td>
        </tr>
    </table>
</div>
