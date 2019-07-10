<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Proceso Entity
 *
 * @property int $id
 * @property string $numero_proceso
 * @property string $descripcion
 * @property int $municipio_id
 * @property \Cake\I18n\FrozenTime $fecha
 * @property bool $estado
 * @property int $usuario_solicitante_id
 * @property int|null $usuario_aprobador_id
 *
 * @property \App\Model\Entity\Municipio $municipio
 * @property \App\Model\Entity\Usuario $usuario
 */
class Proceso extends Entity
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
        'numero_proceso' => true,
        'descripcion' => true,
        'municipio_id' => true,
        'fecha' => true,
        'estado' => true,
        'usuario_solicitante_id' => true,
        'usuario_aprobador_id' => true,
        'municipio' => true,
        'usuario' => true
    ];
}
