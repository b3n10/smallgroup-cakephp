<?php

namespace App\View\Helper;

use Cake\Controller\Component\AuthComponent;
use Cake\View\Helper;

class AuthUserHelper extends Helper
{
    /**
     * show user info
     * @param string $arg key to search
     * @return object
     */
    public function user($arg)
    {
        return AuthComponent::user($arg);
    }
}
