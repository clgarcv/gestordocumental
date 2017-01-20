<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SubjectsSubjects Controller
 *
 * @property \App\Model\Table\SubjectsSubjectsTable $SubjectsSubjects
 */
class SubjectsSubjectsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $subjectsSubjects = $this->paginate($this->SubjectsSubjects);

        $this->set(compact('subjectsSubjects'));
        $this->set('_serialize', ['subjectsSubjects']);
    }

    /**
     * View method
     *
     * @param string|null $id Subjects Subject id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $subjectsSubject = $this->SubjectsSubjects->get($id, [
            'contain' => []
        ]);

        $this->set('subjectsSubject', $subjectsSubject);
        $this->set('_serialize', ['subjectsSubject']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $subjectsSubject = $this->SubjectsSubjects->newEntity();
        if ($this->request->is('post')) {
            $subjectsSubject = $this->SubjectsSubjects->patchEntity($subjectsSubject, $this->request->data);
            if ($this->SubjectsSubjects->save($subjectsSubject)) {
                $this->Flash->success(__('The subjects subject has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The subjects subject could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('subjectsSubject'));
        $this->set('_serialize', ['subjectsSubject']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Subjects Subject id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $subjectsSubject = $this->SubjectsSubjects->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $subjectsSubject = $this->SubjectsSubjects->patchEntity($subjectsSubject, $this->request->data);
            if ($this->SubjectsSubjects->save($subjectsSubject)) {
                $this->Flash->success(__('The subjects subject has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The subjects subject could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('subjectsSubject'));
        $this->set('_serialize', ['subjectsSubject']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Subjects Subject id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $subjectsSubject = $this->SubjectsSubjects->get($id);
        if ($this->SubjectsSubjects->delete($subjectsSubject)) {
            $this->Flash->success(__('The subjects subject has been deleted.'));
        } else {
            $this->Flash->error(__('The subjects subject could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
