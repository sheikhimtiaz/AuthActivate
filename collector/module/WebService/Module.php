<?php
/**
 * Created by PhpStorm.
 * User: Saila
 * Date: 9/1/2015
 * Time: 4:13 PM
 */

namespace WebService;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\EventManager\EventInterface as Event;
use Zend\Mvc\ModuleRouteListener;
use Zend\ModuleManager\ModuleManager;
use Zend\Mvc\MvcEvent;
use Zend\Session\Container;
use Zend\Session\SessionManager;

class Module implements AutoloaderProviderInterface, ConfigProviderInterface{

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
    public function init(ModuleManager $moduleManager)
    {
        // Remember to keep the init() method as lightweight as possible
        $events = $moduleManager->getEventManager();
        $events->attach('loadModules.post', array($this, 'modulesLoaded'));
        $sharedEvents = $events->getSharedManager();
    }
    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Zend\Session\SessionManager' => function ($sm) {
                    $config = $sm->get('config');
                    $sessionManager = null;
                    if (isset($config['session'])) {
                        $session = $config['session'];

                        $sessionConfig = null;
                        if (isset($session['config'])) {
                            $class = isset($session['config']['class'])  ? $session['config']['class'] : 'Zend\Session\Config\SessionConfig';
                            $options = isset($session['config']['options']) ? $session['config']['options'] : array();
                            $sessionConfig = new $class();
                            $sessionConfig->setOptions($options);
                        }

                        $sessionStorage = null;
                        if (isset($session['storage'])) {
                            $class = $session['storage'];
                            $sessionStorage = new $class();
                        }

                        $sessionSaveHandler = null;
                        if (isset($session['save_handler'])) {
                            // class should be fetched from service manager since it will require constructor arguments
                            $sessionSaveHandler = $sm->get($session['save_handler']);
                        }

                        $sessionManager = new SessionManager($sessionConfig, $sessionStorage, $sessionSaveHandler);
                    } else {
                        $sessionManager = new SessionManager();
                    }
                    Container::setDefaultManager($sessionManager);
                    return $sessionManager;
                },
            ),
        );
    }
    public function modulesLoaded(Event $e)
    {
        // This method is called once all modules are loaded.
        $moduleManager = $e->getTarget();
        $loadedModules = $moduleManager->getLoadedModules();
        // To get the configuration from another module named 'FooModule'
        $config = $moduleManager->getModule('DataModel')->getConfig();
    }
}{

}