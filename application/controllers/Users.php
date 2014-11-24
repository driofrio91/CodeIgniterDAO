<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once('application/crud/CRUD.php');

/**
 * Description of Users
 *
 * @author Sandy
 */
class Users extends CI_Controller {


    public function __construct() {
        parent::__construct();
        $this->load->model('users_model');
    }

    public function create($name, $nick, $email, $password, $idGCM) {

        $user = new Users_model($name, $nick, $email, $password, $idGCM);
        $userInsert['users'] = $this->users_model->create($user);
        $this->load->view('users/index', $userInsert);
    }

    public function delete($object) {
        
    }

    public function read($id) {
        
    }

    public function update($object) {
        
    }

    public function getAll() {
//        $temp = json_decode($_REQUEST['json'], true);
//        print_r($temp);
//        echo $temp['danny'];
        $allUsers['allUsers'] = $this->users_model->getAll();
 
        $this->load->view('users/indexAll', $allUsers);
    }

    public function checkNick($nick) {
        $user['user'] = $this->users_model->checkNick($nick);
        if (! $user['user']) {
             set_status_header(209, 'no existe ese usuario');
        }
       $this->load->view('users/error', $user);
    }

}
