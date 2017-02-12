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
    	$keywords = $keyword->find()
                            ->select(['nombre'])->toArray();

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
        print_r($_POST);


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
	        print_r("entro a post vacio");
	        //correcto


        }
        else
	    {
        	//si hay parametros comprobamos cuales y filtramos según los datos introducidos
	    	print_r('estamos en el primer else de parametros');
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

			//obtenemos el id de las asignaturas que cumplen con el filtro
			$asig = TableRegistry::get('Subjects');
			//comprobamos si hay condiciones o no
			if(!empty($conditions)){
				//si hay condiciones obtenemos los id asignaturas que las cumplen
				$id_asig = $asig->find('all', array('fields' => array('Subjects.id'), 'conditions' => array('AND' => $conditions)))->toArray();
				//print_r('entra en if,  hay condiciones');
			}
			else {
				//si no obtenemos todos los id
				$id_asig = $asig->find('all', array('fields' => array('Subjects.id')))->toArray();
				//print_r('entra en else, no hay condiciones');
			}
			//print_r($asignaturas);
			//hasta aqui esta bien saca las asignaturas que tienen q salir
			//creamos el array de condiones para obtener las sesiones

			foreach ($id_asig as $i) {
				# code...
				$condicionesAsignaturas[] = array('Sessions.subject_id LIKE' => $i['id']);
				}

			$session = TableRegistry::get('Sessions');

			//obtenemos las palabras clave introducidas en el input
			if(!empty($_POST['search'])){
				//si han introducido palabras clave obtenemos las sesiones relacionadas con esas palabras clave

				$search = $_POST['search'];
				$palabras = preg_split('[,]', $search);
				//print_r($palabras);

				//para cada palabra lo añadimos al array de condiciones
				foreach ($palabras as $p) {
					# code...
					$condicionesKeywords[] = array('Keywords.nombre LIKE' => $p);
				}

				//print_r($conditions2);

				//obtenemos el identificador de las palabras que nos han introducido
				$idKeywords = $keyword->find('all', array('fields' => array('Keywords.id'), 'conditions' => array('OR' => $condicionesKeywords )))->toArray();

				//obtenemos las sesiones que cumplan las asignaturas y las palabras clave
				foreach ($idKeywords as $idk) {
					# code...
					$condicKeySes[] = array('KeywordsSessions.keyword_id LIKE' => $idk);
				}

				//obtenemos los id de sesion que tiene relacion con las palabras introducidas
				$keyses = TableRegistry::get('KeywordsSessions');
				$palyses = $keyses->find('all', array('fields' => array('Sessions.id'),  'conditions' => array('OR' => $condicKeySes)))->toArray();
				//print_r($palyses);
				foreach ($palyses as $ps) {
					# code...
					$sesionFiltro[] = array('Sessions.id LIKE' => $ps);

				}

				//obtenemos las sesiones con las dos condiciones, filtro y keywords

				$sesiones = $session->find('all', array('conditions' => array('OR' => $condicionesAsignaturas)))->toArray();


				print_r($sesiones1);




			}
			else {
				//si no nos han introducido palabras clave mostramos las sesiones
				//sesiones que correspondan a las asignaturas

				$sesiones = $session->find('all', array('conditions' => array('AND' => array('OR' => $sesionFiltro) , 'OR' => $condicionesAsignaturas)))->toArray();


			}



	        $this->set(compact('modulos', 'materias', 'cursos', 'semestres', 'asignaturas', 'sesiones','keywords'));
			$this->set('_serialize', ['sesiones']);


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

                return $this->redirect(['action' => 'buscador']);
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
        //$this->request->allowMethod(['post', 'delete']);
        if ($this->request->is(['patch', 'post', 'put'])) {
	        $user = $this->Users->get($id);
	        if ($this->Users->delete($user)) {
	            $this->Flash->success(__('Usuario eliminado correctamente.'));
	        } else {
	            $this->Flash->error(__('El usuario no se ha podido eliminar. Por favor, inténtelo de nuevo.'));
	        }
	    }

        return $this->redirect(['action' => 'index']);
    }

}
