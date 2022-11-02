<?php

namespace Cardio\Model;

use Laminas\Db\ResultSet\ResultSet;
use Laminas\Db\Sql\Select;
use Laminas\Db\TableGateway\TableGatewayInterface;
use Laminas\Paginator\Adapter\DbSelect;
use Laminas\Paginator\Paginator;
use RuntimeException;

class PatientTable
{
    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway){
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll($paginated = false)
    {
        if ($paginated) {
            return $this->fetchPaginatedResults();
        }
        return $this->tableGateway->select();
    }

    private function fetchPaginatedResults()
    {
        // Create a new Select object for the table:
        $select = new Select($this->tableGateway->getTable());

        // Create a new result set based on the Album entity:
        $resultSetPrototype = new ResultSet();
        $resultSetPrototype->setArrayObjectPrototype(new Patient());

        // Create a new pagination adapter object:
        $paginatorAdapter = new DbSelect(
        // our configured select object:
            $select,
            // the adapter to run it against:
            $this->tableGateway->getAdapter(),
            // the result set to hydrate:
            $resultSetPrototype
        );
        return new Paginator($paginatorAdapter);
    }

    public function getPatient($id){
        $id = (int) $id;
        $rowset = $this->tableGateway->select(['id'=>$id]);
        $row = $rowset->current();
        if(!$row){
            throw new RuntimeException(sprintf(
                "Could not find row with identifier %d",$id
            ));
        }

        return $row;
    }

    public function savePatient(Patient $patient)
    {
        $data = [
            'firstname' => $patient->firstname,
            'lastname'  => $patient->lastname,
            'date_of_birth'  => $patient->date_of_birth,
            'patient_number'  => $patient->patient_number,
            'county'  => $patient->county,
            'city'  => $patient->city,
            'address'  => $patient->address,
            'occupation'  => $patient->occupation,
            'job'  => $patient->job,
            'phone'  => $patient->phone,
            'email'  => $patient->email,
            'cnp'  => $patient->cnp,
            'marital_status'  => $patient->marital_status,
        ];

        $id = (int) $patient->id;

        if ($id === 0) {
            $this->tableGateway->insert($data);
            return;
        }

        try {
            $this->getPatient($id);
        } catch (RuntimeException $e) {
            throw new RuntimeException(sprintf(
                'Cannot update user with identifier %d; does not exist',
                $id
            ));
        }

        $this->tableGateway->update($data, ['id' => $id]);
    }

    public function deletePatient($id)
    {
        $this->tableGateway->delete(['id' => (int) $id]);
    }

}