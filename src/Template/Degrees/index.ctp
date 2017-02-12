<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Degree'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Subjects'), ['controller' => 'Subjects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Subject'), ['controller' => 'Subjects', 'action' => 'add']) ?></li>
    </ul>
</nav>
-->
<div class="col-md-9 col-md-offset-2">
    <h3><?= __('Titulaciones') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('codigo', 'Código') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                <!-- <th scope="col"><?= $this->Paginator->sort('teacher_id', 'Director') ?></th> -->

            </tr>
        </thead>
        <tbody>
            <?php foreach ($degrees as $degree): ?>
            <tr>
                <td><?= $this->Number->format($degree->id) ?></td>
                <td><?= h($degree->codigo) ?></td>
                <td><?= h($degree->nombre) ?></td>
				<!-- <td><?= $degree->has('teacher') ? $this->Html->link($degree->teacher->id, ['controller' => 'Teachers', 'action' => 'view', $degree->teacher->id]) : '' ?></td> -->
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $degree->id], ['class' => 'btn btn-default']) ?>

                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $degree->id], ['class' => 'btn btn-default']) ?>
                    <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $degree->id], ['confirm' => __('¿Seguro que desea eliminar la titulación # {0}?', $degree->nombre), 'class' => 'btn btn-default']) ?>
                    <!-- <?php if ($current_user['id'] === $degree['teacher_id']): ?> -->
                    <!--<?php endif; ?> -->
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
        <p><?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}, mostrando {{current}} titulaciones de {{count}} totales')]) ?></p>
</div>
