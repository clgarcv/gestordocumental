<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Subjects Controller
 *
 * @property \App\Model\Table\SubjectsTable $Subjects
 */
class SubjectsController extends AppController
{
    public function isAuthorized($user)
    {
        //return true;
        if(isset($user['role']) && $user['role'] == 2){
            if(in_array($this->request->action, array('add', 'edit', 'view', 'index'))){
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
            $this->Flash->error(__('No tiene permisos de acceso.'));
                    return $this->redirect([
                        'controller' => 'Users',
                        'action' => 'buscador'
                    ]);
        }

        if(isset($user['role']) && $user['role'] == 0){
            $this->Flash->error(__('No tiene permisos de acceso.'));
                    return $this->redirect([
                        'controller' => 'Users',
                        'action' => 'buscador'
                    ]);
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
        $subjects = $this->paginate($this->Subjects, array('limit' => 15));

        $this->set(compact('subjects'));
        $this->set('_serialize', ['subjects']);
    }

    /**
     * View method
     *
     * @param string|null $id Subject id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $subject = $this->Subjects->get($id, [
            'contain' => ['Degrees', 'Teachers', 'Sessions']
        ]);

        $this->set('subject', $subject);
        $this->set('_serialize', ['subject']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $subject = $this->Subjects->newEntity();
        if ($this->request->is('post')) {
            $subject = $this->Subjects->patchEntity($subject, $this->request->data);
            if ($this->Subjects->save($subject)) {
                $this->Flash->success(__('Asignatura añadida correctamente.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('La asignatura no se ha podido añadir. Por favor, inténtelo de nuevo.'));
            }
        }


        //mostramos solo las titulaciones de las cuales es director
        if($this->Auth->user()['role']==2){
        	$degrees = $this->Subjects->Degrees->find('list', array('conditions'=>array('Degrees.teacher_id'=>$this->Auth->user()['teacher_id']), array ('order' => 'Degrees.nombre')));
        } else {
        	$degrees = $this->Subjects->Degrees->find('list', array('order' => 'Degrees.nombre'));
        }
        $teachers = $this->Subjects->Teachers->find('list', array('order' => 'Teachers.nombre'));

 		//$this->Auth->user()['teacher_id'];

        $this->set(compact('subject', 'degrees', 'teachers'));
        $this->set('_serialize', ['subject']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Subject id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $subject = $this->Subjects->get($id, [
            'contain' => ['Degrees', 'Teachers']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $subject = $this->Subjects->patchEntity($subject, $this->request->data);
            if ($this->Subjects->save($subject)) {
                $this->Flash->success(__('Asignatura modificada correctamente.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('La asignatura no se ha podido modificar. Por favor, inténtelo de nuevo.'));
            }
        }
        $degrees = $this->Subjects->Degrees->find('list');

        $teachers = $this->Subjects->Teachers->find('list');
        $this->set(compact('subject', 'degrees', 'teachers'));
        $this->set('_serialize', ['subject']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Subject id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        //$this->request->allowMethod(['post', 'delete']);
        if ($this->request->is(['patch', 'post', 'put'])) {
	        $subject = $this->Subjects->get($id);
	        if ($this->Subjects->delete($subject)) {
	            $this->Flash->success(__('Asignatura eliminada correctamente.'));
	        } else {
	            $this->Flash->error(__('La asignatura no se ha podido eliminar. Por favor, inténtelo de nuevo.'));
	        }
	    }

        return $this->redirect(['action' => 'index']);
    }
}
