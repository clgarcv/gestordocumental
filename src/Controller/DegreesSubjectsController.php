<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DegreesSubjects Controller
 *
 * @property \App\Model\Table\DegreesSubjectsTable $DegreesSubjects
 */
class DegreesSubjectsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Degrees', 'Subjects']
        ];
        $degreesSubjects = $this->paginate($this->DegreesSubjects);

        $this->set(compact('degreesSubjects'));
        $this->set('_serialize', ['degreesSubjects']);
    }

    /**
     * View method
     *
     * @param string|null $id Degrees Subject id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $degreesSubject = $this->DegreesSubjects->get($id, [
            'contain' => ['Degrees', 'Subjects']
        ]);

        $this->set('degreesSubject', $degreesSubject);
        $this->set('_serialize', ['degreesSubject']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $degreesSubject = $this->DegreesSubjects->newEntity();
        if ($this->request->is('post')) {
            $degreesSubject = $this->DegreesSubjects->patchEntity($degreesSubject, $this->request->data);
            if ($this->DegreesSubjects->save($degreesSubject)) {
                $this->Flash->success(__('The degrees subject has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The degrees subject could not be saved. Please, try again.'));
            }
        }
        $degrees = $this->DegreesSubjects->Degrees->find('list', ['limit' => 200]);
        $subjects = $this->DegreesSubjects->Subjects->find('list', ['limit' => 200]);
        $this->set(compact('degreesSubject', 'degrees', 'subjects'));
        $this->set('_serialize', ['degreesSubject']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Degrees Subject id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $degreesSubject = $this->DegreesSubjects->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $degreesSubject = $this->DegreesSubjects->patchEntity($degreesSubject, $this->request->data);
            if ($this->DegreesSubjects->save($degreesSubject)) {
                $this->Flash->success(__('The degrees subject has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The degrees subject could not be saved. Please, try again.'));
            }
        }
        $degrees = $this->DegreesSubjects->Degrees->find('list', ['limit' => 200]);
        $subjects = $this->DegreesSubjects->Subjects->find('list', ['limit' => 200]);
        $this->set(compact('degreesSubject', 'degrees', 'subjects'));
        $this->set('_serialize', ['degreesSubject']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Degrees Subject id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $degreesSubject = $this->DegreesSubjects->get($id);
        if ($this->DegreesSubjects->delete($degreesSubject)) {
            $this->Flash->success(__('The degrees subject has been deleted.'));
        } else {
            $this->Flash->error(__('The degrees subject could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
