<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Salarios Model
 *
 * @property \App\Model\Table\CargosTable&\Cake\ORM\Association\BelongsTo $Cargos
 * @property \App\Model\Table\FuncionariosTable&\Cake\ORM\Association\HasMany $Funcionarios
 *
 * @method \App\Model\Entity\Salario newEmptyEntity()
 * @method \App\Model\Entity\Salario newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Salario[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Salario get($primaryKey, $options = [])
 * @method \App\Model\Entity\Salario findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Salario patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Salario[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Salario|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Salario saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Salario[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Salario[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Salario[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Salario[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class SalariosTable extends Table
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

        $this->setTable('salarios');
        $this->setDisplayField('id_salario');
        $this->setPrimaryKey('id_salario');

        $this->belongsTo('Cargos', [
            'foreignKey' => 'cargo_id',
        ]);
        $this->hasMany('Funcionarios', [
            'foreignKey' => 'salario_id',
        ]);
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
            ->integer('id_salario')
            ->allowEmptyString('id_salario', null, 'create');

        $validator
            ->numeric('adicional_valor')
            ->allowEmptyString('adicional_valor');

        $validator
            ->scalar('descricao_adicional')
            ->allowEmptyString('descricao_adicional');

        $validator
            ->numeric('salario_liquido')
            ->allowEmptyString('salario_liquido');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['cargo_id'], 'Cargos'), ['errorField' => 'cargo_id']);

        return $rules;
    }

    public function treatData($data){
        $array_tratamento = [
            'cargo_id' => $data->cargo_id,
            'adicional_valor' => $data->adicional_valor,
            'descricao_adicional' => $data->descricao_adicional,
            'salario_liquido' => $data->salario_liquido
        ];
        return $array_tratamento;
    }
    
}
