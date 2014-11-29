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
        $Group->setId_UnicoG($nickAdmin . $Group->getId_Group());
        $this->group_model->update($Group);

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
        print_r($listShare);
        echo '<br>';
        print_r($userAdmin);
        echo '<br>';
        print_r($userShare);
        echo '<br>';
        $group = $this->create($nickAdmin);
        //Creo dosobjetos de la tabla intermedia, uno por cada registro de la tabla que vana tener.
        $user_group1 = new usergroup_model($userAdmin['id_User'], 1, $group->getId_Group());
        $user_group2 = new usergroup_model($userShare['id_User'], 0, $group->getId_Group());

        $this->usergroup_model->create($user_group1);
        $this->usergroup_model->create($user_group2);

        $listShareObject = $this->listtask_model->hydrat($listShare);
        $listShareObject->setId_Group($group->getId_Group());
        $this->listtask_model->update($listShareObject);

        //Llegado a este punto falta compartir con el GCM, push al usuario que no es el admin


        print_r($listShare);
        print_r($userAdmin);
        print_r($userShare);
    }

}
