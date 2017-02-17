

<div class="col-md-9 col-md-offset-2 mb-2">
    <h3><?= h($session->codigo). ' - ' . h($session->nombre)?></h3>
    <div class="row">
        <h4><?= __('Descripción') ?></h4>
        <?= $this->Text->autoParagraph(h($session->descripcion)); ?>
    </div>
    <div class="related">
        <h4><?= __('Palabras Clave Asociadas') ?></h4>
        <?php if (!empty($session->keywords)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Nombre') ?></th>

            </tr>
            <?php foreach ($session->keywords as $keywords): ?>
            <tr>
                <td><?= h($keywords->id) ?></td>
                <td><?= $this->Html->link(__($keywords->nombre), ['controller' => 'keywords' ,'action' => 'view', $keywords->id]) ?> </td>

            </tr>
            <?php endforeach; ?>

        </table>
        <?php endif; ?>
    </div>
</div>
