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
        $this->load->model('users_model');
    }

    //    private $id_List;
//	private $titleList;
//	private $dateList;
//	private $status_share;
//	private $status;	
//	private $id_UnicoL;	
//	private $id_Group;
//	private $id_User;

    public function create($titleList, $dateList, $status_share, $status, $id_UnicoL, $id_Group, $nick) {
        //Recupero el id del usuario a partir del nick
        $user = $this->users_model->read($nick);
        //Si existe el nick del usuario
        if (count($user) > 0) {

            //instancio la lista de tareas con el id falso.
            $list_task = new listtask_model(null, $titleList, $dateList, $status_share, $status, $id_UnicoL, $id_Group, $user['id_User']);
            //Inserto el objeto en la database
            $list_task_insert = $this->listtask_model->create($list_task);
            //Recupero las tareas de el json enviado.
            $task = json_decode($_REQUEST['json'], TRUE);

            if (is_array($task)) {
                //Itero sobre el array del json
                foreach ($task as $key => $values) {
                    //Creo el objeto tareas por cada valor de la array
                    $taskSave = new task_model(null, $values['tittle'], $values['realized'], $list_task_insert->getId_List());
                    $this->task_model->create($taskSave);
                }
            }
        } else {
            //Codigo si no existe el usuario.
        }
    }

    public function delete($object) {
        
    }

    public function read($id_UnicoL) {
        $ListTask = $this->listtask_model->read($id_UnicoL);
        return $ListTask;
    }

    public function update($id_UnicoL) {
        $ListTask = $this->read($id_UnicoL);
        $taks = $this->task_model->getAllWhere($ListTask['id_List']);
        $updateTask = json_decode($_REQUEST['json'], true);
        echo '<br>estas son las que envio<br>';
        print_r(json_encode($updateTask));
        echo '<br>estas son las que ya hay <br>';
        print_r(json_encode($taks));
        
       // $save = false;
        
        foreach ($updateTask as $key => $value) {
            echo 'key => ' . $key . '<br>';
            echo 'valor => ' . $value . '<br>';
            echo 'valor titulo => ' . $value['tittle'] . '<br>';
               $save = $this->search($taks, $value['tittle']);
               if (!$save) {
                   echo '<br><strong>ALMACENO</strong><br>';
                   $new_task = new task_model(null, $value['tittle'], $value['realized'], $ListTask['id_List']);
                    $this->task_model->create($new_task);
               }else{
                   echo '<br><strong>NO</strong><br>';
               }

        }
    }
    
    public function updateTasks($id_UnicoL){
        $ListTask = $this->read($id_UnicoL);
        $taks = $this->task_model->getAllWhere($ListTask['id_List']);
        print_r(json_encode($taks));
        $update_tasks = json_decode($_REQUEST['json'], true);
        
        foreach ($update_tasks as $key_update => $value_update) {
            
            foreach ($taks as $key => $value) {
                print_r($value);
                echo '<br><br>';
                if ($value_update['tittle'] == $value['tittle']) {
                    $task = new task_model($value['id_Task'], $value['tittle'],
                            $value_update['realized'], $value['id_List']);
                    print_r($task);
                    echo 'en el controlador';
                    $this->task_model->update($task);
                }
            }
            
        }
    }
    
    public function updateListTaskGroup($id_UnicoL, $id_UnicoG){
        $ListTask = $this->read($id_UnicoL);
        if (!empty($ListTask)) {
            $update_listTask = new listtask_model($ListTask['id_List'], $ListTask['titleList'], 
                    $ListTask['dateList'], $ListTask['status_share'], $ListTask['status'], 
                    $ListTask['id_UnicoL'], $id_UnicoG, $ListTask['id_User']);
            $this->listtask_model->update($update_listTask);
        }
    }

    public function getAll() {

        $allUsers['allUsers'] = $this->users_model->getAll();

        $this->load->view('users/indexAll', $allUsers);
    }

//    public function addTaskToListTask($id_UnicoL) {
//        $ListTask = $this->listtask_model->read($id_UnicoL);
//        $task = json_decode($_REQUEST['json'], true);
//        if (is_array($task)) {
//
//            foreach ($task as $key => $value) {
//                $new_task = new task_model(null, $task['tittle'], $task['realized'], $ListTask['id_List']);
//                $this->task_model->create($new_task);
//            }
//        }
//    }
    
    public function search($Listtasks, $title){
        $save = false;
        foreach ($Listtasks as $key => $value) {
            if ($value['tittle']=== $title) {
                $save = true;
                
            }
        }
        return $save;
    }

}
