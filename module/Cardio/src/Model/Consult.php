<?php

namespace Cardio\Model;

use DateTime;
use DomainException;
use Laminas\Filter\StringTrim;
use Laminas\Filter\StripTags;
use Laminas\Filter\ToInt;
use Laminas\InputFilter\InputFilter;
use Laminas\InputFilter\InputFilterInterface;
use Laminas\Validator\StringLength;

class Consult
{
    public $id;
    public $date;
    public $id_patient;
    public $personal_physiological_antecedents;
    public $personal_pathological_antecedents;
    public $heredo_collateral_antecedents;
    public $environment_conditions;
    public $present_state;
    public $circulatory_system;
    public $local_complementary_examinations;
    public $personal_antecedents;
    public $consult_reasons;
    public $observations;
    public $diagnostic;
    public $recommendations;
    public $treatment;

    private $inputFilter;

    public function exchangeArray(array $data)
    {
        $this->id     = !empty($data['id']) ? $data['id'] : null;
        $this->date = !empty($data['date']) ? $data['date'] : null;
        $this->id_patient  = !empty($data['id_patient']) ? $data['id_patient'] : null;
        $this->personal_physiological_antecedents  = !empty($data['personal_physiological_antecedents']) ? $data['personal_physiological_antecedents'] : null;
        $this->personal_pathological_antecedents   = !empty($data['personal_pathological_antecedents']) ? $data['personal_pathological_antecedents'] : null;
        $this->heredo_collateral_antecedents  = !empty($data['heredo_collateral_antecedents']) ? $data['heredo_collateral_antecedents'] : null;
        $this->environment_conditions  = !empty($data['environment_conditions']) ? $data['environment_conditions'] : null;
        $this->present_state  = !empty($data['present_state']) ? $data['present_state'] : null;
        $this->circulatory_system  = !empty($data['circulatory_system']) ? $data['circulatory_system'] : null;
        $this->local_complementary_examinations  = !empty($data['local_complementary_examinations']) ? $data['local_complementary_examinations'] : null;
        $this->personal_antecedents  = !empty($data['personal_antecedents']) ? $data['personal_antecedents'] : null;
        $this->consult_reasons  = !empty($data['consult_reasons']) ? $data['consult_reasons'] : null;
        $this->observations  = !empty($data['observations']) ? $data['observations'] : null;
        $this->diagnostic  = !empty($data['diagnostic']) ? $data['diagnostic'] : null;
        $this->recommendations  = !empty($data['recommendations']) ? $data['recommendations'] : null;
        $this->treatment  = !empty($data['treatment']) ? $data['treatment'] : null;
    }

    public function getArrayCopy()
    {
        return [
            'id'     => $this->id,
            'date' => $this->date,
            'id_patient'  => $this->id_patient,
            'personal_physiological_antecedents'  => $this->personal_physiological_antecedents,
            'personal_pathological_antecedents'  => $this->personal_pathological_antecedents,
            'heredo_collateral_antecedents'  => $this->heredo_collateral_antecedents,
            'environment_conditions'  => $this->environment_conditions,
            'present_state'  => $this->present_state,
            'circulatory_system'  => $this->circulatory_system,
            'local_complementary_examinations'  => $this->local_complementary_examinations,
            'personal_antecedents'  => $this->personal_antecedents,
            'consult_reasons'  => $this->consult_reasons,
            'observations'  => $this->observations,
            'diagnostic'  => $this->diagnostic,
            'recommendations'  => $this->recommendations,
            'treatment'  => $this->treatment,
        ];
    }

    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new DomainException(sprintf(
            '%s does not allow injection of an alternate input filter',
            __CLASS__
        ));
    }

    public function getInputFilter()
    {
        if ($this->inputFilter) {
            return $this->inputFilter;
        }

        $inputFilter = new InputFilter();

        $inputFilter->add([
            'name' => 'id',
            'required' => true,
            'filters' => [
                ['name' => ToInt::class],
            ],
        ]);

        $inputFilter->add([
            'name' => 'date',
            'required' => true,
            'filters' => [
                ['name' => DateTime::class]
            ]
        ]);

        $inputFilter->add([
            'name' => 'id_patient',
            'required' => true,
            'filters' => [
                ['name' => ToInt::class],
            ],
        ]);

        $inputFilter->add([
            'name' => 'personal_physiological_antecedents',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 2000,
                    ],
                ],
            ],
        ]);

        $inputFilter->add([
            'name' => 'personal_pathological_antecedents',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 2000,
                    ],
                ],
            ],
        ]);

        $inputFilter->add([
            'name' => 'heredo_collateral_antecedents',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 2000,
                    ],
                ],
            ],
        ]);

        $inputFilter->add([
            'name' => 'environment_conditions',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 2000,
                    ],
                ],
            ],
        ]);

        $inputFilter->add([
            'name' => 'present_state',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 2000,
                    ],
                ],
            ],
        ]);

        $inputFilter->add([
            'name' => 'circulatory_system',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 2000,
                    ],
                ],
            ],
        ]);

        $inputFilter->add([
            'name' => 'local_complementary_examinations',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 2000,
                    ],
                ],
            ],
        ]);

        $inputFilter->add([
            'name' => 'personal_antecedents',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 2000,
                    ],
                ],
            ],
        ]);

        $inputFilter->add([
            'name' => 'consult_reasons',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 2000,
                    ],
                ],
            ],
        ]);

        $inputFilter->add([
            'name' => 'observations',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 2000,
                    ],
                ],
            ],
        ]);

        $inputFilter->add([
            'name' => 'diagnostic',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 2000,
                    ],
                ],
            ],
        ]);

        $inputFilter->add([
            'name' => 'recommendations',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 2000,
                    ],
                ],
            ],
        ]);

        $inputFilter->add([
            'name' => 'treatment',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 2000,
                    ],
                ],
            ],
        ]);


        $this->inputFilter = $inputFilter;
        return $this->inputFilter;
    }
}