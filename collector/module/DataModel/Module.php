<?php
/**
 * Created by PhpStorm.
 * User: Saila
 * Date: 6/24/2015
 * Time: 12:33 PM
 */

namespace DataModel;

use DataModel\Model\AddonGroup;
use DataModel\Model\AddonGroupTable;
use DataModel\Model\AddonTable;
use DataModel\Model\Address;
use DataModel\Model\AddressTable;
use DataModel\Model\ChatConnection;
use DataModel\Model\ChatConnectionTable;
use DataModel\Model\DriverAttendance;
use DataModel\Model\Option;
use DataModel\Model\Order;
use DataModel\Model\OrderTable;
use DataModel\Model\Promotion;
use DataModel\Model\PromotionTable;
use DataModel\Model\PromotionShop;
use DataModel\Model\PromotionTableShop;
use DataModel\Model\ShopInvoice;
use DataModel\Model\ShopInvoiceTable;
use DataModel\Model\ShopOrder;
use DataModel\Model\ShopOrderTable;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\Mvc\ModuleRouteListener;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\ResultSet\ResultSet;

use DataModel\Model\ShopTable;
use DataModel\Model\DishTable;
use DataModel\Model\UserTable;
use DataModel\Model\OptionTable;
use DataModel\Model\Shop;
use DataModel\Model\Dish;
use DataModel\Model\DriverInvoice;
use DataModel\Model\DriverInvoiceTable;
use DataModel\Model\DriverAttendenceTable;




class Module implements AutoloaderProviderInterface, ConfigProviderInterface
{
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
    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'cache' => function () {
                    return \Zend\Cache\StorageFactory::factory(array(
                        'adapter' => array(
                            'name' => 'filesystem',
                            'options' => array(
                                'cache_dir' => __DIR__ . '/../../data/cache',
                                'ttl' => 9000
                            ),
                        ),
                        'plugins' => array(
                            array(
                                'name' => 'serializer',
                                'options' => array(

                                )
                            )
                        )
                    ));
                },
                'DataModel\Model\AddonGroupTable' => function ($sm) {
                    $tableGateway = $sm->get('AddonGroupTableGateway');
                    $table = new AddonGroupTable($tableGateway);
                    return $table;
                },
                'AddonGroupTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new AddonGroup());
                    return new TableGateway('addon_group', $dbAdapter, null, $resultSetPrototype);
                },
                'DataModel\Model\OrderTable' => function ($sm) {
                    $tableGateway = $sm->get('OrderTableGateway');
                    $table = new OrderTable($tableGateway);
                    return $table;
                },
                'OrderTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Order());
                    return new TableGateway('order', $dbAdapter, null, $resultSetPrototype);
                },
                'DataModel\Model\ShopOrderTable' => function ($sm) {
                    $tableGateway = $sm->get('ShopOrderTableGateway');
                    $table = new ShopOrderTable($tableGateway);
                    return $table;
                },
                'ShopOrderTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new ShopOrder());
                    return new TableGateway('shop_order', $dbAdapter, null, $resultSetPrototype);
                },
                'DataModel\Model\AddonTable' => function ($sm) {
                    $tableGateway = $sm->get('AddonTableGateway');
                    $table = new AddonTable($tableGateway);
                    return $table;
                },
                'AddonTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Shop());
                    return new TableGateway('dish_add_on', $dbAdapter, null, $resultSetPrototype);
                },
                'DataModel\Model\OptionTable' => function ($sm) {
                    $tableGateway = $sm->get('OptionTableGateway');
                    $table = new OptionTable($tableGateway);
                    return $table;
                },
                'OptionTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Shop());
                    return new TableGateway('dish_option', $dbAdapter, null, $resultSetPrototype);
                },
                'DataModel\Model\UserTable' => function ($sm) {
                    $tableGateway = $sm->get('UserTableGateway');
                    $table = new UserTable($tableGateway);
                    return $table;
                },
                'UserTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Shop());
                    return new TableGateway('users', $dbAdapter, null, $resultSetPrototype);
                },
                'DataModel\Model\ShopTable' => function ($sm) {
                    $tableGateway = $sm->get('ShopTableGateway');
                    $table = new ShopTable($tableGateway);
                    return $table;
                },
                'ShopTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Shop());
                    return new TableGateway('shop', $dbAdapter, null, $resultSetPrototype);
                },
                'DataModel\Model\DishTable' => function ($sm) {
                    $tableGateway = $sm->get('DishTableGateway');
                    $table = new DishTable($tableGateway);
                    return $table;
                },
                'DishTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Dish());
                    return new TableGateway('dish', $dbAdapter, null, $resultSetPrototype);
                },
                'DataModel\Model\PromotionTable' => function ($sm) {
                    $tableGateway = $sm->get('PromotionTableGateway');
                    $table = new PromotionTable($tableGateway);
                    return $table;
                },
                'PromotionTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Promotion());
                    return new TableGateway('offer_table', $dbAdapter, null, $resultSetPrototype);
                },
                'DataModel\Model\AddressTable' => function ($sm) {
                    $tableGateway = $sm->get('AddressTableGateway');
                    $table = new AddressTable($tableGateway);
                    return $table;
                },
                'AddressTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Address());
                    return new TableGateway('address_book', $dbAdapter, null, $resultSetPrototype);
                },
                'DataModel\Model\AddressTable' => function ($sm) {
                    $tableGateway = $sm->get('AddressTableGateway');
                    $table = new AddressTable($tableGateway);
                    return $table;
                },
                'AddressTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Address());
                    return new TableGateway('address_book', $dbAdapter, null, $resultSetPrototype);
                },
                'DataModel\Model\PromotionTableShop' => function ($sm) {
                    $tableGateway = $sm->get('PromotionTableShopGateway');
                    $table = new PromotionTableShop($tableGateway);
                    return $table;
                },
                'PromotionTableShopGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new PromotionShop());
                    return new TableGateway('offer_table_shop', $dbAdapter, null, $resultSetPrototype);
                },
                'DataModel\Model\ChatConnectionTable' => function ($sm) {
                    $tableGateway = $sm->get('ChatConnectionTableGateway');
                    $table = new ChatConnectionTable($tableGateway);
                    return $table;
                },
                'ChatConnectionTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new ChatConnection());
                    return new TableGateway('msg_user_mapping', $dbAdapter, null, $resultSetPrototype);
                },
                'DataModel\Model\ShopInvoiceTable' => function ($sm) {
                    $tableGateway = $sm->get('ShopInvoiceTableGateway');
                    $table = new ShopInvoiceTable($tableGateway);
                    return $table;
                },
                'ShopInvoiceTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new ShopInvoice());
                    return new TableGateway('shop_invoice', $dbAdapter, null, $resultSetPrototype);
                },
                'DataModel\Model\DriverInvoiceTable' => function ($sm) {
                    $tableGateway = $sm->get('DriverInvoiceTableGateway');
                    $table = new DriverInvoiceTable($tableGateway);
                    return $table;
                },
                'DriverInvoiceTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new DriverInvoice());
                    return new TableGateway('driver_invoice', $dbAdapter, null, $resultSetPrototype);
                },
                'DataModel\Model\DriverAttendenceTable' => function ($sm) {
                    $tableGateway = $sm->get('DriverAttendenceTableGateway');
                    $table = new DriverAttendenceTable($tableGateway);
                    return $table;
                },
                'DriverAttendenceTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new DriverAttendance());
                    return new TableGateway('driver_attendance', $dbAdapter, null, $resultSetPrototype);
                },
            ),
        );
    }
}