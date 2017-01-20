<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * KeywordsSessions Controller
 *
 * @property \App\Model\Table\KeywordsSessionsTable $KeywordsSessions
 */
class KeywordsSessionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Sessions', 'Keywords']
        ];
        $keywordsSessions = $this->paginate($this->KeywordsSessions);

        $this->set(compact('keywordsSessions'));
        $this->set('_serialize', ['keywordsSessions']);
    }

    /**
     * View method
     *
     * @param string|null $id Keywords Session id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $keywordsSession = $this->KeywordsSessions->get($id, [
            'contain' => ['Sessions', 'Keywords']
        ]);

        $this->set('keywordsSession', $keywordsSession);
        $this->set('_serialize', ['keywordsSession']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $keywordsSession = $this->KeywordsSessions->newEntity();
        if ($this->request->is('post')) {
            $keywordsSession = $this->KeywordsSessions->patchEntity($keywordsSession, $this->request->data);
            if ($this->KeywordsSessions->save($keywordsSession)) {
                $this->Flash->success(__('The keywords session has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The keywords session could not be saved. Please, try again.'));
            }
        }
        $sessions = $this->KeywordsSessions->Sessions->find('list', ['limit' => 200]);
        $keywords = $this->KeywordsSessions->Keywords->find('list', ['limit' => 200]);
        $this->set(compact('keywordsSession', 'sessions', 'keywords'));
        $this->set('_serialize', ['keywordsSession']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Keywords Session id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $keywordsSession = $this->KeywordsSessions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $keywordsSession = $this->KeywordsSessions->patchEntity($keywordsSession, $this->request->data);
            if ($this->KeywordsSessions->save($keywordsSession)) {
                $this->Flash->success(__('The keywords session has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The keywords session could not be saved. Please, try again.'));
            }
        }
        $sessions = $this->KeywordsSessions->Sessions->find('list', ['limit' => 200]);
        $keywords = $this->KeywordsSessions->Keywords->find('list', ['limit' => 200]);
        $this->set(compact('keywordsSession', 'sessions', 'keywords'));
        $this->set('_serialize', ['keywordsSession']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Keywords Session id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $keywordsSession = $this->KeywordsSessions->get($id);
        if ($this->KeywordsSessions->delete($keywordsSession)) {
            $this->Flash->success(__('The keywords session has been deleted.'));
        } else {
            $this->Flash->error(__('The keywords session could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
