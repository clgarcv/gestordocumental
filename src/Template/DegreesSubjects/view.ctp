<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Degrees Subject'), ['action' => 'edit', $degreesSubject->degree_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Degrees Subject'), ['action' => 'delete', $degreesSubject->degree_id], ['confirm' => __('Are you sure you want to delete # {0}?', $degreesSubject->degree_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Degrees Subjects'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Degrees Subject'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Degrees'), ['controller' => 'Degrees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Degree'), ['controller' => 'Degrees', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Subjects'), ['controller' => 'Subjects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Subject'), ['controller' => 'Subjects', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="degreesSubjects view large-9 medium-8 columns content">
    <h3><?= h($degreesSubject->degree_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Degree') ?></th>
            <td><?= $degreesSubject->has('degree') ? $this->Html->link($degreesSubject->degree->id, ['controller' => 'Degrees', 'action' => 'view', $degreesSubject->degree->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Subject') ?></th>
            <td><?= $degreesSubject->has('subject') ? $this->Html->link($degreesSubject->subject->id, ['controller' => 'Subjects', 'action' => 'view', $degreesSubject->subject->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($degreesSubject->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($degreesSubject->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($degreesSubject->modified) ?></td>
        </tr>
    </table>
</div>
