<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once ('application/dao/factory/factoryDAO.php');
include_once ('application/dao/mysqldao/EasyTaskGroupDao.php');
include_once ('application/dao/mysqldao/EasyTaskListTaskDao.php');
include_once ('application/dao/mysqldao/EasyTaskTaskDao.php');
include_once ('application/dao/mysqldao/EasyTaskUserDao.php');
include_once ('application/dao/mysqldao/EasyTaskUserGroupDao.php');
/**
 * Description of mysqlDaoFactory
 *
 * @author danny
 */
class mysqlDaoFactory implements factoryDAO{
    
    public function getIGroupDAO() {
        return new EasyTaskGroupDao();
    }

    public function getIListTaskDAO() {
        return new EasyTaskListTaskDao();
    }

    public function getITaskDAO() {
        return new EasyTaskTaskDao();
    }

    public function getIUserDAO() {
        return new EasyTaskUserDao();
    }

    public function getIUserGroupDAO() {
        return new EasyTaskUserGroupDao();
    }

}
