<?php
namespace Cardio\Controller;
use Cardio\Form\LoginForm;
use Cardio\Model\UserTable;
use Laminas\Db\Adapter\Adapter;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

class LoginController extends AbstractActionController{

    private $userTable;

    public function __construct( UserTable $userTable){
        $this->userTable = $userTable;
    }

    public function indexAction()
    {
        $loginForm = new LoginForm();
        return (new ViewModel(['form'=>$loginForm]));

    }

    public function loginAction(){
        $form = new LoginForm();
        $username = $form->getAttribute('username');
        $password = $form->getAttribute('password');
        try {
            $user = $this->userTable->fetchAccountByUsernameAndPassword($username,$password);
        } catch (\Exception $e) {
            return $this->redirect()->toRoute('user', ['action' => 'login']);
        }

        $form->get('submit')->setValue('Login');

        $request = $this->getRequest();

        if (! $request->isPost()) {
            return ['form' => $form];
        }

        return $this->redirect()->toRoute('welcome');
    }

}