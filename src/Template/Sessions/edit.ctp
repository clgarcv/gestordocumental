
<div class="col-md-9 col-md-offset-2 mb-2">
    <?= $this->Form->create($session) ?>
    <fieldset>
        <legend><?= __('Editar Sesión') ?></legend>
        <?php
            echo $this->Form->input('codigo', array('label' => 'Código','disabled' => 'true'));
            echo $this->Form->input('nombre');
            echo $this->Form->input('descripcion', array('label' => 'Descripción'));
            echo $this->Form->input('subject_id', array('label' => 'Asignatura'), ['options' => $subjects]);
            echo $this->Form->input('keywords._ids', array('label' => 'Palabras Clave', 'style'=>'height: 300px'), ['options' => $keywords]);
        ?>
    </fieldset>
   	<?= $this->Form->button('Cancelar', array('type' => 'button','onclick' => 'location.href=\'../../sessions/\';')); ?>
    <?= $this->Form->button(__('Guardar')) ?>
    <?= $this->Form->end() ?>
</div>

