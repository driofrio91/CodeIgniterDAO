<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once ('application/crud/CRUD.php');

/**
 * Description of group_model
 *
 * @author danny
 */
class group_model extends CI_Model implements CRUD {

    private $id_Group;
    private $nameGroup;
    private $id_UnicoG;

    function __construct($id_Group = false, $nameGroup = false, $id_UnicoG = false) {
        parent::__construct();
        $this->load->database();
        $this->id_Group = $id_Group;
        $this->nameGroup = $nameGroup;
        $this->id_UnicoG = $id_UnicoG;
    }

    public function getId_Group() {
        return $this->id_Group;
    }

    public function getNameGroup() {
        return $this->nameGroup;
    }

    public function getId_UnicoG() {
        return $this->id_UnicoG;
    }

    public function setId_Group($id_Group) {
        $this->id_Group = $id_Group;
    }

    public function setNameGroup($nameGroup) {
        $this->nameGroup = $nameGroup;
    }

    public function setId_UnicoG($id_UnicoG) {
        $this->id_UnicoG = $id_UnicoG;
    }

    //////////////////////////////////
    ////////////DATABASE//////////////
    //////////////////////////////////

    public function create($group) {

        $data = array('nameGroup' => $group->getNameGroup(),
            'id_UnicoG' => $group->getId_UnicoG());
        $this->db->insert('GROUPS', $data);
        $id_group = $this->db->insert_id();
        $group->setId_Group($id_group);


        return $group;
    }

    public function delete($object) {
        
    }

    public function read($id_UnicoG) {
        
    }

    public function update($group) {
        if ($group instanceof group_model) {
            $data = array("nameGroup" => 'caca',
                "id_UnicoG" => $group->getId_UnicoG());
         
            $this->db->update('GROUPS', $data, array('id_Group' => $group->getId_Group()));
        }
    }

    public function getAll() {
        
    }

}
