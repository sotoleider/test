<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Municipios Model
 *
 * @property \App\Model\Table\ProcesosTable|\Cake\ORM\Association\HasMany $Procesos
 *
 * @method \App\Model\Entity\Municipio get($primaryKey, $options = [])
 * @method \App\Model\Entity\Municipio newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Municipio[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Municipio|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Municipio saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Municipio patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Municipio[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Municipio findOrCreate($search, callable $callback = null, $options = [])
 */
class MunicipiosTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('municipios');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Procesos', [
            'foreignKey' => 'municipio_id'
        ]);
		 $this->belongsTo('Departamentos', [
            'foreignKey' => 'id_dpto',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', 'create');

        $validator
            ->integer('id_dpto')
            ->requirePresence('id_dpto', 'create')
            ->allowEmptyString('id_dpto', false);

        $validator
            ->scalar('nombre_municipio')
            ->maxLength('nombre_municipio', 150)
            ->allowEmptyString('nombre_municipio', false);

        return $validator;
    }
}
