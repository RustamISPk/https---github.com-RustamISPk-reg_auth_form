<?php

namespace database;

require_once __DIR__ . '/vendor/autoload.php';
use database\config\Config;
use database\connection\DataBaseConnection;
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    date_default_timezone_set('Europe/Moscow');
    $config = new Config();
    $response_array = [];
    $host_db = $config->host;
    $login_db = $config->user;
    $password_db = $config->password;
    $port_db = $config->port;
    $database_db = $config->database;
    $table_name_db = $config->table_name;
    $database_conn1 = new DataBaseConnection($host_db, $login_db, $password_db, $database_db, $port_db, $table_name_db);
    $result = $database_conn1->last_registreted_users();

    $date = date("m.d.y");
    $date_time = strtotime(date("H:i:s"));

    for ($i = 0; $i < count($result); $i++){
        if ($result[$i][4] == $date){
            $user_reg_time = strtotime($result[$i][5]);
            $time_difference = abs($date_time - $user_reg_time);
            $minutes_difference = $time_difference / 60;
            if ($minutes_difference <= 6) {
                $user_data = [$result[$i][0], $result[$i][3], $result[$i][2]];
                array_push($response_array,$user_data);
            }
        }
    }
    // print_r($result);
        // $userid = $row["a"];
        // $username = $row["name"];
        // $userage = $row["age"];
    // print_r($result);
    // if($result == null){
    echo json_encode(array('last_users_data' => $response_array));
    // }else{
    //     if ($result['user_password'] == $pass){
    //         echo json_encode(array('result' => 'success'));
    //     } else{
    //         echo json_encode(array('result' => 'wrong password'));
    //     }
    // }
}