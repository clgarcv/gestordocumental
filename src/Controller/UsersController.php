<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\Query;
use Cake\ORM\TableRegistry;
use Cake\View\Helper\SessionHelper;
use Cake\Core\Configure;
use Cake\Mailer\Email;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{


    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow('add');
    }


    public function login()
    {
        if($this->request->is('post'))
        {
            $user = $this->Auth->identify();
            if($user)
            {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            else
            {
                $this->Flash->error(__('Datos de inicio invalidos, por favor intentelo de nuevo.', ['key' => 'auth']));
            }
        }
        if($this->Auth->user())
        {
            //en caso de que el usuario ya este loguieado le redirigimos al buscador de sesiones
            return $this->redirect(['controller' => 'Users', 'action' => 'buscador']);
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function isAuthorized($user)
    {
        //return true;
        if(isset($user['role']) && $user['role'] == 2){
            //damos autorizacion a determinadas acciones del controlador
            if(in_array($this->request->action, array('add', 'buscador', 'logout', 'edit', 'buscarSesiones'))){
                return true;
            } else {
                if($this->Auth->user('id')){
                    $this->Flash->error(__('No tiene permisos de acceso.'));
                    return $this->redirect([
                        'controller' => 'Users',
                        'action' => 'buscador'
                    ]);
                }
            }
        }
        if(isset($user['role']) && $user['role'] == 1){
            //damos autorizacion a determinadas acciones del controlador
            if(in_array($this->request->action, array('add', 'edit', 'buscador', 'buscarSesiones','logout'))){
                return true;
            } else {
                if($this->Auth->user('id')){
                    $this->Flash->error(__('No tiene permisos de acceso.'));
                    return $this->redirect([
                        'controller' => 'Users',
                        'action' => 'buscador'
                    ]);

                }
            }
        }
        if(isset($user['role']) && $user['role'] == 0){
            //damos autorizacion a determinadas acciones del controlador
            if(in_array($this->request->action, array('add', 'edit', 'buscador', 'buscarSesiones','logout'))){
                return true;
            } else {
                if($this->Auth->user('id')){
                    $this->Flash->error(__('No tiene permisos de acceso.'));
                    return $this->redirect([
                        'controller' => 'Users',
                        'action' => 'buscador'
                    ]);

                }
            }
        }
        return parent::isAuthorized($user);
    }

    public function buscador()
    {

    	//print_r($sesiones);

    	$keyword = TableRegistry::get('Keywords');
    	$keys = $keyword->find()
                            ->select(['nombre'])->toArray();
        foreach ($keys as $k) {
        	# code...
        	$palabras[] = '"' . $k['nombre'] . '"';
        }
        $keywords = '[' . implode(',', $palabras) . ']';
        //print_r($keywords);

		//obtenemos los valores del filtro para el buscador
        $subject = TableRegistry::get('Subjects');
        $modulos = $subject->find()
                            ->select(['modulo'])
                            ->distinct(['modulo']);

        $materias = $subject->find()
                            ->select(['materia'])
                            ->distinct(['materia']);

        $cursos = $subject->find()
                            ->select(['curso'])
                            ->distinct(['curso']);

        $semestres = $subject->find()
                            ->select(['semestre'])
                            ->distinct(['semestre']);

        $asignaturas = $subject->find()
                            ->select(['nombre'])
                            ->distinct(['nombre']);


        //print_r('esta en el controlador adecuado');
        //print_r($_POST);


        //print_r($this->request->params['sessionsFiltradas']);

        //no nos pasan nada
        if(empty($_POST) || (empty($_POST['modulo']) && empty($_POST['materia']) && empty($_POST['curso']) && empty($_POST['semestre']) && empty($_POST['search'])))
        {
        	//si no recibimos ningun parametro mostramos todas las sesiones

        	$ses = TableRegistry::get('Sessions');
        	$sesiones = $ses->find('all');

        	$paginador = $this->paginate($sesiones, array('limit' => 6));
	        $this->set(compact('modulos', 'materias', 'cursos', 'semestres', 'asignaturas','keywords', 'sesiones'));
	        $this->set('_serialize', ['sesiones']);
	        //print_r("entro a post vacio");
	        //correcto


        }
        else
	    {
        	//si hay parametros comprobamos cuales y filtramos según los datos introducidos
	    	//print_r('estamos en el primer else de parametros');
        	//obtenemos los elementos del filtro
			if(!empty($_POST['modulo']))
				$modulo = $_POST['modulo'];
			else $modulo = array();
			//print_r($modulo);

			if(!empty($_POST['materia']))
				$materia = $_POST['materia'];
			else $materia = array();
			//print_r($materia);

			if(!empty($_POST['curso']))
				$curso = $_POST['curso'];
			else $curso = array();
			//print_r($curso);

			if(!empty($_POST['semestre']))
				$semestre = $_POST['semestre'];
			else $semestre = array();
			//print_r($semestre);

			//creamos las condiciones para obtener las asignaturas que cumplan el filtro
			$conditions=array();
			foreach ($modulo as $m)
			{
				$conditions[] = array('Subjects.modulo LIKE' => $m);
				//print_r($conditions);
			}

			foreach ($materia as $ma)
			{
				$conditions[] = array('Subjects.materia LIKE' => $ma);
				//print_r($conditions);
			}

			foreach ($curso as $c)
			{
				$conditions[] = array('Subjects.curso LIKE' =>  $c);
				//print_r($conditions);
			}

			foreach ($semestre as $s)
			{
				$conditions[] = array('Subjects.semestre LIKE' => $s);
				//print_r($conditions);
			}
			//print_r($conditions);

			//comprobamos si han seleccionado filtro y palabras clave
			if((!empty($_POST['modulo']) || !empty($_POST['materia']) || !empty($_POST['curso']) || !empty($_POST['semestre']) ) && (!empty($_POST['search'])))
			{
				//print_r("nos han pasado las dos cosas");
				//print_r($conditions);
				//obtenemos en un array los ids de las aignaturas q cumplen el filtro
				//obtenemos el id de las asignaturas que cumplen con el filtro
				$asig = TableRegistry::get('Subjects');
				//comprobamos si hay condiciones o no
				//si hay condiciones obtenemos los id asignaturas que las cumplen
				//print_r($conditions);
				$id_asig = $asig->find('all', array('fields' => array('Subjects.id'), 'conditions' => array('AND' => $conditions)));
				//print_r('entra en if,  hay condiciones');
				//print_r(count(array()));

				//print_r($id_asig->toArray());
				//if(isset($id_asig) ? print_r('true') : print_r('false'));

				//print_r($asignaturas);
				//hasta aqui esta bien saca las asignaturas que tienen q salir
				//creamos el array de condiones para obtener las sesiones

				//comprobar que hay asignaturas que cumplan ese criterio
				if(count($id_asig) != 0)
				{
					//print_r('entra en id_asig no vacio');
					//obtenemos los id de las asignaturas
					foreach ($id_asig as $i)
					{
						# code...
						$condicionesAsignaturas[] = array($i['id']);
					}
					//print_r($condicionesAsignaturas);


					//obtenemos los id de las sesiones q contienen las palabras clave que nos han introducido
					$search = $_POST['search'];
					$palabras = preg_split('[,]', $search);
					//print_r($palabras);

					//para cada palabra lo añadimos al array de condiciones
					foreach ($palabras as $p)
					{
						# code...
						$condicionesKeywords[] = array('Keywords.nombre LIKE' => $p);
					}

					//print_r($condicionesKeywords);

					//obtenemos el identificador de las palabras que nos han introducido
					$idKeywords = $keyword->find('all', array('fields' => array('Keywords.id'), 'conditions' => array('OR' => $condicionesKeywords )))->toArray();

					//print_r($idKeywords);

					//obtenemos las sesiones que cumplan las asignaturas y las palabras clave
					foreach ($idKeywords as $idk)
					{
						# code...
						$condicKeySes[] = array('KeywordsSessions.keyword_id LIKE' => $idk['id']);
					}


					//print_r($condicKeySes);

					//obtenemos los id de sesion que tiene relacion con las palabras introducidas
					$keyses = TableRegistry::get('KeywordsSessions');
					$palyses = $keyses->find('all', array('fields' => array('KeywordsSessions.session_id'),  'conditions' => array('OR' => $condicKeySes)))->toArray();
					//print_r($palyses);

					foreach ($palyses as $ps)
					{
						# code...
						$sesionFiltro[] = array($ps['session_id']);

					}

					//print_r($sesionFiltro);
					//print_r($condicionesAsignaturas);
					foreach ($sesionFiltro as $ss )
					{
						# code...
						$aux[] = $ss[0];
						//print_r($inIdAsig);
					}
					$inIdSes = implode(',', $aux);
					//print_r('(' . $inIdSes .')') ;

					foreach ($condicionesAsignaturas as $ca )
					{
						# code...
						$aux2[] = $ca[0];
						//print_r($inIdAsig);
					}
					$inIdAsig = implode(',', $aux2);
					//print_r('(' . $inIdAsig .')') ;

					//print_r($idAsig);

					$session = TableRegistry::get('Sessions');
					//$sesiones = $session->find('all', array('conditions' => array('Sessions.id' => $sesionFiltro , 'Sessions.subject_id' => $condicionesAsignaturas)));
					$sesiones = $session->find()
	    							  ->where(['Sessions.id IN' => $inIdSes, 'Sessions.subject_id IN' => $inIdAsig]);
	    			//print_r($sesiones);
					//print_r($sesiones->toArray());
					if(empty($sesiones))
					{
						$paginador = $this->paginate($sesiones, array('limit' => 200));
				        $this->set(compact('modulos', 'materias', 'cursos', 'semestres', 'asignaturas','keywords', 'sesiones'));
				        $this->set('_serialize', ['sesiones']);
				    }
				    else
				    {

						$paginador = $this->paginate($sesiones, array('limit' => 200));
				        $this->set(compact('modulos', 'materias', 'cursos', 'semestres', 'asignaturas','keywords', 'sesiones'));
				        $this->set('_serialize', ['sesiones']);
				    }

				} else {
					//print_r('entra en condiciones vacio');

					$session = TableRegistry::get('Sessions');
					$sesiones = array();

					$this->paginate();
					$this->set(compact('modulos', 'materias', 'cursos', 'semestres', 'asignaturas', 'sesiones','keywords'));
					$this->set('_serialize', ['sesiones']);
				}


			}
			else
			{
				//nos han filtrado unicamente por keywords
				if(!empty($_POST['search']))
				{
					//print_r("Nos han pasado keywords");

					$search = $_POST['search'];
					$palabras = preg_split('[,]', $search);
					//print_r($palabras);

					//para cada palabra lo añadimos al array de condiciones
					foreach ($palabras as $p) {
						# code...
						$condicionesKeywords[] = array('Keywords.nombre LIKE' => $p);
					}

					//print_r($condicionesKeywords);

					//obtenemos el identificador de las palabras que nos han introducido
					$idKeywords = $keyword->find('all', array('fields' => array('Keywords.id'), 'conditions' => array('OR' => $condicionesKeywords )))->toArray();

					//print_r($idKeywords);

					//obtenemos las sesiones que cumplan las asignaturas y las palabras clave
					foreach ($idKeywords as $idk) {
						# code...
						$condicKeySes[] = array('KeywordsSessions.keyword_id LIKE' => $idk['id']);
					}

					//print_r($condicKeySes);


					//obtenemos los id de sesion que tiene relacion con las palabras introducidas
					if(count($id_condicKeySesasig) != 0)
					{
						$keyses = TableRegistry::get('KeywordsSessions');
						$palyses = $keyses->find('all', array('fields' => array('KeywordsSessions.session_id'),  'conditions' => array('OR' => $condicKeySes)))->toArray();
						//print_r($palyses);
						foreach ($palyses as $ps) {
							# code...
							$sesionFiltro[] = array('Sessions.id LIKE' => $ps['session_id']);

						}
						//print_r($sesionFiltro);
						//obtenemos las sesiones con las dos condiciones, filtro y keywords
						$session = TableRegistry::get('Sessions');
						$sesiones = $session->find('all', array('conditions' => array('OR' => $sesionFiltro)));


						$paginador = $this->paginate($sesiones, array('limit' => 150));
				        $this->set(compact('modulos', 'materias', 'cursos', 'semestres', 'asignaturas','keywords', 'sesiones'));
				        $this->set('_serialize', ['sesiones']);

					}
					else
					{
						$session = TableRegistry::get('Sessions');
						$sesiones = array();

						$this->paginate();
						$this->set(compact('modulos', 'materias', 'cursos', 'semestres', 'asignaturas', 'sesiones','keywords'));
						$this->set('_serialize', ['sesiones']);

					}



				}

				//nos han filtrado unicamente por asignatura
				if(!empty($_POST['modulo']) || !empty($_POST['materia']) || !empty($_POST['curso'])|| !empty($_POST['semestre'])) {
					//print_r("Nos han pasado filtro");

					//obtenemos el id de las asignaturas que cumplen con el filtro
					$asig = TableRegistry::get('Subjects');
					//comprobamos si hay condiciones o no
						//si hay condiciones obtenemos los id asignaturas que las cumplen
					//print_r($conditions);
					$id_asig = $asig->find('all', array('fields' => array('Subjects.id'), 'conditions' => array('AND' => $conditions)))->toArray();

					//print_r($id_asig);
					//print_r($asignaturas);
					//hasta aqui esta bien saca las asignaturas que tienen q salir
					//creamos el array de condiones para obtener las sesiones
					//comprobar que hay asignaturas que cumplan ese criterio
					if(count($id_asig) != 0){

						foreach ($id_asig as $i) {
						# code...
						$condicionesAsignaturas[] = array('Sessions.subject_id LIKE' => $i['id']);
						}
						//print_r('condiciones asignaturas no vacio');

						$session = TableRegistry::get('Sessions');
						$sesiones = $session->find('all', array('conditions' => array('OR' => $condicionesAsignaturas)));

						$paginador = $this->paginate($sesiones, array('limit' => 150));
						$this->set(compact('modulos', 'materias', 'cursos', 'semestres', 'asignaturas', 'sesiones','keywords'));
						$this->set('_serialize', ['sesiones']);

					}
					else
					{
						$session = TableRegistry::get('Sessions');
						$sesiones = array();

						$this->paginate();
						$this->set(compact('modulos', 'materias', 'cursos', 'semestres', 'asignaturas', 'sesiones','keywords'));
						$this->set('_serialize', ['sesiones']);

					}



				}
			}
			//poner estas lineas en cada caso...
	        //$this->set(compact('modulos', 'materias', 'cursos', 'semestres', 'asignaturas', 'sesiones','keywords'));
			//$this->set('_serialize', ['sesiones']);


        }


    }


    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Teachers']
        ];
        $users = $this->paginate($this->Users, array('limit' => 15));

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Teachers']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $teacher = TableRegistry::get('Teachers');
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Usuario añadido correctamente.'));
                $data = $this->request->data();
                $teacher_id = $data['teacher_id'];
                $query = $teacher->query();
                $query->update()
                    ->set(['hasUser' => 1])
                    ->where(['id' => $teacher_id])
                    ->execute();

				/*$email = new Email('default');
				$email->from(['soporte.practicas@unirioja.es' => 'My Site'])
				    ->to('soporte.practicas@unirioja.es')
				    ->subject('About')
				    ->send('Prueba');
				    */


                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('El usuario no se ha podido añadir. Por favor, inténtelo de nuevo.'));
            }
        }
        $teachers = $this->Users->Teachers->find('list', array('conditions'=>array('Teachers.hasUser'=>0), 'order' => array('Teachers.apellidos')));
        $this->set(compact(['user', 'teachers']));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Usuario modificado correctamente.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El usuario no se ha podido modificar. Por favor, inténtelo de nuevo.'));
        }
        $roles = array('Usuario básico', 'Usuario avanzado', 'Administrador', 'Súper administrador');
        $teachers = $this->Users->Teachers->find('list', array('conditions'=>array('Teachers.hasUser'=>0), 'order' => array('Teachers.apellidos')));
        $this->set(compact('user', 'teachers', 'roles'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
    	$teacher = TableRegistry::get('Teachers');
        //$this->request->allowMethod(['post', 'delete']);
        if ($this->request->is(['patch', 'post', 'put'])) {
	        $user = $this->Users->get($id);
	        $data = $this->request->data();
            $teacher_id = $user['teacher_id'];
            print_r($teacher_id);

	        if ($this->Users->delete($user)) {
	        	$query = $teacher->query();
                $query->update()
                    ->set(['hasUser' => 0])
                    ->where(['id' => $teacher_id])
                    ->execute();
	            $this->Flash->success(__('Usuario eliminado correctamente.'));
	        } else {
	            $this->Flash->error(__('El usuario no se ha podido eliminar. Por favor, inténtelo de nuevo.'));
	        }
	    }

        return $this->redirect(['action' => 'index']);
    }

}
