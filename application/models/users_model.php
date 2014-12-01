<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once ('application/crud/CRUD.php');

/**
 * Description of Usuario
 *
 * @author Sandy
 */
class Users_model extends CI_Model implements CRUD {

    private static $TABLE_NAME = 'USERS';
    private $id_User;
    private $name;
    private $nick;
    private $email;
    private $password;
    private $id_UserGCM;
                function __construct($name = false, $nick = false, $email = false, $password = false, $id_UserGCM = false) {
        parent::__construct();
        $this->load->database();
        //
        $this->name = $name;
        $this->nick = $nick;
        $this->email = $email;
        $this->password = $password;
        $this->id_UserGCM = $id_UserGCM;
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

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }
    
    public function getId_UserGCM() {
        return $this->id_UserGCM;
    }

    public function setId_UserGCM($id_UserGCM) {
        $this->id_UserGCM = $id_UserGCM;
    }

    
    ////////////////////////////////////////////
    /////////////////JSON///////////////////////
    ////////////////////////////////////////////

    public function goToJson($object) {

        $user = array('id_User' => $object->getId_User(),
            'name' => $object->getName(),
            'nick' => $object->getNick(),
            'email' => $object->getEmail(),
            'password' => $object->getPassword(),
            'id_UserGCM' => $object->getId_UserGCM());

        return $user;
    }

    ///////////////////////////////////////////////    
    ///////////DATABASE////////////////////////////
    ///////////////////////////////////////////////

    /**
     * 
     * @param type $user
     */
    public function create($user) {
        if ($user instanceof Users_model) {
            $data = array('name' => $user->getName(),
                'nick' => $user->getNick(),
                'email' => $user->getEmail(),
                'password' => $user->getPassword(),
                'id_UserGCM' => $user->getId_UserGCM());
            $this->db->insert('USERS', $data);
            $user->setId_User($this->db->insert_id());
        }
        $temp = $this->goToJson($user);
        return $temp;
    }

    public function delete($object) {
        
    }

    public function read($nick) {
        $data = array('nick' => $nick);
        $query = $this->db->get_where('USERS', $data);
        return $query->row_array();
    }

    public function update($object) {
        
    }

    public function getALL() {
        $query = $this->db->get('USERS');
        return $query->result_array();
    }

//    public function checkNick($nick){
//         $query = $this->db->get_where('USERS', array('nick' => $nick));
//         return $query->row_array();
//    }
}
