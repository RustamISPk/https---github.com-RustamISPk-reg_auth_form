<?php

namespace database;

require_once __DIR__ . '/vendor/autoload.php';
use database\config\Config;
use database\connection\DataBaseConnection;
ini_set('display_errors', 1);

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    session_start();
    $login = $_POST['login'];
    $pass = $_POST['pass'];
    $description = $_POST['description'];
    $age = (int)$_POST['age'];
    $config = new Config();
    $host_db = $config->host;
    $login_db = $config->user;
    $password_db = $config->password;
    $port_db = $config->port;
    $database_db = $config->database;
    $table_name_db = $config->table_name;
    $date = date("m.d.y");
    $date_time = date("H:i:s");
    $database_conn = new DataBaseConnection($host_db, $login_db, $password_db, $database_db, $port_db, $table_name_db);
    $database_conn->register_user($login, $pass, $description, $age, $date_time, $date);
}