<?php

namespace Cardio\Form;

use Laminas\Form\Form;

class NewPatientForm extends Form{

    public function __construct($name = null)
    {
        parent::__construct('new_patient');
        $this->setAttribute('method','post');

        $this->add([
            'name' => 'id',
            'type' => 'hidden',
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
            'name' => 'date_of_birth',
            'type' => 'date',
            'options' => [
                'label' => 'Date of Birth',
            ],
            'attributes'=>[
                'required'=>true,
            ]
        ]);
        $this->add([
            'name' => 'patient_number',
            'type' => 'text',
            'options' => [
                'label' => 'Patient Number',
            ],
            'attributes'=>[
                'required'=>true,
                'size'=>40,
                'maxlength'=>50,
                'pattern'=>'^[a-zA-Z0-9]+$',
                'data-toggle'=>'tooltip',
                'class'=>'form-control',
                'title'=>'Patient Number must contain of alphanumerical characters only',
                'placeholder'=>'Patient Number'
            ]
        ]);
        $this->add([
            'name' => 'county',
            'type' => 'text',
            'options' => [
                'label' => 'County',
            ],
            'attributes'=>[
                'required'=>true,
                'size'=>40,
                'maxlength'=>50,
                'pattern'=>'^[a-zA-Z0-9]+$',
                'data-toggle'=>'tooltip',
                'class'=>'form-control',
                'title'=>'County must contain of alphanumerical characters only',
                'placeholder'=>'County'
            ]
        ]);
        $this->add([
            'name' => 'city',
            'type' => 'text',
            'options' => [
                'label' => 'City',
            ],
            'attributes'=>[
                'required'=>true,
                'size'=>40,
                'maxlength'=>50,
                'pattern'=>'^[a-zA-Z0-9]+$',
                'data-toggle'=>'tooltip',
                'class'=>'form-control',
                'title'=>'City must contain of alphanumerical characters only',
                'placeholder'=>'City'
            ]
        ]);
        $this->add([
            'name' => 'address',
            'type' => 'text',
            'options' => [
                'label' => 'Address',
            ],
            'attributes'=>[
                'required'=>true,
                'size'=>40,
                'maxlength'=>50,
                'pattern'=>'^[a-zA-Z0-9]+$',
                'data-toggle'=>'tooltip',
                'class'=>'form-control',
                'title'=>'Address must contain of alphanumerical characters only',
                'placeholder'=>'Address'
            ]
        ]);
        $this->add([
            'name' => 'occupation',
            'type' => 'text',
            'options' => [
                'label' => 'Occupation',
            ],
            'attributes'=>[
                'required'=>true,
                'size'=>40,
                'maxlength'=>50,
                'pattern'=>'^[a-zA-Z0-9]+$',
                'data-toggle'=>'tooltip',
                'class'=>'form-control',
                'title'=>'Occupation must contain of alphanumerical characters only',
                'placeholder'=>'Occupation'
            ]
        ]);
        $this->add([
            'name' => 'job',
            'type' => 'text',
            'options' => [
                'label' => 'Job',
            ],
            'attributes'=>[
                'required'=>true,
                'size'=>40,
                'maxlength'=>50,
                'pattern'=>'^[a-zA-Z0-9]+$',
                'data-toggle'=>'tooltip',
                'class'=>'form-control',
                'title'=>'Job must contain of alphanumerical characters only',
                'placeholder'=>'Job'
            ]
        ]);
        $this->add([
            'name' => 'phone',
            'type' => 'text',
            'options' => [
                'label' => 'Phone',
            ],
            'attributes'=>[
                'required'=>true,
                'size'=>40,
                'maxlength'=>50,
                'pattern'=>'^[a-zA-Z0-9]+$',
                'data-toggle'=>'tooltip',
                'class'=>'form-control',
                'title'=>'Phone must contain of alphanumerical characters only',
                'placeholder'=>'Phone'
            ]
        ]);
        $this->add([
            'name' => 'email',
            'type' => 'text',
            'options' => [
                'label' => 'Email',
            ],
            'attributes'=>[
                'required'=>true,
                'size'=>40,
                'maxlength'=>50,
            ]
        ]);
        $this->add([
            'name' => 'cnp',
            'type' => 'text',
            'options' => [
                'label' => 'CNP',
            ],
            'attributes'=>[
                'required'=>true,
                'size'=>40,
                'maxlength'=>50,
                'pattern'=>'^[a-zA-Z0-9]+$',
                'data-toggle'=>'tooltip',
                'class'=>'form-control',
                'title'=>'CNP must contain of alphanumerical characters only',
                'placeholder'=>'CNP'
            ]
        ]);
        $this->add([
            'name' => 'marital_status',
            'type' => 'text',
            'options' => [
                'label' => 'Marital Status',
            ],
            'attributes'=>[
                'required'=>true,
                'size'=>40,
                'maxlength'=>50,
                'pattern'=>'^[a-zA-Z0-9]+$',
                'data-toggle'=>'tooltip',
                'class'=>'form-control',
                'title'=>'Marital Status must contain of alphanumerical characters only',
                'placeholder'=>'Marital Status'
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