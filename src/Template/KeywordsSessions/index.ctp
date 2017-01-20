<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Keywords Session'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sessions'), ['controller' => 'Sessions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Session'), ['controller' => 'Sessions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Keywords'), ['controller' => 'Keywords', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Keyword'), ['controller' => 'Keywords', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="keywordsSessions index large-9 medium-8 columns content">
    <h3><?= __('Keywords Sessions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('session_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('keyword_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($keywordsSessions as $keywordsSession): ?>
            <tr>
                <td><?= $this->Number->format($keywordsSession->id) ?></td>
                <td><?= $keywordsSession->has('session') ? $this->Html->link($keywordsSession->session->id, ['controller' => 'Sessions', 'action' => 'view', $keywordsSession->session->id]) : '' ?></td>
                <td><?= $keywordsSession->has('keyword') ? $this->Html->link($keywordsSession->keyword->id, ['controller' => 'Keywords', 'action' => 'view', $keywordsSession->keyword->id]) : '' ?></td>
                <td><?= h($keywordsSession->created) ?></td>
                <td><?= h($keywordsSession->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $keywordsSession->keyword_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $keywordsSession->keyword_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $keywordsSession->keyword_id], ['confirm' => __('Are you sure you want to delete # {0}?', $keywordsSession->keyword_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
