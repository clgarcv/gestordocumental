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

    public function isAuthorized($user)
    {
        //Administrador
        if(isset($user['role']) && $user['role'] == 2){
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
        $sessions = $this->paginate($this->Sessions, array('limit' => 15));

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
