<div class="col-md-9 col-md-offset-2 mb-2">
    <?= $this->Form->create($teacher) ?>
    <fieldset>
        <legend><?= __('Añadir Profesor') ?></legend>
        <?php
            echo $this->Form->input('nombre', ['style' => 'text-transform:uppercase', 'onchange'=>'this.value = this.value.toUpperCase();']);
            echo $this->Form->input('apellidos', ['style' => 'text-transform:uppercase', 'onchange'=>'this.value = this.value.toUpperCase();']);
            echo $this->Form->input('email');
            echo $this->Form->input('subjects._ids', array('label' => 'Asignaturas', 'style'=>'height: 300px'), ['options' => $subjects]);
        ?>
    </fieldset>
    <?= $this->Form->button('Cancelar', array('type' => 'button','onclick' => 'location.href=\'../users/buscador\';')); ?>
    <?= $this->Form->button('Guardar') ?>
    <?= $this->Form->end() ?>
</div>
