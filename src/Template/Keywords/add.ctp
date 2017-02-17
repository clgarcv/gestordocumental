
<div class="col-md-9 col-md-offset-2 mb-2">
    <?= $this->Form->create($keyword) ?>
    <fieldset>
        <legend><?= __('Añadir Palabra Clave') ?></legend>
        <?php
            echo $this->Form->input('nombre');
            echo $this->Form->input('sessions._ids', array('label' => 'Sesiones Prácticas', 'style'=>'height: 300px'), ['options' => $sessions]);
        ?>
    </fieldset>
    <?= $this->Form->button('Cancelar', array('type' => 'button','onclick' => 'location.href=\'../buscador\';')); ?>
    <?= $this->Form->button(__('Guardar')) ?>
    <?= $this->Form->end() ?>
</div>
