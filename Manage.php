<?php

namespace krok\translation;

use krok\cp\components\Module;

class Manage extends Module
{
    /**
     * @var string
     */
    public $defaultRoute = 'manage';

    /**
     * @var string
     */
    public $controllerNamespace = 'krok\translation\controllers';

    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
