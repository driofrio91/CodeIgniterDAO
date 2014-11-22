<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once('application/dao/factory/gestor/gestorDAOFactories.php');
/**
 * Description of Users
 *
 * @author Sandy
 */

class Users extends CI_Controller {
    
    private $daoUser;
    
    public function __construct() {
        parent::__construct();
        $this->load->model('users_model');
        
    }

    public function getAll() {
        $daoUser = gestorDAOFactories::getInstance()->getFactory()->getIUserDAO();
        $daoUser->create(null);
        $allUsers['$allUsers'] = $this->users_model->getAll();

        $this->load->view('users/index', $allUsers);
    }

}
