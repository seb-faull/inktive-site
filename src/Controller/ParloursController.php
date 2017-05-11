<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Parlours Controller
 *
 * @property \App\Model\Table\ParloursTable $Parlours
 */
class ParloursController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $parlours = $this->paginate($this->Parlours);

        $this->set(compact('parlours'));
        $this->set('_serialize', ['parlours']);
    }

    /**
     * View method
     *
     * @param string|null $id Parlour id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $parlour = $this->Parlours->get($id, [
            'contain' => ['Artists']
        ]);
		
        $this->set('parlour', $parlour);
        $this->set('_serialize', ['parlour']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $parlour = $this->Parlours->newEntity();
        if ($this->request->is('post')) {
            $parlour = $this->Parlours->patchEntity($parlour, $this->request->data);
            if ($this->Parlours->save($parlour)) {
                $this->Flash->success(__('The parlour has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The parlour could not be saved. Please, try again.'));
        }
        $this->set(compact('parlour'));
        $this->set('_serialize', ['parlour']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Parlour id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $parlour = $this->Parlours->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $parlour = $this->Parlours->patchEntity($parlour, $this->request->data);
            if ($this->Parlours->save($parlour)) {
                $this->Flash->success(__('The parlour has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The parlour could not be saved. Please, try again.'));
        }
        $this->set(compact('parlour'));
        $this->set('_serialize', ['parlour']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Parlour id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $parlour = $this->Parlours->get($id);
        if ($this->Parlours->delete($parlour)) {
            $this->Flash->success(__('The parlour has been deleted.'));
        } else {
            $this->Flash->error(__('The parlour could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
