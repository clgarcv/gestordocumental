
<div class="col-md-9 col-md-offset-2 mb-2">
    <h3><?= h($keyword->nombre) ?></h3>

    <div class="related">
        <h4><?= __('Sesiones Relacionadas') ?></h4>
        <?php if (!empty($keyword->sessions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Codigo') ?></th>
                <th scope="col"><?= __('Nombre') ?></th>
                <th scope="col"><?= __('Descripcion') ?></th>
            </tr>
            <?php foreach ($keyword->sessions as $sessions): ?>
            <tr>
                <td><?= h($sessions->id) ?></td>
                <td><?= $this->Html->link(__($sessions->codigo), ['controller' => 'sessions' ,'action' => 'view', $sessions->id]) ?> </td>
                <td><?= h($sessions->nombre) ?></td>
                <td><?= h($sessions->descripcion) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
