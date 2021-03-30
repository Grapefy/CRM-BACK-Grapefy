<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Datasource\ConnectionManager;

/**
 * Salarios Controller
 *
 * @method \App\Model\Entity\Salario[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SalariosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $salarios = $this->Salarios->find('all',[
            'contain' => [ 'Cargos'=> ['Setores'] ]
        ]);

        $this->set(compact('salarios'));
        $this->viewBuilder()->setOption('serialize', true);
        $this->RequestHandler->renderAs($this, 'json');
    }

    public function listCargos()
    {
        $this->loadModel('Cargos');
        $cargos = $this->Cargos->find('all',[
            'order' => 'id_cargo'
        ]);

        $this->set(compact('cargos'));
        $this->viewBuilder()->setOption('serialize', true);
        $this->RequestHandler->renderAs($this, 'json');
    }

    /**
     * View method
     *
     * @param string|null $id Salario id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $salario = $this->Salarios->get($id, [
            'contain' => [ 'Cargos'=> ['Setores'] ]
        ]);

        $this->set(compact('salario'));
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
        $request_data = $this->Salarios->treatData($data);
        $salario = $this->Salarios->newEntity($request_data);
        if ($this->Salarios->save($salario)) {
            $message = "success";
        } else {
            $message = "error";
        }
        $this->set(compact('message'));
        $this->viewBuilder()->setOption('serialize', true);
        $this->RequestHandler->renderAs($this, 'json');
    }

    /**
     * Edit method
     *
     * @param string|null $id Salario id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $salario = $this->Salarios->get($id, [
            'contain' => [ 'Cargos' => ['Setores'] ]
        ]);
        $salario = $this->Salarios->patchEntity($salario, $this->request->getData());
        if ($this->Salarios->save($salario)) {
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
     * @param string|null $id Salario id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $conn = ConnectionManager::get('default');
        $sql = 'DELETE FROM salarios WHERE id_salario = :id';
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
