<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\Query;
use Cake\ORM\TableRegistry;

/**
 * Sessions Controller
 *
 * @property \App\Model\Table\SessionsTable $Sessions
 */
class SessionsController extends AppController
{

	public function buscarSesion()
	{
		/*
        $this->loadComponent('Paginator');
        $query = $this->Users->find();

        $resultados = $this->paginate($query);

        $this->set(compact('resultados'));
        $this->autoRender = false;

		$busqueda = null;
		if(!empty($this->request->query['busqueda']))
		{
			$busqueda = $this->request->query['busqueda'];
			//$busqueda = preg_replace('', '', $busqueda);
			$sesions = explode(' ', trim($busqueda));
			$sesions = array_diff($sesions, array(''));
			foreach ($sesions as $s) {
				$sesions1 = preg_replace('', '', 's');
				$conditions = array();
			}
		}
		*/

		//print_r($_POST);
		//obtenemos los elementos del filtro
		if(!empty($_POST['modulo']))
			$modulo = $_POST['modulo'];
		else $modulo = array();

		if(!empty($_POST['materia']))
			$materia = $_POST['materia'];
		else $materia = array();

		if(!empty($_POST['curso']))
			$curso = $_POST['curso'];
		else $curso = array();

		if(!empty($_POST['semestre']))
			$semestre = $_POST['semestre'];
		else $semestre = array();

		if(!empty($_POST['search']))
			$search = $_POST['search'];
		else $search = "";

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


		$asig = TableRegistry::get('Subjects');
		//$conditions[] = array('Subjects.modulo LIKE' => '%' . $condicionModulo . '%','Subjects.materia LIKE' => '%' . $condicionMateria . '%', 'Subjects.curso LIKE' => '%' . $condicionCurso . '%', 'Subjects.semestre LIKE' => '%' . $condicionSemestre . '%');
		//print_r($conditions);

		//comprobamos si hay condiciones o no
		if(isset($conditions)){
			$asignaturas = $asig->find('all', array('fields' => array('Subjects.id')))->toArray();

		} else {
			$asignaturas = $asig->find('all', array('fields' => array('Subjects.id'), 'conditions' => array('OR' => $conditions)))->toArray();
		}


        foreach ($asignaturas as $a) {
        	# code...
        	//print_r($a['id']);
        	$conditions2[] = array('Sessions.subject_id LIKE' => $a['id']);
        }
        //print_r($conditions2);
        $ses = TableRegistry::get('Sessions');
        $sessionsFiltradas = $ses->find('all',array('conditions' => array('OR' => $conditions2)));
        //print_r($sessionsFiltradas->toArray());
        //$sesiones = $sessionsFiltradas;
        //print_r($sesiones);



		//$session = TableRegistry::get('Sessions');
        //$sesiones = $session->find('all','conditions' => array('OR' => $conditions2));
        //$sesPag = $this->paginate($sesiones);
        //$sesPag = $this->paginate($sesiones, array('limit' => 6));

        //$this->set(compact('sesiones'));
        $this->set('sesionesFiltradas', $sessionsFiltradas);
		$this->redirect(array('controller' => 'users', 'action' => 'buscador'));


        //print_r($asignaturas[0]['id']);




/*
		$condicionModulo='';
		$condicionMateria='';
		$condicionCurso='';
		$condicionSemestre='';

		//print_r(count($modulo));

		//recorremos cada array para crear la condicion de la consulta
		for ($i=0; $i < count($modulo); $i++) {
			# code...
			if($i == 0){
				$condicionModulo =  $modulo[$i];
			} else {
				$condicionModulo =  $condicionModulo . ' OR '. $modulo[$i];
			}

		}
		print_r($condicionModulo);

		for ($i=0; $i < count($materia); $i++) {
			# code...
			if($i == 0){
				$condicionMateria =  $materia[$i];
			} else {
				$condicionMateria =  $condicionMateria . ' OR '. $materia[$i];
			}

		}
		print_r($condicionMateria);

		for ($i=0; $i < count($curso); $i++) {
			# code...
			if($i == 0){
				$condicionCurso =  $curso[$i];
			} else {
				$condicionCurso =  $condicionCurso . ' OR '. $curso[$i];
			}

		}
		print_r($condicionCurso);

		for ($i=0; $i < count($semestre); $i++) {
			# code...
			if($i == 0){
				$condicionSemestre =  $semestre[$i];
			} else {
				$condicionSemestre =  $condicionSemestre . ' OR '. $semestre[$i];
			}

		}
		print_r($condicionSemestre); */





        //$sesiones = $session->find();
        //$sesPag = $this->paginate($sesiones, array('limit' => 6));


		$this->autoRender = false;


    }

    public function isAuthorized($user)
    {
        //Administrador
        if(isset($user['role']) && $user['role'] == 2){
            //damos autorizacion a determinadas acciones del controlador
            if(in_array($this->request->action, array('add', 'edit', 'index', 'view'))){
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
        //usuario avanzado
        if(isset($user['role']) && $user['role'] == 1){
            //damos autorizacion a determinadas acciones del controlador
            if(in_array($this->request->action, array('add', 'edit', 'index', 'view'))){
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
        //usuario basico
        if(isset($user['role']) && $user['role'] == 0){
            //damos autorizacion a determinadas acciones del controlador
            if(in_array($this->request->action, array('index', 'view'))){
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

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        //$sessions = $this->paginate($this->Sessions, array('limit' => 15));
        $this->paginate = [
            'contain' => ['Subjects']
        ];
        $sessions = $this->paginate($this->Sessions);

        $this->set(compact('sessions'));
        $this->set('_serialize', ['sessions']);
    }

    /**
     * View method
     *
     * @param string|null $id Session id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $session = $this->Sessions->get($id, [
            'contain' => ['Subjects', 'Keywords']
        ]);

        $this->set('session', $session);
        $this->set('_serialize', ['session']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $session = $this->Sessions->newEntity();
        if ($this->request->is('post')) {
            $session = $this->Sessions->patchEntity($session, $this->request->data);
            if ($this->Sessions->save($session)) {
                $this->Flash->success(__('Sesión añadida correctamente.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('La sesión no se ha podido añadir. Por favor, inténtelo de nuevo.'));
            }
        }
        $subjects = $this->Sessions->Subjects->find('list', ['order'=>'Subjects.nombre']);
        $keywords = $this->Sessions->Keywords->find('list', ['order'=>'Keywords.nombre']);
        $this->set(compact('session', 'subjects', 'keywords'));
        $this->set('_serialize', ['session']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Session id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $session = $this->Sessions->get($id, [
            'contain' => ['Keywords']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $session = $this->Sessions->patchEntity($session, $this->request->data);
            if ($this->Sessions->save($session)) {
                $this->Flash->success(__('Sesión modificada correctamente.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('La sesión no se ha podido modificar. Por favor, inténtelo de nuevo.'));
            }
        }
 		$subjects = $this->Sessions->Subjects->find('list', ['order'=>'Subjects.nombre']);
        $keywords = $this->Sessions->Keywords->find('list', ['order'=>'Keywords.nombre']);

        $this->set(compact('session', 'subjects', 'keywords'));
        $this->set('_serialize', ['session']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Session id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        //$this->request->allowMethod(['post', 'delete']);
        if ($this->request->is(['patch', 'post', 'put'])) {
	        $session = $this->Sessions->get($id);
	        if ($this->Sessions->delete($session)) {
	            $this->Flash->success(__('Sesión eliminada correctamente.'));
	        } else {
	            $this->Flash->error(__('La sesión no se ha podido eliminar. Por favor, inténtelo de nuevo.'));
	        }
	    }

        return $this->redirect(['action' => 'index']);
    }
}
