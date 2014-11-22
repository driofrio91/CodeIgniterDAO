<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author Sandy
 */
class Users_model extends CI_Model {

    private static $TABLE_NAME = 'USERS';
    private $id_User;
    private $name;
    private $nick;
    private $email;
    private $password;

    
    
    
    /**
     * 
     */
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    
    
    public function getId_User() {
        return $this->id_User;
    }

    public function getName() {
        return $this->name;
    }

    public function getNick() {
        return $this->nick;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPass() {
        return $this->pass;
    }

    public function setId_User($id_User) {
        $this->id_User = $id_User;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setNick($nick) {
        $this->nick = $nick;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPass($pass) {
        $this->pass = $pass;
    }

    ///////////////////////////////////////////////    
    ///////////DATABASE////////////////////////////
    ///////////////////////////////////////////////
    
    /**
     * 
     * @param type $user
     */

    public function create($user){
        if ($user instanceof Users_model) {
            $data = array('id_User' => $user->getId_User(),
                            'name' => $user->getName(),
                            'nick' => $user->getNick(),
                            'email' => $user->getEmail(),
                            'password' => $user->getPass());
        }
    }


    public function getALL() {
        $query = $this->db->get('USERS');
        return $query->result_array();
    }

}
