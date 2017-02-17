
<div class="col-md-9 col-md-offset-2 mb-2">
    <h3><?= h($degree->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Código') ?></th>
            <td><?= h($degree->codigo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($degree->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Director') ?></th>
            <td><?= $degree->has('teacher') ? $this->Html->link($degree->teacher->id, ['controller' => 'Teachers', 'action' => 'view', $degree->teacher->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($degree->id) ?></td>
        </tr>

    </table>
    <div class="related">
        <h4><?= __('Asignaturas de la titulación') ?></h4>
        <?php if (!empty($degree->subjects)): ?>
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
            <?php foreach ($degree->subjects as $subjects): ?>
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
                    <!-- <?= $this->Html->link(__('Edit'), ['controller' => 'Subjects', 'action' => 'edit', $subjects->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Subjects', 'action' => 'delete', $subjects->id], ['confirm' => __('Are you sure you want to delete # {0}?', $subjects->id)]) ?> -->
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
