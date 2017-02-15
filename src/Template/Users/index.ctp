<!--
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Teachers'), ['controller' => 'Teachers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Teacher'), ['controller' => 'Teachers', 'action' => 'add']) ?></li>
    </ul>
</nav>
-->

<div class="col-md-9 col-md-offset-2">
    <h3><?= __('Usuarios') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('username', 'Usuario') ?></th>
                <!-- <th scope="col"><?= $this->Paginator->sort('password') ?></th> -->
                <th scope="col"><?= $this->Paginator->sort('role', 'Rol') ?></th>
                <th scope="col"><?= $this->Paginator->sort('teacher_id', 'Profesor') ?></th>

                <!-- <th scope="col" class="actions"><?= __('Actions') ?></th>-->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $this->Number->format($user->id) ?></td>
                <td><?= h($user->username) ?></td>
                <!-- <td><?= h($user->password) ?></td> -->
                <?php
                    switch ($user->role):
                        case 0:
                            echo "<td>Usuario básico</td>";
                            break;
                        case 1:
                            echo "<td>Usuario avanzado</td>";
                            break;
                        case 2:
                            echo "<td>Administrador</td>";
                            break;
                        case 3:
                            echo "<td>Súper administrador</td>";
                            break;
                        default:
                            echo "<td></td>";
                    endswitch;
                ?>
                <td><?= $user->has('teacher') ? $this->Html->link($user->teacher->full_name, ['controller' => 'Teachers', 'action' => 'view', $user->teacher->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $user->id], ['class' => 'btn btn-default']) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $user->id], ['class' => 'btn btn-default']) ?>
                    <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $user->id], ['confirm' => __('¿Seguro que desea eliminar el usuario # {0}?', $user->username),'class' => 'btn btn-default']) ?>
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
        <p><?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}, mostrando {{current}} usuarios de {{count}} totales')]) ?></p>
</div>
