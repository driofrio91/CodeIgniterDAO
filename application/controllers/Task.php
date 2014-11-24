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
class Task extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('task_model');
    }
    
    public function updateTask($realized, $id_UnicoL, $position){
        
        
    }

}
