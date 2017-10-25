<?php
namespace Admin\Controller;

use DataModel\Manager\UserManager;
use DataModel\Model\User;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;
use Zend\Session\Container;

use Admin\Form\LoginForm;
use DataModel\Model\UserModel;

class AdminController  extends AbstractActionController{
	protected $UserClass;

    public function logoutAction()
    {
        $container = new Container('Admin\Controller');
        foreach ($container->getArrayCopy() as $key => $item)
        {
            unset ($container->$key);
        }
        $this->redirect()->toRoute('admin/login');
    }
    public function getFromCache($key)
    {
        $sl = $this->getServiceLocator();
        $cache = $sl->get('cache');
        if ($cache->hasItem($key)) {
            return $cache->getItem($key);
        }
    }
    public function setToCache($key, $value)
    {
        $sl = $this->getServiceLocator();
        $cache = $sl->get('cache');
        $cache->setItem($key, $value);
    }
    public function  indexAction() {
        $container = new Container('Admin\Controller');
        if($container->loggedIn == true)
        {
           $this->redirect()->toRoute('admin/order');
        }
        else {
            $this->redirect()->toRoute('admin/login');
        }
    }
    public function loginAction()
    {
        $form = new LoginForm();
        $form->get('submit')->setValue('login');
        $request = $this->getRequest();
        if($request->isPost())
        {
            $form->setData($request->getPost());
            $form->setInputFilter($form->getInputFilter());
            if($form->isValid())
            {
                $data = $form->getData();
                $email = (!empty($data['email'])) ? $data['email'] : null;
                $password  = (!empty($data['password'])) ? $data['password'] : null;
                $userManager = new UserManager();
                $user = new User();
                $user->setEmail($email);
                $user->setPassword($password);
                $userManager->AdminLogin($user);
                if($user->getLoggedIn())
                {
                    $container = new Container('Admin\Controller');
                    $container->loggedIn = true;
                    $container->userId = $user->getUserId();
                    $this->redirect()->toRoute('admin');
                }
                else
                    return array('data' => 'no match found');
            }
            else
            return array('data' => "Invalid form data");
        }

        return array('form' => $form);
    }
}