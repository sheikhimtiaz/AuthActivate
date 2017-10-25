<?php
/**
 * Created by PhpStorm.
 * User: Saila
 * Date: 7/8/2015
 * Time: 7:59 PM
 */

namespace User\Controller;


use DataModel\Manager\AddressManager;
use DataModel\Manager\DataManager;
use DataModel\Manager\DishManager;
use DataModel\Manager\DriverManager;
use DataModel\Manager\MailManager;
use DataModel\Manager\MenuCategoryManager;
use DataModel\Manager\NotificationManager;
use DataModel\Manager\OrderManager;
use DataModel\Manager\PromotionManager;
use DataModel\Manager\ShopManager;
use DataModel\Manager\StripeAccountManager;
use DataModel\Manager\SuperAdminManager;
use DataModel\Manager\TransactionManager;
use DataModel\Manager\UserManager;
use DataModel\Manager\UserNodeManager;
use DataModel\Model\Address;
use DataModel\Model\AddressModel;
use DataModel\Model\ChatConnection;
use DataModel\Model\City;
use DataModel\Model\Constants;
use DataModel\Model\Customer;
use DataModel\Model\DishModel;
use DataModel\Model\GiftVoucher;
use DataModel\Model\GiftVoucherModel;
use DataModel\Model\LocationModel;
use DataModel\Model\Order;
use DataModel\Model\OrderItem;
use DataModel\Model\OrderModel;
use DataModel\Model\PromotionModel;
use DataModel\Model\PromotionModelShop;
use DataModel\Model\SettingsModel;
use DataModel\Model\Shop;
use DataModel\Model\ShopModel;
use DataModel\Model\ShopOrder;
use DataModel\Model\StripeConstraints;
use DataModel\Model\Town;
use DataModel\Model\Transaction;
use DataModel\Model\TransactionModel;
use DataModel\Model\UserModel;
use DataModel\Model\User;
use DataModel\Model\WfdArray;
use DataModel\Model\WFDMail;
use DataModel\Model\WfdModel;
use User\Form\LoginForm;
use DataModel\Model\UserTable;
use DataModel\Model\CategoryModel;
use User\Form\SignupForm;
use Zend\Console\Prompt\Number;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;
use Zend\Session\Container;
use DataModel\Model\FaqModel;
use DataModel\Manager\LocationManager;
use DataModel\Manager\SettingsManager;
use DataModel\Manager\WFDManager;

use Stripe_Charge;

class UserController extends AbstractActionController
{
    public function __construct()
    {
        $this->ImgDir = ROOT_PATH . "/public/img/profile/";
    }
    public function loginCheckAction()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $email = $data["email"];
        $password = $data["password"];

        return new JsonModel(array(
            'message' => "no match found",
        ));
    }


    public function logoutAction()
    {
        $container = new Container('User\Controller');
        $container->loggedIn = false;
        $container->userId = null;
        $container->chatConnection = null;
        $origin = $_SERVER["HTTP_REFERER"];
        $this->redirect()->toUrl($origin);
    }

    public function registerAction()
    {
        return new JsonModel(array());
    }

    public function loginAction()
    {

    }
    public function constructionAction() {
        $this->layout('layout/construction');
    }
    public function indexAction()
    {
        $this->layout('layout/index');
    }

    public function resultsAction() {
        $score = $_GET["score"];
        $fid = $_GET["fu"];
        $winIndex = $_GET["winInd"];
        if($winIndex>-1) {
            $arrKey = array('id'=>$fid);
            $userNode = (new UserNodeManager())->getUserNode($arrKey);
            $this->layout('layout/index');
            return array('score' => $score, 'fid' => $fid, 'user'=> $userNode, 'result' => Constants::$resutls[$winIndex]);
        } else {
            return array('score' => $score, 'fid' => $fid);
        }

    }
    public function privacyPolicyAction() {

    }
    public function saveUserBasicInfoAction() {
        $userData = $_POST['info'];
//        $userData = array('fb_id'=>123, 'name' => "saila lopa");
        (new UserNodeManager())->insertUserNode($userData);
        return new JsonModel(array());
    }
    public function updateUserDataAction() {
        $userData = $_POST['info'];
        $userPrevData = array('fb_id'=>123);
        $userData = array('name' => "Shaila Nasrin");
        (new UserNodeManager())->updateUserNode($userPrevData, $userData);
        return new JsonModel(array());
    }
    public function isLoggedInAction()
    {
        $container = new Container("User\Controller");
        if ($container->loggedIn == true)
            return new JsonModel(array('loggedIn' => true));
        else
            return new JsonModel(array('loggedIn' => false));
    }

    public function getFacebookAppIdAction()
    {
        $data = (new WfdModel())->getFacebookAppId()->toArray();
        if($data!=null  && count($data)>0 && $data[0]["settings_value"]!=null)
            return new JsonModel(array('appId'=>$data[0]["settings_value"]));
        else
        {
            return new JsonModel(array());
        }
    }
    public function addFacebookUserAction()
    {
        if(isset($_POST["email"]) && isset($_POST["fb_userId"]) && isset($_POST["name"]))
        {
            $email = $_POST["email"];
            $fb_userId = $_POST["fb_userId"];
            $name = $_POST["name"];
            $user = new User();
            $user->setEmail($email);
            $user->setFbUserId($fb_userId);
            $user->setUserType(7);
            $user->setName($name);

            $db = new UserManager();
            $isEmailRegistered = $db->isEmailRegistered($user);
            if ($isEmailRegistered)
            {
                $container = new Container('User\Controller');
                if($user->getUserType()==2)
                {
                    $container->loggedIn = false;
                    return new JsonModel(array(
                        'loggedIn' => false
                    ));
                }
                else
                {
                    $container->loggedIn = true;
                    $container->userId =$user->getUserId();
                    $container->email = $user->getEmail();
                    return new JsonModel(array(
                        'loggedIn' => true
                    ));
                }
            }
            else
            {
                $user->setPhoneNo(null);
                $user->setPassword(null);
                $user->setProfileImg(null);
                (new UserManager())->registerUser($user);
                $container = new Container('User\Controller');
                $container->loggedIn = true;
                $container->userId =$user->getUserId();
                $container->email = $user->getEmail();
                return new JsonModel(array(
                    'loggedIn' => true
                ));
            }
        }
        else
        {
            return new JsonModel(array(
                'loggedIn' => false
            ));
        }
    }


    public function atCommand($data)
    {
        $output = shell_exec("export id=$data; at -f bash_files/bash_script.sh now + 10 minutes");
        //$output = shell_exec('atq');
        //var_dump($output);
    }

}
