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
        }else{
            //Codigo si no existe el usuario.
        }
    }

    public function delete($object) {
        
    }

    public function read($id_UnicoL) {
        $ListTask = $this->listtask_model->read($id_UnicoL);
        
    }

    public function update($object) {
        
    }

    public function getAll() {

        $allUsers['allUsers'] = $this->users_model->getAll();

        $this->load->view('users/indexAll', $allUsers);
    }

}
