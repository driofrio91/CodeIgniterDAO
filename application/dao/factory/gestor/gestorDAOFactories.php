<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once ('application/dao/factory/factories/mysqlDaoFactory.php');
/**
 * Description of gestorDAOFactories
 *
 * @author danny
 */
class gestorDAOFactories {
    
    public static $gestorDAOFactories = null;
    
    function __construct() {
        
    }
    
    public static function getInstance(){
       
        if (gestorDAOFactories::$gestorDAOFactories === null) {
            $gestorDAOFactories = new gestorDAOFactories();
        }
        return $gestorDAOFactories;
    }

    public function getFactory(){
        return new mysqlDaoFactory();
    }
}
