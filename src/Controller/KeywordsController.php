<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Keywords Controller
 *
 * @property \App\Model\Table\KeywordsTable $Keywords
 */
class KeywordsController extends AppController
{
    public function isAuthorized($user)
    {
       //return true;
        if(isset($user['role']) && $user['role'] == 2){
            //damos autorizacion a determinadas acciones del controlador
            if(in_array($this->request->action, array('edit', 'add', 'index', 'view', 'delete'))){
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
            if(in_array($this->request->action, array('edit', 'add', 'index', 'view'))){
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
        $keywords = $this->paginate($this->Keywords);

        $this->set(compact('keywords'));
        $this->set('_serialize', ['keywords']);
    }

    /**
     * View method
     *
     * @param string|null $id Keyword id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $keyword = $this->Keywords->get($id, [
            'contain' => ['Sessions']
        ]);

        $this->set('keyword', $keyword);
        $this->set('_serialize', ['keyword']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $keyword = $this->Keywords->newEntity();
        if ($this->request->is('post')) {
            $keyword = $this->Keywords->patchEntity($keyword, $this->request->data);
            if ($this->Keywords->save($keyword)) {
                $this->Flash->success(__('Palabra clave añadida correctamente.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('La palabra clave no se ha podido añadir. Por favor, inténtelo de nuevo.'));
            }
        }
        $sessions = $this->Keywords->Sessions->find('list', ['limit' => 200]);
        $this->set(compact('keyword', 'sessions'));
        $this->set('_serialize', ['keyword']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Keyword id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $keyword = $this->Keywords->get($id, [
            'contain' => ['Sessions']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $keyword = $this->Keywords->patchEntity($keyword, $this->request->data);
            if ($this->Keywords->save($keyword)) {
                $this->Flash->success(__('Palabra clave modificada correctamente.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('La palabra clave no se ha podido modificar. Por favor, inténtelo de nuevo.'));
            }
        }
        $sessions = $this->Keywords->Sessions->find('list', ['limit' => 200]);
        $this->set(compact('keyword', 'sessions'));
        $this->set('_serialize', ['keyword']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Keyword id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $keyword = $this->Keywords->get($id);
        if ($this->Keywords->delete($keyword)) {
            $this->Flash->success(__('Palabra clave eliminada correctamente.'));
        } else {
            $this->Flash->error(__('La palabra clave no se ha podido eliminar. Por favor, inténtelo de nuevo.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
