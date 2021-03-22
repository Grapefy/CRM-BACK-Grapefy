<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Datasource\ConnectionManager;

/**
 * Setores Controller
 *
 * @property \App\Model\Table\SetoresTable $Setores
 * @method \App\Model\Entity\Setore[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SetoresController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $setores = $this->Setores->find('all',[
            'order' => 'id_setor'
        ]);

        $this->set(compact('setores'));
        $this->viewBuilder()->setOption('serialize', true);
        $this->RequestHandler->renderAs($this, 'json');
    }

    /**
     * View method
     *
     * @param string|null $id Setore id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $setore = $this->Setores->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('setore'));
        $this->viewBuilder()->setOption('serialize', true);
        $this->RequestHandler->renderAs($this, 'json');
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $data =  $this->request->input('json_decode');
        $request_data = $this->Setores->treatData($data);
        $setor = $this->Setores->newEntity($request_data);
        if ($this->Setores->save($setor)) {
            $message = "success";
        } else {
            $message = "error";
        }
        $this->set(compact('setor'));
        $this->viewBuilder()->setOption('serialize', true);
        $this->RequestHandler->renderAs($this, 'json');
    }

    /**
     * Edit method
     *
     * @param string|null $id Setore id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $setor = $this->Setores->get($id, [
            'contain' => [],
        ]);
        $setor = $this->Setores->patchEntity($setor, $this->request->getData());
        if ($this->Setores->save($setor)) {
            $message = "success";
        } else {
            $message = "error";
        }
        $this->set(compact('message'));
        $this->viewBuilder()->setOption('serialize', true);
        $this->RequestHandler->renderAs($this, 'json');
    }

    /**
     * Delete method
     *
     * @param string|null $id Setore id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $conn = ConnectionManager::get('default');
        $sql = 'DELETE FROM setores WHERE id_setor = :id';
        if ($conn->execute($sql,['id'=>$id])) {
            $message = "success";
        } else {
            $message = "error";
        }
        $this->set(compact('message'));
        $this->viewBuilder()->setOption('serialize', true);
        $this->RequestHandler->renderAs($this, 'json');
    }
}
