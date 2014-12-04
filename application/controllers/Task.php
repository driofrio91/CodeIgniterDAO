<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Task
 *
 * @author danny
 */
class Task extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('task_model');
        $this->load->model('listtask_model');
    }

    public function update($realized, $id_UnicoL, $position) {
        //Recupero el objeto ListTask a travez del id unico de la lista
        $listTask = $this->listtask_model->read($id_UnicoL);
        //print_r($listTask);
        //Si el objeto ListTask, que sera un array, su lonigtud es mayor a 0, contendra un objeto listTask
        if (count($listTask) > 0) {
            // print_r($listTask);
            //Recupero todas las tareas que tengasn el id del objeto ListTask
            $allTask = $this->task_model->getAllWhere($listTask['id_List']);
            echo '<br><br>';
            // print_r($allTask);
            //Ontengo la tarea de la poscicion especificada
            $task = $allTask[$position];
            echo '<br><br>';
            //  print_r($task);
            //Creo un objeto nuevo con los datos de la tarea recuperada, pero modifico el estado de realized
            $updateTask = new task_model($task['id_Task'], $task['tittle'], $realized, $task['id_List']);
            //Modifico la tarea.
            $this->task_model->update($updateTask);
        } else {
            //odig que se ejecutara si el idUnio de la lista no existe
        }
    }
    
    

}
