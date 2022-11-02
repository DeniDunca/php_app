<?php
namespace Cardio\Controller;
use Cardio\Model\PatientTable;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

class PatientController extends AbstractActionController{

    private $patientTable;

    public function __construct( PatientTable $patientTable){
        $this->patientTable = $patientTable;

    }



}