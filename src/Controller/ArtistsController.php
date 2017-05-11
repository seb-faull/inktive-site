<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Artists Controller
 *
 * @property \App\Model\Table\ArtistsTable $Artists
 */
class ArtistsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Parlours']
        ];
        $artists = $this->paginate($this->Artists);

        $this->set(compact('artists'));
        $this->set('_serialize', ['artists']);
    }

    /**
     * View method
     *
     * @param string|null $id Artist id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $artist = $this->Artists->get($id, [
            'contain' => ['Parlours', 'Tags', 'Posts']
        ]);

        $this->set('artist', $artist);
        $this->set('_serialize', ['artist']);
    }
    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $artist = $this->Artists->newEntity();
        if ($this->request->is('post')) {
            $artist = $this->Artists->patchEntity($artist, $this->request->data);
            if ($this->Artists->save($artist)) {
                $this->Flash->success(__('The artist has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The artist could not be saved. Please, try again.'));
        }
        $parlours = $this->Artists->Parlours->find('list', ['limit' => 200]);
        $tags = $this->Artists->Tags->find('list', ['limit' => 200]);
        $this->set(compact('artist', 'parlours', 'tags'));
        $this->set('_serialize', ['artist']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Artist id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $artist = $this->Artists->get($id, [
            'contain' => ['Tags']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $artist = $this->Artists->patchEntity($artist, $this->request->data);
            if ($this->Artists->save($artist)) {
                $this->Flash->success(__('The artist has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The artist could not be saved. Please, try again.'));
        }
        $parlours = $this->Artists->Parlours->find('list', ['limit' => 200]);
        $tags = $this->Artists->Tags->find('list', ['limit' => 200]);
        $this->set(compact('artist', 'parlours', 'tags'));
        $this->set('_serialize', ['artist']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Artist id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $artist = $this->Artists->get($id);
        if ($this->Artists->delete($artist)) {
            $this->Flash->success(__('The artist has been deleted.'));
        } else {
            $this->Flash->error(__('The artist could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
