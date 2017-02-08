<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\Query;
use Cake\ORM\TableRegistry;


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
        $subject = TableRegistry::get('Subjects');
        $modulos = $subject->find()
                            ->select(['modulo'])
                            ->distinct(['modulo']);

        $materias = $subject->find()
                            ->select(['materia'])
                            ->distinct(['materia']);

        $cursos = $subject->find()
                            ->select(['curso'])
                            ->distinct(['curso'])
                            ->toList();

        $semestres = $subject->find()
                            ->select(['semestre'])
                            ->distinct(['semestre']);
        $asignaturas = $subject->find()
                            ->select(['nombre']);

        $session = TableRegistry::get('Sessions');
        $sesiones = $session->find();
        $sesPag = $this->paginate($sesiones, array('limit' => 6));

        $this->set(compact('modulos', 'materias', 'cursos', 'semestres', 'asignaturas', 'sesiones', 'totSes', 'sesPag'));

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
        $this->set(compact('user'));
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
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('Usuario eliminado correctamente.'));
        } else {
            $this->Flash->error(__('El usuario no se ha podido eliminar. Por favor, inténtelo de nuevo.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
