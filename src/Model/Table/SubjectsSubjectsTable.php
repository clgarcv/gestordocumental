<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SubjectsSubjects Model
 *
 * @method \App\Model\Entity\SubjectsSubject get($primaryKey, $options = [])
 * @method \App\Model\Entity\SubjectsSubject newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SubjectsSubject[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SubjectsSubject|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SubjectsSubject patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SubjectsSubject[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SubjectsSubject findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SubjectsSubjectsTable extends Table
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

        $this->table('subjects_subjects');
        $this->displayField('subject_id1');
        $this->primaryKey(['subject_id1', 'subject_id2']);

        $this->addBehavior('Timestamp');
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
            ->integer('subject_id1')
            ->allowEmpty('subject_id1');

        $validator
            ->integer('subject_id2')
            ->allowEmpty('subject_id2');

        return $validator;
    }
}
