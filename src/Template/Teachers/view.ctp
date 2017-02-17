
<div class="col-md-9 col-md-offset-2 mb-2">
    <h3><?= h($teacher->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($teacher->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Apellidos') ?></th>
            <td><?= h($teacher->apellidos) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($teacher->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($teacher->id) ?></td>
        </tr>

    </table>

    <div class="related">
        <h4><?= __('Asignaturas Relacionadas') ?></h4>
        <?php if (!empty($teacher->subjects)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Codigo') ?></th>
                <th scope="col"><?= __('Nombre') ?></th>
                <th scope="col"><?= __('Modulo') ?></th>
                <th scope="col"><?= __('Curso') ?></th>
                <th scope="col"><?= __('Semestre') ?></th>
                <th scope="col"><?= __('Materia') ?></th>

            </tr>
            <?php foreach ($teacher->subjects as $subjects): ?>
            <tr>
                <td><?= h($subjects->id) ?></td>
                <td><?= h($subjects->codigo) ?></td>
                <td><?= h($subjects->nombre) ?></td>
                <td><?= h($subjects->modulo) ?></td>
                <td><?= h($subjects->curso) ?></td>
                <td><?= h($subjects->semestre) ?></td>
                <td><?= h($subjects->materia) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['controller' => 'Subjects', 'action' => 'view', $subjects->id], ['class' => 'btn btn-default']) ?>
                </td>

            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
