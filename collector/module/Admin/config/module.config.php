<?php
    return array(
    'controllers' => array(
        'invokables' => array(
            'Admin\Controller\Admin' => 'Admin\Controller\AdminController',
        ),
    ),

    'router' => array(
        'routes' => array(
        		'admin' => array(
        				'type'    => 'Literal',
        				'options' => array(
        						'route'    => '/admin',
        						'defaults' => array(
        								'__NAMESPACE__' => 'Admin\Controller',
        								'controller'    => 'Admin',
        								'action'        => 'index',
        						),
        				),
                        'may_terminate' => true,
        				'child_routes' => array(
                            'login' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/login',
                                    'defaults' => array(
                                        'action' => 'login',
                                    ),
                                ),
                            ),
                            'logout' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/logout',
                                    'defaults' => array(
                                        'action' => 'logout',
                                    ),
                                ),
                            ),
                        ),
        		),
        ),
    ),

    'view_manager' => array(
        'template_map' => array(
            'layout/layout' => __DIR__ . '/../view/layout/admin.phtml',
        ),
        'template_path_stack' => array(
            'admin' => __DIR__ . '/../view',
            ),
    		'strategies' => array(
    				'ViewJsonStrategy',
    		),
    	),

    );


