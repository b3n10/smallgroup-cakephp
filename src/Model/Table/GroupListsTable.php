<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * GroupLists Model
 *
 * @property \App\Model\Table\GroupsTable|\Cake\ORM\Association\BelongsTo $Groups
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\GroupList get($primaryKey, $options = [])
 * @method \App\Model\Entity\GroupList newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\GroupList[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\GroupList|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\GroupList|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\GroupList patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\GroupList[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\GroupList findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class GroupListsTable extends Table
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

        $this->setTable('group_lists');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Groups', [
            'foreignKey' => 'group_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
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
            ->allowEmpty('id', 'create');

        $validator
            ->boolean('approved')
            ->notEmpty('approved');

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
        $rules->add($rules->existsIn(['group_id'], 'Groups'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }

    /**
     * Check if user is approved on group
     *
     * @param int $group_id id of group
     * @param int $user_id id of user
     * @param bool $approved if use is approved
     * @return bool
     */
    public function isApproved($group_id = null, $user_id = null, $approved = false)
    {
        return $this->find()->where([
            'group_id' => $group_id,
            'user_id' => $user_id,
            'approved' => $approved
        ])->count();
    }

    /**
     * If user joined group
     *
     * @param int $group_id id of group
     * @param int $user_id id of user
     * @return int
     */
    public function hasJoined($group_id, $user_id)
    {
        return $this->isApproved($group_id, $user_id);
    }

    /**
     * Members count
     *
     * @param int $group_id id of group
     * @param bool $approved if use is approved
     * @return int
     */
    public function membersCount($group_id, $approved)
    {
        return $this->isApproved($group_id, null, $approved);
    }
}
