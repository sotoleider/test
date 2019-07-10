<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Municipio Entity
 *
 * @property int $id
 * @property int $id_dpto
 * @property string $nombre_municipio
 *
 * @property \App\Model\Entity\Proceso[] $procesos
 */
class Municipio extends Entity
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
        'id_dpto' => true,
        'nombre_municipio' => true,
        'procesos' => true
    ];
}
