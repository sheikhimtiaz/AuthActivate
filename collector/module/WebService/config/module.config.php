<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'WebService\Controller\DriverService' => 'WebService\Controller\DriverServiceController',
            'WebService\Controller\ShopService' => 'WebService\Controller\ShopServiceController',
            'WebService\Controller\UserService' => 'WebService\Controller\UserServiceController',
            'WebService\Controller\MerchantAppService' => 'WebService\Controller\MerchantAppServiceController',
            'WebService\Controller\CustomerService' => 'WebService\Controller\CustomerServiceController'
        ),
    ),
    'router' => array(
        'routes' => array(
            'service' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/service',
                    'defaults' => array(
                        '__NAMESPACE__' => 'WebService\Controller',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'user' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/user',
                            'defaults' => array(
                                'controller' => 'UserService',
                                'action' => 'index',
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
                            'forget-password' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/forget-password',
                                    'defaults' => array(
                                        'action' => 'forgetPassword',
                                    ),
                                ),
                            ),
                            'register' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/register',
                                    'defaults' => array(
                                        'action' => 'register',
                                    ),
                                ),
                            ),
                        ),
                    ),
                    'delivery' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/delivery',
                            'defaults' => array(
                                'controller' => 'DriverService',
                                'action' => 'index',
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
                            'sendMailTest' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/sendMailTest',
                                    'defaults' => array(
                                        'action' => 'sendMailTest',
                                    ),
                                ),
                            ),
                            'sendPush' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/sendPush',
                                    'defaults' => array(
                                        'action' => 'sendPush',
                                    ),
                                ),
                            ),
                            'autoRejectDeliveryRequestAfterTimeout' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/autoRejectDeliveryRequestAfterTimeout',
                                    'defaults' => array(
                                        'action' => 'autoRejectDeliveryRequestAfterTimeout',
                                    ),
                                ),
                            ),
                            'uploadFile' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/uploadFile',
                                    'defaults' => array(
                                        'action' => 'uploadFile',
                                    ),
                                ),
                            ),
                            'verifyToken' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/verifyToken',
                                    'defaults' => array(
                                        'action' => 'verifyToken',
                                    ),
                                ),
                            ),
                            'updateDriveriOSDeviceId' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/updateDriveriOSDeviceId',
                                    'defaults' => array(
                                        'action' => 'updateDriveriOSDeviceId',
                                    ),
                                ),
                            ),
                            'sendPushMsg' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/sendPushMsg',
                                    'defaults' => array(
                                        'action' => 'sendPushMsg',
                                    ),
                                ),
                            ),
                            'reviewMerchant' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/reviewMerchant',
                                    'defaults' => array(
                                        'action' => 'reviewMerchant',
                                    ),
                                ),
                            ),
                            'getNewRequests' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/getNewRequests',
                                    'defaults' => array(
                                        'action' => 'getNewRequests',
                                    ),
                                ),
                            ),
                            'getDeliveryRequestDetails' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/getDeliveryRequestDetails',
                                    'defaults' => array(
                                        'action' => 'getDeliveryRequestDetails',
                                    ),
                                ),
                            ),
                            'updateDeliveryRequestStatus' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/updateDeliveryRequestStatus',
                                    'defaults' => array(
                                        'action' => 'updateDeliveryRequestStatus',
                                    ),
                                ),
                            ),
                            'insertLiveChatMsg' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/insertLiveChatMsg',
                                    'defaults' => array(
                                        'action' => 'insertLiveChatMsg',
                                    ),
                                ),
                            ),
                            'checkForNewMsg' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/checkForNewMsg',
                                    'defaults' => array(
                                        'action' => 'checkForNewMsg',
                                    ),
                                ),
                            ),
                            'updateMsgStatus' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/updateMsgStatus',
                                    'defaults' => array(
                                        'action' => 'updateMsgStatus',
                                    ),
                                ),
                            ),
                            'register' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/register',
                                    'defaults' => array(
                                        'action' => 'register',
                                    ),
                                ),
                            ),
                            'getorder' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/getorder',
                                    'defaults' => array(
                                        'action' => 'getOrders',
                                    ),
                                ),
                            ),
                            'getNewMsgFromMerchant' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/getNewMsgFromMerchant',
                                    'defaults' => array(
                                        'action' => 'getNewMsgFromMerchant',
                                    ),
                                ),
                            ),
                            'getNewMsgCountForDriver' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/getNewMsgCountForDriver',
                                    'defaults' => array(
                                        'action' => 'getNewMsgCountForDriver',
                                    ),
                                ),
                            ),
                            'getNewRequestCount' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/getNewRequestCount',
                                    'defaults' => array(
                                        'action' => 'getNewRequestCount',
                                    ),
                                ),
                            ),
                            'updateorderstatus' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/updateorderstatus',
                                    'defaults' => array(
                                        'action' => 'updateOrderStatus',
                                    ),
                                ),
                            ),
                            'updatedriverlocation' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/updatedriverlocation',
                                    'defaults' => array(
                                        'action' => 'updateDriverLocation',
                                    ),
                                ),
                            ),
                            'getsessionstatus' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/getsessionstatus',
                                    'defaults' => array(
                                        'action' => 'getsessionstatus',
                                    ),
                                ),
                            ),
                            'startsession' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/startsession',
                                    'defaults' => array(
                                        'action' => 'startsession',
                                    ),
                                ),
                            ),
                            'endsession' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/endsession',
                                    'defaults' => array(
                                        'action' => 'endsession',
                                    ),
                                ),
                            ),
                        ),
                    ),
                    'shop' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/shop',
                            'defaults' => array(
                                'controller' => 'ShopService',
                                'action' => 'index',
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
                            'shoplist' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/shoplist',
                                    'defaults' => array(
                                        'action' => 'getRestaurantList',
                                    ),
                                ),
                            ),
                            'dishlist' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/dishlist',
                                    'defaults' => array(
                                        'action' => 'getrestaurantdishlistAction',
                                    ),
                                ),
                            ),
                            'categoryList' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/catlist',
                                    'defaults' => array(
                                        'action' => 'getDishCategoryList',
                                    ),
                                ),
                            ),
                        ),
                    ),
                    'merchantLogin' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/merchantLogin',
                            'defaults' => array(
                                'controller' => 'MerchantAppService',
                                'action' => 'login',
                            ),
                        ),
                    ),
                    'merchant' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/merchant',
                            'defaults' => array(
                                'controller' => 'MerchantAppService',
                                'action' => 'index',
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
                            'sendIosPush' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/sendIosPush',
                                    'defaults' => array(
                                        'action' => 'sendIosPush',
                                    ),
                                ),
                            ),
                            'remove-firebase-token' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/remove-firebase-token',
                                    'defaults' => array(
                                        'action' => 'removeFirebaseToken',
                                    ),
                                ),
                            ),
                            'update-order-status' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/update-order-status',
                                    'defaults' => array(
                                        'action' => 'updateOrderStatus',
                                    ),
                                ),
                            ),
                            'get-order-details' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/get-order-details',
                                    'defaults' => array(
                                        'action' => 'getOrderDetails',
                                    ),
                                ),
                            ),
                            'get-order' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/get-order',
                                    'defaults' => array(
                                        'action' => 'getAllOrder',
                                    ),
                                ),
                            ),
                            'save-merchant-fcm-token' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/save-merchant-fcm-token',
                                    'defaults' => array(
                                        'action' => 'saveMerchantFcmToken',
                                    ),
                                ),
                            ),
                            'verifyToken' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/verifyToken',
                                    'defaults' => array(
                                        'action' => 'verifyToken',
                                    ),
                                ),
                            ),
                            'updateMsgStatus' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/updateMsgStatus',
                                    'defaults' => array(
                                        'action' => 'updateMsgStatus',
                                    ),
                                ),
                            ),
                            'checkForNewMsg' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/checkForNewMsg',
                                    'defaults' => array(
                                        'action' => 'checkForNewMsg',
                                    ),
                                ),
                            ),
                            'getDistance' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/getDistance',
                                    'defaults' => array(
                                        'action' => 'getDistance',
                                    ),
                                ),
                            ),
                            'reviewDriver' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/reviewDriver',
                                    'defaults' => array(
                                        'action' => 'reviewDriver',
                                    ),
                                ),
                            ),
                            'cancel-delivery-request' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/cancel-delivery-request',
                                    'defaults' => array(
                                        'action' => 'cancelDeliveryRequest',
                                    ),
                                ),
                            ),
                            'getDriverInfoForShop' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/getDriverInfoForShop',
                                    'defaults' => array(
                                        'action' => 'getDriverInfoForShop',
                                    ),
                                ),
                            ),
                            'sendDeliveryRequest' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/sendDeliveryRequest',
                                    'defaults' => array(
                                        'action' => 'sendDeliveryRequest',
                                    ),
                                ),
                            ),
                            'insertLiveChatMsg' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/insertLiveChatMsg',
                                    'defaults' => array(
                                        'action' => 'insertLiveChatMsg',
                                    ),
                                ),
                            ),
                            'getDeliveryRequestDetails' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/getDeliveryRequestDetails',
                                    'defaults' => array(
                                        'action' => 'getDeliveryRequestDetails',
                                    ),
                                ),
                            ),
                            'getAllDrivers' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/getAllDrivers',
                                    'defaults' => array(
                                        'action' => 'getAllDrivers',
                                    ),
                                ),
                            ),
                            'getRequestList' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/getRequestList',
                                    'defaults' => array(
                                        'action' => 'getRequestList',
                                    ),
                                ),
                            ),
                            'getNewOrderCount' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/getNewOrderCount',
                                    'defaults' => array(
                                        'action' => 'getNewOrderCount',
                                    ),
                                ),
                            ),
                            'getNewMsgFromDriver' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/getNewMsgFromDriver',
                                    'defaults' => array(
                                        'action' => 'getNewMsgFromDriver',
                                    ),
                                ),
                            ),
                            'getDeliveryRequestStatusNotification' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/getDeliveryRequestStatusNotification',
                                    'defaults' => array(
                                        'action' => 'getDeliveryRequestStatusNotification',
                                    ),
                                ),
                            ),
                            'updateDeliveryRequestStatusNotifications' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/updateDeliveryRequestStatusNotifications',
                                    'defaults' => array(
                                        'action' => 'updateDeliveryRequestStatusNotifications',
                                    ),
                                ),
                            ),
                        ),
                    ),
                    'customer' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/customer',
                            'defaults' => array(
                                'controller' => 'CustomerService',
                                'action' => 'index',
                            ),
                        ),
                        'may_terminate' => true,
                        'child_routes' => array(
                            'get-shop-list' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/get-shop-list',
                                    'defaults' => array(
                                        'action' => 'getShopList',
                                    ),
                                ),
                            ),
                            'get-shop-info' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/get-shop-info',
                                    'defaults' => array(
                                        'action' => 'getShopInfo',
                                    ),
                                ),
                            ),
                            'get-shop-menu-category' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/get-shop-menu-category',
                                    'defaults' => array(
                                        'action' => 'getShopMenuCategory',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_map' => array(
        ),
        'template_path_stack' => array(
            'webservice' => __DIR__ . '/../view',
        ),
        'strategies' => array(
            'ViewJsonStrategy',
        ),
    ),
);