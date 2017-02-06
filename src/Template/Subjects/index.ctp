<!--
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
-->
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
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $subject->id], ['class' => 'btn btn-default']) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $subject->id], ['class' => 'btn btn-default']) ?>
                    <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $subject->id], ['confirm' => __('Are you sure you want to delete # {0}?', $subject->nombre), 'class' => 'btn btn-default']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('Primera')) ?>
            <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Siguiente') . ' >') ?>
            <?= $this->Paginator->last(__('Última') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}, mostrando {{current}} asignaturas de {{count}} totales')]) ?></p>
    </div>
</div>
