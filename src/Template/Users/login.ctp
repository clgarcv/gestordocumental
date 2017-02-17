<div class="login">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-xs-4-offset-2">
                <?= $this->Html->image('UR.jpeg', array('alt' => 'Universidad de La Rioja', 'class' => 'img-responsive'));?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-xs-4-offset-2">
            <?= $this->Flash->render('auth') ?>
                    <div class="panel-body">
                        <?= $this->Form->create() ?>
                        <fieldset>
                            <div class="form-group">
                                <?= $this->Form->input('username', ['class' => 'form-control input-lg', 'placeholder' => 'Usuario', 'label' => false, 'required']) ?>

                            </div>
                            <div class="form-group">
                                <?= $this->Form->password('password', ['class' => 'form-control input-lg', 'placeholder' => 'Contraseña', 'label' => false, 'required']) ?>
                            </div>
                            <?= $this->Html->link(__('Registrarse'), ['controller' => 'Users', 'action' => 'add']) ?>

                            <?= $this->Form->button('Entrar', ['class' => 'btn btn-lg btn-success btn-block']) ?>

                        </fieldset>
                        <?= $this->Form->end() ?>
                    </div>
            </div>
        </div>
    </div>
</div>