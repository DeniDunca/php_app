<?php

namespace Cardio\Form;

use Laminas\Form\Form;

class LoginForm extends Form{

    public function __construct($name = null)
    {
        parent::__construct('Users');

        $this->add([
            'name' => 'id',
            'type' => 'hidden',
        ]);
        $this->add([
            'name' => 'username',
            'type' => 'text',
            'options' => [
                'label' => 'Username',
            ],
        ]);
        $this->add([
            'name' => 'password',
            'type' => 'password',
            'options' => [
                'label' => 'Password',
            ],
        ]);
        $this->add([
            'name' => 'submit',
            'type' => 'submit',
            'attributes' => [
                'value' => 'Log in',
                'id'    => 'submitbutton',
            ],
        ]);
    }
}