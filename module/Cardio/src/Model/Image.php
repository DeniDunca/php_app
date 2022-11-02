<?php

namespace Cardio\Model;

use DomainException;
use Laminas\Db\Sql\Ddl\Column\Blob;
use Laminas\Filter\ToInt;
use Laminas\InputFilter\InputFilter;
use Laminas\InputFilter\InputFilterInterface;

class Image
{
    public $id;
    public $image;
    public $id_consult;

    private $inputFilter;

    public function exchangeArray(array $data)
    {
        $this->id     = !empty($data['id']) ? $data['id'] : null;
        $this->image = !empty($data['image']) ? $data['image'] : null;
        $this->id_consult  = !empty($data['id_consult']) ? $data['id_consult'] : null;
    }

    public function getArrayCopy()
    {
        return [
            'id'     => $this->id,
            'image' => $this->image,
            'id_consult'  => $this->id_consult,
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
            'name' => 'image',
            'required' => true,
            'filters' => [
                ['name' => Blob::class],
            ]
        ]);

        $inputFilter->add([
            'name' => 'id_consult',
            'required' => true,
            'filters' => [
                ['name' => ToInt::class],
            ],
        ]);

        $this->inputFilter = $inputFilter;
        return $this->inputFilter;
    }

}