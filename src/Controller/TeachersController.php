<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Teachers Controller
 *
 * @property \App\Model\Table\TeachersTable $Teachers
 */
class TeachersController extends AppController
{

    public function isAuthorized($user)
    {
        //unicamente tendra permisos los super administrador
        return parent::isAuthorized($user);
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $teachers = $this->paginate($this->Teachers, array('limit' => 15));

        $this->set(compact('teachers'));
        $this->set('_serialize', ['teachers']);
    }



    /**
     * View method
     *
     * @param string|null $id Teacher id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $teacher = $this->Teachers->get($id, [
            'contain' => ['Subjects', 'Users']
        ]);

        $this->set('teacher', $teacher);
        $this->set('_serialize', ['teacher']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $teacher = $this->Teachers->newEntity();
        if ($this->request->is('post')) {
            $teacher = $this->Teachers->patchEntity($teacher, $this->request->data);
            if ($this->Teachers->save($teacher)) {
                $this->Flash->success(__('Profesor añadido correctamente.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('El profesor no se ha podido añadir. Por favor, inténtelo de nuevo.'));
            }
        }
        $subjects = $this->Teachers->Subjects->find('list');
        $this->set(compact('teacher', 'subjects'));
        $this->set('_serialize', ['teacher']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Teacher id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $teacher = $this->Teachers->get($id, [
            'contain' => ['Subjects']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $teacher = $this->Teachers->patchEntity($teacher, $this->request->data);
            if ($this->Teachers->save($teacher)) {
                $this->Flash->success(__('Profesor modificado correctamente.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('El profesor no se ha podido modificar. Por favor, inténtelo de nuevo.'));
            }
        }
        $subjects = $this->Teachers->Subjects->find('list');
        $this->set(compact('teacher', 'subjects'));
        $this->set('_serialize', ['teacher']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Teacher id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        //$this->request->allowMethod(['post', 'delete']);
        if ($this->request->is(['patch', 'post', 'put'])) {
	        $teacher = $this->Teachers->get($id);
	        if ($this->Teachers->delete($teacher)) {
	            $this->Flash->success(__('Profesor eliminado correctamente.'));
	        } else {
	            $this->Flash->error(__('El profesor no se ha podido eliminar. Por favor, inténtelo de nuevo.'));
	        }
	    }

        return $this->redirect(['action' => 'index']);
    }
}
