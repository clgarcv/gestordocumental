
<!-- File: src/Template/Users/login.ctp -->
<!-- 
<div class="users form">
<?= $this->Flash->render('auth') ?>
<?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Inicio de sesión') ?></legend>
        <?= $this->Form->input('username') ?>
        <?= $this->Form->input('password') ?>
    </fieldset>
<?= $this->Form->button(__('Entrar')); ?>
<?= $this->Form->end() ?>
</div>
-->
<div class="login"> 
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-4-offset-4 col-xs-4-offset-2">
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
                            <!--label><a href="#">Recordar contraseña</a></label>
                            <!--div class="checkbox">
                                <label>
                                    <input name="remember" type="checkbox" value="Remember Me"> Recuerdamé
                                </label>
                            </div-->
                            <?= $this->Form->button('Entrar', ['class' => 'btn btn-lg btn-success btn-block']) ?>
                            <!--?= $this->Html->link('Registrarse',['controller' => 'Users', 'action' => 'add'], ['class' => 'col-xs-6 col-sm-6 col-md-6']) ?-->
                        </fieldset>
                        <?= $this->Form->end() ?>
                    </div>
            </div>
        </div>
    </div>
</div>