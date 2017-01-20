<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Subjects Teacher'), ['action' => 'edit', $subjectsTeacher->subject_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Subjects Teacher'), ['action' => 'delete', $subjectsTeacher->subject_id], ['confirm' => __('Are you sure you want to delete # {0}?', $subjectsTeacher->subject_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Subjects Teachers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Subjects Teacher'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Teachers'), ['controller' => 'Teachers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Teacher'), ['controller' => 'Teachers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Subjects'), ['controller' => 'Subjects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Subject'), ['controller' => 'Subjects', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="subjectsTeachers view large-9 medium-8 columns content">
    <h3><?= h($subjectsTeacher->subject_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Teacher') ?></th>
            <td><?= $subjectsTeacher->has('teacher') ? $this->Html->link($subjectsTeacher->teacher->id, ['controller' => 'Teachers', 'action' => 'view', $subjectsTeacher->teacher->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Subject') ?></th>
            <td><?= $subjectsTeacher->has('subject') ? $this->Html->link($subjectsTeacher->subject->id, ['controller' => 'Subjects', 'action' => 'view', $subjectsTeacher->subject->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($subjectsTeacher->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($subjectsTeacher->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($subjectsTeacher->modified) ?></td>
        </tr>
    </table>
</div>
