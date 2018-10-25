<?php

namespace App\Controller;

use App\Controller\AppController;

class BaseController extends AppController
{
    /**
     * check user type
     *
     * @return redirect
     */
    protected function checkUserType()
    {
        if ($this->getRequest()->getSession()->read('Auth.User.user_type') === 0) {
            $this->Flash->error(__('You are not allowed to access the page!'));

            return $this->redirect(['controller' => 'Home', 'action' => 'index']);
        }
    }
}
