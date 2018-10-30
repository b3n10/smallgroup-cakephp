<?php
namespace App\Controller;

use App\Controller\BaseController;
use App\Model\Table\UsersTable as Users;
use Cake\ORM\TableRegistry;

/**
 * Groups Controller
 *
 * @property \App\Model\Table\GroupsTable $Groups
 *
 * @method \App\Model\Entity\Group[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GroupsController extends BaseController
{
    /**
     * Initialization hook method.
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        $this->Auth->deny(['index']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $groups = $this->Groups->find('all');

        $this->set(compact('groups'));
    }

    /**
     * View method
     *
     * @param string|null $id Group id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        if ($id === null) {
            return $this->redirect('/');
        }

        $group = $this->Groups->get($id, [
            'contain' => []
        ]);

        $user_id = $this->request->getSession()->read('Auth.User.id');
        $group_of_user = TableRegistry::get('GroupLists')->find()->where([
            'group_id' => $id,
            'user_id' => $user_id
        ]);

        $this->set(compact('group', 'group_of_user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->checkUserType();
        $group = $this->Groups->newEntity();

        if ($this->request->is('post')) {
            $group = $this->Groups->patchEntity($group, $this->request->getData());
            if ($this->Groups->save($group)) {
                $this->Flash->success(__('The group has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The group could not be saved. Please, try again.'));
        }
        $this->set(compact('group'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Group id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $group = $this->Groups->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $group = $this->Groups->patchEntity($group, $this->request->getData());
            if ($this->Groups->save($group)) {
                $this->Flash->success(__('The group has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The group could not be saved. Please, try again.'));
        }
        $this->set(compact('group'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Group id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $group = $this->Groups->get($id);
        if ($this->Groups->delete($group)) {
            $this->Flash->success(__('The group has been deleted.'));
        } else {
            $this->Flash->error(__('The group could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Join a group
     *
     * @param string|null $id Group id.
     * @return \Cake\Http\Response|null Redirects on successful add
     */
    public function join($id = null)
    {
        $user_id = $this->request->getSession()->read('Auth.User.id');

        $data = [
            'group_id' => $id,
            'user_id' => $user_id,
        ];

        if ($this->request->is('post')) {
            $group_lists = TableRegistry::get('GroupLists');
            $group_list = $group_lists->newEntity($data);

            if ($group_lists->save($group_list)) {
                $this->Flash->success(__('The group list has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The group list could not be saved. Please, try again.'));
        }
    }
}
