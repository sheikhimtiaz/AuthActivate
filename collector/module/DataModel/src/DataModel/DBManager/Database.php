<?php
/**
 * Created by PhpStorm.
 * User: yasin
 * Date: 2/11/2016
 * Time: 8:13 PM
 */

namespace DataModel\DBManager;

//use MongoClient;
use \MongoDB\Driver\Manager;

class Database {

    private  $connection;
    private $db;
    private $collection;
    function __construct($dbName, $collectionName) {
        $this->connection = new Manager(); //connect to localhost mongoDB
        $this->db = $this->connection->$dbName;
        $this->collection = $this->db->$collectionName;
    }

    public function executeQueryInsert($docArr) {
        $this->collection->insert( $docArr );
    }
    public function executeQueryUpdate($arr1, $arr2) {
        $this->collection->update($arr1, $arr2);
    }

}