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
interface DAO {
public function create($object);
public function read($id);
public function update($object);
public function delete($object);
public function getAll();
}
