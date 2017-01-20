<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Subject'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Degrees'), ['controller' => 'Degrees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Degree'), ['controller' => 'Degrees', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Teachers'), ['controller' => 'Teachers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Teacher'), ['controller' => 'Teachers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="subjects index large-9 medium-8 columns content">
    <h3><?= __('Subjects') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('codigo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modulo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('curso') ?></th>
                <th scope="col"><?= $this->Paginator->sort('semestre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('materia') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($subjects as $subject): ?>
            <tr>
                <td><?= $this->Number->format($subject->id) ?></td>
                <td><?= h($subject->codigo) ?></td>
                <td><?= h($subject->nombre) ?></td>
                <td><?= h($subject->modulo) ?></td>
                <td><?= $this->Number->format($subject->curso) ?></td>
                <td><?= h($subject->semestre) ?></td>
                <td><?= h($subject->materia) ?></td>
                <td><?= h($subject->created) ?></td>
                <td><?= h($subject->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $subject->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $subject->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $subject->id], ['confirm' => __('Are you sure you want to delete # {0}?', $subject->id)]) ?>
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
