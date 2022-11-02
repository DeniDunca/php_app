<?php

namespace Cardio\Controller;

use Cardio\Form\NewPatientForm;
use Cardio\Model\Patient;
use Cardio\Model\PatientTable;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

class PatientController extends AbstractActionController{

    private $table;

    public function __construct(PatientTable $table)
    {
        $this->table = $table;
    }

    public function indexAction()
    {
        $paginator = $this->table->fetchAll(true);

        $page = (int) $this->params()->fromQuery('page', 1);
        $page = ($page < 1) ? 1 : $page;
        $paginator->setCurrentPageNumber($page);

        // Set the number of items per page to 10:
        $paginator->setItemCountPerPage(10);

        return new ViewModel(['paginator' => $paginator]);
    }


    public function addPatientAction()
    {
        $form = new NewPatientForm();
        $form->get('submit')->setValue('Add');

        $request = $this->getRequest();

        if (! $request->isPost()) {
            return ['form' => $form];
        }

        $user = new Patient();
        $form->setInputFilter($user->getInputFilter());
        $form->setData($request->getPost());

        if (! $form->isValid()) {
            return ['form' => $form];
        }

        $user->exchangeArray($form->getData());
        $this->table->savePatient($user);
        return $this->redirect()->toRoute('patients');
    }

    public function editPatientAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);

        if (0 === $id) {
            return $this->redirect()->toRoute('patients', ['action' => 'add']);
        }

        try {
            $user = $this->table->getPatient($id);
        } catch (\Exception $e) {
            return $this->redirect()->toRoute('patients', ['action' => 'patient']);
        }

        $form = new NewPatientForm();
        $form->bind($user);
        $form->get('submit')->setAttribute('value', 'Edit');

        $request = $this->getRequest();
        $viewData = ['id' => $id, 'form' => $form];

        if (! $request->isPost()) {
            return $viewData;
        }

        $form->setInputFilter($user->getInputFilter());
        $form->setData($request->getPost());

        if (! $form->isValid()) {
            return $viewData;
        }

        try {
            $this->table->savePatient($user);
        } catch (\Exception $e) {
        }

        return $this->redirect()->toRoute('patients', ['action' => 'patient']);
    }

    public function deleteAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('patients');
        }

        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->getPost('del', 'No');

            if ($del == 'Yes') {
                $id = (int) $request->getPost('id');
                $this->table->deletePatient($id);
            }

            return $this->redirect()->toRoute('patients');
        }

        return [
            'id'    => $id,
            'patients' => $this->table->getPatient($id),
        ];
    }
}