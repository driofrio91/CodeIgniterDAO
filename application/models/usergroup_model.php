<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once ('application/crud/CRUD.php');

/**
 * Description of usergroup_model
 *
 * @author danny
 */
class usergroup_model extends CI_Model implements CRUD {

    private $id_User;
    private $id_Group;
    private $adminGroup;

    function __construct($id_User = false, $adminGroup = false, $id_Group = false) {
        parent::__construct();
        $this->load->database();
        $this->id_User = $id_User;
        $this->adminGroup = $adminGroup;
        $this->id_Group = $id_Group;
    }

    public function getId_User() {
        return $this->id_User;
    }

    public function getId_Group() {
        return $this->id_Group;
    }

    public function setId_User($id_User) {
        $this->id_User = $id_User;
    }

    public function setId_Group($id_Group) {
        $this->id_Group = $id_Group;
    }

    public function getAdminGroup() {
        return $this->adminGroup;
    }

    public function setAdminGroup($adminGroup) {
        $this->adminGroup = $adminGroup;
    }

    ////////////////////////////////////////
    /////////////DATABASE///////////////////
    ////////////////////////////////////////

    public function create($object) {

        $data = array('adminGroup' => $object->getAdminGroup(),
            'id_User' => $object->getId_User(),
            'id_Group' => $object->getId_Group());
        $this->db->insert('USERGROUP', $data);
    }

    public function delete($object) {
        
    }

    public function getAllForIdGroup($id_Group) {
        //$data = array('id_Group' => $id_Group);
         $this->db->where('id_Group', $id_Group); 
        // $query = $this->db->get('USERGROUP');
        //$query = $this->db->query("SELECT * from USERGROUP WHERE id_Group = ".$id_Group);

        $query = $this->db->get('USERGROUP');
        $ret = $query->result_array();

        return $ret;
    }

    public function getAll() {
        
    }

    public function read($id) {
        
    }

    public function update($object) {
        
    }

}
