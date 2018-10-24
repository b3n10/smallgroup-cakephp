<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Home Controller
 *
 *
 * @method \App\Model\Entity\Home[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HomeController extends AppController
{

    /**
     * init
     *
     * @return \Cake\Http\Response|void
     */
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['index']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
    }
}
