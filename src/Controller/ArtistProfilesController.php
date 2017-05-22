<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ArtistProfiles Controller
 *
 * @property \App\Model\Table\ArtistProfilesTable $ArtistProfiles
 */
class ArtistProfilesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Artists']
        ];
        $artistProfiles = $this->paginate($this->ArtistProfiles);

        $this->set(compact('artistProfiles'));
        $this->set('_serialize', ['artistProfiles']);
    }

    /**
     * View method
     *
     * @param string|null $id Artist Profile id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $artistProfile = $this->ArtistProfiles->get($id, [
            'contain' => ['Artists']
        ]);

        $this->set('artistProfile', $artistProfile);
        $this->set('_serialize', ['artistProfile']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $artistProfile = $this->ArtistProfiles->newEntity();
        if ($this->request->is('post')) {
            $artistProfile = $this->ArtistProfiles->patchEntity($artistProfile, $this->request->data);
            if ($this->ArtistProfiles->save($artistProfile)) {
                $this->Flash->success(__('The artist profile has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The artist profile could not be saved. Please, try again.'));
        }
        $artists = $this->ArtistProfiles->Artists->find('list', ['limit' => 200]);
        $this->set(compact('artistProfile', 'artists'));
        $this->set('_serialize', ['artistProfile']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Artist Profile id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $artistProfile = $this->ArtistProfiles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $artistProfile = $this->ArtistProfiles->patchEntity($artistProfile, $this->request->data);
            if ($this->ArtistProfiles->save($artistProfile)) {
                $this->Flash->success(__('The artist profile has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The artist profile could not be saved. Please, try again.'));
        }
        $artists = $this->ArtistProfiles->Artists->find('list', ['limit' => 200]);
        $this->set(compact('artistProfile', 'artists'));
        $this->set('_serialize', ['artistProfile']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Artist Profile id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $artistProfile = $this->ArtistProfiles->get($id);
        if ($this->ArtistProfiles->delete($artistProfile)) {
            $this->Flash->success(__('The artist profile has been deleted.'));
        } else {
            $this->Flash->error(__('The artist profile could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
