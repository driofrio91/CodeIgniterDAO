<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ListTask
 *
 * @author danny
 */
class ListTask extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('listtask_model');
        $this->load->model('task_model');
    }

    //    private $id_List;
//	private $titleList;
//	private $dateList;
//	private $status_share;
//	private $status;	
//	private $id_UnicoL;	
//	private $id_Group;
//	private $id_User;

    public function create($titleList, $dateList, $status_share, $status, $id_UnicoL, $id_Group, $id_User) {

        $list_task = new listtask_model($titleList, $dateList, $status_share, $status, $id_UnicoL, $id_Group, $id_User);
        
        $list_task_insert = $this->listtask_model->create($list_task);
        
        $task = json_decode($_REQUEST['json'], TRUE);
        if (is_array($task)){
            foreach ($task as $key => $values) {
//                foreach ($values as $key => $value) {
                    //JSON contiene solo tittle y re
//                    echo $key.'-------------------';
//                    echo '<br>'.$value.'<br>';
                    $task = new task_model(null,$values['tittle'], $values['realized'], $list_task_insert->getId_List());
                    $this->task_model->create($task);
//                }
            }
        }
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

}
