<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of listtask_model
 *
 * @author danny
 */
class listtask_model extends CI_Model implements CRUD{
    
    

	private $id_List;
	private $titleList;
	private $dateList;
	private $status_share;
	private $status;	
	private $id_UnicoL;	
	private $id_Group;
	private $id_User;
    
    function __construct($id_List = false, $titleList = false, $dateList = false, $status_share = false, $status = false,
            $idUnicoL = false, $id_Group = false, $id_User = false) {
        parent::__construct();
        $this->load->database();
        //
        $this->id_List = $id_List;
        $this->titleList = $titleList;
        $this->dateList = $dateList;
        $this->status_share = $dateList;
        $this->status = $status;
        $this->id_UnicoL = $idUnicoL;
        $this->id_Group = $id_Group;
        $this->id_User = $id_User;
     
    }
    
    public function getId_List() {
        return $this->id_List;
    }

    public function getTitleList() {
        return $this->titleList;
    }

    public function getDateList() {
        return $this->dateList;
    }

    public function getStatus_share() {
        return $this->status_share;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getId_UnicoL() {
        return $this->id_UnicoL;
    }

    public function getId_Group() {
        return $this->id_Group;
    }

    public function getId_User() {
        return $this->id_User;
    }

    public function setId_List($id_List) {
        $this->id_List = $id_List;
    }

    public function setTitleList($titleList) {
        $this->titleList = $titleList;
    }

    public function setDateList($dateList) {
        $this->dateList = $dateList;
    }

    public function setStatus_share($status_share) {
        $this->status_share = $status_share;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function setId_UnicoL($id_UnicoL) {
        $this->id_UnicoL = $id_UnicoL;
    }

    public function setId_Group($id_Group) {
        $this->id_Group = $id_Group;
    }

    public function setId_User($id_User) {
        $this->id_User = $id_User;
    }

    
    ////////////////////////////////////////////
    /////////////////JSON///////////////////////
    ////////////////////////////////////////////
    
    public function goToJson($object){
        
            $user = array('id_User' => $object->getId_User(),
                'name' => $object->getName(),
                'nick' => $object->getNick(),
                'email' => $object->getEmail(),
                'password' => $object->getPassword());
        
        return $user;
    }
    
    /////////////////////////////////////////
    ////////////////DATABASE/////////////////
    /////////////////////////////////////////
    
    public function create($list_task) {
        if ($list_task instanceof listtask_model) {
             $data = array('titleList' => $list_task->getTitleList(),
                'dateList' => $list_task->getDateList(),
                'status_share' => $list_task->getStatus_share(),
                'id_UnicoL' => $list_task->getId_UnicoL(),
                 );
            $this->db->insert('USERS', $data);
            $user->setId_User($this->db->insert_id());
        }
    }
//    private $id_List;
//	private $titleList;
//	private $dateList;
//	private $status_share;
//	private $status;	
//	private $id_UnicoL;	
//	private $id_Group;
//	private $id_User;

    public function delete($object) {
        
    }

    public function getAll() {
        
    }

    public function read($id) {
        
    }

    public function update($object) {
        
    }

}
