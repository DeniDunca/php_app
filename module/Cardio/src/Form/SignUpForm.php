<?php

namespace Cardio\Form;

use Laminas\Form\Element;
use Laminas\Form\Form;

class SignUpForm extends Form{

    public function __construct($name = null)
    {
        parent::__construct('new_account');
        $this->setAttribute('method','post');

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
            'attributes'=>[
                'required'=>true,
                'size'=>40,
                'maxlength'=>50,
                'pattern'=>'^[a-zA-Z0-9]+$',
                'data-toggle'=>'tooltip',
                'class'=>'form-control',
                'title'=>'Username must contain of alphanumerical characters only',
                'placeholder'=>'Username'
            ]
        ]);
        $this->add([
            'name' => 'password',
            'type' => 'password',
            'options' => [
                'label' => 'Password',
            ],
            'attributes'=>[
                'required'=>true,
                'size'=>40,
                'maxlength'=>50,
                'autocomplete'=>false,
                'data-toggle'=>'tooltip',
                'class'=>'form-control',
                'placeholder'=>'Password'
            ]
        ]);
        $this->add([
            'name' => 'firstname',
            'type' => 'text',
            'options' => [
                'label' => 'Firstname',
            ],
            'attributes'=>[
                'required'=>true,
                'size'=>40,
                'maxlength'=>50,
                'pattern'=>'^[a-zA-Z0-9]+$',
                'data-toggle'=>'tooltip',
                'class'=>'form-control',
                'title'=>'Firstname must contain of alphanumerical characters only',
                'placeholder'=>'Firstname'
            ]
        ]);
        $this->add([
            'name' => 'lastname',
            'type' => 'text',
            'options' => [
                'label' => 'Lastname',
            ],
            'attributes'=>[
                'required'=>true,
                'size'=>40,
                'maxlength'=>50,
                'pattern'=>'^[a-zA-Z0-9]+$',
                'data-toggle'=>'tooltip',
                'class'=>'form-control',
                'title'=>'Lastname must contain of alphanumerical characters only',
                'placeholder'=>'Lastname'
            ]
        ]);
        $this->add([
            'name' => 'admin',
            'type' => 'text',
            'options' => [
                'label' => 'Admin',
                'empty_options'=>'Select...',
                'value_options'=>[
                    'Admin'=>'1',
                    'Medic'=>'2'
                ]
            ],
            'attributes'=>[
                'required'=>true,
                'class'=>'custom-select'
            ]
        ]);
        $this->add([
            'name' => 'id_clinic',
            'type' => 'text',
            'options' => [
                'label' => 'Clinic id',
            ],
            'attributes'=>[
                'required'=>true,
                'size'=>40,
                'data-toggle'=>'tooltip',
                'class'=>'form-control',
                'placeholder'=>'Clinic id'
            ]
        ]);
        $this->add([
            'name' => 'submit',
            'type' => 'submit',
            'attributes' => [
                'value' => 'Sign Up',
                'id'    => 'submitbutton',
            ],
        ]);
    }
}