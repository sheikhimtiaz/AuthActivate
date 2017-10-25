<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'User\Controller\User' => 'User\Controller\UserController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        '__NAMESPACE__' => 'User\Controller',
                        'controller' => 'User',
                        //'action'     => 'construction',
                        'action'     => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'isLoggedIn' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => 'isLoggedIn',
                            'defaults' => array(
                                'action' => 'isLoggedIn',
                            ),
                        ),
                    ),
                    'privacy-policy' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => 'privacy-policy',
                            'defaults' => array(
                                'action' => 'privacyPolicy',
                            ),
                        ),
                    ),
                    'save-basic-info' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => 'save-basic-info',
                            'defaults' => array(
                                'action' => 'saveUserBasicInfo',
                            ),
                        ),
                    ),
                    'results' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => 'results',
                            'defaults' => array(
                                'action' => 'results',
                            ),
                        ),
                    ),
                    'addFacebookUser' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => 'addFacebookUser',
                            'defaults' => array(
                                'action' => 'addFacebookUser',
                            ),
                        ),
                    ),
                    'getFacebookAppId' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => 'getFacebookAppId',
                            'defaults' => array(
                                'action' => 'getFacebookAppId',
                            ),
                        ),
                    ),
                    'login' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => 'login',
                            'defaults' => array(
                                'action' => 'login',
                            ),
                        ),
                    ),
                    'loginCheck' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => 'loginCheck',
                            'defaults' => array(
                                'action' => 'loginCheck',
                            ),
                        ),
                    ),
                    'logout' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => 'logout',
                            'defaults' => array(
                                'action' => 'logout',
                            ),
                        ),
                    ),
                    'signup' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => 'signup',
                            'defaults' => array(
                                'action' => 'signup',
                            ),
                        ),
                    ),
                    'register' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => 'register',
                            'defaults' => array(
                                'action' => 'register',
                            ),
                        ),
                    ),
                    'jsonLogin' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => 'jsonLogin',
                            'defaults' => array(
                                'action' => 'jsonLogin',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_map' => array(
            'layout/index' => __DIR__ . '/../view/layout/home.phtml',
         ),
        'template_path_stack' => array(
            'user' => __DIR__ . '/../view',
        ),
        'strategies' => array(
            'ViewJsonStrategy',
        ),
    ),
);