<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Subjects Teacher'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Teachers'), ['controller' => 'Teachers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Teacher'), ['controller' => 'Teachers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Subjects'), ['controller' => 'Subjects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Subject'), ['controller' => 'Subjects', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="subjectsTeachers index large-9 medium-8 columns content">
    <h3><?= __('Subjects Teachers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('teacher_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('subject_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($subjectsTeachers as $subjectsTeacher): ?>
            <tr>
                <td><?= $this->Number->format($subjectsTeacher->id) ?></td>
                <td><?= $subjectsTeacher->has('teacher') ? $this->Html->link($subjectsTeacher->teacher->id, ['controller' => 'Teachers', 'action' => 'view', $subjectsTeacher->teacher->id]) : '' ?></td>
                <td><?= $subjectsTeacher->has('subject') ? $this->Html->link($subjectsTeacher->subject->id, ['controller' => 'Subjects', 'action' => 'view', $subjectsTeacher->subject->id]) : '' ?></td>
                <td><?= h($subjectsTeacher->created) ?></td>
                <td><?= h($subjectsTeacher->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $subjectsTeacher->subject_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $subjectsTeacher->subject_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $subjectsTeacher->subject_id], ['confirm' => __('Are you sure you want to delete # {0}?', $subjectsTeacher->subject_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
