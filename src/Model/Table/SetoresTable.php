<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Setores Model
 *
 * @method \App\Model\Entity\Setore newEmptyEntity()
 * @method \App\Model\Entity\Setore newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Setore[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Setore get($primaryKey, $options = [])
 * @method \App\Model\Entity\Setore findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Setore patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Setore[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Setore|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Setore saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Setore[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Setore[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Setore[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Setore[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class SetoresTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('setores');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id_setor')
            ->allowEmptyString('id_setor');

        $validator
            ->scalar('nome')
            ->allowEmptyString('nome');

        $validator
            ->scalar('responsavel')
            ->allowEmptyString('responsavel');

        $validator
            ->scalar('descricao')
            ->allowEmptyString('descricao');

        return $validator;
    }

    public function treatData($data){
        $array_tratamento = [
            'nome' => $data->nome,
            'responsavel' => $data->responsavel,
            'descricao' => $data->descricao
        ];
        return $array_tratamento;
    }

}
