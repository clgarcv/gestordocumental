
<div class="col-md-9 col-md-offset-2 mb-2">
    <?= $this->Form->create($degree) ?>
    <fieldset>
        <legend><?= __('Añadir Titulación') ?></legend>
        <?php
            echo $this->Form->input('codigo', array('placeholder' => '701G, 801G, ...', 'style' => 'text-transform:uppercase', 'onchange'=>'this.value = this.value.toUpperCase();'));
            echo $this->Form->input('nombre', array('style' => 'text-transform:uppercase', 'onchange'=>'this.value = this.value.toUpperCase();'));
            echo $this->Form->input('teacher_id', array('label' => 'Director', 'options' => $teachers, 'empty' => true));
            echo $this->Form->input('subjects._ids', array('label' => 'Asignaturas', 'style'=>'height: 300px'),['options' => $subjects]);
        ?>

    </fieldset>
    <?= $this->Form->button('Cancelar', array('type' => 'button','onclick' => 'location.href=\'../buscador\';')); ?>
    <?= $this->Form->button(__('Guardar')) ?>
    <?= $this->Form->end() ?>
</div>
