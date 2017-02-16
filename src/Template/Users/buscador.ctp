<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
<script> keywordList = json_encode($keywords, JSON_UNESCAPED_UNICODE)</script>"
<div class="container-fluid mb-2">
    <div class="row">
        <div class="col-xs-6 col-sm-3">
            <div class="well">
                <div id="accordion">
                <div class="panel-body">
				<form method="post" accept-charset="utf-8" class="form-search" role="form" action="/gestordocumental/users/buscador">
				<div style="display:none;">
					<input type="hidden" name="_method" value="POST"/>
				</div>
                    <div class="panel-heading " >
                        <h4 class="panel-title">
                          <a data-toggle="collapse" href="#collapse0">
                            <i class="indicator fa fa-caret-down" aria-hidden="true"></i> Módulo
                          </a>
                        </h4>
                      </div>
                      <div id="collapse0" class="panel-collapse collapse" >
                        <ul class="list-group">
                          <?php foreach ($modulos as $m): ?>

                          <li class="list-group-item">
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" value="<?= $m['modulo']?>" name='modulo[]'>
                                <?= $m['modulo'] ?>
                              </label>
                            </div>
                          </li>
                          <?php endforeach; ?>

                        </ul>
                      </div>


                      <div class="panel-heading " >
                        <h4 class="panel-title">
                          <a data-toggle="collapse" href="#collapse1">
                            <i class="indicator fa fa-caret-down" aria-hidden="true"></i> Materia
                          </a>
                        </h4>
                      </div>
                      <div id="collapse1" class="panel-collapse collapse" >
                        <ul class="list-group">
                          <?php foreach ($materias as $m): ?>
                          <li class="list-group-item">
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" value="<?= $m['materia'] ?>" name='materia[]'>
                                <?= $m['materia'] ?>
                              </label>
                            </div>
                          </li>
                          <?php endforeach; ?>
                        </ul>
                      </div>

                      <div class="panel-heading " >
                        <h4 class="panel-title">
                          <a data-toggle="collapse" href="#collapse2">
                            <i class="indicator fa fa-caret-down" aria-hidden="true"></i> Curso
                          </a>
                        </h4>
                      </div>
                      <div id="collapse2" class="panel-collapse collapse" >
                        <ul class="list-group">
                        <?php foreach (array('PRIMERO', 'SEGUNDO', 'TERCERO', 'CUARTO') as $c): ?>
                          <li class="list-group-item">
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" value="<?= $c?>" name='curso[]'>
                                <?= $c ?>
                              </label>
                            </div>
                          </li>
                          <?php endforeach; ?>
                        </ul>
                      </div>

                      <div class="panel-heading " >
                        <h4 class="panel-title">
                          <a data-toggle="collapse" href="#collapse3">
                            <i class="indicator fa fa-caret-down" aria-hidden="true"></i> Semestre
                          </a>
                        </h4>
                      </div>
                      <div id="collapse3" class="panel-collapse collapse" >
                        <ul class="list-group">
                          <?php foreach (array('PRIMERO', 'SEGUNDO', 'ANUAL') as $sem): ?>
                          <li class="list-group-item">
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" value="<?= $sem?>" name='semestre[]'>
                                <?= $sem ?>
                              </label>
                            </div>
                          </li>
                          <?php endforeach; ?>
                        </ul>
                      </div>

                </div>
              </div>
          </div>
        </div>
    <div class="col-xs-6 col-sm-8">

         <div class="form-group">
           <?= $this->Form->input('search', array ('label' => false, 'id' => 's', 'autocomplete' => 'off', 'placeholder'=> 'Palabras clave....')); ?>

         </div>

              <!-- <input type="text" class="input-medium search-query busqueda" name="s" placeholder="Palabras clave...." value=""> -->

              <!--<?= $this->Html->link('',
                        array('controller' => 'users', 'action' => 'logout'), array('type' => 'button', 'class' => 'button glyphicon glyphicon-search'))?> </li>
                        -->
          <?= $this->Form->button('', array('class' => 'glyphicon glyphicon-search')) ?>
          <?php echo $this->Form->end(); ?>





    <div class="page-header">
    <?php if (!empty($sesiones)): ?>
        <h3>Sesiones encontradas....</h3>
    <?php endif; ?>
    <?php if (empty($sesiones)): ?>
        <h3>No hay sesiones para mostrar... Por favor, realice otra búsqueda</h3>
    <?php endif; ?>
    </div>

    <?php $i=0; ?>
	 <?php if (!empty($sesiones)): ?>
	      <?php foreach ($sesiones as $s): ?>
	        <?php if ($i == 0): ?>
	          <div class="row grid-divider">
	        <?php endif; ?>
	        <div class="col-sm-4">
	          <div class="col-padding">
	            <h3><?= $this->Html->link($s['nombre'] ,
	                    array('controller' => 'sessions', 'action' => 'view', $s['id'] ))?></h3>
	            <p><?= $s['descripcion'] ?></p>
	          </div>
	        </div>
	        <?php $i++; ?>
	        <?php if ($i ==3): ?>
	        </div>
	        <?php $i=0; ?>
	        <?php endif; ?>
	      <?php endforeach; ?>
	<?php endif; ?>
    </div>


  </div>
<?php if (!empty($sesiones)): ?>
  <div class="row">
  	<div class="col-xs-6 col-xs-offset-3">

          <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('Primera')) ?>
            <?= $this->Paginator->prev('< ' . __('Anterior'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a')) ?>
          </ul>
          <?= $this->Paginator->numbers() ?>
          <ul class="pagination">
            <?= $this->Paginator->next(__('Siguiente') . ' >', array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a')) ?>
            <?= $this->Paginator->last(__('Última') . ' >>') ?>
          </ul>
        <p><?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}, mostrando {{current}} sesiones de {{count}} totales')]) ?></p>



		</div>
    </div>
<?php endif; ?>
</div>



