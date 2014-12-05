<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of gcm
 *
 * @author sandy
 */
class gcm {

    //URL a la que enviaremos los datos
    var $GCM_URL = 'https://android.googleapis.com/gcm/send';
    //
    var $apikey = "AIzaSyA7ch8mR8vGu6BQiRq0TFYLFURLujw7dDU";

    public function sendGCM($User, $sendList, $action) {
        //print_r($User);
        echo '<br>--------------<br>';
        //  print_r($sendList);

        if ($action === "task") {
            echo $action;
            echo 'hola2';
            echo '<br><br>';

            $data = array($action => $action,
                        "tasks" => $sendList);

            print_r($User['id_UserGCM']);
            echo '<br>';
            $fields = array('registration_ids' => array($User['id_UserGCM']),
                'data' => $data);
            
            $this->send($fields);
            
        } else if ($action === "add_tasks") {
            $data = array($action => $action,
                        "add_tasks" => $sendList);

            print_r($User['id_UserGCM']);
            echo '<br>';
            $fields = array('registration_ids' => array($User['id_UserGCM']),
                'data' => $data);
            
            $this->send($fields);
            
        }else if($action === "listTask"){
            $data = array($action => $action,
                        "listTask" => $sendList);

            print_r($User['id_UserGCM']);
            echo '<br>';
            $fields = array('registration_ids' => array($User['id_UserGCM']),
                'data' => $data);
            
            $this->send($fields);
            
        }
        // if ($action == 1) {
        // }
    }

    public function send($fields) {
        //  print_r($fields);
        $headers = array(
            'Authorization:key = ' . $this->apikey,
            'Content-Type: application/json'
        );
        // Abrir la conexión 
        $ch = curl_init();

        // Establecer el URL, número de la POST vars, POST   
        curl_setopt($ch, CURLOPT_URL, $this->GCM_URL);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        // Ejecutar mensaje 
        $result = curl_exec($ch);
        print_r($result);
        // Cerrar la conexión 
        curl_close($ch);
    }

}
