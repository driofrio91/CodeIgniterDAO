<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Users
 * 
 * @author Sandy
 */
class users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('users_model');
    }


    public function view($slug) {
        $data['users_item'] = $this->users_model->get_users($slug);
        if (empty($data['users_item'])) {
            show_404();
        }
        $data['name'] = $data['users_item']['name'];
      //  $this->load->view('templates/header', $data);
        $this->load->view('users/view', $data);
      //  $this->load->view('templates/footer');
    }

    public function get_user($nick){
        $data['users_item'] = $this->users_model->get_users($nick);
        if (empty($data['users_item'])) {
            show_404();
        }
        $data['name'] = $data['users_item']['name'];
      //  $this->load->view('templates/header', $data);
        $this->load->view('users/view', $data);
      //  $this->load->view('templates/footer');
    }


    ///////////////////////////////////////
    ///Metodo pasa los datos a la vista////
    ///////////////////////////////////////

    public function index() {
        $data['users'] = $this->users_model->get_users();
        $data['name'] = 'Usuarios';
      //  $this->load->view('templates/header', $data);
        $this->load->view('users/index', $data);
      //  $this->load->view('templates/footer');
    }

}
