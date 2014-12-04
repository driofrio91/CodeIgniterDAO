<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once ('application/crud/CRUD.php');

/**
 * Description of task_model
 *
 * @author danny
 */
class task_model extends CI_Model implements CRUD {

    private $id_task;
    private $tittle;
    private $realized;
    private $id_List;

    function __construct($id_task = FAlSE, $tittle = FAlSE, $realized = FAlSE, $id_List = FAlSE) {
        parent::__construct();
        $this->load->database();
        //
        $this->id_task = $id_task;
        $this->tittle = $tittle;
        $this->realized = $realized;
        $this->id_List = $id_List;
    }

    public function getId_task() {
        return $this->id_task;
    }

    public function getTittle() {
        return $this->tittle;
    }

    public function getRealized() {
        return $this->realized;
    }

    public function getId_List() {
        return $this->id_List;
    }

    public function setId_task($id_task) {
        $this->id_task = $id_task;
    }

    public function setTittle($tittle) {
        $this->tittle = $tittle;
    }

    public function setRealized($realized) {
        $this->realized = $realized;
    }

    public function setId_List($id_List) {
        $this->id_List = $id_List;
    }

    ////////////////////////////////////////////
    /////////////////JSON///////////////////////
    ////////////////////////////////////////////

    /**
     * Metodo al que se le pasa un objeto de tipo TASK y te devuelve un 
     * json con con los atributos del objeto.
     * @param task_model $object
     * @return type json
     */
    public function goToJson($object) {
        if ($object instanceof task_model) {
            $list_task = array('id_Task' => $object->getId_task(),
                'tittle' => $object->getTittle(),
                'realized' => $object->getRealized(),
                'id_List' => $object->getId_List());
        }
        $json = json_encode($list_task);
        return $json;
    }

    /////////////////////////////////////
    /////////////////DATABASE////////////
    /////////////////////////////////////


    public function create($task) {

        if ($task instanceof task_model) {
            $data = array('tittle' => $task->getTittle(),
                'realized' => $task->getRealized(),
                'id_List' => $task->getId_List());
            $this->db->insert('TASKS', $data);
            $task->setId_List($this->db->insert_id());
        }

        return $task;
    }

    public function delete($object) {
        
    }

    public function getAll() {
        $query = $this->db->get('TASKS');
        return $query->result_array();
    }
    
    /**
     * Metodo que recuperara una lista de tareas por id de lista.
     * @param type $id_List
     * @return type
     */
    public function getAllWhere($id_List) {
        $data = array('id_List' => $id_List);
        $query = $this->db->get_where('TASKS', $data);
        return $query->result_array();
    }

    public function read($id) {
        
    }

    /**
     * Metodo que cambiara el estado de una tarea de realizada a no realizada y
     * viceversa. 
     * @param task_model $task
     */
    public function update($task) {
        print_r($task);
     //   if ($task instanceof task_model) {
            $data = array('tittle' => $task->getTittle(),
                'realized' => $task->getRealized(),
                'id_List' => $task->getId_List());
            echo '<br> ==> updating <== <br>';
            $bar =$this->db->update('TASKS', $data, array('id_Task' => $task->getId_task()));
            echo $bar.'ppppppppppp';
      //      }
    }

}
