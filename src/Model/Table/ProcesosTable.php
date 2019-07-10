<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Procesos Model
 *
 * @property \App\Model\Table\MunicipiosTable|\Cake\ORM\Association\BelongsTo $Municipios
 * @property \App\Model\Table\UsuariosTable|\Cake\ORM\Association\BelongsTo $Usuarios
 * @property \App\Model\Table\UsuariosTable|\Cake\ORM\Association\BelongsTo $Usuarios
 *
 * @method \App\Model\Entity\Proceso get($primaryKey, $options = [])
 * @method \App\Model\Entity\Proceso newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Proceso[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Proceso|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Proceso saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Proceso patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Proceso[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Proceso findOrCreate($search, callable $callback = null, $options = [])
 */
class ProcesosTable extends Table
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

        $this->setTable('procesos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Municipios', [
            'foreignKey' => 'municipio_id',
            'joinType' => 'INNER'
        ]);
        
		$this->belongsTo('Aprobador', [
			'className' => 'Usuarios',
			'foreignKey' => 'usuario_aprobador_id',
			'propertyName' => 'Aprobador',
			'joinType' => 'INNER'
		]);
		$this->belongsTo('Solicitante', [
			'className' => 'Usuarios',
			'foreignKey' => 'usuario_solicitante_id',
			'propertyName' => 'Solicitante',
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
            ->scalar('numero_proceso')
            ->maxLength('numero_proceso', 20)
            ->requirePresence('numero_proceso', 'create')
            ->allowEmptyString('numero_proceso', false);

        $validator
            ->scalar('descripcion')
            ->maxLength('descripcion', 16777215)
            ->requirePresence('descripcion', 'create')
            ->allowEmptyString('descripcion', false);

    
        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['municipio_id'], 'Municipios'));

        return $rules;
    }
}
