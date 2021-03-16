<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Administradores Model
 *
 * @method \App\Model\Entity\Administradore newEmptyEntity()
 * @method \App\Model\Entity\Administradore newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Administradore[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Administradore get($primaryKey, $options = [])
 * @method \App\Model\Entity\Administradore findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Administradore patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Administradore[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Administradore|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Administradore saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Administradore[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Administradore[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Administradore[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Administradore[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AdministradoresTable extends Table
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

        $this->setTable('administradores');
        $this->setDisplayField('id_administrador');
        $this->setPrimaryKey('id_administrador');

        $this->addBehavior('Timestamp');
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
            ->integer('id_administrador')
            ->allowEmptyString('id_administrador', null, 'create');

        $validator
            ->scalar('nome')
            ->allowEmptyString('nome');

        $validator
            ->email('email')
            ->allowEmptyString('email');

        return $validator;
    }

    public function treatData($data){
        $array_tratamento = [
            'nome' => $data->nome,
            'email' => $data->email,
            'created' => $data->created,
            'modified' => $data->modified
        ];
        return $array_tratamento;
    }
}
