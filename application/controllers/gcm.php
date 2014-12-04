<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of gcm
 *
 * @author danny
 */
class gcm {
    
    //URL a la que enviaremos los datos
    var $GCM_URL = 'https://android.googleapis.com/gcm/send';
    //
    var $apikey = "AIzaSyA7ch8mR8vGu6BQiRq0TFYLFURLujw7dDU";
    
    public function sendGCM($reg1, $listTask, $task) {
        
      //  $registrationIDs = array($reg1, $mensaje);
       
        
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
        curl_setopt($ch, CURLOPT_POSTFIELDS,  json_encode($fields));
        // Ejecutar mensaje 
        $result = curl_exec($ch);
        // Cerrar la conexión 
        curl_close($ch);

        
    }
}
