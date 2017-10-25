<?php
/**
 * Created by PhpStorm.
 * User: Shaila
 * Date: 10/20/2017
 * Time: 10:23 PM
 */

namespace DataModel\Manager;


use DataModel\DBManager\Database;

class UserNodeManager
{
    public function insertUserNode($arrNode) {
        (new Database("fbGraphDb", "users"))->executeQueryInsert($arrNode);
    }
    public function updateUserNode($arr1, $arr2) {
        (new Database("fbGraphDb", "users"))->executeQueryUpdate($arr1, $arr2);
    }
    public function getUserNode($key) {

    }
}