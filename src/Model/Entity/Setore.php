<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Setore Entity
 *
 * @property int|null $id_setor
 * @property string|null $nome
 * @property string|null $responsavel
 * @property string|null $descricao
 */
class Setore extends Entity
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
        'id_setor' => true,
        'nome' => true,
        'responsavel' => true,
        'descricao' => true,
    ];
}
