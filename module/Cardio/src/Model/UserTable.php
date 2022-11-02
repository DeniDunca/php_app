<?php

namespace Cardio\Model;

use Laminas\Db\ResultSet\ResultSet;
use Laminas\Db\Sql\Predicate\In;
use Laminas\Db\Sql\Select;
use Laminas\Db\TableGateway\TableGatewayInterface;
use Laminas\Paginator\Adapter\DbSelect;
use Laminas\Paginator\Paginator;
use RuntimeException;
use Laminas\InputFilter;

class UserTable
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

    public function fetchAccountByUsernameAndPassword(string $username, string $password){
        $sqlQuery = $this->tableGateway->select(['username'=>$username,'password'=>$password]);
        $row = $sqlQuery->current();
        if(!$row){
            throw new RuntimeException(sprintf(
                "Could not find row with identifier %d",$username
            ));
        }
        return $row;
    }

    private function fetchPaginatedResults()
    {
        // Create a new Select object for the table:
        $select = new Select($this->tableGateway->getTable());

        // Create a new result set based on the Album entity:
        $resultSetPrototype = new ResultSet();
        $resultSetPrototype->setArrayObjectPrototype(new User());

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

    public function getUser($id){
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

    public function saveUser(User $user)
    {
        $data = [
            'username' => $user->username,
            'password'  => $user->password,
            'firstname'  => $user->firstname,
            'lastname'  => $user->lastname,
            'admin'  => $user->admin,
            'id_clinic'  => $user->id_clinic,
        ];

        $id = (int) $user->id;

        if ($id === 0) {
            $this->tableGateway->insert($data);
            return;
        }

        try {
            $this->getUser($id);
        } catch (RuntimeException $e) {
            throw new RuntimeException(sprintf(
                'Cannot update user with identifier %d; does not exist',
                $id
            ));
        }

        $this->tableGateway->update($data, ['id' => $id]);
    }


    public function deleteUser($id)
    {
        $this->tableGateway->delete(['id' => (int) $id]);
    }
}