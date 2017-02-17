
<div class="col-md-9 col-md-offset-2 mb-2">
    <h3><?= __('Sesiones Prácticas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('codigo', 'Código') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('subject_id', 'Asignatura') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sessions as $session): ?>
            <tr>
                <td><?= $this->Number->format($session->id) ?></td>
                <td><?= h($session->codigo) ?></td>
                <td><?= $this->Html->link(__($session->nombre), ['action' => 'view', $session->id]) ?></td>
                <?php if ($current_user['role'] < 2): ?>
                	<td><?= $session->has('subject') ? $session->subject->nombre : '' ?></td>
                <?php endif; ?>
                <?php if ($current_user['role'] >= 2): ?>
                	<td><?= $session->has('subject') ? $this->Html->link($session->subject->nombre, ['controller' => 'Subjects', 'action' => 'view', $session->subject->id]) : '' ?></td>
                <?php endif; ?>

                <td class="actions">
                <?php if ($current_user['role'] == 3): ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $session->id], ['class' => 'btn btn-default']) ?>
                    <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $session->id], ['confirm' => __('¿Seguro que desea eliminar la sesión #{0}?', $session->nombre), 'class' => 'btn btn-default']) ?>
                <?php endif; ?>

                <?php if ($current_user['role'] == 1 && $current_user['teacher_id'] === $session->subject->teacher_id): ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $session->id], ['class' => 'btn btn-default']) ?>
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
        <p><?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}, mostrando {{current}} sesiones de {{count}} totales')]) ?></p>
</div>
