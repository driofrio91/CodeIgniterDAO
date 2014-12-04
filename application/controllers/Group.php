<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Group
 *
 * @author danny
 */
class Group extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('listtask_model');
        $this->load->model('group_model');
        $this->load->model('users_model');
        $this->load->model('usergroup_model');
    }

    /**
     * Metodo que creara un grupo con nombre por defecto.
     * @param type $nickAdmin
     * @return type
     */
    public function create($nickAdmin) {
        $newGroup = new group_model(null, 'Sin nombre', null);
        $Group = $this->group_model->create($newGroup);

        //Actualizo el grupo para tener un id unico
        $id_UnicoG = $nickAdmin . $Group->getId_Group();
        $Group->setId_UnicoG($id_UnicoG);
        $this->group_model->update($Group);
       // print_r($Group);
        $data['group'] = $this->group_model->transformToArray($Group);

        //print_r($data);
         $this->load->view('group/index', $data);

        return $Group;
    }

    /**
     * Metodo que realizara todos los pasos para compartir una lista
     * @param type $nick
     * @param type $nickAdmin
     * @param type $id_Unicol
     */
    public function shareList($nick, $nickAdmin, $id_Unicol) {
        $userShare = $this->users_model->read($nick);
        $userAdmin = $this->users_model->read($nickAdmin);
        $listShare = $this->listtask_model->read($id_Unicol);
        //  print_r($listShare);
        // echo '<br>';
        // print_r($userAdmin);
        // echo '<br>';
        // print_r($userShare);
        // echo '<br>';
        $group = $this->create($nickAdmin);

        $data['group'] = $this->group_model->transformToArray($group);
        //print_r($data);
        $this->load->view('group/index', $data);

        //Creo dosobjetos de la tabla intermedia, uno por cada registro de la tabla que vana tener.
        $user_group1 = new usergroup_model($userAdmin['id_User'], 1, $group->getId_Group());
        $user_group2 = new usergroup_model($userShare['id_User'], 0, $group->getId_Group());

        $this->usergroup_model->create($user_group1);
        $this->usergroup_model->create($user_group2);

        $listShareObject = $this->listtask_model->hydrat($listShare);
        $listShareObject->setId_Group($group->getId_Group());
        $this->listtask_model->update($listShareObject);

        //Llegado a este punto falta compartir con el GCM, push al usuario que no es el admin
        // print_r($listShare);
        // print_r($userAdmin);
        // print_r($userShare);
    }
    
    /**
     * 
     * @param type $id_UnicoG
     */
    public function insertUserGroup($id_UnicoG){
        $group = $this->group_model->read($id_UnicoG);
        
        //recupero los usuarios
        $rows = $this->usergroup_model->getAllForIdGroup($group['id_Group']);
        //print_r($rows);
        
        
        $users = json_decode($_REQUEST['json'], true);
        print_r($users);
        foreach ($users as $key => $value) {
            $user = $this->users_model->read($value['nick']);
            $user_group = new usergroup_model($user['id_User'], $value['admin'], $group['id_Group']);
            $this->usergroup_model->create($user_group);
        }
        
        
    }
    
    public function search($rowsDatabase, $rowNew){
        $save = false;
       
        foreach ($rowsDatabase as $key => $value) {
            print_r($key);
            print_r($value);
        }
        return $save;
    }

}
