<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-6 col-sm-3">
            <div class="well">
                <div id="accordion">    
                <div class="panel-body" >

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
                                <input type="checkbox" value="" name='<?= $m['modulo'] ?>'>
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
                                <input type="checkbox" value="">
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
                          <li class="list-group-item">
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" value="">
                                Primero
                              </label>
                            </div>
                          </li>
                          <li class="list-group-item">
                            <div class="checkbox" >
                              <label>
                                <input type="checkbox" value="">
                                Segundo
                              </label>
                            </div>
                          </li>
                          <li class="list-group-item">
                            <div class="checkbox"  >
                              <label>
                                <input type="checkbox" value="">
                                Tercero
                              </label>
                            </div>
                          </li>
                          <li class="list-group-item">
                            <div class="checkbox"  >
                              <label>
                                <input type="checkbox" value="">
                                Cuarto
                              </label>
                            </div>
                          </li>
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
                          <li class="list-group-item">
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" value="">
                                Primero
                              </label>
                            </div>
                          </li>
                          <li class="list-group-item">
                            <div class="checkbox" >
                              <label>
                                <input type="checkbox" value="">
                                Segundo
                              </label>
                            </div>
                          </li>
                          <li class="list-group-item">
                            <div class="checkbox"  >
                              <label>
                                <input type="checkbox" value="">
                                Anual
                              </label>
                            </div>
                          </li>
                        </ul>
                      </div>


                      <div class="panel-heading " >
                        <h4 class="panel-title">
                          <a data-toggle="collapse" href="#collapse4">
                            <i class="indicator fa fa-caret-down" aria-hidden="true"></i> Asignatura
                          </a>
                        </h4>
                      </div>
                      <div id="collapse4" class="panel-collapse collapse" >
                        <ul class="list-group">
                          <?php foreach ($asignaturas as $a): ?>
                          
                          <li class="list-group-item">
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" value="">
                                <?= $a['nombre'] ?>
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
        
        <?= $this->Form->create('Keyword', array ('type' => 'GET', 'class' => 'form-search', 'url' => array('controller' => 'users', 'action' => 'buscar'))); ?>
         <div class="form-group">
           <?= $this->Form->input('search', array ('label' => false, 'div' => false, 'id' => 's', 'class' => 'form-control s', 'autocomplete' => 'off', 'placeholder'=> 'Palabras clave....')); ?>
          </div>

              <!-- <input type="text" class="input-medium search-query busqueda" name="s" placeholder="Palabras clave...." value=""> -->

              <!--<?= $this->Html->link('',
                        array('controller' => 'users', 'action' => 'logout'), array('type' => 'button', 'class' => 'button glyphicon glyphicon-search'))?> </li>
                        -->
          <?= $this->Form->button($this->Html->link('' ,array('controller' => 'users', 'action' => 'buscador'), array('class' => 'glyphicon glyphicon-search'))) ?>
          <?php echo $this->Form->end(); ?>
              

         
           

    <div class="page-header">
        <h3>Sesiones encontradas....</h3>
    </div>

    <?php $i=0; ?>
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

    </div> 

    
  </div>
  <div class="row">
  <div class="col-xs-6 col-xs-offset-6 col-sm-8 col-sm-offset3">
        
          <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('Primera')) ?>
            <?= $this->Paginator->prev('< ' . __('Anterior'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a')) ?>
          </ul>
          <?= $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1)) ?>
          <ul class="pagination">
            <?= $this->Paginator->next(__('Siguiente') . ' >', array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a')) ?>
            <?= $this->Paginator->last(__('Última') . ' >>') ?>
          </ul>
          <p><?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}, mostrando {{current}} sesiones de {{count}} totales')]) ?></p>
      
      </div>
      </div>
</div>



