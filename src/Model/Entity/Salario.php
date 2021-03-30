<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Salario Entity
 *
 * @property int $id_salario
 * @property int|null $cargo_id
 * @property float|null $adicional_valor
 * @property string|null $descricao_adicional
 * @property float|null $salario_liquido
 *
 * @property \App\Model\Entity\Cargo $cargo
 * @property \App\Model\Entity\Funcionario[] $funcionarios
 */
class Salario extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'cargo_id' => true,
        'adicional_valor' => true,
        'descricao_adicional' => true,
        'salario_liquido' => true,
        'cargo' => true,
        'funcionarios' => true,
    ];
}
