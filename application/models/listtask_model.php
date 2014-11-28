<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once ('application/crud/CRUD.php');

/**
 * Description of listtask_model
 *
 * @author danny
 */
class listtask_model extends CI_Model implements CRUD {

    private $id_List;
    private $titleList;
    private $dateList;
    private $status_share;
    private $status;
    private $id_UnicoL;
    private $id_Group;
    private $id_User;

    function __construct($id_List = false, $titleList = false, $dateList = false, $status_share = false, $status = false, $idUnicoL = false, $id_Group = false, $id_User = false) {
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
//    private $id_List;
//	private $titleList;
//	private $dateList;
//	private $status_share;
//	private $status;	
//	private $id_UnicoL;	
//	private $id_Group;
//	private $id_User;
    public function goToJson($object) {
        if ($object instanceof listtask_model) {
            $list_task = array('id_List' => $object->getId_List(),
                'titleList' => $object->getTitleList(),
                'dateList' => $object->getDateList(),
                'status_share' => $object->getStatus_share(),
                'status' => $object->getStatus(),
                'id_UnicoL' => $object->getId_UnicoL(),
                'id_Group' => $object->getId_Group(),
                'id_User' => $object->getId_User());
        }


        return $list_task;
    }

    /////////////////////////////////////////
    ////////////////DATABASE/////////////////
    /////////////////////////////////////////

    public function create($list_task) {

        $data = array('titleList' => $list_task->getTitleList(),
            'dateList' => $list_task->getDateList(),
            'status_share' => $list_task->getStatus_share(),
            'status' => $list_task->getStatus(),
            'id_UnicoL' => $list_task->getId_UnicoL(),
            'id_Group' => $list_task->getId_Group(),
            'id_User' => $list_task->getId_User());
        $this->db->insert('LISTTASKS', $data);
        $list_task->setId_List($this->db->insert_id());

        //  $temp = $this->goToJson($list_task);
        return $list_task;
    }

    public function delete($object) {
        
    }

    

    public function read($id_UnicoL) {
        $data = array('id_UnicoL' => $id_UnicoL);
        $query = $this->db->get_where('LISTTASKS', $data);
        return $query->row_array();
    }

    public function update($object) {
        
    }
    
    public function getAll() {
        
    }

}
