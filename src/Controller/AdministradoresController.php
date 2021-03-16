<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Datasource\ConnectionManager;

/**
 * Administradores Controller
 *
 * @property \App\Model\Table\AdministradoresTable $Administradores
 * @method \App\Model\Entity\Administradore[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AdministradoresController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    
    public function index()
    {
        // $administradores = $this->paginate($this->Administradores);

        $administradores = $this->Administradores->find('all',[
            'order' => 'id_administrador'
        ]);

        $this->set(compact('administradores'));
        $this->viewBuilder()->setOption('serialize', true);
        $this->RequestHandler->renderAs($this, 'json');
    }

    /**
     * View method
     *
     * @param string|null $id Administradore id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $administradore = $this->Administradores->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('administradore'));
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
        $request_data = $this->Administradores->treatData($data);
        $administradore = $this->Administradores->newEntity($request_data);
        if ($this->Administradores->save($administradore)) {
            $message = "success";
        } else {
            $message = "error";
        }
        $this->set(compact('request_data'));
        $this->viewBuilder()->setOption('serialize', true);
        $this->RequestHandler->renderAs($this, 'json');
    }

    /**
     * Edit method
     *
     * @param string|null $id Administradore id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $administradore = $this->Administradores->get($id, [
            'contain' => [],
        ]);
        $administradore = $this->Administradores->patchEntity($administradore, $this->request->getData());
        if ($this->Administradores->save($administradore)) {
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
     * @param string|null $id Administradore id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $conn = ConnectionManager::get('default');
        $sql = 'DELETE FROM administradores WHERE id_administrador = :id';
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
