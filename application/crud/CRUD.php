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
interface CRUD {
    /**
     * Metodo que insertara un objeto en la base de datos
     * @param type $object
     */
    public function create($object);
    /**
     * Metodo que recuperara un objeto dela base de datos a partir de un ID.
     * @param type $id
     */
    public function read($id);
    /**
     * Metodo que actualizara un registro de la base de datos cogiendo los
     * parametros del objeto que le pasemos.
     * @param type $object
     */
    public function update($object);
    /**
     * Metodo que eliminara el objeto que le pasemos de la base de datos.
     * @param type $object
     */
    public function delete($object);
    /**
     * Metodo que obtendra todos los registros de la tabla.
     */
    public function getAll();
}
