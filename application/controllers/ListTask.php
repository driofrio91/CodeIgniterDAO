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
        
        $task = json_decode($_REQUEST['json'], TRUE);
        if (is_array($task)){
            foreach ($task as $key => $value) {
                foreach ($value as $key => $value) {
                    //JSON contiene solo tittle y realized
                    echo $key.'-------------------';
                    echo '<br>'.$value.'<br>';
                }
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
