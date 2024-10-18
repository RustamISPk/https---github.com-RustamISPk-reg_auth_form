<?php

namespace database;

require_once __DIR__ . '/vendor/autoload.php';
use database\config\Config;
use database\connection\DataBaseConnection;
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $config = new Config();
    $host_db = $config->host;
    $login_db = $config->user;
    $password_db = $config->password;
    $port_db = $config->port;
    $database_db = $config->database;
    $table_name_db = $config->table_name;
    $login = $_POST['login'];
    $pass = $_POST['pass'];
    $database_conn = new DataBaseConnection($host_db, $login_db, $password_db, $database_db, $port_db, $table_name_db);
    $result = $database_conn->authentication_user($login, $pass);
    if($result == null){
        echo json_encode(array('result' => 'none user'));
    }else{
        if ($result['user_password'] == $pass){
            echo json_encode(array('result' => 'success'));
        } else{
            echo json_encode(array('result' => 'wrong password'));
        }
    }
}