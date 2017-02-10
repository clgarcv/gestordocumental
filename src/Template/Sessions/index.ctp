<!--
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Session'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Keywords'), ['controller' => 'Keywords', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Keyword'), ['controller' => 'Keywords', 'action' => 'add']) ?></li>
    </ul>
</nav>
-->
<div class="col-md-14 col-md-offset-2">
    <h3><?= __('Sesiones Prácticas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('codigo', 'Código') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('subject_id', 'Asignatura') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sessions as $session): ?>
            <tr>
                <td><?= $this->Number->format($session->id) ?></td>
                <td><?= h($session->codigo) ?></td>
                <td><?= h($session->nombre) ?></td>
                <td><?= $session->has('subject') ? $this->Html->link($session->subject->nombre, ['controller' => 'Subjects', 'action' => 'view', $session->subject->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $session->id], ['class' => 'btn btn-info']) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $session->id], ['class' => 'btn btn-warning']) ?>
                    <?= $this->Html->link(__('Eliminar'), ['action' => 'delete', $session->id], ['confirm' => __('¿Seguro que desea eliminar la sesión #{0}?', $session->nombre), 'class' => 'btn btn-danger']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('Primera')) ?>
            <?= $this->Paginator->prev('< ' . __('Anterior'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a')) ?>
          </ul>
          <?= $this->Paginator->numbers() ?>
          <ul class="pagination">
            <?= $this->Paginator->next(__('Siguiente') . ' >', array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a')) ?>
            <?= $this->Paginator->last(__('Última') . ' >>') ?>
          </ul>
        <p><?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}, mostrando {{current}} sesiones de {{count}} totales')]) ?></p>
</div>
