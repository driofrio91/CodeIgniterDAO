<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once ('application/dao/interfacesDAO/iUsersDAO.php');
/**
 * Description of EasyTaskUserDao
 *
 * @author danny
 */
class EasyTaskUserDao implements iUsersDAO{
    
     function __construct() {
        
    }
    
    public function create($object) {
        echo 'estoy llamando al dao de usuario y esto se merece un 10!!!!';
    }

    public function delete($object) {
        
    }

    public function getAll() {
        
    }

    public function read($id) {
        
    }

    public function update($object) {
        
    }

   

}
