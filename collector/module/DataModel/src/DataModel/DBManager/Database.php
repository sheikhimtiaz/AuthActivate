<?php
/**
 * Created by PhpStorm.
 * User: yasin
 * Date: 2/11/2016
 * Time: 8:13 PM
 */

namespace DataModel\DBManager;

class Database {

    private $db;
    private $collection;
    function __construct($dbName, $collectionName) {
        $this->db = $dbName;
        $this->collection = $collectionName;
    }

    public function executeQueryInsert($docArr) {
        try {
            $mng = new \MongoDB\Driver\Manager("mongodb://localhost:27017");
            $bulk = new \MongoDB\Driver\BulkWrite;
            $id = new \MongoDB\BSON\ObjectID;
            $docArr['_id'] = $id;
            $bulk->insert($docArr);
            $mng->executeBulkWrite($this->db .'.'. $this->collection, $bulk);
        } catch (\MongoDB\Driver\Exception\Exception $e) {
            $filename = basename(__FILE__);
            echo "The $filename script has experienced an error.\n";
            echo "It failed with the following exception:\n";
            echo "Exception:", $e->getMessage(), "\n";
            echo "In file:", $e->getFile(), "\n";
            echo "On line:", $e->getLine(), "\n";
        }
    }
    public function executeQueryUpdate($arr1, $arr2) {
        try {
            $mng = new \MongoDB\Driver\Manager("mongodb://localhost:27017");
            $bulk = new \MongoDB\Driver\BulkWrite;
//            $doc = ['_id' => new \MongoDB\BSON\ObjectID, 'name' => 'Toyota', 'price' => 26700];
//            $bulk->insert($doc);
            $bulk->update($arr1, ['$set' => $arr2]);
            $mng->executeBulkWrite($this->db .'.'. $this->collection, $bulk);
        } catch (\MongoDB\Driver\Exception\Exception $e) {
            $filename = basename(__FILE__);
            echo "The $filename script has experienced an error.\n";
            echo "It failed with the following exception:\n";
            echo "Exception:", $e->getMessage(), "\n";
            echo "In file:", $e->getFile(), "\n";
            echo "On line:", $e->getLine(), "\n";
        }

    }

}