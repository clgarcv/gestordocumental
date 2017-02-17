<div class="col-md-9 col-md-offset-2 mb-2">
    <?= $this->Form->create($subject) ?>
    <fieldset>
        <legend><?= __('Editar Asignaturas') ?></legend>
        <?php
            echo $this->Form->input('codigo', array('label' => 'Código', 'disabled' => 'true'));
            echo $this->Form->input('nombre', ['style' => 'text-transform:uppercase', 'onchange'=>'this.value = this.value.toUpperCase();']);
            echo $this->Form->input('modulo', array('label' => 'Módulo'));
            echo $this->Form->input('curso');
            echo $this->Form->input('semestre', ['style' => 'text-transform:uppercase', 'onchange'=>'this.value = this.value.toUpperCase();']);
            echo $this->Form->input('materia', ['style' => 'text-transform:uppercase', 'onchange'=>'this.value = this.value.toUpperCase();']);
            echo $this->Form->input('teacher_id', array('label' => 'Profesor responsable'));
            echo $this->Form->input('teachers._ids', array('label' => 'Profesores', 'style'=>'height: 300px'), ['options' => $teachers]);
            echo $this->Form->input('degrees._ids', array('label' => 'Titulaciones'), ['options' => $degrees]);

        ?>
    </fieldset>
    <?= $this->Form->button('Cancelar', array('type' => 'button','onclick' => 'location.href=\'../../subjects/\';')); ?>
    <?= $this->Form->button(__('Guardar')) ?>
    <?= $this->Form->end() ?>
</div>
