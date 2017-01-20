<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Degrees Controller
 *
 * @property \App\Model\Table\DegreesTable $Degrees
 */
class DegreesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $degrees = $this->paginate($this->Degrees);

        $this->set(compact('degrees'));
        $this->set('_serialize', ['degrees']);
    }

    /**
     * View method
     *
     * @param string|null $id Degree id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $degree = $this->Degrees->get($id, [
            'contain' => ['Subjects']
        ]);

        $this->set('degree', $degree);
        $this->set('_serialize', ['degree']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $degree = $this->Degrees->newEntity();
        if ($this->request->is('post')) {
            $degree = $this->Degrees->patchEntity($degree, $this->request->data);
            if ($this->Degrees->save($degree)) {
                $this->Flash->success(__('Titulación guardada correctamente.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('La titulación no se ha podido añadir. Por favor, inténtelo de nuevo.'));
            }
        }
        $subjects = $this->Degrees->Subjects->find('list', ['limit' => 200]);
        $this->set(compact('degree', 'subjects'));
        $this->set('_serialize', ['degree']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Degree id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $degree = $this->Degrees->get($id, [
            'contain' => ['Subjects']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $degree = $this->Degrees->patchEntity($degree, $this->request->data);
            if ($this->Degrees->save($degree)) {
                $this->Flash->success(__('Titulación modificada correctamente.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('La titulación no se ha podido modificar. Por favor, inténtelo de nuevo.'));
            }
        }
        $subjects = $this->Degrees->Subjects->find('list', ['limit' => 200]);
        $this->set(compact('degree', 'subjects'));
        $this->set('_serialize', ['degree']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Degree id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $degree = $this->Degrees->get($id);
        if ($this->Degrees->delete($degree)) {
            $this->Flash->success(__('Titulación eliminada correctamente.'));
        } else {
            $this->Flash->error(__('La titulación no se ha podido eliminar. Por favor, inténtelo de nuevo.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
