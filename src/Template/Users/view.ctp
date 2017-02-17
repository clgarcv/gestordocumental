<div class="col-md-9 col-md-offset-2 mb-2">
    <h3><?= h($user->username) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Usuario: ') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contraseña:' ) ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rol: ') ?></th>
           <?php if ($user->role == 0): ?> <td><?= h('Usuario básico') ?></td><?php endif;?>
           <?php if ($user->role == 1): ?> <td><?= h('Usuario avanzado') ?></td><?php endif;?>
           <?php if ($user->role == 2): ?> <td><?= h('Administrador') ?></td><?php endif;?>
           <?php if ($user->role == 3): ?> <td><?= h('Superadministrador') ?></td><?php endif;?>
        </tr>
        <tr>
            <th scope="row"><?= __('Profesor: ') ?></th>
            <td><?= $user->has('teacher') ? $this->Html->link($user->teacher->full_name, ['controller' => 'Teachers', 'action' => 'view', $user->teacher->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>

    </table>
</div>
