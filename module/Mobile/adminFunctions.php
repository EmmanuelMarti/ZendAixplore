<?php
namespace Admin{
    use \PDO;
    
    session_start();
    
    function isConnected(){
        if(isset($_SESSION['M_adminLoged'])){
            return $_SESSION['M_adminLoged'];
        }
        $_SESSION['M_adminLoged'] = false;
        return false;
    }
    
    function connect($user,$pass){
        if(isConnected()){
            return true;
        }
        if($user == 'mobileAdmin' && $pass==sha1('admin')){
            $_SESSION['M_adminLoged'] = true;
            return true;
        }
        return false;
    }
    
    function disconnect(){
        session_destroy();
    }
    
    function connectDataBase(){
        try {
            $db = new PDO('mysql:host=localhost;dbname=zf2', 'root', '');
        } catch (Exception $e) {
            die(json_encode(['error' => $e->getMessage()]));
        }
        return $db;
    }
}