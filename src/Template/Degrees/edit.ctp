
<div class="col-md-9 col-md-offset-2 mb-2">
    <?= $this->Form->create($degree) ?>
    <fieldset>
        <legend><?= __('Editar Titulación') ?></legend>
        <?php
            echo $this->Form->input('codigo', ['disabled' => 'true']);
            echo $this->Form->input('nombre');
            echo $this->Form->input('teacher_id', ['options' => $teachers]);
            echo $this->Form->input('subjects._ids', array('label' => 'Asignaturas', 'style'=>'height: 300px'),['options' => $subjects]);
        ?>
    </fieldset>
    <?= $this->Form->button('Cancelar', array('type' => 'button','onclick' => 'location.href=\'../../degrees/\';')); ?>
    <?= $this->Form->button(__('Guardar')) ?>
    <?= $this->Form->end() ?>
</div>
