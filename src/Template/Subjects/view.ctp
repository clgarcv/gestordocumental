<!--
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Subject'), ['action' => 'edit', $subject->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Subject'), ['action' => 'delete', $subject->id], ['confirm' => __('Are you sure you want to delete # {0}?', $subject->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Subjects'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Subject'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Degrees'), ['controller' => 'Degrees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Degree'), ['controller' => 'Degrees', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Subjects'), ['controller' => 'Subjects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Subject'), ['controller' => 'Subjects', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Teachers'), ['controller' => 'Teachers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Teacher'), ['controller' => 'Teachers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
-->
<div class="subjects view large-9 medium-8 columns content">
    <h3><?= h($subject->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Codigo') ?></th>
            <td><?= h($subject->codigo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($subject->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modulo') ?></th>
            <td><?= h($subject->modulo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Semestre') ?></th>
            <td><?= h($subject->semestre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Materia') ?></th>
            <td><?= h($subject->materia) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($subject->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Curso') ?></th>
            <td><?= h($subject->curso) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($subject->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($subject->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Sessions') ?></h4>
        <?php if (!empty($subject->sessions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Codigo') ?></th>
                <th scope="col"><?= __('Nombre') ?></th>
                <th scope="col"><?= __('Descripcion') ?></th>
                <th scope="col"><?= __('Subject Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($subject->sessions as $sessions): ?>
            <tr>
                <td><?= h($sessions->id) ?></td>
                <td><?= h($sessions->codigo) ?></td>
                <td><?= h($sessions->nombre) ?></td>
                <td><?= h($sessions->descripcion) ?></td>
                <td><?= h($sessions->subject_id) ?></td>
                <td><?= h($sessions->created) ?></td>
                <td><?= h($sessions->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Sessions', 'action' => 'view', $sessions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Sessions', 'action' => 'edit', $sessions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Sessions', 'action' => 'delete', $sessions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sessions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Degrees') ?></h4>
        <?php if (!empty($subject->degrees)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Codigo') ?></th>
                <th scope="col"><?= __('Nombre') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($subject->degrees as $degrees): ?>
            <tr>
                <td><?= h($degrees->id) ?></td>
                <td><?= h($degrees->codigo) ?></td>
                <td><?= h($degrees->nombre) ?></td>
                <td><?= h($degrees->created) ?></td>
                <td><?= h($degrees->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Degrees', 'action' => 'view', $degrees->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Degrees', 'action' => 'edit', $degrees->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Degrees', 'action' => 'delete', $degrees->id], ['confirm' => __('Are you sure you want to delete # {0}?', $degrees->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>

    <div class="related">
        <h4><?= __('Related Teachers') ?></h4>
        <?php if (!empty($subject->teachers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Nombre') ?></th>
                <th scope="col"><?= __('Apellidos') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($subject->teachers as $teachers): ?>
            <tr>
                <td><?= h($teachers->id) ?></td>
                <td><?= h($teachers->nombre) ?></td>
                <td><?= h($teachers->apellidos) ?></td>
                <td><?= h($teachers->email) ?></td>
                <td><?= h($teachers->created) ?></td>
                <td><?= h($teachers->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Teachers', 'action' => 'view', $teachers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Teachers', 'action' => 'edit', $teachers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Teachers', 'action' => 'delete', $teachers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $teachers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
