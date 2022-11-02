<?php
namespace Cardio\Controller;

use Cardio\Model\User;
use Cardio\Form\SignUpForm;
use Cardio\Model\UserTable;
use Laminas\Mvc\Controller\AbstractActionController;

class AuthController extends AbstractActionController{

    private $userTable;


    public function __construct(UserTable $userTable){
        $this->userTable = $userTable;
    }
    public function indexAction(){

        $form = new SignUpForm();
        $form->get('submit')->setValue('Add');

        $request = $this->getRequest();

        if (! $request->isPost()) {
            return ['form' => $form];
        }

        $user = new User();
        $form->setInputFilter($user->getInputFilter());
        $form->setData($request->getPost());

        if (! $form->isValid()) {
            return ['form' => $form];
        }

        $user->exchangeArray($form->getData());
        $this->userTable->saveUser($user);
        return $this->redirect()->toRoute('user');
    }
}