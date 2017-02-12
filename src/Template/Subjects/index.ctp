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
<div class="col-md-9 col-md-offset-2">
    <h3><?= __('Asignaturas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('codigo', 'Código') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modulo', 'Módulo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('curso') ?></th>
                <th scope="col"><?= $this->Paginator->sort('semestre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('materia') ?></th>
				<!-- <th scope="col"><?= $this->Paginator->sort('teacher_id', 'Profesor') ?></th> -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($subjects as $subject): ?>
            <tr>
                <td><?= $this->Number->format($subject->id) ?></td>
                <td><?= h($subject->codigo) ?></td>
                <td><?= $this->Html->link(__($subject->nombre), ['action' => 'view', $subject->id]) ?></td>
                <!-- <td><?= h($subject->nombre) ?></td> -->
                <td><?= h($subject->modulo) ?></td>
                <td><?= h($subject->curso) ?></td>
                <td><?= h($subject->semestre) ?></td>
                <td><?= h($subject->materia) ?></td>
                <!-- <td><?= $this->Number->format($subject->teacher_id) ?></td> -->
                <td class="actions">
                    <!-- <?= $this->Html->link(__('Ver'), ['action' => 'view', $subject->id], ['class' => 'btn btn-default']) ?> -->
                    <?php if ($current_user['role'] == 3): ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $subject->id], ['class' => 'btn btn-default']) ?>
                    <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $subject->id], ['confirm' => __('¿Seguro que desea eliminar la asignatura # {0}?', $subject->nombre), 'class' => 'btn btn-default']) ?>
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
        <p><?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}, mostrando {{current}} asignaturas de {{count}} totales')]) ?></p>
</div>
