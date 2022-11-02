<?php

namespace Cardio\Model;

use Laminas\Db\ResultSet\ResultSet;
use Laminas\Db\Sql\Select;
use Laminas\Db\TableGateway\TableGatewayInterface;
use Laminas\Paginator\Adapter\DbSelect;
use Laminas\Paginator\Paginator;
use RuntimeException;

class ConsultTable
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
        $resultSetPrototype->setArrayObjectPrototype(new Consult());

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

    public function getConsult($id){
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

    public function saveConsult(Consult $consult)
    {
        $data = [
            'date' => $consult->date,
            'id_patient'  => $consult->id_patient,
            'personal_physiological_antecedents'  => $consult->personal_physiological_antecedents,
            'personal_pathological_antecedents' => $consult->personal_pathological_antecedents,
            'heredo_collateral_antecedents' => $consult->heredo_collateral_antecedents,
            'environment_conditions' => $consult->environment_conditions,
            'present_state' => $consult->present_state,
            'circulatory_system' => $consult->circulatory_system,
            'local_complementary_examinations' => $consult->local_complementary_examinations,
            'personal_antecedents' => $consult->personal_antecedents,
            'consult_reasons' => $consult->consult_reasons,
            'observations' => $consult->observations,
            'diagnostic' => $consult->diagnostic,
            'recommendations' => $consult->recommendations,
            'treatment' => $consult->treatment,
        ];

        $id = (int) $consult->id;

        if ($id === 0) {
            $this->tableGateway->insert($data);
            return;
        }

        try {
            $this->getConsult($id);
        } catch (RuntimeException $e) {
            throw new RuntimeException(sprintf(
                'Cannot update user with identifier %d; does not exist',
                $id
            ));
        }

        $this->tableGateway->update($data, ['id' => $id]);
    }

    public function deleteConsult($id)
    {
        $this->tableGateway->delete(['id' => (int) $id]);
    }
}