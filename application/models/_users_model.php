<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author Sandy 
 */
class users_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    /** 
     * 
     * @param type $slug
     * @return type
     */
    public function get_users($slug = FALSE) {
        if ($slug === FALSE) {
            $query = $this->db->get('USERS');
            return $query->result_array();
        }
        $query = $this->db->get_where('USERS', array('nick' => $slug));
        return $query->row_array();
    }
    
    

}
