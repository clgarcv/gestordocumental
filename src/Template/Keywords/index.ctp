<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Keyword'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sessions'), ['controller' => 'Sessions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Session'), ['controller' => 'Sessions', 'action' => 'add']) ?></li>
    </ul>
</nav> -->

<div class="col-md-14 col-md-offset-2">
    <h3><?= __('Palabras Clave') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($keywords as $keyword): ?>
            <tr>
                <td><?= h($keyword->id) ?></td>
                <!-- <td><?= h($keyword->nombre) ?></td> -->
                <td><?= $this->Html->link(__($keyword->nombre), ['action' => 'view', $keyword->id]) ?></td>
                <td class="actions">

                <?php if ($current_user['role'] == 3): ?>

                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $keyword->id], ['class' => 'btn btn-default']) ?>
                    <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $keyword->id], ['confirm' => __('¿Seguro que desea eliminar la palabra clave #{0}?', $keyword->nombre), 'class' => 'btn btn-default']) ?>
                <?php endif; ?>
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
        <p><?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}, mostrando {{current}} palabras clave de {{count}} totales')]) ?></p>
</div>
