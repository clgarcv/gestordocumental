<div class="col-md-9 col-md-offset-2 mb-2">
    <?= $this->Form->create($subject) ?>
    <fieldset>
        <legend><?= __('Añadir Asignatura') ?></legend>
        <?php
            echo $this->Form->input('codigo', array('label' => 'Código'));
            echo $this->Form->input('nombre', ['style' => 'text-transform:uppercase', 'onchange'=>'this.value = this.value.toUpperCase();']);
            echo $this->Form->input('modulo', array('label' => 'Módulo', 'placeholder' => 'BÁSICO, ESPECÍFICO, FUNDAMENTAL, QUÍMICA AVANZADA, ... ', 'style' => 'text-transform:uppercase', 'onchange'=>'this.value = this.value.toUpperCase();'));
            echo $this->Form->input('curso', array('label' => 'Módulo', 'placeholder' => 'PRIMERO, SEGUNDO, TERCERO, CUARTO', 'style' => 'text-transform:uppercase', 'onchange'=>'this.value = this.value.toUpperCase();'));
            echo $this->Form->input('semestre', array('label' => 'Módulo', 'placeholder' => 'PRIMERO, SEGUNDO, ANUAL', 'style' => 'text-transform:uppercase', 'onchange'=>'this.value = this.value.toUpperCase();'));
            echo $this->Form->input('materia',array('label' => 'Módulo', 'placeholder' => 'BÍOLOGÍA, FÍSICA, QUÍMICA FÍSICA, ...', 'style' => 'text-transform:uppercase', 'onchange'=>'this.value = this.value.toUpperCase();'));
            echo $this->Form->input('teacher_id', array('label' => 'Profesor responsable', 'options' => $teachers, 'empty' => true) );
            echo $this->Form->input('teachers._ids', array('label' => 'Profesores', 'style'=>'height: 300px'), ['options' => $teachers]);
            echo $this->Form->input('degrees._ids', array('label' => 'Titulaciones'), ['options' => $degrees]);
        ?>



    </fieldset>
    <?= $this->Form->button('Cancelar', array('type' => 'button','onclick' => 'location.href=\'../users/buscador\';')); ?>
    <?= $this->Form->button('Guardar') ?>
    <?= $this->Form->end() ?>
</div>
