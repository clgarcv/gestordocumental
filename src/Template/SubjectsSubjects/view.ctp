<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Subjects Subject'), ['action' => 'edit', $subjectsSubject->subject_id1]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Subjects Subject'), ['action' => 'delete', $subjectsSubject->subject_id1], ['confirm' => __('Are you sure you want to delete # {0}?', $subjectsSubject->subject_id1)]) ?> </li>
        <li><?= $this->Html->link(__('List Subjects Subjects'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Subjects Subject'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="subjectsSubjects view large-9 medium-8 columns content">
    <h3><?= h($subjectsSubject->subject_id1) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($subjectsSubject->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Subject Id1') ?></th>
            <td><?= $this->Number->format($subjectsSubject->subject_id1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Subject Id2') ?></th>
            <td><?= $this->Number->format($subjectsSubject->subject_id2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($subjectsSubject->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($subjectsSubject->modified) ?></td>
        </tr>
    </table>
</div>
