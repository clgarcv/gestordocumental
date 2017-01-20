<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Degree'), ['action' => 'edit', $degree->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Degree'), ['action' => 'delete', $degree->id], ['confirm' => __('Are you sure you want to delete # {0}?', $degree->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Degrees'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Degree'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Subjects'), ['controller' => 'Subjects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Subject'), ['controller' => 'Subjects', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="degrees view large-9 medium-8 columns content">
    <h3><?= h($degree->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Codigo') ?></th>
            <td><?= h($degree->codigo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($degree->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($degree->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($degree->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($degree->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Subjects') ?></h4>
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
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
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
                <td><?= h($subjects->created) ?></td>
                <td><?= h($subjects->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Subjects', 'action' => 'view', $subjects->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Subjects', 'action' => 'edit', $subjects->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Subjects', 'action' => 'delete', $subjects->id], ['confirm' => __('Are you sure you want to delete # {0}?', $subjects->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
