<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author danny
 */
interface factoryDAO {
    public function getIGroupDAO();
    public function getIListTaskDAO();
    public function getITaskDAO();
    public function getIUserGroupDAO();
    public function getIUserDAO();
}
