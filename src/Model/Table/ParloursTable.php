<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Parlours Model
 *
 * @property \Cake\ORM\Association\HasMany $Artists
 *
 * @method \App\Model\Entity\Parlour get($primaryKey, $options = [])
 * @method \App\Model\Entity\Parlour newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Parlour[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Parlour|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Parlour patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Parlour[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Parlour findOrCreate($search, callable $callback = null, $options = [])
 */
class ParloursTable extends Table
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

        $this->table('parlours');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->hasMany('Artists', [
            'foreignKey' => 'parlour_id'
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
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->numeric('lat')
            ->requirePresence('lat', 'create')
            ->notEmpty('lat');

        $validator
            ->numeric('lng')
            ->requirePresence('lng', 'create')
            ->notEmpty('lng');

        return $validator;
    }
}
