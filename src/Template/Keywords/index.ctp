<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Keyword'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sessions'), ['controller' => 'Sessions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Session'), ['controller' => 'Sessions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="keywords index large-9 medium-8 columns content">
    <h3><?= __('Keywords') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($keywords as $keyword): ?>
            <tr>
                <td><?= h($keyword->id) ?></td>
                <td><?= h($keyword->nombre) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $keyword->id], ['class' => 'btn btn-default']) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $keyword->id], ['class' => 'btn btn-default']) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $keyword->id], ['confirm' => __('Are you sure you want to delete # {0}?', $keyword->id), 'class' => 'btn btn-default']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <nav aria-label="Page navigation example">

        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('Primera')) ?>
            <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
            
            <?= $this->Paginator->next(__('Siguiente') . ' >') ?>
            <?= $this->Paginator->last(__('Última') . ' >>') ?>
        </ul>
        <?= $this->Paginator->numbers() ?>
        <p><?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}, mostrando {{current}} palabras clave de {{count}} totales')]) ?></p>
    </nav>
</div>
